@extends("web.layout.app")
@section("content")

<section class="contact-landpage">
    <div class="landpage-img">
        <img src="{{asset('data/images/195-removebg-preview.png')}}" alt="">
    </div>
    <div class="welcome-text">
        <h1>thanks for contacting your most reliable crypto exchange site</h1>
        <span class="green-text">coinvestcryptos</span>
    </div>
</section>
@include('notification.flash')
<section class="get-in-touch-section">
    <div class="get-in-touch-text-container">
        <h1>get in touch</h1>
        <!-- this is the contact form  -->
        <form action="{{route('web.contact')}}" class="comment-form" method="POST">
            @csrf 
            <input type="text" class="mb-3" name="subject" id="" placeholder="Enter a Subject">
            <input type="email" name="email" id="" placeholder="enter your email">
            <textarea name="message" id="" cols="30" rows="10" placeholder="your text goes here">
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
@endsection