@extends('layouts.admin_index') 
@section('content')
<div class="row">
  <!-- /.col -->
  <div class="col-md-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#settings" data-toggle="tab">Category Information</a></li>
      </ul>
      <div class="tab-content">       
        <!-- /.tab-pane -->
        <div class="tab-pane active" id="settings">
          <form class="form-horizontal" action="{{route('create_new_contest')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Contest Title</label>
              <div class="col-sm-10">
                <input type="text" name="name" value="" class="form-control"  placeholder="Contest Title">
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Contest Description</label>
              <div class="col-sm-10">
                <input type="text" name="description" value="" class="form-control"  placeholder="Contest Description">
              </div>
            </div> 
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Start Date</label>
              <div class="col-sm-10">
                <div class='input-group date col-md-8' id='datetimepicker1'>
                    <input type='text' class="form-control" name="start_date" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
              </div>
            </div> 
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">End Date</label>
              <div class="col-sm-10">
                <div class='input-group date col-md-8' id='datetimepicker2'>
                    <input type='text' class="form-control" name="end_date" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
              </div>
            </div>                      
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Contest Type</label>
              <div class="col-sm-10">
                <select name="contest_type" class="form-control">
                  <option disabled="" selected="">Select Contest Type</option>
                  <option value="1">Daily</option>
                  <option value="2">Weekly</option>
                  <option value="3">Monthly</option>
                </select>
              </div>
            </div>
            <div class="form-group">
                <label for="inputCountry" class="col-sm-2 control-label">Contest Image</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="file" name="contest_image" class="filePath" data-class="img1">
                        </div>
                        <div class="col-sm-6">
                            <a href="" class="img1" download>
                                <img src="" class="img1" width="50px"/>
                                <span class="img1" style="display:none; color:#FF0000;">
                                File Download
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-danger">Submit</button>
                <a href="" class="btn btn-danger">Cancel</a>
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