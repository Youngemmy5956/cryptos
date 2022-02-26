<section class="landpage">
    <!-- the main contains the landpage welcome text and image  -->
    <div class="main">
        <!-- this is the welcome text area -->
        <div class="welcome-text">
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
                    <input type="email" name="email-input" class="login-input" id="email">
                    <label for="password" class="login-label">enter your password</label>
                    <input type="password" name="password-input" class="login-input" id="password">
                    <label for="password" class="login-label">confirm your password</label>
                    <input type="password" name="password-input" class="login-input" id="password">
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
                    <input type="email" name="email-input" class="login-input" id="email">
                    <label for="password" class="login-label">enter your password</label>
                    <input type="password" name="password-input" class="login-input" id="password">
                    <label for="password" class="login-label">confirm your password</label>
                    <input type="password" name="password-input" class="login-input" id="password">
                    <div class="button-container">
                        <button type="submit" class="login-button">register</button>
                    </div>
                </form>
                <!-- end of register form  -->
            </div>
        </div>
    </div>
</section>
