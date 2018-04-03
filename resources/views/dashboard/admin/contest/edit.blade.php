@extends('layouts.admin_index') 
@section('content')
<div class="row">
  <!-- /.col -->
  <div class="col-md-12">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#settings" data-toggle="tab">Edit Contest</a></li>
      </ul>
      <div class="tab-content">       
        <!-- /.tab-pane -->
        <div class="tab-pane active" id="settings">
          <form class="form-horizontal" action="{{route('update_contest',['id'=>$edit->id])}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Name</label>
              <div class="col-sm-10">
                <input type="text" name="name" value="{{$edit->name}}" class="form-control"  placeholder="Category Name">
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Description</label>
              <div class="col-sm-10">
                <input type="text" name="description" value="{{$edit->description}}" class="form-control"  placeholder="Description">
              </div>
            </div>  
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Contest Title</label>
              <div class="col-sm-10">
                <select name="contest_type" class="form-control">
                  <option disabled="" selected="">Select Contest Type</option>
                  <option value="1" {{ $edit->contest_type == '1' ? 'selected' : ''  }}>Daily</option>
                  <option value="2" {{ $edit->contest_type == '2' ? 'selected' : ''  }}>Weekly</option>
                  <option value="3" {{ $edit->contest_type == '3' ? 'selected' : ''  }}>Monthly</option>
                </select>
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