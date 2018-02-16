@extends('layouts.user_index')
@section('content')
<div class="col-md-9">
    <h3 class="heading_dashboard">
        USER DASHBOARD
    </h3>
    <div class="border_red">
        <h3 class="album">
            OVERVIEW
        </h3>
    </div>
    <div class="row">
        <div class="col-md-12 color_bottom">
            <h3 class="all_album">
                TRACKS
            </h3>
            <h3 class="add_album">
                VIEW ALL
            </h3>
        </div>
    </div>
    <hr class="line">
    <div class="row">
        @foreach($tracks as $track)
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard_album">
                <img src="{{asset('/dashboard/musician/tracks/images/'.$track->image)}}" class="img-responsive">
            </div>
            <h3 class="album_person_name">
                {{$track->name}}
            </h3>
        </div>
        @endforeach  
    </div>
    <div class="row">
        <div class="col-md-12 color_bottom">
            <h3 class="all_album">
                ALBUMS
            </h3>
            <h3 class="add_album">
                VIEW ALL
            </h3>
        </div>
    </div>
    <hr class="line">
    <div class="row">        
        @foreach($albums as $album)
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="{{route('user_album_videos',['id' => $album->id])}}">
            <div class="dashboard_album">
                <img src="{{asset('/dashboard/musician/albums/images/'.$album->image)}}" class="img-responsive">
            </div>
            <h3 class="album_person_name">
                {{$album->name}}
            </h3>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection










    