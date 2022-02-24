<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>how it works</title>
    <link rel="stylesheet" href="../css files/general.css">
    <link rel="stylesheet" href="../css files/how.css">
    <link rel="icon" href="../images/coininvest.png">
</head>
<body>
    <!-- this is the header section that contains the logo and the navigation bars   -->
    <header id="head"> 
        <!-- this is the logo container -->
        <div class="logo-container">
            <img src="../images/coininvest22.png" alt="" class="logo">
        </div>

        <!-- this is the navigation bar  for the destop view -->
        <nav class="navbar">

            <ul class="navlist">
                <li class="tab">
                    <!-- these are the navbar links to different pages -->
                    <a href="../index.html" class="link">home</a>
                </li>
                <li class="tab">
                    <a href="../html files/how-it-works.html" class="link">how it works</a>
                </li>
                <li class="tab">
                    <a href="../html files/blog.html" class="link">blog</a>
                </li>
                <li class="tab">
                    <a href="../html files/about.html" class="link">about</a>
                </li>
                <li class="tab">
                    <a href="../html files/contact.html" class="link">contact</a>
                </li>
            </ul>
        </nav>

        <!-- this is the navigation sidebar for the mobile view -->

        <div class="menu-list" id="menu-items">
            <div class="menu-list-login">
                 <img src="../images/1193.png" alt=""  id="close-sidebar" class="close-btn">
            </div>
         <ul class="list-items">
            <li><a href="../index.html">home <img src="../images/arrow-24-xxl.png" alt="" class="arrow"> </a ></li>
             <li><a href="./contact.html">contact  <img src="../images/arrow-24-xxl.png" alt="" class="arrow"></a></li>            
              <li><a href="./blog.html">blog  <img src="../images/arrow-24-xxl.png" alt="" class="arrow"></a></li>
             <li><a href="./about.html">about <img src="../images/arrow-24-xxl.png" alt="" class="arrow"></a></li>
             <li><a href="./how-it-works.html">how it works  <img src="../images/arrow-24-xxl.png" alt="" class="arrow"></a></li>
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
<!-- this is the how it works land page  -->
    <section class="how-landpage">
        <div class="landpage-img">
            <img src="../images/business-people-with-balance-scales-bitcoin-vs-dollar-person-trading-buying-crypto-currency-flat-vector-illustration-stock-crypto-market-concept-banner-website-design-landing-web-page_179970-6615.webp" alt="">
        </div>
        <!-- this is the welcome text  -->
        <div class="welcome-text">
            <h1>how does it  <span class="green-text">work?</span> </h1>
        </div>  
    </section>

    <!-- this is the guide section contains the guide card  -->
    <section class="guide-section">
        <!-- guide card 1  -->
        <div class="guide-card">
            <div class="guide-text">
                <h1>create a wallet <br><span class="line"></span></h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium eum molestiae,
                     totam odit voluptates laboriosam.
                    
                </p>
            </div>
            <img src="../images/wallet.png" alt="" class="guide-img">
        </div>
        <!-- card 2  -->
        <div class="guide-card ">
            <div class="guide-text">
                <h1>make payment <br><span class="line"></span></h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium eum molestiae,
                    totam odit voluptates laboriosam.
                   
               </p>
            </div>
            <img src="../images/debit-card.png" alt="" class="guide-img">
        </div>
        <!-- card 3 -->
        <div class="guide-card">
            <div class="guide-text">
                <h1>buy and sell <br><span class="line"></span></h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium eum molestiae,
                    totam odit voluptates laboriosam.
                   
               </p>
            </div>
            <img src="../images/exchange.png" alt="" class="guide-img">
        </div>
        <!-- .start now btn'this should lead to a create wallet page' -->
        <div class="start-now-btn">
         <button class="cta">
            <span class="hover-underline-animation"> start now </span>
            <svg id="arrow-horizontal" xmlns="http://www.w3.org/2000/svg" width="30" height="10" viewBox="0 0 46 16">
              <path id="Path_10" data-name="Path 10" d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" transform="translate(30)"></path>
            </svg>
          </button>
        </div>
    </section>
    <!-- this is the good to go image  -->
    <div class="img-cont">
        <img src="../images/origami-abstract-concept-vector-illustration-art-paper-folding-mental-practice-fine-motor-skills-development-useful-pastime-social-isolation-how-video-tutorial-abstract-metaphor_335657-4128.jpg" alt="" class="good-to-go-img">
        <h1>you are good to <span class="green-text">go!</span> </h1>
    </div>
    <script src="../js files/main.js"></script>
</body>
</html>