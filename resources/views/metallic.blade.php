@extends('layouts.public_index')
@section('content')
<div class="row s_row_genre">
	
	<div class="row">
		<div class="col-md-12">
			<h3 class="all_album">
					METALLIC &nbsp;
			</h3>
		</div>
	</div>
	<hr class="line">
	@foreach($metallic_songs as $metallic_song)
	<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
		<div class="songs_box">
			<a href="{{route('musicvoting_genre',['id' => $metallic_song->id])}}">
				<img src="{{asset('public/dashboard/musician/tracks/images/'.$metallic_song->image)}}" class="img-responsive center-block" style="height: 184px;"/>
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
			<p>{{$metallic_song->name}}</p>
		</div>
	</div>
	@endforeach
	{{ $metallic_songs->links() }}
</div>
@endsection