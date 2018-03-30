@extends('layouts.dashboard_index')
@section('content')
<div class="col-md-9">
  <h3 class="heading_dashboard">
   ARTIST &nbsp; DASHBOARD
 </h3>
 <div class="border_red">
  <h3 class="album">
    OVERVIEW
  </h3>
</div>
<div class="row">
  <div class="col-md-12 color_bottom">


    <h3 class="all_album">
     EARNED &nbsp; POINTS
   </h3>


   <div class="btn-group">
     <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="quant[1]">
       <span class="glyphicon glyphicon-calendar"></span>
     </button><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
      Action <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" role="menu">
      <li><a href="#">Action</a></li>
      <li><a href="#">Another</a></li>
    </ul>
  </div>
</div>
</div>
<hr class="line">
<div class="main">
  <h4 class="points-cs">POINTS</h4>
  <h2 class="cstm-heding">2017</h2>
  <ul>
    <li class="active">
      <article tabindex="200" data-metric="visits">
        <div class="area">
          <div class="lines">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>

            <div class="csmt"></div>
          </div>

          <div class="data visits">

            <dl>
              <dt>JAN</dt>
              <dd></dd>
            </dl>
            <dl>
              <dt>FEB</dt>
              <dd></dd>
            </dl>
            <dl>
              <dt>MAR</dt>
              <dd></dd>
            </dl>
            <dl>
              <dt>APR</dt>
              <dd></dd>
            </dl>
            <dl>
              <dt>MAY</dt>
              <dd></dd>
            </dl>
            <dl>
              <dt>JUN</dt>
              <dd></dd>
            </dl>
            <dl>
              <dt>JUL</dt>
              <dd></dd>
            </dl>
            <dl>
              <dt>AUG</dt>
              <dd></dd>
            </dl>
            <dl>
              <dt>SEP</dt>
              <dd></dd>
            </dl>
            <dl>
              <dt>OCT</dt>
              <dd></dd>
            </dl>
            <dl>
              <dt>NOV</dt>
              <dd></dd>
            </dl>
            <dl>
              <dt>DEC</dt>
              <dd></dd>
            </dl>
          </div>
        </div>
        <h4 class="months-cs">MONTHS</h4>
      </article>
    </li>
  </ul>
</div>
<div class="row">
  <div class="col-md-12 color_bottom">
    <h3 class="all_album">
     MY &nbsp; TRACKS
   </h3>
   <a href="{{route('musician_track')}}">
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
      <span class="caption fade-caption"> 
        <div class="star"><span class="glyphicon glyphicon-star"></span></div>
        @if($value->featured == '1')
        <a href="{{route('disapprove-featured',['id'=>$value->id])}}" title="Click To UnFeatured">
          <h3 class="hover_heading">SONG &nbsp; IS &nbsp; FEATURED <br>UN &nbsp; FEATURE &nbsp; SONG</h3>
        </a>
        @else
        <a href="{{route('approve-featured',['id'=>$value->id])}}" title="Click To Featured">
          <h3 class="hover_heading">FEATURE &nbsp; THIS &nbsp; SONG</h3>
        </a>
        @endif        
        <div class="trophy"><i class="fa fa-trophy" style="font-size:24px"></i></div>
        <a href=""> <h3 class="hover_heading">ADD &nbsp; SONG &nbsp; TO &nbsp; CONTEST</h3> </a>
      </span>
    </div>  
  </div> 
  <a href="{{route('edit_track',['id'=>$value->id])}}">    
  <h3 class="album_person_name">
    {{$value->name}}
  </h3>   
  </a>    
</div>
@endforeach
</div>
<div class="row">
  <div class="col-md-12 color_bottom">
    <h3 class="all_album">
     MY ALBUMS
   </h3>

  <a href="{{route('musician_album')}}">
     <h3 class="add_album">
        VIEW ALL
      </h3>
  </a>

</div>
</div>
<hr class="line">
<div class="row">
  @foreach($all_albums as $value)
  <div class="col-md-3 col-sm-6 col-xs-12">
   <div class="dashboard_album">
    <a href="{{route('edit_album',['id'=>$value->id])}}">
    <img src="{{asset('public/dashboard/musician/albums/images/'.$value->image)}}" class="img-responsive custom-image-dashboard">
    </a>
  </div>
  <h3 class="album_person_name">
   {{$value->name}}
 </h3>
</div>
@endforeach
</div>
</div>
@endsection