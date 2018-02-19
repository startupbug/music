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
              {{$edit_album->name}}
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
              <li><a data-toggle="modal" data-target="#EditAlbumModal">Edit</a></li>
              <li><a href="{{route('delete_album',['id'=>$edit_album->id])}}">Delete</a></li>
            </ul>
          </div>
      </div>
    </div>
    <hr class="line">
    <div class="row">
      <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="dashboard_album">
            <img src="{{asset('/dashboard/musician/albums/images/'.$edit_album->image)}}" width="100%" class="img-thumbnail">
        </div>
      </div>
      <!-- <div class="col-md-6 col-sm-12 col-xs-12">
         <div class="header">
              <h1>Lorem Ipsum</h1>
              <h4>Web Developer</h4>
              <span>ALBUM Count</span>
         </div>
      </div> -->
    </div>
    <div class="row">
      <div class="col-md-10 color_bottom">
        <h3 class="all_album">
            ALL VIDEOS &nbsp
        </h3>
      </div>
      <div class="col-md-2 color_bottom">
        <div class="btn-group"  style="margin-top:32px">
          <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="quant[1]">
            <span class="glyphicon glyphicon-pencil" style="color:#fff"></span>
          </button>
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            Action <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a data-toggle="modal" data-target="#AddVideoModal">Add Video</a></li>
            <li><a data-toggle="modal" data-target="#UploadVideoModal">Upload Video</a></li>
          </ul>
        </div>
      </div>
    </div>
    <hr class="line">
    <div class="row">
      @foreach($all_videos as $value)
      <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="dashboard_album">
            <video width="100%" height="160px" controls>
              <source src="{{asset('/dashboard/musician/tracks/videos/'.$value->video)}}" type="video/mp4">             
            </video>
            <div class="dropdownmenu">
              <div class="middle"><i class="fa fa-ellipsis-v"></i></div>
              <div class="dropdown-content">
                <input type="hidden" name="id" value="{{$value->id}}">
                <a data-toggle="modal" data-target="#EditVideoModal{{$value->id}}">Edit</a>
                <a href="{{route('delete_track',['id'=>$value->id])}}">Delete</a>                               
                <a href="{{route('delete_from_album',['album_id'=>$edit_album->id,'track_id'=>$value->id])}}">Delete From Album</a>
              </div>
            </div>
            <h3 class="album_person_name">
      				{{$value->name}}
      			</h3>
          </div>
      </div>
      <div class="modal fade" id="EditVideoModal{{$value->id}}" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>ADD VIDEO</b></h4>
          </div>
          <div class="modal-body">
            <form action="{{route('update_video',['id'=>$value->id])}}" enctype="multipart/form-data" method="post" >   
            {{csrf_field()}}       
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <input type="hidden" name="track_id" value="{{$value->id}}">
                  <h4><b>EDIT VIDEO</b></h4>
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
                  <button type="submit" name="button" class="btn btn-primary" style="width:100%">SUBMIT</button>
                </div>
              </div>
            </form>
            <br>
          </div>
        </div>
      </div>
    </div>    
      @endforeach   
    </div>  
    <div class="button_dashboard"><button type="button" class="btn">LOAD MORE</button></div>
  </div>
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
            <form class="" action="{{route('update_album',['id' => $edit_album->id ])}}" enctype="multipart/form-data" method="post">
              {{csrf_field()}}
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <h4><b>ALBUM NAME</b></h4>
                  <input type="text" name="name" value="{{$edit_album->name}}" class="form-control">
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
            <form class="" action="{{route('add_video')}}" method="post">
              {{csrf_field()}}
              <input type="hidden" name="album_id" value="{{$edit_album->id}}">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <h4><b>TITLE</b></h4>
                  <select name="video_id" id="example-getting-started" class="form-control">
                      @foreach($videos as $video)
                      <option value="{{$video->id}}">{{$video->name}}</option>
                      @endforeach                      
                  </select>
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
      <!-- Edit Video Modal -->
    <!-- Upload Video Modal -->
    <div class="modal fade" id="UploadVideoModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>UPLOAD VIDEO</b></h4>
          </div>
          <div class="modal-body">
            <form class="" action="{{route('upload_video')}}" enctype="multipart/form-data" method="post">
              {{csrf_field()}}
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <h4><b>TITLE</b></h4>
                  <input type="text" name="name" class="form-control">
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <h4><b>DESCRIPTION</b></h4>
                  <input type="text" name="description" class="form-control">
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                      <h3>CATEGORY</h3>                         
                       <select class="form-control" name="category">
                         @foreach($categories as $category)
                         <option value="{{$category->id}}">{{$category->name}}</option>     
                         @endforeach
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
                <input type="hidden"  name="album_id" value="{{$edit_album->id}}">
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