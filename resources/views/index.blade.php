<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('data/css/style.css')}}">
    <link rel="icon" href="{{asset('data/images/coininvest.png')}}">
    <title>coinvestcryptos.com</title>
</head>
<body>
       <!-- this is the header section that contains the logo and the navigation bars   -->
       <header >
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
                 <img src="{{assset(data/images/1193.png)}}" alt=""  id="close-sidebar" class="close-btn">
            </div>
         <ul class="list-items">
            <li><a href="{{route("index")}}">home <img src="{{asset('data/images/arrow-24-xxl.png')}}" alt="" class="arrow"> </a ></li>
             <li><a href="{{route("contact")}}">contact  <img src="{{asset('data/images/arrow-24-xxl.png')}}" alt="" class="arrow"></a></li>
              <li><a href="{{route("blog")}}">blog  <img src="{{asset('data/images/arrow-24-xxl.png')}}" alt="" class="arrow"></a></li>
             <li><a href="{{route("about")}}">about <img src="{{asset('data/images/arrow-24-xxl.png')}}" alt="" class="arrow"></a></li>
             <li><a href="{{route("how_it_works")}}">how it works  <img src="{{asset('data/images/arrow-24-xxl.png')}}" alt="" class="arrow"></a></li>
         </ul>
        </div>
        <!-- this is the code for the hamburger menu in the mobile view -->


        <div class="login-container">
            <button class="login-button" id="loginBtn">
                <span></span>
                <span></span>
                <span></span>
                <span></span> login
              </button>
              <button class="login-button" id="registerBtn">
                <span></span>
                <span></span>
                <span></span>
                <span></span> register
              </button>
        </div>
    </header>
<!-- end of the header section -->

