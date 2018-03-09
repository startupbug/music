@extends('layouts.user_index')
@section('content')
<div class="col-md-9">
	@if (Session::has('activate'))
            <div class="alert alert-info">{{ Session::get('activate') }}</div>
        @endif
	<h3 class="heading_dashboard">
		USER DASHBOARD
	</h3>
	<div class="row">
		<div class="col-md-12 color_bottom">
			<h3 class="all_album">
				VIEWING ALL TRACKS
			</h3>
		</div>
	</div>
	<hr class="line">
	<div class="row">
		@foreach($tracks as $track)
		<div class="col-md-3 col-sm-6 col-xs-12">
			<a href="{{route('musicvoting_genre',['id' => $track->id])}}">
			<div class="box">  
				<div class="dashboard_album"><img src="{{asset('public/dashboard/musician/tracks/images/'.$track->image)}}" class="img-responsive custom-image-dashboard">
				</div> 
			</div>
			</a>
				<h3 class="album_person_name">
					{{$track->name}}
				</h3>
		</div>
		@endforeach	
	</div>
</div>
@endsection