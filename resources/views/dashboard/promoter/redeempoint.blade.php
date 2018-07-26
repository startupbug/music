@extends('layouts.promoter_index')
@section('content')
 <div class="col-md-9">
        <h3 class="heading_dashboard">
         PROMOTER &nbsp; DASHBOARD
     </h3>
     <div class="border_red">
        <h3 class="album">
            OVERVIEW
        </h3>
    </div>
    @if (Session::has('redeem'))
            <div class="alert alert-info">{{ Session::get('redeem') }}</div>
        @endif
    @if (Session::has('not_redeem'))
        <div class="alert alert-danger">{{ Session::get('not_redeem') }}</div>
    @endif
    <div class="row">
        <div class="col-md-12 color_bottom">
            <h3 class="all_album">
               EARNED &nbsp; POINTS
            </h3>
          </div>
</div>
    <hr class="line">
 <div class="row">
        <div class="col-md-12 color_bottom">
            <h3 class="all_album">
                POINTS &nbsp; REDEEMED
            </h3>
      </div>
    </div>
    <hr class="line">
    <div class="row">
     <div class="col-md-6">
     	<div class="top_redeem">
    	<ul class="redeem">
    		<li class="redeem_point_one">POINTS &nbsp; EARNED:</li>
    		<li class="redeem_points">{{$total_points}}</li>
    	</ul>
    	<ul class="redeem">
    		<li class="redeem_point">POINTS &nbsp; REDEEMED:</li>
    		<li class="redeem_point">{{$total_redeemed_points}}</li>
    	</ul>
    	<ul class="redeem">
    		<li class="redeem_points">REDEEMABLE:</li>
    		<li class="redeem_points">{{$redeemable_points}}</li>
    	</ul>
    </div>
</div>
<div class="col-md-6">
	<div class="">
	<form action="{{route('promoter_redeemed_request')}}" method="post">
	       {{csrf_field()}}
        <button type="submit" name="button" class="btn btn-primary btn-custom"><span>REDEEM</span> REQUEST</button>
    </form>
</div>
</div>
   </div>
   </div>
@endsection