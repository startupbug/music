@extends('layouts.public_index')
@section('content')

<div class="btn_random float-right">
	<a href="javascript:" class="btn btn-default">
		<i class="fa fa-random fa-2x" aria-hidden="true"></i>
	</a>
</div>
<div class="row">   
	@foreach($tracks as $key => $value)
	<div class="col-md-12">
		<h2>{{$key}}</h2>
	</div>
	@foreach($value as $val)
	<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 change_width">
		<div class="songs_box">
			<a href="{{route('musicvoting_genre',['id' => $val->track_id])}}">
				<img src="{{asset('public/dashboard/musician/tracks/images/'.$val->track_image)}}" class="img-responsive center-block"/>
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