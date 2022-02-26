<header class="">
    <!-- this is the logo container -->
    <div class="logo-container">
        <img src="{{asset('data/images/coininvest22.png')}}" alt="" class="logo">
    </div>

    <!-- this is the navigation bar  for the destop view -->
    <nav class="navbar">
        <ul class="navlist">
            <li class="tab">
                <!-- these are the navbar links to different pages -->
                <a href="{{route("index")}}" class="link">home</a>
            </li>
            <li class="tab">
                <a href="#service" class="link">services</a>
            </li>
            <li class="tab">
                <a href="{{route("blog")}}" class="link">blog</a>
            </li>
            <li class="tab">
                <a href="{{route("about")}}" class="link">about</a>
            </li>
            <li class="tab">
                <a href="{{route("contact")}}" class="link">contact</a>
            </li>
        </ul>
    </nav>
    <div class="menu-container" id="menubar">
        <div class="menu-line"></div>
        <div class="menu-line"></div>
        <div class="menu-line"></div>
    </div>
    <!-- this is the navigation sidebar for the mobile view -->

    <div class="menu-list" id="menu-items">
        <div class="menu-list-login">
            <img src="{{asset('data/images/1193.png')}}" alt="" id="close-sidebar" class="close-btn">
        </div>
        <ul class="list-items">
            <li><a href="{{route("index")}}">home <img src="{{asset('data/images/arrow-24-xxl.png')}}" alt="" class="arrow"> </a></li>
            <li><a href="{{route("contact")}}">contact <img src="{{asset('data/images/arrow-24-xxl.png')}}" alt="" class="arrow"></a></li>
            <li><a href="{{route("blog")}}">blog <img src="{{asset('data/images/arrow-24-xxl.png')}}" alt="" class="arrow"></a></li>
            <li><a href="{{route("about")}}">about <img src="{{asset('data/images/arrow-24-xxl.png')}}" alt="" class="arrow"></a></li>
            <li><a href="{{route("how_it_works")}}">how it works <img src="{{asset('data/images/arrow-24-xxl.png')}}" alt="" class="arrow"></a></li>
        </ul>
    </div>
    <!-- this is the code for the hamburger menu in the mobile view -->


    <div class="login-container">
        @if (Auth::guest())
        <a style="text-decoration:none" href="{{route('login')}}" class="login-button">login</a>
        <a style="text-decoration:none" href="{{route('register')}}" class="login-button">Register</a>
        @else
        <a style="text-decoration:none" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="login-button">logout</a>

        @endif
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

</header>
