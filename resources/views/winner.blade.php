@extends('layouts.public_index')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3 class="winner_heading" ">
				THOSE &nbsp; WHO &nbsp; ROCKED &nbsp; US
			</h3>
			<p class="winner_paragraph">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed odio est, dapibus at purus at, porta egestas mauris. Nam molestie, neque elementum posuere tincidunt, metus enim molestie velit, eu elementum mauris quam id arcu. Quisque tristique ligula dui, finibus aliquam diam convallis et. In eu facilisis nulla. Ut bibendum at erat et feugiat. Cras congue ornare fringilla. Sed a euismod metus. Donec bibendum velit eu ante interdum lacinia. Aenean id semper lectus. Proin a nunc at sapien malesuada maximus a ac velit. Suspendisse ut diam erat. Proin lorem mauris, malesuada id molestie malesuada, pretium eget lorem. Suspendisse euismod velit id aliquam vehicula.
			</p>
		</div>
	</div>
	@foreach($winner_list as $winner)
	<div class="row">
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="winner_border">
				<div class="image_winner">
					<img src="{{asset('public/dashboard/profile_images/'. $winner->user_image )}}" class="img-responsive">
				</div>
			</div>
		</div>
		<div class="col-md-8 s_winner">
			<h3 class="winner_name_heading">
				Winner
			</h3>
			<h3 class="winner_name">
				{{$winner->user_name}} 
			</h3>
			<b>Track :</b> <a href="{{route('musicvoting_genre',['id' => $winner->track_id])}}">{{$winner->track_name}}</a><br>
			<b>Contest Title :</b> {{$winner->contest_name}}
			<p class="winner_detail">
				<b>Contest Description :</b>
				<br> 
				{{$winner->contests_description}}
			</p>
		</div>
	</div>
	@endforeach
	
</div>


@endsection