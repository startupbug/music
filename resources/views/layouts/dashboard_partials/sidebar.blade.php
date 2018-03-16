<div class="col-md-3 color_bg">
	<div class="dashboard_name">
	<div class="dashboard_name">

		@if(Auth::user()->role_id == 2)
		<a href="{{route('delete_image1')}}" data-toggle="tooltip" title="Remove Profile Picture">
			<i class="fa fa-lg fa-remove delete_image_profile"> </i>
		</a>
		@elseif(Auth::user()->role_id == 3)
		<a href="{{route('delete_image2')}}" data-toggle="tooltip" title="Remove Profile Picture">
			<i class="fa fa-lg fa-remove delete_image_profile"> </i>
		</a>
		@elseif(Auth::user()->role_id == 4)
		<a href="{{route('delete_image3')}}" data-toggle="tooltip" title="Remove Profile Picture">
			<i class="fa fa-lg fa-remove delete_image_profile"> </i>
		</a>
		@endif
		<div class="image-box">
			@if(Auth::user()->role_id == 2)
				<img src="{{asset('public/dashboard/profile_images/'. Auth::user()->image )}}" class="img-responsive">
				<form action="{{route('musicianImageUpload')}}" method="post" enctype="multipart/form-data" id="change_profile">
			@elseif(Auth::user()->role_id == 3)
				<img src="{{asset('public/dashboard/profile_images/'. Auth::user()->image )}}" class="img-responsive">
				<form action="{{route('promoterImageUpload')}}" method="post" enctype="multipart/form-data" id="change_profile">
			@elseif(Auth::user()->role_id == 4)
				<img src="{{asset('public/dashboard/profile_images/'. Auth::user()->image )}}" class="img-responsive">
				<form action="{{route('userImageUpload')}}" method="post" enctype="multipart/form-data" id="change_profile">
			@endif
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="camera_image">
					<i class="fa fa-camera fa-2x" aria-hidden="true"></i>
					<input type="file" name="image" id="change_profile">
				</div>
			</form>
			</div>
	</div>
	<h3 class="name_person">
		{{Auth::user()->name}}
	</h3>
	<div class="row">
		@if(Auth::user()->role_id == 2)
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="side_border">
				<div class="side_img"><img src="{{asset('public/dashboard/images/side_one.png')}}" class="img-responsive"></div>
				<p class="side_heading">
					@if($redeemable_points && !empty($redeemable_points))
					{{$redeemable_points}}
					@else
					0
					@endif
				</p>
				<p class="side_paragraph">
					POINTS
				</p>
			</div>
		</div>
		@endif
		@if(Auth::user()->role_id == 3)
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="side_border">
				<div class="side_img"><img src="{{asset('public/dashboard/images/side_one.png')}}" class="img-responsive"></div>
				<p class="side_heading">
					@if($redeemable_points && !empty($redeemable_points))
					{{$redeemable_points}}
					@else
					0
					@endif
				</p>
				<p class="side_paragraph">
					POINTS
				</p>
			</div>
		</div>
		@endif
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="side_border">
					<div class="side_img">
						<img src="{{asset('public/dashboard/images/side_two.png')}}" class="img-responsive">
					</div>
					@if(Auth::user()->role_id == 2)
						<a href="{{route('musician_overview')}}">
							<p class="side_paragraph">
							OVERVIEW
							</p>
						</a>
						@elseif(Auth::user()->role_id == 3)
						<a href="{{route('promoterdashboard')}}">
							<p class="side_paragraph">
							OVERVIEW
							</p>
						</a>
						@elseif(Auth::user()->role_id == 4)
						<a href="{{route('user_index')}}">
							<p class="side_paragraph">
							OVERVIEW
							</p>
						</a>
					@endif
			</div>
		</div>
		@if(Auth::user()->role_id == 2)
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="side_border">
				<div class="side_img">
					<img src="{{asset('public/dashboard/images/side_three.png')}}" class="img-responsive">
				</div>
				<a href="{{route('musician_album')}}">
					<p class="side_paragraph">
					MY ALBUMS
					</p>
				</a>
			</div>
		</div>
		@endif
		@if(Auth::user()->role_id == 3)
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="side_border">
				<div class="side_img"><img src="{{asset('public/assets/images/side_three.png')}}" class="img-responsive"></div>
				<a href="{{route('promoter_track_assign')}}">
					<p class="side_paragraph">
						INVITATIONS
					</p>
				</a>
			</div>
		</div>
		@endif
		@if(Auth::user()->role_id == 3 || Auth::user()->role_id == 2)
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="side_border">
					<div class="side_img">
						<img src="{{asset('public/dashboard/images/side_four.png')}}" class="img-responsive">
					</div>
					@if(Auth::user()->role_id == 2 )
						<a href="{{route('musician_track')}}">
							<p class="side_paragraph">
							MY TRACKS
							</p>
						</a>
					@elseif(Auth::user()->role_id == 3 )
						<a href="{{route('promotermusicvoting_tracks')}}">
							<p class="side_paragraph">
							MY TRACKS
							</p>
						</a>
					@endif
				</div>
			</div>
		@endif
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="side_border">
				<div class="side_img">
					<img src="{{asset('public/dashboard/images/side_five.png')}}" class="img-responsive">
				</div>
				@if(Auth::user()->role_id == 2)
					<a href="{{route('musician_setting')}}">
						<p class="side_paragraph">
						SETTINGS
						</p>
					</a>
				@elseif(Auth::user()->role_id == 3)
					<a href="{{route('promotersetting')}}">
						<p class="side_paragraph">
						SETTINGS
						</p>
					</a>
				 @elseif(Auth::user()->role_id == 4)
					<a href="{{route('user_setting')}}">
						<p class="side_paragraph">
						SETTINGS
						</p>
					</a>
				@endif
			</div>
		</div>
		@if(Auth::user()->role_id == 3 || Auth::user()->role_id == 2)
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="side_border">
				<div class="side_img">
					<img src="{{asset('public/dashboard/images/side_six.png')}}" class="img-responsive">
				</div>
				@if(Auth::user()->role_id == 2)
				<a href="{{route('musician_redeem')}}">
					<p class="side_paragraph">
						REDEEMPOINTS
					</p>
				</a>
				@elseif(Auth::user()->role_id == 3)
				<a href="{{route('promoterredeempoint')}}">
					<p class="side_paragraph">
						REDEEMPOINTS
					</p>
				</a>
				@endif
			</div>
		</div>
		@endif
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="last_border">
				@if(Auth::user()->role_id == 2)
					<a href="{{route('logout_musician')}}">
					<p class="side_para">
						LOGOUT
					</p>
					</a>
				@elseif(Auth::user()->role_id == 3)
					<a href="{{route('logout_promoter')}}">
					<p class="side_para">
						LOGOUT
					</p>
					</a>
				@elseif(Auth::user()->role_id == 4)
					<a href="{{route('logout_user')}}">
					<p class="side_para">
						LOGOUT
					</p>
					</a>
				@endif
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="last_feature">
				<p class="account">GET MY ACCOUNT</p>
				<p class="feature">FEATURED</p>
			</div>
			<span class="glyphicon glyphicon-play"></span>
		</div>
	</div>
</div>
</form>
</form>
</div>
