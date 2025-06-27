<!DOCTYPE html>
<html lang="en">
<head>
   @include('admin.css')
</head>
<body>
    @include('admin.header')
    
    <div class="d-flex align-items-stretch">
    
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
          @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
          <table class="table table-hover">
            <thead>
                <tr>
                    <th>Hình ảnh phòng</th>
                    <th>Phòng Đặt</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Ngày check-in</th>
                    <th>Ngày check-out</th>
                    <th>Trạng thái</th>
                    <th>Ngày đặt</th>
                    <th>Thao tác</th>
                </tr>

            </thead>
            <tbody>
                @foreach($bookings as $booking)
                <tr>
                    <td>
                        <img src="{{ asset('room_images/'.$booking->room->image) }}" alt="Room Image" style="width: 100px; height: 70px; object-fit: cover;">
                    </td>
                    <td>{{$booking->room_id}}</td>
                    <td>{{$booking->full_name}}</td>
                    <td>{{$booking->email_address}}</td>
                    <td>{{$booking->phone_number}}</td>
                    <td>{{$booking->checkin_date}}</td>
                    <td>{{$booking->checkout_date}}</td>
                    <td>{{$booking->status}}</td>
                    <td>{{$booking->created_at}}</td>
                    <td>
                        <div class="d-flex">
                            <div class="row">
                                <a style=" width: 100px;" href="{{ route('susscess_booking', $booking->id)}}" class="btn btn-success me-3">Duyệt</a>
                                <a style="margin-top: 10px; width: 100px;" href="{{ route('reject_booking', $booking->id)}}" class="btn btn-secondary me-3">Từ chối</a>
                            </div>
                        </div>
                    </td>
                    <td>
                        <a style=" width: 100px;" href="{{ route('booking_delete', $booking->id)}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
            </table>

          </div>
        </div>
    </div>

    </div>
    @include('admin.script')
</body>
</html>