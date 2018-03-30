@extends('layouts.public_index')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="input-group" id="adv-search">
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="tab-content custom-tab-content">
    <div>
      <div class="tab-content">
        <div role="tabpanel" class= "tab-pane fade in active" id="home">
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-3">
                <div class="genre s_genre">
                  <img src="{{asset('public/dashboard/musician/tracks/images/'.$track_video->image)}}" class="img-responsive">
                </div>
              </div>
              <div class="col-md-9 s_padding_genre">
                <h3 class="top_heading">
                  {{$track_video->name}} by {{$track_uploader->name}}
                </h3>
                <h3 class="mid_heading">
                  {{$track_video->description}}
                </h3>
              </div>
              <div class="col-md-12">
                <video id="videoz" width="100%" style="height: auto;" controls controlsList="nodownload">
                  @if(Auth::check())
                  <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                  <input type="hidden" name="track_id" id="track_id" value="{{$track_video->id}}">
                  @endif
                  @if(isset($track_video->video))
                  <source src="{{asset('public//dashboard/musician/tracks/videos/'.$track_video->video)}}" type="video/mp4">
                    @endif
                    <source src="mov_bbb.ogg" type="video/ogg">
                      Your browser does not support HTML5 video.
                    </video>
                    @if(Auth::check())
                    <form action="{{route('download_file',['file_name'=>$track_video->video,'track_id'=>$track_video->id ])}}" method="post">
                      {{csrf_field()}}
                      <input type="hidden" name="promoter_id" value="@if(!empty($name)){{ $name }}@endif">
                      <div class="button_comment pull-right">
                        <button type="submit" class="btn">Download</button>
                      </div>
                    </form>
                    @endif
                  </div>
                  <div class="col-md-12">
                    <div id="social"> </div>
                  </div>
                  <h3 class="rating">Rating:</h3>
                  <form  action="{{route('submit_rating')}}" method="post" id="rating-form">
                    <span class="rating" id="star_rating_submit">
                      <span class="fa fa-star-o" data-rating="1" ></span>
                      <span class="fa fa-star-o" data-rating="2"></span>
                      <span class="fa fa-star-o" data-rating="3"></span>
                      <span class="fa fa-star-o" data-rating="4"></span>
                      <span class="fa fa-star-o" data-rating="5"></span>
                      @if(!empty($rating->rating))
                      <input type="hidden" name="rating_no" id="rating_no" class="rating-value" value="{{$rating['rating']}}">
                      @else
                      <input type="hidden" name="rating_no" id="rating_no" class="rating-value" value="">
                      @endif
                      <input type="hidden" name="promoter_id" class="promoter_id" id="promoter_id" value="@if(!empty($name)){{ $name }}@endif">
                      <input type="hidden" name="musician_id" class="musician_id" id="musician_id" value="{{$track_uploader->id}}">
                      <input type="hidden" name="track_id" id="track_id" value="{{$track_video->id}}">
                    </span>
                  </form>
                  <div class="col-md-12 border">
                    <form action="{{route('insert_comments', ['id' => $track_video->id])}}" method="post">
                      {{csrf_field()}}
                      <div class="comment-wrap">
                        <div class="photo">
                          @if((Auth::check()))
                          <div class="avatar">
                            <img src="{{asset('public/dashboard/profile_images/'.Auth::user()->image)}}">
                          </div>
                          @else
                          <div class="avatar">
                            <img src="{{asset('public/dashboard/profile_images/Default-avatar.jpg')}}">
                          </div>
                          @endif
                        </div>
                        <div class="comment-block">
                          <textarea name="comment" id="comment" cols="30" rows="3" placeholder="Write a comment"></textarea>
                        </div>
                      </div>
                      @if(Auth::check())
                        <div class="button_comment">
                          <button type="submit" class="btn">POST</button>
                        </div>
                      @else
                        <div class="button_comment">
                          <button type="submit" class="btn" data-toggle="modal" data-target="#myLoginModal">POST</button>
                        </div>
                      @endif
                    </form>

                    @foreach($commenting as $comment)
                    <div class="comment-wrap">
                      <div class="photo">
                        <div class="avatar">
                          <img src="{{asset('public/dashboard/profile_images/'.$comment->image)}}">
                        </div>
                      </div>
                      <div class="comment-block">
                        <p class="comment-text">{{$comment->comment}}</p>
                        <p>#GoMusic #Rock</p>
                      </div>
                    </div>
                    @endforeach
                    <div class="comment-wrap">
                      <div class="photo">
                        <div class="avatar">
                          <img src="{{asset('public/assets/images/com_img.png')}}">
                        </div>
                      </div>
                      <div class="comment-block">
                        <p class="comment-text">Okayish... Heard Better</p>
                      </div>
                    </div>
                    <div class="comment-wrap">
                      <div class="photo">
                        <div class="avatar">
                          <img src="{{asset('public/assets/images/comment_image.png')}}">
                        </div>
                      </div>
                      <div class="comment-block">
                        <p class="comment-text">Wow! Blown away, Strong performance
                        welldone!</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <h3 class="side_menu">
                  TRACKS BY {{$track_uploader->name}}
                </h3>
                @foreach($albums_tracks as $albums => $tracks )
                  <ul class="nav1">
                    <li><a class="s_pointer">{{$albums}}</a>
                      <ul class="s_nav_sub">
                        @foreach($tracks as $track)
                        <li><a href="{{route('musicvoting_genre',['id' => $track->track_id])}}">{{$track->name}}</a></li>
                        @endforeach
                      </ul>
                    </li>
                  </ul>
                @endforeach
              </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="messages">
              <h2>Tab 2</h2>
              <p>
               Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
             </p>
           </div>
           <div role="tabpanel" class="tab-pane fade" id="settings">
            <h2>Tab 3</h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="test5">
            <h2>Tab 5</h2>
            <p>
             Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
           </p>
         </div>
       </div>
     </div>
   </div>
 </div>
 @endsection
