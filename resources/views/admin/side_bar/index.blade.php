<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 style="font-size: 20px; font-weight: bold; color: white;" class="h5 no-margin-bottom">MESSAGES</h2>
          </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-hover">
            <thead>
                <tr>
                <th >STT</th>
                <th >Tên</th>
                <th >Email</th>
                <th >Số điện thoại</th>
                <th >Ngày gửi</th>
                <th >Nội dung</th>
                <th >Thao tác</th>        
            </thead>
            <tbody>
                @foreach($contacts as $index => $contact)
                <tr>
                <th scope="row">{{$index+=1}}</th>
                <td>{{$contact->name}}</td>
                <td>{{$contact->email}}</td>
                <td>{{$contact->phone}}</td>
                <td>{{$contact->created_at}}</td>
                <td>{{$contact->message}}</td>
                <td>
                    <a href="{{ route('contact_delete',$contact->id)}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#replyModal{{$contact->id}}">Gửi phản hồi</button>
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
      </div>
      @include('admin.footer')
    </div>

    <!-- Modals for each contact -->
    @foreach($contacts as $contact)
    <div class="modal fade" id="replyModal{{$contact->id}}" tabindex="-1" role="dialog" aria-labelledby="replyModalLabel{{$contact->id}}" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="replyModalLabel{{$contact->id}}">Gửi phản hồi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <form action="{{route('send_response',$contact->id)}}" method="post">
            @csrf
          <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name{{$contact->id}}" class="col-form-label">Người nhận:</label>
                <input type="text" class="form-control" id="recipient-name{{$contact->id}}" value="{{$contact->email}}" readonly name="email">
              </div>
              <div class="form-group">
                <label for="message-text{{$contact->id}}" class="col-form-label">Nội dung phản hồi:</label>
                <textarea class="form-control" id="message-text{{$contact->id}}" rows="4" name="reply_message"></textarea>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button type="submit" class="btn btn-success">Gửi phản hồi</button>
          </div>
          </form>

        </div>
      </div>
    </div>
    @endforeach

    <!-- JavaScript files-->
    @include('admin.script')
  </body>
</html>