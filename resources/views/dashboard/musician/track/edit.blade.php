@extends('layouts.dashboard_index')
@section('content')
  <div class="col-md-9">
    <h3 class="heading_dashboard">
        ARTIST &nbsp; DASHBOARD
    </h3>
    <div class="border_red">
        <h3 class="album">
            MY &nbsp; ALBUMS
        </h3>
    </div>
    <div class="row">
      <div class="col-md-10 color_bottom">
          <h3 class="all_album">
              {{$edit_track->name}}
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
              <li><a href="{{route('delete_track',['id' => $edit_track->id])}}">Delete</a></li>
              <li><a data-toggle="modal" data-target="#selectPromoter">Assign Promoter</a></li>  
            </ul>
          </div>
      </div>
    </div>
    <hr class="line">
    <div class="row">
      <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="dashboard_album">
          <img src="{{asset('public/dashboard/musician/tracks/images/'.$edit_track->image)}}" width="100%" class="img-thumbnail">
        </div>
      </div>
     <!--  <div class="col-md-5 col-sm-12 col-xs-12">
         <div class="header">
              <h1>Lorem Ipsum</h1>
              <h4>Web Developer</h4>
              <span>ALBUM Count</span>
         </div>
      </div> -->
      <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="dashboard_album">
            <video width="100%" controls>
              <source src="{{asset('public/dashboard/musician/tracks/videos/'.$edit_track->video)}}" type="video/mp4">              
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
     @if(count($errors))
        <div class="form-group">
         <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $erroring)
                  <li>{{$erroring}}  </li>
                  @endforeach
            </ul>
          </div>
        </div>
        @endif 
  </div>
  <div class="container">
    <!-- Edit Album Modal -->
    <div class="modal fade" id="EditTrackModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>UPDATE &nbsp; TRACk</b></h4>
          </div>
          <div class="modal-body">
            <form class="" action="{{route('update_track',['id'=>$edit_track->id])}}" enctype="multipart/form-data" method="POST">
              {{csrf_field()}}
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <h4><b>TRACK &nbsp; NAME</b></h4>
                  <input type="text" name="name" value="{{$edit_track->name}}" class="form-control">
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <h4><b>Select &nbsp; IMAGE</b></h4>
                  <div class="input-group">
                    <input type="text" class="form-control" readonly>
                    <label class="input-group-btn label_cus">
                        <span class="btn btn-primary">SELECT IMAGE
                          <input type="file" name="image" style="display: none; ">
                        </span>
                    </label>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <h4><b>Select VIDEO</b></h4>
                  <div class="input-group">
                    <input type="text" class="form-control" readonly>
                    <label class="input-group-btn label_cus">
                        <span class="btn btn-primary">SELECT VIDEO
                          <input type="file" name="video" style="display: none;" >
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

    <div class="modal fade" id="selectPromoter" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>UPDATE &nbsp; TRACk</b></h4>
          </div>
          <div class="modal-body">
            <form class="" action="{{route('assign_promoter')}}" method="POST">
              <input type="hidden" name="track_id" value="{{$edit_track->id}}">
              {{csrf_field()}}
              <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <h4><b>Promoter Email</b></h4>
               <input list="browsers" name="promoter_email" class="form-control">
                <datalist id="browsers">
                  @foreach($users as $user)
                  <option value="{{$user->email}}"></option>                  
                  @endforeach
                </datalist>  
                  <!-- <input type="text" class="form-control"> -->
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
