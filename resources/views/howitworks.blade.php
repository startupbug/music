@extends('layouts.public_index')
@section('content')
<div class="container">
	<div class="row ">
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="images_left"><img src="{{asset('public/assets/images/register.png')}}" class="img-responsive"></div>
		</div>
		<div class="col-md-8 col-sm-6 col-xs-12">
			<h1 class="heading_right">
				REGISTER
			</h1>
			<p class="content_right">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at nisi vitae orci posuere porttitor. Mauris tempor tortor vitae ante vestibulum, at semper purus aliquam. Pellentesque pulvinar mauris ac est semper, sed dignissim ligula volutpat. Nam at pharetra erat, at dignissim augue. Donec rhoncus vulputate pellentesque. Sed sed leo dignissim, mattis neque vel, rutrum sem. Integer velit nulla, pulvinar vitae cursus ac, laoreet in enim. Maecenas fermentum urna et convallis tristique. Mauris gravida est nec ipsum ullamcorper varius. Vivamus at mattis ex. Etiam euismod scelerisque augue, quis venenatis mauris. Aliquam in dictum nisi. Sed id ante eros.
			</p>
		</div>
	</div>
	<div class="row cell">
		<div class="col-md-8 col-sm-6 col-xs-12 cell1">
			<h1 class="heading_right">
				UPLOAD
			</h1>
			<p class="content_right">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at nisi vitae orci posuere porttitor. Mauris tempor tortor vitae ante vestibulum, at semper purus aliquam. Pellentesque pulvinar mauris ac est semper, sed dignissim ligula volutpat. Nam at pharetra erat, at dignissim augue. Donec rhoncus vulputate pellentesque. Sed sed leo dignissim, mattis neque vel, rutrum sem. Integer velit nulla, pulvinar vitae cursus ac, laoreet in enim. Maecenas fermentum urna et convallis tristique. Mauris gravida est nec ipsum ullamcorper varius. Vivamus at mattis ex. Etiam euismod scelerisque augue, quis venenatis mauris. Aliquam in dictum nisi. Sed id ante eros.
			</p>
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12 cell2">
			<div class="images_right"><img src="{{asset('public/assets/images/upload.png')}}" class="img-responsive"></div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="images_left"><img src="{{asset('public/assets/images/getfamous.png')}}" class="img-responsive"></div>
		</div>
		<div class="col-md-8 col-sm-6 col-xs-12">
			<h1 class="heading_right">
				GET FAMOUS
			</h1>
			<p class="content_right">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at nisi vitae orci posuere porttitor. Mauris tempor tortor vitae ante vestibulum, at semper purus aliquam. Pellentesque pulvinar mauris ac est semper, sed dignissim ligula volutpat. Nam at pharetra erat, at dignissim augue. Donec rhoncus vulputate pellentesque. Sed sed leo dignissim, mattis neque vel, rutrum sem. Integer velit nulla, pulvinar vitae cursus ac, laoreet in enim. Maecenas fermentum urna et convallis tristique. Mauris gravida est nec ipsum ullamcorper varius. Vivamus at mattis ex. Etiam euismod scelerisque augue, quis venenatis mauris. Aliquam in dictum nisi. Sed id ante eros.
			</p>

		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-sm-6 col-xs-12">
			<h1 class="heading_right">
			WATCH A VIDEO
			</h1>
			<p class="content_right">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pharetra at augue et facilisis. Phasellus varius velit ut turpis dapibus, quis consectetur lectus tristique. Aliquam dapibus feugiat urna, at facilisis purus elementum a. Aenean condimentum arcu iaculis egestas rutrum. Quisque tempus commodo dolor, a commodo arcu luctus vel. 

			</p> 
			<div class="button"><a href="#" class="btn" type="button">SIGN UP NOW</a></div>
		</div>
		<div class="col-md-4">
			<div class="laptop_image">
                
                <img src="{{asset('public/assets/images/laptop_img.png')}}" class="img-responsive center-block"/>
            </div>
		</div>
	</div>
</div>
@endsection