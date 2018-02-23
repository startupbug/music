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
    </div>
    <hr class="line">
    <div class="row">
      <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="dashboard_album">
             <video width="100%" controls>
              <source src="{{asset('/dashboard/musician/albums/videos/'.$album->image)}}" type="video/mp4">              
            </video>
        </div>
      </div>
    </div>
   
    <hr class="line">
    
    <div class="button_dashboard"><button type="button" class="btn">LOAD MORE</button></div>
  </div>

@endsection