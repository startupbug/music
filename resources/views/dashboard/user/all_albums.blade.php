@extends('layouts.user_index')
@section('content')
<div class="col-md-9">
	
	<h3 class="heading_dashboard">
		USER DASHBOARD
	</h3>
	<div class="row">
		<div class="col-md-12 color_bottom">
			<h3 class="all_album">
				VIEWING &nbsp; ALL &nbsp; TRACKS
			</h3>
		</div>
	</div>
	<hr class="line">
	<div class="row">
		@foreach($albums as $album)
		<div class="col-md-3 col-sm-6 col-xs-12">
			<a href="{{route('album_view',['id' => $album->id])}}">
			<div class="box">  
				<div class="dashboard_album"><img src="{{asset('public/dashboard/musician/albums/images/'.$album->image)}}" class="img-responsive custom-image-dashboard">
				</div> 
			</div>
			</a>
				<h3 class="album_person_name">
					{{$album->name}}
				</h3>
		</div>
		@endforeach	
	</div>
</div>
@endsection