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

          <table class="table table-hover">
            <thead>
                <tr>
                <th >STT</th>
                <th >Tên Phòng</th>
                <th >Hình ảnh</th>
                <th >Mô tả</th>
                <th >Giá</th>
                <th >Wifi</th>
                <th >Loại Phòng</th>        
            </thead>
            <tbody>
                @foreach($rooms as $index => $room)
                <tr>
                <th scope="row">{{$index+=1}}</th>
                <td>{{$room->room_title}}</td>
                <td>
                    <img width="65" height="50" src="room_images/{{$room->image}}">
                </td>
                <td>{{$room->description}}</td>
                <td>{{$room->price}}</td>
                <td>{{$room->has_wifi}}</td>
                <td>{{$room->room_type}}</td>
                <td><a href="{{ route('room_delete', $room->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this room?')">Delete</a></td>
                <td><a href="{{ route('room_update_screen', $room->id)}}" class="btn btn-warning">Update</a></td>
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