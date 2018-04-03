@extends('layouts.promoter_index')
@section('content')

<div class="col-md-9">
    <h3 class="heading_dashboard">
        PROMOTER &nbsp; DASHBOARD 
    </h3>
    <div class="border_red">
        <h3 class="album">
         ALBUMS
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
                VIEWING &nbsp; ALL &nbsp; ALBUMS
            </h3>
        </div>
    </div>

    <hr class="line">
    <div class="row">
         @foreach($all_albums as $albums)
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="{{route('promoter_all_albums',['id'=>$albums->id])}}">
            <div class="dashboard_album">
              <img src="{{asset('public/dashboard/musician/albums/images/'.$albums->image)}}" class="img-responsive" style="height: 170px; width: 100%;">
            </div>
            <h3 class="album_person_name">
                {{$albums->name}}
            </h3>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
