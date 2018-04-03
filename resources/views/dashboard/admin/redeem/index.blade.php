@extends('layouts.admin_index') 
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Users List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Points</th>                            
                            <th>Status</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($redeemed_points as $value)
                        <tr>
                            <td>{{$value->name}}</td>
                            <td>{{$value->username}}</td>
                            <td>{{$value->email}}</td>
                            <td>{{$value->phone}}</td>
                            <td>{{$value->redeemed_point}}</td>                            
                            <td>
                                @if($value->status == '1')
                                <a class="btn-xs btn-success" href="{{route('reject-redeem-request',['id'=>$value->id])}}" title="Reject This Request">Accepted</a>
                                @else
                                <a class="btn-xs btn-danger" href="{{route('accept-redeem-request',['id'=>$value->id])}}" title="Accept This Request">Rejected</a>
                                @endif
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