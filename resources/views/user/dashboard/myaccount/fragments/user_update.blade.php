<div class="col-md-6">
    <div class="card overflow-hidden">
        <div class="bg-primary bg-soft">

        </div>
        <div class="card-body pt-0">
            <div>
                <!-- <a href="index.html">
                    <div class="avatar-md profile-user-wid mb-4">
                        <span class="avatar-title rounded-circle bg-light">
                            <img src="assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                        </span>
                    </div>
                </a> -->
            </div>
            <div class="p-2">
                <form class="" action="{{route('user.myaccount.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PATCH')
                    <div class="mb-3">
                        <label for="useremail" class="form-label">Email</label>
                        <input type="email" value="{{auth()->user()->email}}" class="form-control" name="email" placeholder="Enter email" required>
                        <div class="invalid-feedback">
                            Please Enter Email
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" value="{{auth()->user()->first_name}}" class="form-control" name="first_name" placeholder="" required>
                        <div class="invalid-feedback">
                            Please Enter first_name
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" value="{{$user->last_name}}" name="last_name" placeholder="" required>
                        <div class="invalid-feedback">
                            Please Enter Last name
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="last_name" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{$user->phone}}" id="phone" placeholder="" required>
                        <div class="invalid-feedback">
                            Please Enter Last name
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="picture" class="form-label">Picture</label>
                        <input type="file" class="form-control" name="picture">
                    </div>
                    <div class="mt-4 text-center">
                        <button class="btn btn-primary waves-effect waves-light" type="submit">Update</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
