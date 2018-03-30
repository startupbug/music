@extends('layouts.user_index')
@section('content')
<div class="col-md-9">
    <h3 class="heading_dashboard">
        USER &nbsp; DASHBOARD
    </h3>
    <div class="border_red">
        <h3 class="album">
            OVER &nbsp; VIEW
        </h3>
        @if (Session::has('activate'))
            <div class="alert alert-info">{{ Session::get('activate') }}</div>
        @endif
        @if (Session::has('delete'))
            <div class="alert alert-info">{{ Session::get('delete') }}</div>
        @endif
    </div>
    <div class="row">
        <div class="col-md-12 color_bottom">
            <h3 class="all_album">
                TRACKS
            </h3>
            <a href="{{route('all_tracks')}}">
            <h3 class="add_album">
                VIEW ALL
            </h3>
            </a>
        </div>
    </div>
    <hr class="line">
    <div class="row">
        @foreach($tracks as $track)
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard_album">
                <a href="{{route('musicvoting_genre',['id' => $track->id])}}">
                <video width="220" height="240" controls>
                        <source src="{{asset('public/dashboard/musician/tracks/videos/'.$track->video)}}" type="video/mp4">
                </video>
                </a>
            </div>
            <h3 class="album_person_name">
                {{$track->name}}
            </h3>
                <h3 class="album_person_name">
                     <b>By</b><a href="{{route('profile',['id'=>$track->user_id])}}"> {{$track->user_name}}</a>
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
                <img src="{{asset('public/dashboard/musician/albums/images/'.$album->image)}}" class="img-responsive" style="height: 170px; width: 100%;">
            </div>
            </a>
            <h3 class="album_person_name">
                {{$album->name}}
            </h3>
                <h3 class="album_person_name">
                     <b>By</b> <a href="{{route('profile',['id'=>$album->user_id])}} ">{{$album->user_name}}</a>
                </h3>
        </div>
        @endforeach
    </div>
</div>
@endsection
