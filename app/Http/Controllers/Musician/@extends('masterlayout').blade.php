@extends('masterlayout')
@section('content')

<div class="container" id="maincontent" tabindex="-1">
    <div class="row welcome">
    <h2>Contact Us</h2>
    <div class="second-container mycontainer" >

@if(isset($msg))
   <!--  @if($success) -->
		<div class="alert alert-success">
		  <strong>Success!</strong> {{$msg}}
		</div>
<!--    @else
		<div class="alert alert-warning">
		  <strong>Sorry, </strong> {{$msg}}
		</div>   
   @endif -->
@endif
	   <div class="col-md-12 col-sm-12 col-xs-12 formbox create-account" style="padding-bottom:0;">

		   <form id="contactusForm" action="{{route('contactus_submit')}}" method="post">
		   <div class="form-group">
               <label  class="sel-title">Name:</label>
				<input type="text" name="name" id="name"/>
           </div>
			<div class="form-group">
               <label  class="sel-title">Phone:</label>
				<input type="number" name="phone" id="phone"/>
           </div>
		   <div class="form-group">
               <label  class="sel-title">Email:</label>
				<input type="text" name="email" id="email"/>
           </div>
		   <div class="form-group">
               <label  class="sel-title">Message:</label>
				<textarea id="message" name="message" style="padding: 0 10px;
    width: 409px;
    color: #777259;
    background: #fff;
    border: 0px;
    min-height: 100px;
    float: left;"></textarea>
		   	 
           </div>
		   	 <div class="form-group login-button-page">
<label  class="sel-title" style="visibility:hidden;">Message:</label>
<input type="hidden" name="_token" value="{{Session::token()}}">
		 
		 <div style="min-height:100px;">
		 <div class="g-recaptcha" id="check" data-callback="enableBtn" data-sitekey="6LdzmkgUAAAAAArUffAOOw3YYMLrvoGUwx_qEbJ7" 
		 style="margin-left:200px;"
		 ></div>   	 
		 </div>
		 
            <input type="submit" id="button1" name="submit" value="Send Message" class="black" style="background: #000;
    border: 0px;
    color: #fff;
    font-size: 14px;
    height: 39px;
    width: 125px;
    margin-left:250px;" disabled="disabled">
         </div>
   		   </form>

       </div><!--formbox End-->
       
    </div>
    </div>
</div>

@endsection