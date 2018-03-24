@extends('layouts.public_index')
@section('content')
<div class="row s_row_genre">
	
	<div class="row">
		<div class="col-md-12">
			<h3 class="all_album">
					HIPHOP &nbsp;
			</h3>
		</div>
	</div>
	<hr class="line">
	@foreach($hiphop_songs as $hiphop_song)
	<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 change_width">
		<div class="songs_box">
			<a href="{{route('musicvoting_genre',['id' => $hiphop_song->id])}}">
				<img src="{{asset('public/dashboard/musician/tracks/images/'.$hiphop_song->image)}}" class="img-responsive center-block" style="height: 184px;"/>
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
			<p>{{$hiphop_song->name}}</p>
		</div>
	</div>
	@endforeach
</div>

@endsection