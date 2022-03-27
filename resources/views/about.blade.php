<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about</title>
    <link rel="stylesheet" href="{{asset('data/css/general.css')}}">
    <link rel="stylesheet" href="{{asset('data/css/about.css')}}">
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
                    <a href="" class="link">home</a>
                </li>
                <li class="tab">
                    <a href="" class="link">how it works</a>
                </li>
                <li class="tab">
                    <a href="" class="link">blog</a>
                </li>
                <li class="tab">
                    <a href="" class="link">about</a>
                </li>
                <li class="tab">
                    <a href="" class="link">contact</a>
                </li>
            </ul>
        </nav>

        <!-- this is the navigation sidebar for the mobile view -->

        <div class="menu-list" id="menu-items">
            <div class="menu-list-login">
                 <img src="{{asset('data/images/1193.png')}}" alt=""  id="close-sidebar" class="close-btn">
            </div>
         <ul class="list-items">
            <li><a href="">home <img src="{{asset('data/images/arrow-24-xxl.png')}}" alt="" class="arrow"> </a ></li>
             <li><a href="">contact  <img src="{{asset('data/images/arrow-24-xxl.png')}}" alt="" class="arrow"></a></li>
              <li><a href="">blog  <img src="{{asset('data/images/arrow-24-xxl.png')}}" alt="" class="arrow"></a></li>
             <li><a href="">about <img src="{{asset('data/images/arrow-24-xxl.png')}}" alt="" class="arrow"></a></li>
             <li><a href="">how it works  <img src="{{asset('data/images/arrow-24-xxl.png')}}" alt="" class="arrow"></a></li>
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
<section class="about-landpage">
    <img src="{{asset('data/images/4380.jpg')}}" alt="" class="about-landpage-img">
</section>
<section class="about-section">
    <h1>about <span class="green-text">coinvestcryptos</span></h1>
    <p> coininvestcryptos is an online crypto trading platform, with fully secured, fast, reliable
        and licenced trade record for past three decades. Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore,

    </p>
</section>
<section class="our-vision-section">
    <img src="{{asset('data/images/2164477.jpg')}}" alt="" class="vision-img">
    <div class="our-vision-text-container">
        <h1>our vision <br><span class="line"></span></h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Tenetur veniam ea nemo dolore. Error harum voluptates minima. Ad, natus ab.
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque dolorum
             nostrum architecto illum a earum?
        </p>
    </div>

</section>
<section class="our-team-section">
    <div class="our-team-text">
        <h1>meet our team <br><span class="line"></span> </h1>
        <p>meet the group of geniuses who has made, and kept this platform running smoothly.
            kudos! to them
        </p>
    </div>

    <div class="our-team-img">
        <img src="{{asset('data/images/4776016.jpg')}}" alt="" class="our-img">
    </div>
</section>
<div class="team-card-container">
    <div class="team-card">
        <img src="{{asset('data/images/1000_F_261258321_GP0Q6btipSzYzOQYQCvM8xzbU78jebdk.jpg')}}" alt="" class="profile-img">
        <div class="team-card-text">
            <h1>ceo</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, inventore
                laudantium molestias ut quis aspernatur? Id voluptatum repellendus fugiat culpa!
            </p>
        </div>
    </div>
    <div class="team-card">
        <img src="{{asset('data/images/1000_F_261258321_GP0Q6btipSzYzOQYQCvM8xzbU78jebdk.jpg')}}" alt="" class="profile-img">
        <div class="team-card-text">
            <h1>ceo</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, inventore
                laudantium molestias ut quis aspernatur? Id voluptatum repellendus fugiat culpa!
            </p>
        </div>
    </div>
</div>
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
