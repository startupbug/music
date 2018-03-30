@extends('layouts.dashboard_index')
@section('content')
<div class="col-md-9">
<h3 class="heading_dashboard">
	ARTIST &nbsp; DASHBOARD
</h3>
<div class="border_red">
	<h3 class="album">
		MY &nbsp; ALBUMS
	</h3>
	@if (Session::has('upload_album'))
    	<div class="alert alert-info">{{ Session::get('upload_album') }}</div>
    @elseif (Session::has('update_album'))
    	<div class="alert alert-info">{{ Session::get('update_album') }}</div>
    @elseif (Session::has('delete_album'))
    	<div class="alert alert-info">{{ Session::get('delete_album') }}</div>
    @endif
</div>
<div class="row">
	<div class="col-md-12 color_bottom">
		<h3 class="all_album">
			VIEWING &nbsp; ALL &nbsp; ALBUMS
		</h3>
		<a href="{{route('create_album')}}">
			<h3 class="add_album">
				ADD &nbsp; ALBUM
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
</div>
@endsection