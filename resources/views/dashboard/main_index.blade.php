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
        <div class="col-md-12 color_bottom">
            <h3 class="all_album">
                VIEWING ALL ALBUMS
            </h3>
            <h3 class="add_album">
                ADD ALBUM
            </h3>
        </div>
    </div>
    <hr class="line">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard_album"><img src="{{asset('.public/dashboard/images/album_one.png')}}" class="img-responsive"></div>
            <h3 class="album_person_name">
                MICHAEL JACKSON
            </h3>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard_album"><img src="{{asset('.public/dashboard/images/album_two.png')}}" class="img-responsive"></div>
            <h3 class="album_person_name">
                NIRVANA
            </h3>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard_album"><img src="{{asset('.public/dashboard/images/album_three.png')}}" class="img-responsive"></div>
            <h3 class="album_person_name">
                GREEN DAY
            </h3>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard_album"><img src="{{asset('.public/dashboard/images/album_four.png')}}" class="img-responsive"></div>
            <h3 class="album_person_name">
                PINK FLOYD
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard_album"><img src="{{asset('.public/dashboard/images/album_one.png')}}" class="img-responsive"></div>
            <h3 class="album_person_name">
                MICHAEL JACKSON
            </h3>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard_album"><img src="{{asset('.public/dashboard/images/album_two.png')}}" class="img-responsive"></div>
            <h3 class="album_person_name">
                NIRVANA
            </h3>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard_album"><img src="{{asset('.public/dashboard/images/album_three.png')}}" class="img-responsive"></div>
            <h3 class="album_person_name">
                GREEN DAY
            </h3>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard_album"><img src="{{asset('.public/dashboard/images/album_four.png')}}" class="img-responsive"></div>
            <h3 class="album_person_name">
                PINK FLOYD
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard_album"><img src="{{asset('.public/dashboard/images/album_one.png')}}" class="img-responsive"></div>
            <h3 class="album_person_name">
                MICHAEL JACKSON
            </h3>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard_album"><img src="{{asset('.public/dashboard/images/album_two.png')}}" class="img-responsive"></div>
            <h3 class="album_person_name">
                NIRVANA
            </h3>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard_album"><img src="{{asset('.public/dashboard/images/album_three.png')}}" class="img-responsive"></div>
            <h3 class="album_person_name">
                GREEN DAY
            </h3>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard_album"><img src="{{asset('.public/dashboard/images/album_four.png')}}" class="img-responsive"></div>
            <h3 class="album_person_name">
                PINK FLOYD
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard_album"><img src="{{asset('.public/dashboard/images/album_one.png')}}" class="img-responsive"></div>
            <h3 class="album_person_name">
                MICHAEL JACKSON
            </h3>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard_album"><img src="{{asset('.public/dashboard/images/album_two.png')}}" class="img-responsive"></div>
            <h3 class="album_person_name">
                NIRVANA
            </h3>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard_album"><img src="{{asset('.public/dashboard/images/album_three.png')}}" class="img-responsive"></div>
            <h3 class="album_person_name">
                GREEN DAY
            </h3>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard_album"><img src="{{asset('.public/dashboard/images/album_four.png')}}" class="img-responsive"></div>
            <h3 class="album_person_name">
                PINK FLOYD
            </h3>
        </div>
    </div>
    <div class="button_dashboard"><button type="button" class="btn">LOAD MORE</button></div>
</div>

@endsection