@extends('layouts.admin_index') 
@section('content')
<div class="row">
   @include('general_partials.error_section')      
  <!-- /.col -->
  <div class="col-md-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#settings" data-toggle="tab">User Information</a></li>
        <li class=""><a href="#settings2" data-toggle="tab">Update Password</a></li>
      </ul>
      <div class="tab-content">       
        <!-- /.tab-pane -->
        <div class="tab-pane active" id="settings">
          <form class="form-horizontal" action="{{route('update_admin_profile',['id'=>Auth::user()->id])}}" method="post">
            {{csrf_field()}}
              <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Name</label>
              <div class="col-sm-10">
                <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control"  placeholder="Name">
              </div>
              </div>
              <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">User Name</label>
              <div class="col-sm-10">
                <input type="text" name="username" value="{{Auth::user()->username}}" class="form-control"  placeholder="User Name">
              </div>
              </div>
              <div class="form-group">
              <label for="inputEmail" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control" placeholder="Email">
              </div>
              </div>
              <div class="form-group">
              <label for="inputPhone" class="col-sm-2 control-label">Phone</label>
              <div class="col-sm-10">
                <input type="number" name="phone" value="{{Auth::user()->phone}}" class="form-control"  placeholder="Phone">
              </div>
              </div>
              <div class="form-group">
              <label for="inputStatus" class="col-sm-2 control-label">Status</label>
              <div class="col-sm-10">
                <input type="" class="form-control"  value="ADMIN" readonly>
              </div>
              </div>    
              <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Instagram</label>
              <div class="col-sm-10">
                <input type="text" name="instagram" value="{{Auth::user()->instagram}}" class="form-control"  placeholder="Instagram">
              </div>
              </div>
              <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Facebook</label>
              <div class="col-sm-10">
                <input type="text" name="facebook" value="{{Auth::user()->facebook}}" class="form-control"  placeholder="Facebook">
              </div>
              </div>
              <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Twitter</label>
              <div class="col-sm-10">
                <input type="text" name="twitter" value="{{Auth::user()->twitter}}" class="form-control"  placeholder="Twitter">
              </div>
              </div>
              <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-danger">Submit</button>
                <a href="{{route('profile_view')}}" class="btn btn-danger">Cancel</a>
              </div>
              </div>
          </form>
        </div>  
        <div class="tab-pane" id="settings2">
          <form class="form-horizontal" action="{{route('admin_update_password')}}" method="post">
            {{csrf_field()}}             
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Old Password</label>
                <div class="col-sm-10">
                  <input type="password" name="old_password" value="" class="form-control"  placeholder="Old Password">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">New Password</label>
                <div class="col-sm-10">
                  <input type="password" name="password" value="" class="form-control" placeholder="New Password">
                </div>
              </div>
              <div class="form-group">
                <label for="inputPhone" class="col-sm-2 control-label">Confirm Password</label>
                <div class="col-sm-10">
                  <input type="password" name="password_confirmation" value="" class="form-control"  placeholder="Confirm Password">
                </div>
              </div>              
              <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-danger">Submit</button>
                <a href="{{route('profile_view')}}" class="btn btn-danger">Cancel</a>
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