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
        <p> <b>coininvestcryptos is an online crypto and forex trading platform, with fully secured, fast, reliable
            and licenced trade record for past three decades. <br> We initiated the crypto currency assets because of the skyrocketing rise in the cryptocurrency value and its effect in the financial market. Cryptocurrency market was valued at $500 billion USD at the end of 2017. It's value rose over 360% from the beginning of 2017. Crypto currencies are known for their rapid price movements, providing potentially high returns on investment.</b>

        </p>
    </section>
    <section class="our-vision-section">
        <img src="{{asset('data/images/emmy.jpg')}}" alt="" class="vision-img">

        <div class="our-vision-text-container">
            <div class="">
                <h1>our vision <br><span class="line"></span></h1>
                <p><b>We believe that disruptive innovation deserves unbiased education and user-friendly investment products.  In collaboration with our investment manager partners, we work to bring Wall Street standards for research, risk management and transparency to digital asset investing.</b>
                </p>
            </div>
        </div>

    </section>
    <section class="our-team-section">
        <div class="our-team-text">
            <h1>meet our team <br><span class="line"></span> </h1>
            <p><b>Our Expert Team
                Meet Our Professional Team, that has kept this platform running smoothly.
                kudos! to them
            </p></b>
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
