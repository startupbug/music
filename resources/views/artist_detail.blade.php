@extends('layouts.public_index')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8">

      @foreach($musician_details as $musician_detail) 
        <div class="row">     
          <div class="col-md-4">
            <div class="img-side">
              @if($musician_detail->image == 0)
                <img src="{{asset('public/dashboard/profile_images/Default-avatar.jpg')}}" class="img-responsive" style="width: 100%; height: 215px;"/>
              @else
                <img src="{{asset('public/dashboard/profile_images/'.$musician_detail->image)}}" class="img-responsive" style="width: 100%; height: 215px;"/>
              @endif
            </div>
          </div>
          <div class="col-md-8">
            <a href="{{route('profile',['id'=>$musician_detail->id])}}">
            <h1 class="side_heading">
              {{$musician_detail->username}}
            </h1>
            </a>
            <h2 class="sub_heading">
              {{$musician_detail->name}}
            </h2>
            <div class="row">
              <div class="col-md-12">
                <ul>
                  <a href="https://www.instagram.com/" target="_blank">
                    <li class="social_media"><img src="{{asset('public/assets/images/instagram.png')}}"><h2 class="mid_head">1881</h2><h3 class="mid_side">FOLLOWERS</h3></li>
                  </a>
                  <a href="https://www.facebook.com" target="_blank">
                    <li class="social_media"><img src="{{asset('public/assets/images/facebook.png')}}"><h2 class="mid_head">2.5K</h2><h3 class="mid_like">LIKES</h3></li>
                  </a>
                  <a href="www.twitter.com/" target="_blank">
                    <li class="social_media"><img src="{{asset('public/assets/images/google-plus.png')}}"><h2 class="mid_head">1200</h2><h3 class="mid_side">FOLLOWERS</h3></li>
                  </a>
                </ul>
              </div>
            </div>
          </div>
        </div>
      @endforeach 
      <!--<h3 class="last_heading">TRACKS</h3>-->
    </div>

    
      
      <div class="col-md-4">

      <h3 class="side_menu">
        TRACKS BY KENDRICK
      </h3>
  

  <ul id="nav1">
    <li><a href="#">Menu Heading 1</a>
    <ul>
      <li><a href="#">Stage1</a></li>
      <li><a href="#">Stage2</a></li>
      <li><a href="#">Stage3</a></li>
      <li><a href="#">Stage4</a></li>
    </ul>
    </li>
    <li><a href="#">Menu Heading 2</a>
      <ul>
      <li><a href="#">Stage1</a></li>
      <li><a href="#">Stage2</a></li>
      <li><a href="#">Stage3</a></li>
      <li><a href="#">Stage4</a></li>
    </ul>
    </li>
    <li><a href="#">Menu Heading 3</a>
    <ul>
      <li><a href="#">Stage1</a></li>
      <li><a href="#">Stage2</a></li>
      <li><a href="#">Stage3</a></li>
      <li><a href="#">Stage4</a></li>
    </ul>
    </li>
     <li><a href="#">Menu Heading 2</a>
      <ul>
      <li><a href="#">Stage1</a></li>
      <li><a href="#">Stage2</a></li>
      <li><a href="#">Stage3</a></li>
      <li><a href="#">Stage4</a></li>
    </ul>
    </li>
     <li><a href="#">Menu Heading 2</a>
      <ul>
      <li><a href="#">Stage1</a></li>
      <li><a href="#">Stage2</a></li>
      <li><a href="#">Stage3</a></li>
      <li><a href="#">Stage4</a></li>
    </ul>
    </li>
     <li><a href="#">Menu Heading 2</a>
      <ul>
      <li><a href="#">Stage1</a></li>
      <li><a href="#">Stage2</a></li>
      <li><a href="#">Stage3</a></li>
      <li><a href="#">Stage4</a></li>
    </ul>
    </li>
     <li><a href="#">Menu Heading 2</a>
      <ul>
      <li><a href="#">Stage1</a></li>
      <li><a href="#">Stage2</a></li>
      <li><a href="#">Stage3</a></li>
      <li><a href="#">Stage4</a></li>
    </ul>
    </li>
     <li><a href="#">Menu Heading 2</a>
      <ul>
      <li><a href="#">Stage1</a></li>
      <li><a href="#">Stage2</a></li>
      <li><a href="#">Stage3</a></li>
      <li><a href="#">Stage4</a></li>
    </ul>
    </li>
     <li><a href="#">Menu Heading 2</a>
      <ul>
      <li><a href="#">Stage1</a></li>
      <li><a href="#">Stage2</a></li>
      <li><a href="#">Stage3</a></li>
      <li><a href="#">Stage4</a></li>
    </ul>
    </li>
     <li><a href="#">Menu Heading 2</a>
      <ul>
      <li><a href="#">Stage1</a></li>
      <li><a href="#">Stage2</a></li>
      <li><a href="#">Stage3</a></li>
      <li><a href="#">Stage4</a></li>
    </ul>
    </li>
     <li><a href="#">Menu Heading 2</a>
      <ul>
      <li><a href="#">Stage1</a></li>
      <li><a href="#">Stage2</a></li>
      <li><a href="#">Stage3</a></li>
      <li><a href="#">Stage4</a></li>
    </ul>
    </li>
</ul> 
</div>
    




    
  </div>
</div>


@endsection
