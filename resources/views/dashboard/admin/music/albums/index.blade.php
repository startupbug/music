@extends('layouts.admin_index') 
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Albums List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Album Name</th>
                            <th>Artist Name</th>
                        </tr>
                    </thead>
                    <tbody>                       
                        @foreach($index as $value)
                            <tr>
                                <td>{{$value->album_name}}</td>                                                 
                                <td>{{$value->user_name}}</td>                                                                                
                            </tr>
                        @endforeach                                                  
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
@endsection