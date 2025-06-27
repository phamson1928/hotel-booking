<header class="header">   
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex align-items-center justify-content-between">
          <div class="navbar-header">
            <!-- Navbar Header--><a class="navbar-brand">
              <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Admin</strong><strong>Panel</strong></div>
              <div class="brand-text brand-sm"><strong class="text-primary">D</strong><strong>A</strong></div></a>
            <!-- Sidebar Toggle Btn-->
            <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
          </div>
          <div class="right-menu list-inline no-margin-bottom">    
            
            <!-- Log out               -->
             <div class="list-inline-item logout">
              <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <a href="#" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">
                      Logout <i class="icon-logout"></i>
                  </a>
              </form>
          </div>
          </div>
        </div>
      </nav>
    </header>