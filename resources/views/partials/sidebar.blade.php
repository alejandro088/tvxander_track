<nav class="col-md-2 d-none d-md-block bg-light sidebar mt-3">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
            <a class="nav-link active" href="{{route('home')}}">
                <span data-feather="home"></span>
                Main Page <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('user.calendar')}}">
                <span data-feather="calendar"></span>
                Calendar
              </a>
            </li>
            @auth
              <li class="nav-item">
                <a class="nav-link" href="{{route('user.myshows')}}">
                  <span data-feather="star"></span>
                  My Shows
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('user.shows.unwatched')}}">
                  <span data-feather="eye"></span>
                  Unwatched
                </a>
              </li>
            @endauth
            

            <li class="nav-item">
                    <a class="nav-link" href="#">
                      <span data-feather="eye"></span>
                      Browse
                    </a>
            </li>
            
          </ul>
  
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Social Links</span>
            
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="facebook"></span>
                Facebook
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="twitter"></span>
                Twitter
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="github"></span>
                GitHub
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="fab fa-discord"></i>
                Discord
              </a>
            </li>
          </ul>
        </div>
      </nav>