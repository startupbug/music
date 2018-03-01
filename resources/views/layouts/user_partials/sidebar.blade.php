<?php
use App\User;
$users = User::select('name','image')->where('id',Auth::user()->id)->first();
?>
<div class="col-md-3 color_bg">
	<div class="dashboard_name">		
		<div class="image-box">
			<img src="{{asset('public/dashboard/user_images/'. $users->image )}}" class="img-responsive">
			<form action="{{route('userImageUpload')}}" method="post" enctype="multipart/form-data" id="change_profile">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="camera_image">
					<i class="fa fa-camera fa-2x" aria-hidden="true"></i>
					<input type="file" name="image" id="change_profile">
				</div>
			</form>
		</div>
	</div>
	<h3 class="name_person">
		{{$users->name}}
	</h3>	
</div>
<div class="row">
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="side_border">
			<div class="side_img">
				<img src="{{asset('public/dashboard/images/side_two.png')}}" class="img-responsive">
			</div>
			<a href="{{route('user_index')}}">
				<p class="side_paragraph">
					OVERVIEW
				</p>
			</a>
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="side_border">
			<div class="side_img">
				<img src="{{asset('public/dashboard/images/side_five.png')}}" class="img-responsive">
			</div>
			<a href="{{route('user_setting')}}">
				<p class="side_paragraph">
					SETTINGS
				</p>
			</a>
		</div>
	</div>		
</div>
<div class="row">
	<div class="col-md-12">
		<div class="last_border">
			<a href="{{route('logout_user')}}">
				<p class="side_para">
					LOGOUT
				</p>
			</a>
		</div>
	</div>
</div>	
</div>