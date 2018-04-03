@extends('layouts.admin_index') 
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tracks List</h3>
            </div>
            @include('general_partials.error_section')
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Track Name</th>
                            <th style="width: 140px;">Artist Name</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Views</th>
                            <th>Status</th>
                            <th>Featured</th>
                            <th>Contest Participation</th>
                            <!-- <th style="text-align: center;">Action</th>                           -->
                        </tr>
                    </thead>
                    <tbody>                       
                        @foreach($index as $value)
                            <tr>
                                <td> <a href="{{route('musicvoting_genre',['id'=>$value->id])}}">{{$value->track_name}} </a></td>                                                 
                                <td>{{$value->user_name}}</td>                                                 
                                <td>{{$value->category_name}}</td>                                                 
                                <td>{{$value->description}}</td>  
                                <td>{{$value->view_count}}</td>                                                 
                                <td>
                                    @if($value->status == '1')
                                    <a class="btn-xs btn-success" href="{{route('unblock-track',['id'=>$value->id])}}" title="Click To Unblocked This Track">Blocked</a>
                                    @else
                                    <a class="btn-xs btn-danger" href="{{route('block-track',['id'=>$value->id])}}" title="Click To Block This Track">Unblocked</a>
                                    @endif
                                </td>                                                
                                <td style="width: 100px;">
                                    @if($value->featured == '1')
                                    <a class="btn-xs btn-success" href="{{route('disapprove-admin-featured',['id'=>$value->id])}}" title="Click To UnFeatured This Track">Featured</a>
                                    @else
                                    <a class="btn-xs btn-danger" href="{{route('approve-admin-featured',['id'=>$value->id])}}" title="Click To Featured This Track">Not Featured</a>
                                    @endif
                                </td>                                                 
                                <td style="width: 140px;">
                                    @if($value->contest == '0')
                                    <a class="btn-xs btn-danger" href="">Rejected</a>
                                    @else
                                    <a class="btn-xs btn-success" href="">Accepted</a>
                                    @endif
                                </td>                                               
                               <!--  <td style="text-align: center;">
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
                                          <span class="caret"></span></button>
                                          <ul class="dropdown-menu">
                                            <li><a href="">Edit</a></li>                                           
                                        </ul>
                                    </div>
                                </td> -->
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