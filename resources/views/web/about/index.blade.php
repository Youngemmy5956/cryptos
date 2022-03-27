@extends("web.layout.app")
@section("content")

<body>
    <!-- this is the header section that contains the logo and the navigation bars   -->
    <!--  -->
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
            <div class="">
                <h1>our vision <br><span class="line"></span></h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Tenetur veniam ea nemo dolore. Error harum voluptates minima. Ad, natus ab.
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque dolorum
                    nostrum architecto illum a earum?
                </p>
            </div>  
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
    </div>
    <!-- footer section -->
</body>
@endsection