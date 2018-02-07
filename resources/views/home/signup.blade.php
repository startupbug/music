@extends('layouts.default')
@section('content')

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 clearfix col-center signup_form">
               
                <div class="signup_form_box">
                    <form id="Sign_up_form">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text"  placeholder="John Doe" class="form-control validate[required]"
                                   data-errormessage-value-missing="Name of entity is required!" id="">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" placeholder="John_Doe@Dummy.com" class="form-control validate[required]"
                                   data-errormessage-value-missing="Email of entity is required!">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control validate[required]"
                                   data-errormessage-value-missing="Username of entity is required!">
                        </div>
                       <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Retype Password</label>
                            <input type="password" class="form-control">
                        </div>
                       <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" placeholder="111-222-333" class="form-control validate[required]"
                                   data-errormessage-value-missing="Phone of entity is required!">
                        </div>
                        <div class="form-group">
                            <label>Account Type</label>
                            <select class="form-control 
                                    data-errormessage-value-missing="Account type entity is required!">
                                <option>Promoter</option>
                                <option>Innovator</option>
                                <option>Funder</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> I agree to the Terms and Conditions.
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <a href="login.php" class="btn btn-default all_r_login">SIGN UP</a>
                           
                        </div>

                        <h1 class="form_heading">Already have an account? Login now!</h1>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>











@endsection