@extends('layouts.admin_index') 
@section('content')
      <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <div class="image-box">
                  <img src="{{asset('public/dashboard/profile_images/' . Auth::user()->image)}}" style="height:100%" class="img-responsive">
                  <form action="{{route('AdminImageUpload')}}" method="post" enctype="multipart/form-data" id="change_admin_profile_pic">
                        <input name="_token" value="{{csrf_token()}}" type="hidden">
                  <div class="camera_image">
                    <i class="fa fa-camera fa-2x" aria-hidden="true"></i>
                    <input name="image" id="change_admin_profile_pic" type="file">
                  </div>
                </form>
              </div><!-- 
              <img class="profile-user-img img-responsive img-circle" src="{{asset('public/admin_assets/profile_images/' . Auth::user()->image)}}" alt="User profile picture"> -->  
              <!-- <input type="file" name="">              -->
              <h3 class="profile-username text-center">{{Auth::user()->username}}</h3>
              <p class="text-muted text-center">{{Auth::user()->name}}</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!-- About Me Box -->          
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#settings"  data-toggle="tab" aria-expanded="true">User Information</a></li>
            </ul>
            <div class="tab-content">
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name:</label>
                    <div class="col-sm-10">
                     <p>{{Auth::user()->username}}</p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email:</label>

                    <div class="col-sm-10">
                     <a href="">{{Auth::user()->email}}</a>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPhone" class="col-sm-2 control-label">Phone:</label>

                    <div class="col-sm-10">
                     <p>{{Auth::user()->phone}}</p>
                    </div>
                  </div>               
                  <div class="form-group">
                    <label for="inputStatus" class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10">
                     <p>Admin</p>
                    </div>
                  </div>                 
                   <div class="form-group">
                    <label for="inputPhone" class="col-sm-2 control-label">Instagram:</label>

                    <div class="col-sm-10">
                     <a href="{{'http://' . Auth::user()->instagram}}" target="_blank">{{Auth::user()->instagram}}</a>	
                    </div>
                  </div> 
                  <div class="form-group">
                    <label for="inputPhone" class="col-sm-2 control-label">Facebook:</label>
                    <div class="col-sm-10">                     
                     <a href="{{'http://' . Auth::user()->facebook}}" target="_blank">{{Auth::user()->facebook}}</a>	
                    </div>
                  </div> 
                  <div class="form-group">
                    <label for="inputPhone" class="col-sm-2 control-label">Twitter:</label>
                    <div class="col-sm-10">
                     <a href="{{'http://' . Auth::user()->twitter}}" target="_blank">{{Auth::user()->twitter}}</a>
                    </div>
                  </div>
                  <br>
                  <br>                  
                   <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                     <a class="btn btn-info" href="{{route('edit_admin',['id'=>Auth::user()->id])}}">
                       Edit Profile</a>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
@endsection