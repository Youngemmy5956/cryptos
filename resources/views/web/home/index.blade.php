@extends('web.layout.app')
@section('content')
<body>
    <!-- this is the header section that contains the logo and the navigation bars   -->
    <!-- end of the header section -->

    <!-- this is the beginning of the landpage section ie first-site of the website  -->

    @include('web.home.fragments.banner')

    <!-- thi is the beginning of why choose coinvestcryptosection  -->
    @include('web.home.fragments.why_choose_us')

    <!-- end of why choos us section  -->

    <!-- this section expalins how coinvest crypto works  -->
    @include('web.home.fragments.how_it_works')

    <!-- this is the end of how it works section  -->


    <!-- this is the beginning of service section  -->
    @include('web.home.fragments.service_section')
    <!-- end of srevice section  -->

    <!-- liveprice table section contains the updated dips and tracks crypto prizes in real time  -->
    @include('web.home.fragments.live_price')

    <!-- about section contains informations about the platform, and processes to get started  -->
    @include('web.home.fragments.about_section')
    <!-- end  -->

    <!-- this is the investment section -->
    @include('web.home.fragments.investment_plan')
    <!-- end of section  -->

    <!-- this is the blog part of the homepage  -->
    <h1 class="blog-header">latest from blog <br><span class="line"></span></h1>

    <!-- end of blog section  -->
    <!-- this is the register section  -->
    <section class="register-section">
        <img src="{{asset('data/images/20945517.jpg"')}}" alt="" class="svg-img">
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
    @include('web.layout.includes.scripts')
</body>
@endsection
