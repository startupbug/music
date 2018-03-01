@extends('layouts.dashboard_index')
@section('content')
<div class="col-md-9">
	@if (Session::has('upload_album'))
    	<div class="alert alert-info">{{ Session::get('upload_album') }}</div>
    @endif
<h3 class="heading_dashboard">
	ARTIST DASHBOARD
</h3>
<div class="border_red">
	<h3 class="album">
		MY ALBUMS
	</h3>
</div>
<div class="row">
	<div class="col-md-12 color_bottom">
		<h3 class="all_album">
			VIEWING ALL ALBUMS
		</h3>
		<a href="{{route('create_album')}}">
			<h3 class="add_album">
				ADD ALBUM
			</h3>
		</a>
	</div>
</div>
<hr class="line">
	<div class="row">
		@foreach($albums as $album)
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="box">  
				<div class="dashboard_album">
				<img src="{{asset('public/dashboard/musician/albums/images/'.$album->image)}}" class="img-responsive custom-image-dashboard" >				
				</div>  
			</div>
			<a href="{{route('edit_album',['id' => $album->id])}}">
				<h3 class="album_person_name">
					{{$album->name}}
				</h3>
			</a>
		</div>
		@endforeach		
	</div>
	<div class="button_dashboard"><button type="button" class="btn">LOAD MORE</button></div>
</div>
@endsection