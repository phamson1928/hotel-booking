<nav id="sidebar">
  <!-- Sidebar Header-->
  <div class="sidebar-header d-flex align-items-center">
    <div class="avatar">
      <img src="admin/img/admincoc.jpg" alt="Admin Avatar" class="img-fluid rounded-circle">
    </div>
    <div class="title">
      <h1 class="h5">Admin Sơn Phạm</h1>
      <p>Web Designer</p>
    </div>
  </div>
  
  <!-- Sidebar Navigation Menus-->
  <span class="heading">Main</span>
  <ul class="list-unstyled">
    <li class="{{ request()->routeIs('home_in_panel') ? 'active' : '' }}">
      <a href="{{route('home_in_panel')}}">
        <i class="icon-home"></i>Trang Chủ
      </a>
    </li>
      <li class="{{ request()->routeIs('add_room') ? 'active' : '' }} "><a href="{{route('add_room')}}"><i class="fa fa-plus" aria-hidden="true"></i></i>Thêm Phòng</a></li>
      <li class="{{ request()->routeIs('list_rooms') ? 'active' : '' }}"><a href="{{route('list_rooms')}}"><i class="fa fa-list-alt" aria-hidden="true"></i></i>Danh Sách Phòng</a></li>
      <li class="{{ request()->routeIs('list_bookings') ? 'active' : '' }}"><a href="{{route('list_bookings')}}"><i class="fa fa-check-square" aria-hidden="true"></i></i>Danh Sách Đặt Phòng</a></li>
      <li class="{{ request()->routeIs('list_gallaries') ? 'active' : '' }}"><a href="{{route('list_gallaries')}}"><i class="fa fa-image" aria-hidden="true"></i></i>Ảnh Trưng Bày</a></li>
  </ul>
</nav>