<div class="col-md-6">
        <div class="card overflow-hidden">
            <div class="bg-primary bg-soft">
                <div class="row">
                    <div class="col-7">
                        <div class="text-primary p-4">
                            <h5 class="text-primary">Free Register</h5>
                            <p>Get your free Skote account now.</p>
                        </div>
                    </div>
                    <div class="col-5 align-self-end">
                        <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div>
                    <a href="index.html">
                        <div class="avatar-md profile-user-wid mb-4">
                            <span class="avatar-title rounded-circle bg-light">
                                <img src="assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                            </span>
                        </div>
                    </a>
                </div>
                <div class="p-2">
                    <form class="needs-validation" novalidate action="https://themesbrand.com/skote/layouts/index.html">

                        <div class="mb-3">
                            <label for="useremail" class="form-label">Email</label>
                            <input type="email" value="{{auth()->user()->email}}" class="form-control" id="email" placeholder="Enter email" required>
                            <div class="invalid-feedback">
                                Please Enter Email
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">First Name</label>
                            <input type="text" value="{{auth()->user()->first_name}}" class="form-control" id="first_name" placeholder="" required>
                            <div class="invalid-feedback">
                                Please Enter first_name
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" value="{{auth()->user()->last_name}}" id="last_name" placeholder="" required>
                            <div class="invalid-feedback">
                                Please Enter Last name
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="last_name" class="form-label">Phone</label>
                            <input type="text" class="form-control" value="{{auth()->user()->phone}}" id="phone" placeholder="" required>
                            <div class="invalid-feedback">
                                Please Enter Last name
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="picture" class="form-label">Picture</label>
                            <input type="file" class="form-control" id="phone" placeholder="" required>
                            <!-- <div class="invalid-feedback">
                                Please Enter Last name
                            </div> -->
                        </div>

                        <!-- <div class="mb-3">
                            <label for="userpassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="userpassword" placeholder="Enter password" required>
                            <div class="invalid-feedback">
                                Please Enter Password
                            </div>
                        </div> -->

                        <div class="mt-4 d-grid">
                            <button class="btn btn-primary waves-effect waves-light" type="submit">Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
