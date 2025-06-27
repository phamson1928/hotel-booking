<!DOCTYPE html>
<html>
<head>
    <base href="/public">
    @include('home.css')
    <style>
        .banner .carousel-item img {
            height: 660px !important; 
            object-fit: cover;
            width: 100%;
        }
        
        .booking_ocline {
            top: 50%;
            transform: translateY(-50%);
        }

        .banner-content {
            position: absolute;
            top: 50%;
            left: 10%;
            transform: translateY(-50%);
            z-index: 10;
            color: white;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.7);
            max-width: 500px;
        }

        .banner-card {
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 30px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .banner-content h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .banner-content p {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 0;
        }

        .carousel-item {
            position: relative;
        }
    </style>
</head>
<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
    </header>
    <!-- end header inner -->
    <!-- end header -->
<section id="home" class="banner_main">
         <div id="myCarousel" class="carousel slide banner" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
               <li data-target="#myCarousel" data-slide-to="1"></li>
               <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <img class="first-slide" src="images/banner1.jpg" alt="First slide">
                  <div class="banner-content">
                     <div class="banner-card">
                        <h1 style="font-family: 'Times New Roman', Times, serif; color: #87CEEB;">Trải Nghiệm Nghỉ Dưỡng Tuyệt Vời Tại Khách Sạn Của Chúng Tôi</h1>
                        <p>Đặt phòng nhanh chóng, dịch vụ chuyên nghiệp, tiện nghi đẳng cấp – nơi nghỉ dưỡng lý tưởng cho bạn và gia đình.</p>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <img class="second-slide" src="images/banner2.jpg" alt="Second slide">
                  <div class="banner-content">
                     <div class="banner-card">
                        <h1 style="font-family: 'Times New Roman', Times, serif; color: #87CEEB;">Trải Nghiệm Nghỉ Dưỡng Tuyệt Vời Tại Khách Sạn Của Chúng Tôi</h1>
                        <p>Đặt phòng nhanh chóng, dịch vụ chuyên nghiệp, tiện nghi đẳng cấp – nơi nghỉ dưỡng lý tưởng cho bạn và gia đình.</p>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <img class="third-slide" src="images/banner3.jpg" alt="Third slide">
                  <div class="banner-content">
                     <div class="banner-card">
                        <h1 style="font-family: 'Times New Roman', Times, serif; color: #87CEEB;">Trải Nghiệm Nghỉ Dưỡng Tuyệt Vời Tại Khách Sạn Của Chúng Tôi</h1>
                        <p>Đặt phòng nhanh chóng, dịch vụ chuyên nghiệp, tiện nghi đẳng cấp – nơi nghỉ dưỡng lý tưởng cho bạn và gia đình.</p>
                     </div>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
         </div>
      </section>
</body>
</html>