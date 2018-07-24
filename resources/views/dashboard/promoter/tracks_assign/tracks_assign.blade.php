@extends('layouts.promoter_index')
@section('content') 
	<div class="col-md-9">
  <h3 class="heading_dashboard">
      PROMOTER &nbsp; DASHBOARD
  </h3>
  <div class="border_red">
      <h3 class="album">
          MY &nbsp; INVITATIONS
      </h3>
  </div>
  <div class="row">
    <div class="col-md-12 color_bottom">
        <h3 class="all_album">
            
        </h3>
    </div>
  </div>  
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Musician Name</th>
                <th>Track Name</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($promoter_tracks as $value)
            <tr>
                <td>{{$value->musician_name}}</td>
                <td><a href="{{route('musicvoting_genre',['id' => $value->track_id])}}">{{$value->track_name}}</a></td>                                         
                <td>
                  @if($value->status == '0')
                    <a href="{{route('approve-status',['id'=>$value->id])}}" title="Click To DisApprove" class="btn btn-sm btn-danger">DisApproved</a>
                    @else
                    <a href="{{route('disapprove-status',['id'=>$value->id])}}" title="Click To Approve" class="btn btn-sm btn-success" >Approve</a>
                  @endif
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>

    </div>
  </div>
</div>	

@endsection