<!-- this is the beginning of the landpage section ie first-site of the website  -->
    <section class="landpage">
        <!-- the main contains the landpage welcome text and image  -->
        <div class="main">
            <!-- this is the welcome text area -->
            <div class="welcome-text" >
                <h1>experience smart and reliable crypto trading with <br><span class="green-text">coinvestcryptos</span> </h1>
                <p>
                    the home of produtive investments.we offer fast,reliable and secure
                    transaction of all kinds of cryptocurrencies
                </p>
                <!-- these are the view more and get started buttons  -->
                <div class="btn-container">
                    <a href="#service" class="landpage-links">view more </a>
                    <a href="#process" class="landpage-links">get started</a>
                </div>
            </div>
            <div class="landpage-img-container">
                <img src="{{asset('data/images/coininvest.png')}}" alt="" class="landpage-img">
            </div>
        </div>
        <!-- this the the login form 'its a modal' -->
        <div class="login-modal" id="modal-pop-up">
            <!-- the form wrapper wraps the image and the form  -->
            <div class="form-wrapper">
                <img src="{{asset('data/images/login-img.jpg')}}" alt="" class="login-img">
                <div class="form-container">
                        <div class="modal-closebtn-container">
                            <img src="{{asset('data/images/1193.png')}}" alt="" class="modal-close-btn" id="close-modal">
                        </div>
                        <!-- this is where the form starts  -->
                        <form action="#" class="login-form">
                        <label for="email" class="login-label">enter you email address</label>
                        <input type="email" name="email-input" class="login-input" id="email" >
                        <label for="password" class="login-label">enter your password</label>
                        <input type="password" name="password-input" class="login-input" id="password" >
                        <label for="password" class="login-label">confirm your password</label>
                        <input type="password" name="password-input" class="login-input" id="password" >
                        <div class="button-container">
                            <button type="submit" class="login-button">login</button>
                        </div>
                        </form>
                        <!-- form ends  -->
                </div>
                <!-- form containerends here  -->
            </div>
            <!-- form wrapper ends here  -->
        </div>
        <!-- login modal ends here  -->

        <!-- the is the register form modal  -->
        <div class="login-modal" id="register-pop-up">
            <div class="form-wrapper">
                <img src="{{asset('data/images/20945517.jpg')}}" alt="" class="login-img">
                <div class="form-container">
                <div class="modal-closebtn-container">
                    <img src="{{asset('data/images/1193.png')}}" alt="" class="modal-close-btn" id="close-register-modal">
                </div>
                    <!-- this is the register form 'it has the same class bcos i style it with the login' -->
                    <form action="#" class="login-form">
                    <label for="email" class="login-label">enter you email address</label>
                    <input type="email" name="email-input" class="login-input" id="email" >
                    <label for="password" class="login-label">enter your password</label>
                    <input type="password" name="password-input" class="login-input" id="password" >
                    <label for="password" class="login-label">confirm your password</label>
                    <input type="password" name="password-input" class="login-input" id="password" >
                    <div class="button-container">
                        <button type="submit" class="login-button">register</button>
                    </div>
                    </form>
                    <!-- end of register form  -->
                </div>
            </div>
        </div>
    </section>

    <!-- thi is the beginning of why choose coinvestcryptosection  -->
    <section class="why-choose-us">
        <!-- this is the why choose us text  -->
        <div class="why-text-container">
            <h1 >why choose <span class="green-text">coinvestcrypto</span> ?</h1>
            <img src="{{asset('data/images/5031659.jpg')}}" alt="">
        </div>
        <!-- the reason card contains the cards that tell what coinvest offers  -->
        <div class="reason-card-container">
            <!-- this is the first card  -->
            <div class="reason-card">
                <img src="{{asset('data/images/shield.gif')}}" alt="" class="icon">
                <h1>protection and security</h1>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Facilis non minus repudiandae exercitationem fugit,
                </p>
            </div>
            <!-- 2nd card  -->
            <div class="reason-card">
                <img src="{{asset('data/images/social-media.gif')}}" alt="" class="icon">
                <h1>licensed exchange</h1>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Facilis non minus repudiandae exercitationem fugit,

                </p>
            </div>
            <!-- 3rd card  -->
            <div class="reason-card">
                <img src="{{asset('data/images/laptop.gif')}}" alt="" class="icon">
                <h1>unlimited transactions</h1>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Facilis non minus repudiandae exercitationem fugit,
                </p>
            </div>
        </div>
    </section>
    <!-- end of why choos us section  -->

    <!-- this section expalins how coinvest crypto works  -->
    <section class="how-does-it-work-section" id="text">
        <!-- how it works image  -->
        <div class="how-it-works-img-container">
            <img src="{{asset('data/images/IMG-20220214-WA0058.jpg')}}" alt="">
        </div>
        <!-- this holds the text that explains how the platform works   -->
        <div class="how-it-works-text-container">
            <h1>how does it <span class="green-text">work</span> ?</h1>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Reprehenderit consectetur, quos fugiat vero nobis officia.
                Quam, culpa quasi repudiandae est neque facilis porro modi laboriosam
                , excepturi animi id vel mollitia.</p>

                <!-- this div contains the learn more btn  -->
                <div class="learn-more-btn-container">
                    <button class="learn-more">
                        <span class="circle" aria-hidden="true">
                        <span class="icon arrow"></span>
                        </span>
                        <a href=""{{route("how_it_works")}} class="button-text">Learn More</a>
                    </button>
                </div>
        </div>
    </section>
<!-- this is the end of how it works section  -->


