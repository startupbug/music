@extends('layouts.user_index')
@section('content')
    <div class="col-md-9">
        <h3 class="heading_dashboard">
          DASHBOARD
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
        <div class="col-md-3 col-sm-6 col-xs-12">
         <div class="dashboard_album"><img src="{{asset('/dashboard/images/tracks_one.png')}}" class="img-responsive"></div>
         <h3 class="album_person_name">
             MICHAEL JACKSON
         </h3>
     </div>
     <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard_album"><img src="{{asset('/dashboard/images/tracks_two.png')}}" class="img-responsive"></div>
        <h3 class="album_person_name">
         NIRVANA
     </h3>
 </div>
 <div class="col-md-3 col-sm-6 col-xs-12">
   <div class="dashboard_album"><img src="{{asset('/dashboard/images/tracks_three.png')}}" class="img-responsive"></div>
   <h3 class="album_person_name">
     GREEN DAY
 </h3>
</div>
<div class="col-md-3 col-sm-6 col-xs-12">
   <div class="dashboard_album"><img src="{{asset('/dashboard/images/tracks_four.png')}}" class="img-responsive"></div>
   <h3 class="album_person_name">
     PINK FLOYD
 </h3>
</div>
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
        <div class="col-md-3 col-sm-6 col-xs-12">
         <div class="dashboard_album"><img src="{{asset('/dashboard/images/album_one.png')}}" class="img-responsive"></div>
         <h3 class="album_person_name">
             MICHAEL JACKSON
         </h3>
     </div>
     <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard_album"><img src="{{asset('/dashboard/images/album_two.png')}}" class="img-responsive"></div>
        <h3 class="album_person_name">
         NIRVANA
     </h3>
 </div>
 <div class="col-md-3 col-sm-6 col-xs-12">
   <div class="dashboard_album"><img src="{{asset('/dashboard/images/album_three.png')}}" class="img-responsive"></div>
   <h3 class="album_person_name">
     GREEN DAY
 </h3>
</div>
<div class="col-md-3 col-sm-6 col-xs-12">
   <div class="dashboard_album"><img src="{{asset('/dashboard/images/album_four.png')}}" class="img-responsive"></div>
   <h3 class="album_person_name">
     PINK FLOYD
 </h3>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection










    