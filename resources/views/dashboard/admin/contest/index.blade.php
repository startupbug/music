@extends('layouts.admin_index') 
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title pull-left">Contest List</h3>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{route('create_contest')}}">Create</a>
                </div>
            </div>
            @if (Session::has('success_msg'))
                <div class="alert alert-success">{{ Session::get('success_msg') }}</div>
            @endif
            @if (Session::has('error_msg'))
                <div class="alert alert-danger">{{ Session::get('error_msg') }}</div>
            @endif
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>                            
                            <th>Contest Type</th>                           
                            <th>Description</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contest as $value)
                        <tr>
                            <td>{{$value->name}}</td>
                            <td>{{$value->contest_type}}</td>
                            <td>{{$value->description}}</td>                           
                            <td>{{ date('d-m-Y', strtotime($value->start_date)) }}</td>                           
                            <td>{{ date('d-m-Y', strtotime($value->end_date)) }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
                                      <span class="caret"></span></button>
                                      <ul class="dropdown-menu">
                                        <li><a href="{{route('view_contest',['id'=>$value->id])}}">View</a></li>
                                        <li><a href="{{route('edit_contest',['id'=>$value->id])}}">Edit</a></li>
                                        <li><a href="{{route('delete_contest',['id'=>$value->id])}}">Delete</a></li>
                                        <li><a href="{{route('contest_participant',['id'=>$value->id])}}">Participants</a></li>
                                    </ul>
                                </div>
                            </td>
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