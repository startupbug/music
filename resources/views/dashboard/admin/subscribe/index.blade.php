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
                <table id="example22" class="display table table-bordered table-striped" style="width:100%">
                    <thead>
                        <tr>                                                       
                            <th>Subscriber Email Address</th>  
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subscribers as $value)
                        <tr>
                            <td>{{$value->email}}</td> 
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