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
    </div>
    <div class="row">
      <div class="col-md-10 color_bottom">
          <h3 class="all_album">
              {{$album->name}}
          </h3>
      </div>
      <div class="col-md-2 color_bottom">
          <div class="btn-group" style="margin-top:32px">
            <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="quant[1]">
              <span class="glyphicon glyphicon-pencil" style="color:#fff"></span>
            </button>
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
              Action <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a data-toggle="modal" data-target="#EditAlbumModal">Edit</a></li>
              <li><a href="{{route('delete_album',['id'=>$album->id])}}">Delete</a></li>
            </ul>
          </div>
      </div>
    </div>
    <hr class="line">
    <div class="row">
      <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="dashboard_album">
             <video width="100%" controls>
              <source src="{{asset('/dashboard/musician/albums/videos/'.$album->video)}}" type="video/mp4">              
            </video>
        </div>
      </div>
      <!-- <div class="col-md-6 col-sm-12 col-xs-12">
         <div class="header">
              <h1>Lorem Ipsum</h1>
              <h4>Web Developer</h4>
              <span>ALBUM Count</span>
         </div>
      </div> -->
    </div>
   
    <hr class="line">
    
    <div class="button_dashboard"><button type="button" class="btn">LOAD MORE</button></div>
  </div>

@endsection