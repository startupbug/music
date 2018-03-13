@extends('layouts.dashboard_index') 
@section('content')
<div class="col-md-9">
    <h3 class="heading_dashboard">
        ARTIST DASHBOARD
    </h3>
    <div class="border_red">
        <h3 class="album">
            MY ALBUMS
        </h3>
        @if (Session::has('activate'))
            <div class="alert alert-info">{{ Session::get('activate') }}</div>
        @endif
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
        @foreach($all_albums as $value)
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard_album">
                    <img src="{{asset('public/dashboard/musician/albums/images/'.$value->image)}}" width="100%" height="170px">
                    <div class="dropdownmenu">
                        <div class="middle">
                            <i class="fa fa-ellipsis-v"></i>
                        </div>
                        <div class="dropdown-content">
                          <a href="{{route('edit_album',['id'=>$value->id])}}">Edit</a>
                          <a href="{{route('delete_album',['id'=>$value->id])}}">Delete</a>
                        </div>
                    </div>
                </div>
                <a href="{{route('edit_album',['id'=>$value->id])}}">
                <h3 class="album_person_name">
                    {{$value->name}}
                </h3>
                </a>
            </div>    
        @endforeach          
    </div>   
    <div class="button_dashboard"><button type="button" class="btn">LOAD MORE</button></div>
</div>

@endsection