@extends('layouts.public_index')
@section('content')
 @if (Session::has('upload_video_album'))
    <div class="alert alert-info">{{ Session::get('upload_video_album') }}</div>
    @endif


  <div class="col-md-12">

    <div class="row">
      <div class="col-md-10">
        <h3 class="all_album">
            ALBUM &nbsp;
        </h3>
      </div>
    </div>
    <hr class="line">
    <div class="row">
      <div class="col-md-9">
        <div class="row">
          <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="dashboard_album">
                <img src="{{asset('public//dashboard/musician/albums/images/'.$albums->image)}}" class="img-thumbnail" width="100%">
            </div>
            <h3 class="album_person_name">
              {{$albums->name}}
            </h3>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-10">
        <h3 class="all_album">
            ALL VIDEOS &nbsp;
        </h3>
      </div>
    </div>
    <hr class="line">
    <div class="row">
      @foreach($album_tracks as $tracks)
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard_album">
          <!-- Start Audio Tag -->
          <div class="custom_thumbnail">
            <div class="songs_box image_thumbnail">
              <a>
                <img class="" src="https://www.w3schools.com/howto/img_forest.jpg" class="img-responsive center-block" width="100%" >
                <div class="mask s_mask">
                  <span class="play_icon">
                    <i class="fa fa-play fa-5x" aria-hidden="true" style="margin-top: 18%;"></i>
                  </span>
                </div>
              </a>
            </div>
            <audio  class="audio_thumbnail" controls>
                <source src="horse.ogg" type="audio/ogg">
                <source src="http://www.jplayer.org/audio/m4a/Miaow-07-Bubble.m4a" type="audio/mpeg">
              Your browser does not support the audio element.
            </audio>
          </div>
          <!-- End Audio Tag -->


          <!-- <a href="http://localhost/music-a1/musicvoting_genre/25"> -->
          <video controls="" width="100%" height="245px">
            <source src="{{asset('public/dashboard/musician/tracks/videos/'.$tracks->track_video)}}" type="video/mp4">
          </video>
          <!-- </a> -->
          <h3 class="album_person_name">
            {{$tracks->track_name}}
          </h3>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  <br>
  <div class="container">
    <!-- Edit Album Modal -->
    <div class="modal fade" id="EditAlbumModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>UPDATE ALBUM</b></h4>
          </div>
          <div class="modal-body">
            <form class="" action="" enctype="multipart/form-data" method="post">
              {{csrf_field()}}
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <h4><b>ALBUM NAME</b></h4>
                  <input type="text" name="name" value="" class="form-control" required>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <h4><b>ALBUM IMAGE</b></h4>
                  <div class="input-group">
                    <input type="text" class="form-control" readonly>
                    <label class="input-group-btn label_cus">
                        <span class="btn btn-primary">SELECT IMAGE
                          <input type="file" name="image" style="display: none;">
                        </span>
                    </label>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <button type="submit" name="button" class="btn btn-primary" style="width:100%">SUBMIT</button>
                </div>
              </div>
            </form>
            <br>
          </div>
        </div>
      </div>
    </div>
    <!-- Add Video Modal -->
    <div class="modal fade" id="AddVideoModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>ADD VIDEO</b></h4>
          </div>
          <div class="modal-body">
            <form class="" action="" method="post">
              {{csrf_field()}}
              <input type="hidden" name="album_id" value="">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <h4><b>TITLE</b></h4>
                  <select name="video_id" id="example-getting-started" class="form-control">
                      <!-- foreach -->
                      <option value="">video name</option>
                      <!-- endforeach                       -->
                  </select>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <button type="submit" name="button" class="btn btn-primary" style="width:100%">SUBMIT</button>
                </div>
              </div>
            </form>
            <br>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="UploadVideoModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>UPLOAD VIDEO</b></h4>
          </div>
          <div class="modal-body">
            <form class="" action="" enctype="multipart/form-data" method="post">
              {{csrf_field()}}
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <h4><b>TITLE</b></h4>
                  <input type="text" name="name" class="form-control" required>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <h4><b>DESCRIPTION</b></h4>
                  <input type="text" name="description" class="form-control" required>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                      <h3>CATEGORY</h3>
                       <select class="form-control" name="category">
                         <!-- foreach -->
                         <option value=""><!-- category name --> </option>
                         <!-- endforeach -->
                       </select>
                  </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <h4><b>VIDEO</b></h4>
                  <div class="input-group">
                    <input type="text" class="form-control" readonly>
                    <label class="input-group-btn label_cus">
                        <span class="btn btn-primary">SELECT VIDEO
                          <input type="file" name="video" style="display: none;">
                        </span>
                    </label>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <h4><b>IMAGE</b></h4>
                  <div class="input-group">
                    <input type="text" class="form-control" readonly>
                    <label class="input-group-btn label_cus">
                        <span class="btn btn-primary">SELECT IMAGE
                          <input type="file" name="image" style="display: none;">
                        </span>
                    </label>
                  </div>
                </div>
                <input type="hidden"  name="album_id" value="">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <button type="submit" name="button" class="btn btn-primary" style="width:100%">SUBMIT</button>
                </div>
              </div>
            </form>
            <br>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
