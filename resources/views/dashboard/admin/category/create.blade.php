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
          <form class="form-horizontal" action="{{route('create_new_category')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Category Name</label>
              <div class="col-sm-10">
                <input type="text" name="name" value="" class="form-control"  placeholder="Name">
              </div>
            </div>
             <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Category Description</label>
              <div class="col-sm-10">
                <input type="text" name="description" value="" class="form-control"  placeholder="Description">
              </div>
            </div>          
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-danger">Submit</button>
                <a href="{{route('categories')}}" class="btn btn-danger">Cancel</a>
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