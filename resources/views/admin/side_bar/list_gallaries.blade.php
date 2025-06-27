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
            <h1 style="color: white; text-align: center; ">Gallary</h1>
<br>

            <div class="container text-center">
              <div class="row">
                @foreach($gallaries as $gallary)
                <div class="col-md-3">
                  <div class="card">
                    <img style="height: 200px;" src="/images/{{$gallary->image}}" alt=""><h4 class="card-title" style="color: yellow;">{{$gallary->title}}</h4><a class="btn btn-danger" href="/delete_gallary/{{$gallary->id}}">Delete</a>
                  </div>
              </div>
                @endforeach
              </div>
            </div>
<br>
            <form action="{{ route('add_gallary') }}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="text" name="title" placeholder="Title">
              <input type="file" name="image" placeholder="Image">
              <button class="btn btn-success" type="submit">Add</button>
            </form>
            <br>  
            @if(session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>

    
    <!-- JavaScript files-->
    @include('admin.script')
  </body>
</html>