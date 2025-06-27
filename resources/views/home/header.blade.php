<!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                           <a class="navbar-brand" href="/">
                              <img width="280" style="margin-top: -40px;" src="/images/MOIMOI.png" alt="Logo" >
                           </a>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 ">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item">
                                 <a class="nav-link" href="/#home">Home</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="/#about">About</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="/#our-room">Our room</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="/#gallery">Gallery</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="/#blog">Note</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="/#contact">Contact Us</a>
                              </li>

                           @auth
                              <li class="nav-item dropdown">
                                 <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       {{ Auth::user()->name }}
                                 </a>
                                 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                       <form method="POST" action="{{ route('logout') }}">
                                          @csrf
                                          <button type="submit" class="dropdown-item">
                                             Logout
                                          </button>
                                       </form>
                                 </div>
                              </li>
                                 @else
                                    <li class="nav-item">
                                       <a class="nav-link" href="{{ url('login') }}">Login</a>
                                    </li>
                                    <li class="nav-item">
                                       <a class="nav-link" href="{{ url('register') }}">Register</a>
                                    </li>
                              @endauth

                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>