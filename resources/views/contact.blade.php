<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>
    <link rel="stylesheet" href="{{asset('data/css/general.css')}}">
    <link rel="icon" href="{{asset('data/images/coininvest.png')}}">
</head>
<body>
    <!-- this is the header section that contains the logo and the navigation bars   -->
    <header id="head">
        <!-- this is the logo container -->
        <div class="logo-container">
            <img src="{{asset('data/images/coininvest22.png')}}" alt="" class="logo">
        </div>

        <!-- this is the navigation bar  for the destop view -->
        <nav class="navbar">

            <ul class="navlist">
                <li class="tab">
                    <!-- these are the navbar links to different pages -->
                    <a href="{{route("home")}}" class="link">home</a>
                </li>
                <li class="tab">
                    <a href="{{route("how_it_works")}}" class="link">how it works</a>
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

        <!-- this is the navigation sidebar for the mobile view -->

        <div class="menu-list" id="menu-items">
            <div class="menu-list-login">
                 <img src="{{asset('data/images/1193.png')}}" alt=""  id="close-sidebar" class="close-btn">
            </div>
         <ul class="list-items">
            <li><a href="{{route("home")}}">home <img src="{{asset('data/images/arrow-24-xxl.png')}}" alt="" class="arrow"> </a ></li>
             <li><a href="{{route("contact")}}">contact  <img src="{{asset('data/images/arrow-24-xxl.png')}}" alt="" class="arrow"></a></li>
             <li><a href="{{route("blog")}}">blog  <img src="{{asset('data/images/arrow-24-xxl.png')}}" alt="" class="arrow"></a></li>
             <li><a href="{{route("about")}}">about <img src="{{asset('data/images/arrow-24-xxl.png')}}" alt="" class="arrow"></a></li>
             <li><a href="{{route("how_it_works")}}">how it works  <img src="{{asset('data/images/arrow-24-xxl.png')}}" alt="" class="arrow"></a></li>
         </ul>
        </div>
        <!-- this is the code for the hamburger menu in the mobile view -->

        <div class="menu-container" id="menubar">
            <div class="menu-line"></div>
            <div class="menu-line"></div>
            <div class="menu-line"></div>
        </div>
    </header>
<!-- end of the header section -->
    <section class="contact-landpage">
        <div class="landpage-img">
            <img src="{{asset('data/images/195-removebg-preview.png')}}" alt="">
        </div>
        <div class="welcome-text">
            <h1>thanks for contacting your most reliable crypto exchange site</h1>
            <span class="green-text">coinvestcryptos</span>
        </div>

    </section>
    <section class="get-in-touch-section">
        <div class="get-in-touch-text-container">
            <h1>get in touch</h1>
            <!-- this is the contact form  -->
            <form action="" class="comment-form">
                <input type="email" name="" id="" placeholder="enter your email">
                <textarea name="" id="" cols="30" rows="10" placeholder="your text goes here">

                </textarea>
                <button class="send-btn">
                    <div class="svg-wrapper-1">
                      <div class="svg-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                          <path fill="none" d="M0 0h24v24H0z"></path>
                          <path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"></path>
                        </svg>
                      </div>
                    </div>
                    <span>Send</span>
                  </button>
            </form>
            <!-- end of form  -->
        </div>

        <div class="get-in-touch-img-container">
            <img src="{{asset('data/images/live-chat-with-customer-service-vector-illustration_7087-1844.jpg')}}" alt="" class="get-in-touch-img">
        </div>

    </section>
    <!-- this is the social media tab  -->
    {{-- <div class="social-handle">
        <img src="{{asset('data/images/facebook.png')}}" alt="" class="social-icon">
        <img src="{{asset('data/images/insta.png')}}" alt="" class="social-icon">
        <img src="{{asset('data/images/whatsapp.png')}}" alt="" class="social-icon">
        <img src="{{asset('data/images/mail.png')}}" alt="" class="social-icon">
        <img src="{{asset('data/images/paper-plane.png')}}" alt="" class="social-icon">
    </div> --}}
    <!-- footer section -->
    {{-- <footer>
        <!-- first division -->
        <div class="foot1">
            <h2>useful links</h2>
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Consequuntur neque excepturi debitis hic quasi labore amet
            </p>
            <div class="social-media-handle-for-blog-footer">
                <img src="{{asset('data/images/facebook.png')}}" alt="" class="social-icon">
                <img src="{{asset('data/images/insta.png')}}" alt="" class="social-icon">
                <img src="{{asset('data/images/whatsapp.png')}}" alt="" class="social-icon">
                <img src="{{asset('data/images/git.png')}}" alt="" class="social-icon">
                <img src="{{asset('data/images/mail.png')}}" alt="" class="social-icon">
            </div>
        </div>
        <!-- second division  -->
        <div class="foot1">
            <h2>contact me</h2>
            <li ><img src="{{asset('data/images/paper-plane.png')}}" alt=""class="my-img"> <a href="#">@emmanula/twitter.com</a></li>
            <li ><img src="{{asset('data/images/paper-plane.png')}}" alt=""class="my-img"> <a href="#">www.google.com</a></li>
            <li ><img src="{{asset('data/images/paper-plane.png')}}" alt=""class="my-img"> <a href="#">+234 7042244539</a></li>
        </div>
        <!-- 3rd division  -->

        <div class="foot1">
            <p>
            <h2>newsletter</h2>
               <p> Consequuntur neque excepturi debitis hic quasi labore amet
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, deserunt.
            </p>
            <input type="email" name="" id="" placeholder="enter your email" class="input">
        </div>
    </footer> --}}
    <script src="{{asset('data/js/main.js')}}"></script>
</body>
</html>
