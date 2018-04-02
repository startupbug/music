@extends('layouts.admin_index')
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Users List</h3>
            </div>
            @include('general_partials.error_section')
            <!-- /.box-header -->            
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($category as $value)
                        <tr>
                            <td>{{$value->name}}</td>                           
                            <td>{{$value->description}}</td>                            
                            <td style="text-align: center;">
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
                                    <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
	                                    <li><a href="{{route('edit_category',['id'=>$value->id])}}">Edit</a></li>
	                                    <li><a href="{{route('delete_category',['id'=>$value->id])}}">Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach                           
                    </tbody>
                </table> 
                <div class="s_button">
            <a class="btn btn-primary" href="{{route('create_category')}}">Create</a>
            </div>               
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
@endsection