@extends('layouts.admin_index') 
@section('content')
      <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">               
              <div class="image-box">
                @if(!empty($view->contest_image) && isset($view->contest_image))
                <img src="{{asset('public/storage/contest_images/'.$view->contest_image) }}" style="height:160px; width:160px" class="profile-user-img img-responsive img-circle">
                @else
                <img src="{{asset('public/storage/contest_images/default1.jpg') }}" style="height:160px; width:160px" class="profile-user-img img-responsive img-circle">
                @endif              
              </div>  
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
              <li class="active"><a href="#settings"  data-toggle="tab" aria-expanded="true">Contest Information</a></li>
            </ul>
            <div class="tab-content">
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Contest Name:</label>
                    <div class="col-sm-10">
                     <p>{{$view->name}}</p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Contest Type:</label>
                    <div class="col-sm-10">
                     <p>{{$view->contest_type}}</p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPhone" class="col-sm-2 control-label">Description:</label>
                    <div class="col-sm-10">
                     <p>{{$view->description}}</p>
                    </div>
                  </div>                                 
                  <br>
                  <br>                  
                   <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                     <a class="btn btn-info" href="{{route('edit_contest',['id'=>$view->id])}}">
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