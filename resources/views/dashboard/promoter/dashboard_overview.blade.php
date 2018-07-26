@extends('layouts.promoter_index')
@section('content')
<div class="col-md-9">
    <h3 class="heading_dashboard">
         PROMOTER &nbsp; DASHBOARD
    </h3>
    <div class="border_red">
       <h3 class="album">
            OVERVIEW
       </h3>
    </div>
    <hr class="line">
    <div class="row">
        <div class="col-md-12 color_bottom">
            <h3 class="all_album">
                APPROVED &nbsp; TRACKS
            </h3>
            <a href="{{route('promotermusicvoting_tracks')}}">
                <h3 class="add_album">
                    VIEW ALL
                </h3>
            </a>
        </div>
    </div>
    <hr class="line">
        <div class="row">
             @foreach($all_tracks as $value)
             <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="box">  
                <div class="dashboard_album">
                  <img src="{{asset('public/dashboard/musician/tracks/images/'.$value->image)}}" class="img-responsive custom-image-dashboard" >
                  <!-- <span class="caption fade-caption"> 
                    <div class="star"><span class="glyphicon glyphicon-star"></span></div>
                    <h3 class="hover_heading">MAKESONGFEATURED</h3>
                    <div class="trophy"><i class="fa fa-trophy" style="font-size:24px"></i></div>
                    <h3 class="hover_heading">ADDSONGTOCONTEST</h3> 
                  </span> -->
                </div>  
              </div>      
              <h3 class="album_person_name">
                {{$value->name}}
              </h3>      
            </div>
            @endforeach
        </div>
    <div class="row">
        <div class="col-md-12 color_bottom">
            <h3 class="all_album">
                RECENT &nbsp; ASSIGNED &nbsp; TRACKS
            </h3>
            <a href="{{route('unapproved_invitations')}}">
              <h3 class="add_album">
                  VIEW ALL
              </h3>
            </a>
        </div>
    </div>
    <hr class="line">
    <div class="row">
         @foreach($invitations as $value)
         <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="box">  
            <div class="dashboard_album">
              <img src="{{asset('public/dashboard/musician/tracks/images/'.$value->image)}}" class="img-responsive custom-image-dashboard" >
              <!-- <span class="caption fade-caption"> 
                <div class="star"><span class="glyphicon glyphicon-star"></span></div>
                <h3 class="hover_heading">MAKESONGFEATURED</h3>
                <div class="trophy"><i class="fa fa-trophy" style="font-size:24px"></i></div>
                <h3 class="hover_heading">ADDSONGTOCONTEST</h3> 
              </span> -->
            </div>  
          </div>      
          <h3 class="album_person_name">
            {{$value->track_name}}
          </h3>      
        </div>
        @endforeach
    </div>
</div>
@endsection