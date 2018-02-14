<footer>
    <div class="container-fluid bg_greycolor">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <h3 class="footer_heading">
                        PAGES
                    </h3>
                    <ul class="footer_link">
                        <li><a href="index.php"><i class="fa fa-angle-double-right"></i>
                            Home
                        </a></li>
                        <li><a href="contest.php"><i class="fa fa-angle-double-right"></i>
                            Contests
                        </a></li>
                        <li><a href="winner.php"><i class="fa fa-angle-double-right"></i>
                            Winners
                        </a></li>
                        <li><i class="fa fa-angle-double-right"></i>
                            Free Beats
                        </li>

                    </ul>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <h3 class="footer_heading">
                        SUPPORT
                    </h3>
                    <ul class="footer_link">
                        <li><a href="musicvoting_privacy.php"><i class="fa fa-angle-double-right"></i>
                            Privacy
                        </a></li>
                        <li><a href="musicvoting_terms.php"><i class="fa fa-angle-double-right"></i>
                            Terms
                        </a></li>
                        <li><a href="faq.php"><i class="fa fa-angle-double-right"></i>
                            FAQ
                        </a></li>
                        <li><a href="howitworks.php"><i class="fa fa-angle-double-right"></i>
                            How It Works
                        </a></li>

                    </ul>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <h3 class="footer_heading">
                     QUICK LINKS
                 </h3>
                     <ul class="footer_link">
                        <li><a href="signup.php"><i class="fa fa-angle-double-right"></i>
                            Sign Up Now
                        </a></li>
                        <li><a href="contest.php"><i class="fa fa-angle-double-right"></i>
                            Contests
                        </a></li>
                        <li><i class="fa fa-angle-double-right"></i>
                            Promote
                        </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <ul class="social_icon_footer">
                            <li><i class="fa fa-facebook-square" aria-hidden="true"></i></li>
                            <li><i class="fa fa-twitter-square" aria-hidden="true"></i></li>
                            <li><i class="fa fa-google-plus-square" aria-hidden="true"></i></li>
                        </ul>
                        <h3 class="subscribe">
                         SUBSCRIBE TO OUR NEWSLETTER!
                     </h3>
                    <div class="well">
                       <form action="#">
                          <div class="input-group">
                           <input class="btn btn-lg footer" name="email" id="email" type="email" placeholder="Email Address" required>
                           <button class="btn btn-info btn-lg footer" type="submit">SUBSCRIBE</button>
                       </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg_black_color">
        <div class="container">
               <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h3 class="footer_last">
                        All rights Reserved © 2017 <span>Music Voting</span>, Designed & Developed by <span>Startupbug.net</span>
                    </h3>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="container">
  <div class="modal fade" id="myLoginModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <!-- Modal content-->
      <div class="modal-content">
        <h4 class="login-title">Login</h4>
        <div class="modal-body">
          <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <input type="email" name="email" class="form-control red-color" id="email" placeholder="Email">
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <input type="password" name="password" class="form-control red-color" id="pwd" placeholder="Password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-default" style="width:100%">Submit</button>
            </div>
          </form>
        </div>
        <div class="login-footer">
          <a href="{{url('register')}}">Don`t have an account? Sign Up Now!</a>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- This is login popup -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <i class="fa fa-times-circle-o" aria-hidden="true"></i></button>



         <div class="signup_form_box">
            <form id="Sign_up_form">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text"  placeholder="Name" class="form-control validate[required]"
                    data-errormessage-value-missing="Name of entity is required!" id="">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" placeholder="Email" class="form-control validate[required]"
                    data-errormessage-value-missing="Email of entity is required!">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" placeholder="Password" class="form-control">
                </div>
                <div class="form-group">
                    <label>Retype Password</label>
                    <input type="password" placeholder="Retype password" class="form-control">
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
                <h1 class="form_heading">Forgot Password?</h1>

                <h1 class="form_heading">Don't have an account? Sign Up Now!</h1>
            </form>
        </div>

    </div>
</div>
</div>
