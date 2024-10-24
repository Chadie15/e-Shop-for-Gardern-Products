    <!-- header section strats -->
    <header class="header_section">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <span>
              Entebbe Gardens
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>
          </button>
  
          <div class="collapse navbar-collapse" id="navbarSupportedContent" style="background-color: rgb(100, 151, 100);">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="{{url('/')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('shop')}}">
                  Shop
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('why')}}">
                  Why Us
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('testimonial')}}">
                  Testimonial
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('contact')}}">Contact Us</a>
              </li>
            </ul>
            <div class="user_option">

            @if (Route::has('login'))
               @auth
                 
               <a href="{{url('my_orders')}}">
                My Orders
              </a>

              <a href="{{url('my_cart')}}">
                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                [{{$count}}]
              </a>
              
               <form method="POST" action="{{ route('logout') }}">
                @csrf
                <div> 
                  <input type="submit" class="btn btn-info" value="Logout">
                </div>
               </form>
           @else

                          
                 <a href="{{url('/login')}}">
                       <i class="fa fa-user" aria-hidden="true"></i>
                   <span>
                        Login
                   </span>
                </a>

              <a href="{{url('/register')}}">
                 <i class="fa fa-vcard" aria-hidden="true"></i>
                   <span>
                       Register
                    </span>
              </a>
            
            @endif
           @endauth
           
            </div>
          </div>
        </nav>
      </header>
      <!-- end header section -->