<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://checkout.flutterwave.com/v3.js"></script>
<script src="{{asset('data/js/main.js')}}"></script>
<script src="{{ asset('js/app.js') }}"></script>

<script>
    $(function() {
        $("#makePaymentForm").submit(function(e) {
            e.preventDefault();
            var name = $("#name").val();
            var email = $("#email_address").val();
            var phone = $("#number").val();
            var amount = $("#amount").val();
            var plan = $("#plan_id").val();

            makePayment(name, email, amount, phone, plan);
        });
    });

    function makePayment(name, email, amount, phone, plan) {
        FlutterwaveCheckout({
            public_key: "FLWPUBK_TEST-60f54435ce4c81317c05c993ffa67992-X",
            tx_ref: "RX1_{{substr(rand(0,time()),0,7)}}",
            amount,
            currency: "NGN",
            payment_options: "",
            redirect_url: "{{ URL::to('/plans') }}" + "/" + plan,
            customer: {
                email,
                name,
                phone,
            },
            callback: function(data) {
                var transaction_id = data.transaction_id;
                var _token = $("input[name='_token']").val();
                $.ajax({
                    type: "POST",
                    url: "{{URL::to('payment/verify')}}",
                    data: {
                        transaction_id,
                        _token
                    },
                    success: function(response) {
                        console.log(response);
                    }
                });
            },
            onclose: function() {

            },
            customizations: {
                title: "The Titanic Store",
                description: "Payment for an awesome cruise",
                logo: "https://disruptingafrica.com/images/9/9e/Flutterwave_Logo.png",
            },

        });
    }
</script>
