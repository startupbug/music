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
              ALBUM NAME
          </h3>
      </div>
      <div class="col-md-2 color_bottom">
          <div class="btn-group" style="margin-top:32px">
            <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="quant[1]">
              <span class="glyphicon glyphicon-pencil" style="color:#fff"></span>
            </button>
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
              Action <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a data-toggle="modal" data-target="#EditTrackModal">Edit</a></li>
              <li><a href="#">Delete</a></li>
            </ul>
          </div>
      </div>
    </div>
    <hr class="line">
    <div class="row">
      <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="dashboard_album">
          <img src="./assets/images/album_one.png" width="100%" class="img-thumbnail">
        </div>
      </div>
      <div class="col-md-5 col-sm-12 col-xs-12">
         <div class="header">
              <h1>Lorem Ipsum</h1>
              <h4>Web Developer</h4>
              <span>ALBUM Count</span>
         </div>
      </div>
      <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="dashboard_album">
            <video width="100%" controls>
              <source src="movie.mp4" type="video/mp4">
              <source src="movie.ogg" type="video/ogg">
              Your browser does not support the video tag.
            </video>
            <div class="dropdownmenu">
              <div class="middle"><i class="fa fa-ellipsis-v"></i></div>
              <div class="dropdown-content">
                <a href="#">Edit</a>
                <a href="#">Delete</a>
                <a href="#">Delete From Album</a>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>

  <div class="container">
    <!-- Edit Album Modal -->
    <div class="modal fade" id="EditTrackModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>UPDATE TRACk</b></h4>
          </div>
          <div class="modal-body">
            <form class="" action="#" method="post">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <h4><b>TRACK NAME</b></h4>
                  <input type="text" class="form-control">
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <h4><b>Select IMAGE</b></h4>
                  <div class="input-group">
                    <input type="text" class="form-control" readonly>
                    <label class="input-group-btn label_cus">
                        <span class="btn btn-primary">SELECT IMAGE<input type="file" style="display: none;" multiple>
                        </span>
                    </label>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <h4><b>Select VIDEO</b></h4>
                  <div class="input-group">
                    <input type="text" class="form-control" readonly>
                    <label class="input-group-btn label_cus">
                        <span class="btn btn-primary">SELECT VIDEO<input type="file" style="display: none;" multiple>
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
  </div>
@endsection

<!-- Include the plugin's CSS and JS: -->
