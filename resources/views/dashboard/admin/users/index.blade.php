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
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>User Type</th>                          
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $value)
                        <tr>
                            <td>{{$value->name}}</td>
                            <td>{{$value->username}}</td>
                            <td>{{$value->email}}</td>
                            <td>{{$value->phone}}</td>
                            <td>{{$value->role_name}}</td>                           
                            <td>
                                @if($value->suspend == '0')
                                <a class="btn-xs btn-success" href="{{route('suspend-user',['id'=>$value->id])}}" title="Suspend This User">Suspend</a>
                                @else
                                <a class="btn-xs btn-danger" href="{{route('unsuspend-user',['id'=>$value->id])}}" title="UnSuspend This User">Suspended</a>
                                @endif
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
                                      <span class="caret"></span></button>
                                      <ul class="dropdown-menu">
                                        <li><a href="{{route('edit_user_profile',['id'=>$value->id])}}">Edit</a></li>
                                        <li><a href="{{route('view_user_profile',['id'=>$value->id])}}">View</a></li>
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