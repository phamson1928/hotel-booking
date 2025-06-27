<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">
    @include('home.css')
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
        @include('home.header')
      </header>
      <!-- end header inner -->
      <!-- end header -->
   <div class="our_room">
       <div class="container">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        
        <div class="row">
            <div class="col-sm-5">
                <div id="serv_hover">
                    <div class="room_img">
                        <img style="height: 200px; width: 350px" src="room_images/{{$rooms->image}}" alt="#"/>
                    </div>
                    @if($rooms->images->count() > 0)
                    <div class="row mt-3">
                        @foreach($rooms->images as $image)
                        <div class="col-md-4 mb-2">
                            <img src="room_images/{{$image->image_path}}" alt="Room Image" class="img-fluid" style="height: 100px; width: 100%; object-fit: cover;">
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-sm-7">
                <h1 style="font-size: xx-large; color:red; font-family:'Times New Roman', Times, serif">{{$rooms->room_title}}</h1>
                <h3>Description : {{$rooms->description}}</h2>
                <h3>Cost : {{$rooms->price}} $</h3>
                <h3> Free Wifi : {{$rooms->has_wifi}}</h3>
                <h3>Type : {{$rooms->room_type}} room</h3>
                <a class="btn btn-outline-primary" data-toggle="modal" data-target="#bookingModal">Book This Room</a>

                <!-- Booking Modal -->
                <div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="{{ route('book_room', $rooms->id) }}" method="POST">
                                @csrf
                                <div class="modal-header">
                                    <h3 class="modal-title" id="bookingModalLabel">Enter Your Information</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="name">Full Name</label>
                                        <input 
                                        @if(Auth::id())
                                        value="{{Auth::user()->name}}"
                                        @endif
                                        type="text" class="form-control" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input type="text" class="form-control" name="phone" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="checkin_date">Check-in Date</label>
                                        <input type="date" class="form-control" name="checkin_date" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="checkout_date">Check-out Date</label>
                                        <input type="date" class="form-control" name="checkout_date" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Confirm Booking</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
         </div>
       </div>
   </div>

      <!--  footer -->
      <footer>
        @include('home.footer')
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>