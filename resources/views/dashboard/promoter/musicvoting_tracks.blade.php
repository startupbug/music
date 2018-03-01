@extends('layouts.promoter_index')
@section('content')
<div class="col-md-9">
  <h3 class="heading_dashboard">
   PROMOTER DASHBOARD
  </h3>
  <div class="border_red">
    <h3 class="album">
         TRACKS
    </h3>
  </div>
  <div class="row">
    <div class="col-md-12 color_bottom">
        <h3 class="all_album">
            VIEWING ALL TRACKS
        </h3>
        <h3 class="add_album">
            ADD TRACK
        </h3>
    </div>
  </div>
  <hr class="line">
<div class="row">
  @foreach($all_tracks as $value)
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="box">  
        <div class="dashboard_album">
          <img src="{{asset('public/dashboard/musician/tracks/images/'.$value->image)}}" class="img-responsive custom-image-dashboard" >
          <span class="caption fade-caption"> 
              <div class="star"><span class="glyphicon glyphicon-star"></span></div>
              <h3 class="hover_heading">MAKESONGFEATURED</h3>
              <div class="trophy"><i class="fa fa-trophy" style="font-size:24px"></i></div>
              <h3 class="hover_heading">ADDSONGTOCONTEST</h3> 
          </span>
        </div>  
      </div>
      <a href="{{route('musicvoting_genre',['id' => $value->track_id])}}">    
      <h3 class="album_person_name">
        {{$value->name}}
      </h3>   
      </a>   
    </div>
  @endforeach
</div>
  <div class="button_dashboard">
    <button type="button" class="btn">LOAD MORE</button>
  </div>
</div>
@endsection