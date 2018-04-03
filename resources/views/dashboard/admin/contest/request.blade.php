@extends('layouts.admin_index') 
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Contest List</h3>
            </div>
            @include('general_partials.error_section')            
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Contest Name</th>
                            <th>Artist Name</th>                           
                            <th>Track Name</th>                            
                            <th>Request Status</th>                                                        
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($participants as $value)
                        <tr>
                            <td>{{$value->contest_name}}</td>
                            <td>{{$value->user_name}}</td>
                            <td>{{$value->track_name}}</td> 
                            <td>
                                @if($value->status == '0')
                                    <a class="btn-xs btn-danger" href="{{route('accept-request',['id'=>$value->id])}}" title="Accept This Request">Rejected</a>
                                @else
                                    <a class="btn-xs btn-success" href="{{route('reject-request',['id'=>$value->id])}}" title="Reject This Request">Accepted</a>
                                @endif
                            </td>                            
                        </tr>
                        @endforeach                           
                    </tbody>
                </table>
                <div class="s_button">
                    <a class="btn btn-primary" href="{{route('create_contest')}}">Create</a>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
@endsection