<div id="our-room" class="our_room">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Our Room</h2>
                     <p>Những phòng bạn có thẻ sẽ thích </p>
                  </div>
               </div>
            </div>

            <div class="row">
               @foreach( $rooms as $room)
               <div class="col-md-4 col-sm-6">
                  <div id="serv_hover"  class="room h-100" >
                     <div class="room_img">
                        <figure><img style="height: fit-content;" src="room_images/{{$room->image}}" alt="#"/></figure>
                     </div>
                     <div class="bed_room">
                        <h3 style="line-height: 1">{{$room->room_title}}</h3>
                        <p>{{$room->description}} </p>
                     </div>
                     <a style="font-weight: 500; font-size:large" href="{{route('room_detail',$room->id)}}" class="btn btn-outline-info" >Detail</a>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>