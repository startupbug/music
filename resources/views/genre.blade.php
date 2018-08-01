@extends('layouts.public_index')
@section('content')


<div class="row s_row_genre">
	@foreach($tracks as $key => $value)
	<div class="row">
		<div class="col-md-12">
			<h3 class="all_album">
					{{$key}} &nbsp;
			</h3>
		</div>
	</div>
	<hr class="line">
	<!-- <div class="col-md-12">
		<h2>{{$key}}</h2>
	</div> -->
	@foreach($value as $val)
	<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
		<div class="songs_box">
			<a href="{{route('musicvoting_genre',['id' => $val->track_id])}}">
				<img src="{{asset('public/dashboard/musician/tracks/images/'.$val->track_image)}}" class="img-responsive center-block" style="height: 184px;"/>
				<div class="mask">
					<span class="play_icon">
						<i class="fa fa-play fa-5x" aria-hidden="true"></i>
						<span data-img="images/song_img_.png"
						data-Tname="Xscape"
						data-album="Insurgency" data-artis="Michael Jackson" data-rating="">
						</span>
					</span>
				</div>
			</a>
			<p><a href="#">{{$val->track_name}}</a></p>
			<p>{{$val->user_name}}</p>
		</div>
	</div>
	@endforeach

	@endforeach

</div>

@endsection
