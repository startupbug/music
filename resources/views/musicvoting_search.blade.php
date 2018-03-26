@extends('layouts.public_index')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-11 col-md-offset-1">
            <div class="input-group" id="adv-search">

              <form action="{{route('search_result')}}" method="POST">
                {{csrf_field()}}
                
                <input type="text" class="form-control form_control" placeholder="Search artist" name="search_item" />
                <div class="select select_volvo">
                <select name="genre">
                  <option value="" name="genre">Select</option>
                  @foreach($categories as $category)
                    <option value="{{$category->id}}" name="genre">{{$category->name}}</option>
                  @endforeach
                </select>
                </div>
                <br>
   
                <div class="button_submit"><input type="submit"></div>
              </form>



              
              <!--<div class="input-group-btn">
                    <div class="btn-group" role="group">

                       <div class="dropdown dropdown_toggle">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown 
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="#">HTML</a></li>
      <li><a href="#">CSS</a></li>
      <li><a href="#">JavaScript</a></li>
    </ul>
  </div>
                <div class="dropdown dropdown-lg">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="search">Genre</span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                              <ul class="dropdown-menu">
      <li><a href="#">HTML</a></li>
      <li><a href="#">CSS</a></li>
      <li><a href="#">JavaScript</a></li>
    </ul>
                            <form action="{{route('search_result')}}" method="POST" class="form-horizontal" role="form">
                                  {{csrf_field()}}
                           <div class="form-group">
                                    <label for="filter">Filter by</label>
                                   <select class="form-control">
                                        <option value="0" selected>All Snippets</option>
                                        <option value="1">Featured</option>
                                        <option value="2">Most popular</option>
                                        <option value="3">Top rated</option>
                                        <option value="4">Most commented</option>
                                    </select>-->
                                  <!--</div>-->
                                  <!--<div class="form-group">
                                    <label for="contain">Author</label>
                                    <input class="form-control" type="text" />
                                  </div>-->
                                 <!-- <div class="form-group">
                                    <label for="contain">Contains the words</label>
                                    <input class="form-control" type="text" />
                                  </div>-->
                                  <!--<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>-->
                                <!--</form>-->
                            <!--</div>-->
                        <!--</div>-->
                      <!--</div>-->
                    
                  
                        <!--<button type="button" class="btn btn-primary button_btn"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>-->
                    
                    </div>
                </div>
            </div>
          </div>
        </div>
  </div>




<div class="container">
  <div class="row border">
    <div class="col-md-6">
      <h1 class="left_heading">TRACKS</h1>
    </div>
  </div>
</div>

<div class="container images_video">
<div class="row">
            @foreach($tracks as $track)
            <div class="col-xs-12 col-sm-6 col-md-2 change_width">
                <div class="songs_box">
                    <a href="{{route('musicvoting_genre',['id' => $track->id])}}">
                        <img src="{{asset('public/dashboard/musician/tracks/images/'.$track->image)}}" class="img-responsive center-block"/>
                        <div class="mask">
                            <span class="play_icon">
                                <i class="fa fa-play fa-5x" aria-hidden="true"></i>
                                <span data-img="images/song_img_.png"
                                  data-Tname="Xscape"
                                  data-album="Insurgency" data-artis="Michael Jackson" data-rating="">
                              </span>
                          </span>
                      </div>
                  </a>
                  <p><a href="#">{{$track->name}}</a></p>
                  <p>{{$track->user_name}}</p>
              </div>
          </div>
          @endforeach
  </div>
  </div>

<div class="container">
  <div class="row border">
    <div class="col-md-6">

      <h1 class="left_heading">ARTISTS</h1>
    </div>
  </div>
</div>

  <div class="container">
  <div class="row">
    @foreach($artists as $artist)
    <div class="col-md-2 col-md-6 col-md-12 width_change">
      <a href="{{route('profile',['id'=>$artist->id])}}">
        @if($artist->image == null || $artist->image == 0)
          <div class="images_person"><img src="{{asset('public/dashboard/profile_images/Default-avatar.jpg')}}" class="img-responsive"></div>
        @elseif($artist->image != null)
          <div class="images_person"><img src="{{asset('public/dashboard/profile_images/'.$artist->image)}}" class="img-responsive"></div>
        @endif
      </a>
      <h3 class="artist">
        {{$artist->name}}
      </h3>

    </div>
    @endforeach
  </div>
</div>

@endsection