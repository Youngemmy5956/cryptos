@extends('admin.layout.app')
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-4">Edit User's Info</h4>

        <form>
        <div class="row">
            <div class="mb-3 col-sm-6">
                <label for="formrow-firstname-input" class="form-label">First Name</label>
                <input type="text" name="first_name" class="form-control" id="formrow-firstname-input" >
            </div>
            <div class="mb-3 col-sm-6">
                <label for="formrow-firstname-input" class="form-label">Last Name</label>
                <input type="text" name="last_name" class="form-control" id="formrow-firstname-input" placeholder="">
            </div>
            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="formrow-email-input" class="form-label">Email</label>
                        <input type="email" class="form-control" id="formrow-email-input" placeholder="Enter Your Email ID">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="formrow-password-input" class="form-label">Password</label>
                        <input type="password" class="form-control" id="formrow-password-input" placeholder="Enter Your Password">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="formrow-inputCity" placeholder="Enter Your Living City">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mb-3">
                        <label for="formrow-inputState" class="form-label">State</label>
                        <select id="formrow-inputState" class="form-select">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="mb-3">
                        <label for="formrow-inputZip" class="form-label">Zip</label>
                        <input type="text" class="form-control" id="formrow-inputZip" placeholder="Enter Your Zip Code">
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary w-md">Submit</button>
            </div>
        </form>
    </div>
    <!-- end card body -->
</div>
@endsection
