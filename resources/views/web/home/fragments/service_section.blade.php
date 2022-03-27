<section class="service-section" id="service">
    <!-- the video presentation contains a youtube video that further explains the functionality of the platform  -->
    <div class="video-presentation mb-3">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/juZlrecsIts" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>>
    </div>
    <!-- this service card container contains various servics cards  -->
    <div class="text-center">
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
    </div>
</section>