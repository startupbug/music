@extends('layouts.dashboard_index') 
@section('content')
<div class="col-md-9">
  <h3 class="heading_dashboard">
    ARTIST DASHBOARD
  </h3>
  <div class="border_red">
    <h3 class="album">
      OVERVIEW
    </h3>
  </div>
  <div class="row">
    <div class="col-md-12 color_bottom">
      <h3 class="all_album">
        EARNED POINTS
      </h3>
      <div class="btn-group">
        <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="quant[1]">
          <span class="glyphicon glyphicon-calendar"></span>
        </button>
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
          Action <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another</a></li>
        </ul>
      </div>
    </div>
  </div>
  <hr class="line">

  <div class="row">
    <div class="col-md-12">
      <div id="chartContainer"></div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 color_bottom">
      <h3 class="all_album">
        POINTS REDEEMED
      </h3>
    </div>
  </div>
  <hr class="line">
  <div class="row">
    <form action="{{route('redeemed_request')}}" method="POST">
        {{csrf_field()}}
      <div class="col-md-3 col-sm-6 col-xs-6">
        <h4 class="font-conv">TOTAL POINTS EARNED:</h4>
        <h4 class="font-conv">POINTS EARNED  IN <?php  $currentMonth = date('F'); echo $currentMonth; ?>:</h4>
        <h4 class="font-conv">TOTAL REDEEMED:</h4>
        <h4 class="font-conv">REDEEMABLE:</h4>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-6">
        <h4 class="font-conv">{{$total_points}}</h4>
        <h4 class="font-conv">{{$total_points_in_this_month}}</h4>
        <h4 class="font-conv">{{$total_redeemed_points}}</h4>
        <h4 class="font-conv">{{$redeemable_points}}</h4>
      </div>
      <div class="col-md-3 col-sm-12 col-xs-12">
        <a href="{{ route('redeem_points') }}">
          redeem
        </a>
        <button type="submit" name="button" class="btn btn-primary btn-custom"><span>REDEEM</span> REQUEST</button>
      </div>
    </form>
  </div>
</div>
@endsection
