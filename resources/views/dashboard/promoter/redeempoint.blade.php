    @extends('layouts.promoter_index')
@section('content')
 <div class="col-md-9">
        <h3 class="heading_dashboard">
         PROMOTER DASHBOARD
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
              </button><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
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
        <div class="col-md-12 color_bottom">
            <h3 class="all_album">
                POINTS REDEEMED
            </h3>
      </div>
    </div>
    <hr class="line">
    <div class="row">
     <div class="col-md-6">
     	<div class="top_redeem">
    	<ul class="redeem">
    		<li class="redeem_point_one">POINTSEARNED:</li>
    		<li class="redeem_points">{{$total_points}}</li>
    	</ul>
    	<ul class="redeem">
    		<li class="redeem_point">POINTSREDEEMED:</li>
    		<li class="redeem_point">{{$total_redeemed_points}}</li>
    	</ul>
    	<ul class="redeem">
    		<li class="redeem_points">REDEEMABLE:</li>
    		<li class="redeem_points">{{$redeemable_points}}</li>
    	</ul>
    </div>
</div>
<div class="col-md-6">
	<div class="redeem_border">
	<h3 class="first_redeem_content">
		REDEEM
	</h3>
	<h3 class="last_redeem_content">
		REQUEST
	</h3>
</div>
</div>
   </div>
   </div>
@endsection