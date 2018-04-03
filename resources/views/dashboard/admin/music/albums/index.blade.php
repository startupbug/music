@extends('layouts.admin_index') 
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Albums List</h3>
            </div>
            @include('general_partials.error_section')
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Album Name</th>
                            <th>Album Tracks</th>
                            <th>Artist Name</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>                       
                        @foreach($index as $value)
                            <tr>
                                <td> <a href="{{route('album_view',['id'=>$value->id])}}">{{$value->album_name}}</a></td>                                                 
                                <td>@if(isset($total_tracks[$value->id])){{$total_tracks[$value->id]}}@else 0 @endif</td>
                                <td>{{$value->user_name}}</td>                      
                                <td>{{date('d-F-Y', strtotime($value->created_at))}}</td>
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