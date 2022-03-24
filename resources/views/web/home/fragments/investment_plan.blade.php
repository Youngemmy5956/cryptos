<div class="mt-5 mb-3">
    <h1 class="investment-header">investment plans
        <br><span class="line"></span>
    </h1>
</div>

<!-- this invest plan container contains investment cards  -->
@guest
    <div class="text-center mb-5 mt-5">
        <a href="{{route('login')}}" class="btn btn-primary"><b>Login to view investment plans</b></a>
    </div>
@else
<div class="row mx-auto mb-5 mt-5">
    @foreach($plans as $plan)
    <div class="col-sm-4">
        <div class="card">
            <div class="col-md-4 mx-auto mt-2">
                <img class="card-img avatar-lg" src="{{ $plan->logoUrl() }}" alt="Card image">
            </div>
            <!-- <div class="card-body">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">Some quick example text to build on the card title and make
                    up the bulk of the card's content.</p> -->
            <div class="text-center mt-3 mb-3">
                <a href="{{route('web.plans.show',[$plan->id])}}" class="btn btn-primary waves-effect waves-light">Investment Details</a>
            </div>
        </div>
    </div>
    @endforeach
    @endguest
</div>