<!-- this is the beginning of service section  -->
    <section class="service-section" id="service">
        <!-- the video presentation contains a youtube video that further explains the functionality of the platform  -->
        <div class="video-presentation">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/juZlrecsIts" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>>
        </div>
        <!-- this service card container contains various servics cards  -->
        <div class="service-card-container">
            <h1 class="service-header">
                our services
            </h1>
            <!-- the sevice card div just helps for proper positioning of the cards  -->
            <div class="service-card-div">
                <!-- this is the first service card  -->
                <div class="service-card">
                    <div class="overlay">
                    <img src="{{asset('data/images/digital-key.png')}}" alt="" class="icon">
                    <h2>advice and guides</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque explicabo sint veniam?</p>
                    </div>
                </div>
                <!-- 2nd card  -->
                <div class="service-card">
                    <div class="overlay green">
                        <img src="{{asset('data/images/finance.png')}}" alt="" class="icon">
                        <h2>support in person</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque explicabo sint veniam?</p>
                    </div>
                </div>
                <!-- 3rd  -->
                <div class="service-card">
                    <div class="overlay sky-blue">
                        <img src="{{asset('data/images/exchange.png')}}" alt="" class="icon">
                        <h2>recurring buys</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque explicabo sint veniam?</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of srevice section  -->

    <!-- liveprice table section contains the updated dips and tracks crypto prizes in real time  -->
    <section class="liveprice-table">
        <h1 class="liveprice-header"> cryptocurrently live price table
            <br><span class="line"></span>
        </h1>
        {{-- <img src="./images/forex-trading-background_52683-41604.webp" alt=""> --}}

        <body>
            <div style="height:560px; background-color: #ffecec; overflow:hidden; box-sizing: border-box; border-radius: 4px;
            border: 5px rgb(0, 0,0, 0.4) solid; text-align: right; line-height:14px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; padding:1px;padding: 0px; margin: 0px; width: 100%;"><div style="height:540px; padding:0px; margin:0px; width: 100%;"><iframe src="https://widget.coinlib.io/widget?type=chart&theme=light&coin_id=859&pref_coin_id=1505" width="100%" height="536px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;line-height:14px;"></iframe></div></div>
          </body>
        <!-- this content is just a demo  -->
    </section>

    <!-- about section contains informations about the platform, and processes to get started  -->
    <section class="about-section" id="process">
        <h1>about coinvestcrypto
            <br><span class="line"></span>
        </h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis
            dolorum laboriosam voluptates voluptate fugit maxime eum ex veniam
            sint dolores quos illo aliquam, animi nulla iste placeat hic officiis tempore sapiente?
            Totam consectetur at delectus explicabo aliquam incidunt, et ad!
        </p>
        <!-- this is the start now button  -->
        <a href="" class="start-btn">start now</a>

        <!-- this contains a text and pictorial guide on how to get started  -->
        <div class="process-icon-container">
            <!-- this is the process card 1  -->
            <div class="icon-container">
                <div class="counter-container">
                    <img src="{{asset('data/images/dark_line_short.png')}}" alt="" class="darkline">
                    <div class="counter">
                        1
                    </div>
                    <img src="{{asset('data/images/dark_line_short.png')}}" alt="" class="darkline">
                </div>

                <div class="process-card">
                    <img src="{{asset('data/images/wallet.png')}}" alt="" class="icon">
                    <h1>create a wallet</h1>
                </div>
            </div>
            <!-- card 2 -->
            <div class="icon-container">
                <div class="counter-container">
                    <img src="{{asset('data/images/dark_line_short.png')}}" alt="" class="darkline">
                    <div class="counter">
                        2
                    </div>
                    <img src="{{asset('data/images/dark_line_short.png')}}" alt="" class="darkline">
                </div>

                <div class="process-card">
                    <img src="{{asset('data/images/salary.png')}}" alt="" class="icon">
                    <h1>make payment</h1>
                </div>
            </div>
            <!-- card 3 -->
            <div class="icon-container">
                <div class="counter-container">
                    <img src="{{asset('data/images/dark_line_short.png')}}" alt="" class="darkline">
                    <div class="counter">
                        3
                    </div>
                    <img src="{{asset('data/images/dark_line_short.png')}}" alt="" class="darkline">
                </div>

                <div class="process-card">
                    <img src="{{asset('data/images/exchange.png')}}" alt="" class="icon">
                    <h1>buy and sell</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- end  -->

    <!-- this is the investment section -->
    <section class="investment-plan-section">
        <h1 class="investment-header">investment plans
            <br><span class="line"></span>
        </h1>

        <!-- this invest plan container contains investment cards  -->
        <div class="investment-plan-container">
            <!-- invest card 1 -->
            <div class="invest-card">
                <h1>cadet</h1>
                <h2 class="amount">$100</h2>
                <h3>minimum</h3>
                <p>5% in 7days</p>
                <h2 class="amount">$5,000</h2>
                <a href="">deposit now</a>
            </div>
            <!-- invest card 2  -->
            <div class="invest-card">
                <h1>elite</h1>
                <h2 class="amount">$5,100</h2>
                <h3>minimum</h3>
                <p>10% in 7days</p>
                <h2 class="amount">$50,000</h2>
                <a href="">deposit now</a>
            </div>
            <!-- invest card 3 -->
            <div class="invest-card">
                <h1>elite pro</h1>
                <h2 class="amount">$50,100</h2>
                <h3>minimum</h3>
                <p>15% in 7days</p>
                <h2 class="amount">$1,000,000</h2>
                <a href="">deposit now</a>
            </div>
        </div>
    </section>
    <!-- end of section  -->

    <!-- this is the blog part of the homepage  -->
    <h1 class="blog-header">latest from blog <br><span class="line"></span></h1>
    <section class="blog-section">
        <!-- this is the first blog card  -->
        <div class="blog-card">
            <img src="{{asset('data/images/2444379.jpg')}}" alt="" class="blog-img">
            <div class="blog-info">
                <!-- the blog post date goes here  -->
                <div class="blog-date">
                    <h1>posted on 17th november 2022</h1>
                    <img src="{{asset('data/images/comment.png')}}" alt="" class="message-icon">
                </div>
                <!-- the name of the poster goes here  -->
                <div class="posted-by">
                    <p>by venala: cryptocurrency</p>
                </div>
            </div>
            <!-- this is the blog body  -->
            <div class="blog-body">
                <h3>spike in the participants buying bitcoin is 'obviously bullish'-analyst</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo cum quis, aut expedita omnis odio sed recusandae libero repudiandae nesciunt pariatur, assumenda ex.
                </p>
            </div>
        </div>
        <!-- 2nd blog card  -->
        <!-- same thing applies  -->
        <div class="blog-card">
            <img src="{{asset('data/images/761.jpg')}}" alt="" class="blog-img">
            <div class="blog-info">
                <div class="blog-date">
                    <h1>posted on 17th november 2022</h1>
                    <img src="{{asset('data/images/comment.png')}}" alt="" class="message-icon">
                </div>
                <div class="posted-by">
                    <p>by venala: cryptocurrency</p>
                </div>
            </div>
            <div class="blog-body">
                <h3>spike in the participants buying bitcoin is 'obviously bullish'-analyst</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo cum quis, aut expedita omnis odio sed recusandae libero repudiandae nesciunt pariatur, assumenda ex.
                </p>
            </div>
        </div>
    </section>
    <!-- end of blog section  -->
    <!-- this is the register section  -->
    <section class="register-section">
        <img  src="{{asset('data/images/20945517.jpg"')}} alt="" class="svg-img">
        <div class="register-text">
            <p>register today to receive updates and be part of us</p>
        </div>
        <!-- this is the start now button  -->
        <div class="start-now-btn">
            <button class="cta">
               <span class="hover-underline-animation"> start now </span>
               <svg id="arrow-horizontal" xmlns="http://www.w3.org/2000/svg" width="30" height="10" viewBox="0 0 46 16">
                 <path id="Path_10" data-name="Path 10" d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" transform="translate(30)"></path>
               </svg>
             </button>
           </div>

        <div class="coin-container"></div>
    </section>
    <!-- footer section -->
    <footer>
        <!-- first division -->
        <div class="foot1">
            <h2>useful links</h2>
            <ul class="foot-list">
                <li>
                    <a href="#">home</a>
                </li>
                <li>
                    <a href="#">about</a>
                </li>
                <li>
                    <a href="#">blog</a>
                </li>
                <li>
                    <a href="#">contact</a>
                </li>
            </ul>
            <div class="social-media-handle">
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
    </footer>
    <script src="{{asset('data/js/main.js')}}"></script>
</body>
</html>
