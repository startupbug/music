@extends('layouts.public_index')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 text-center s_text_color">
			<h3 class="contest_heading s_text_color">
				ABOUT THE CONTEST
			</h3>
		</div>
		<div class="col-md-6">
			<h3 class="contest_heading">
				ABOUT THE CONTEST
			</h3>
			<p class="contest_paragraph">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris lorem sem, eleifend et urna at, pharetra venenatis ipsum. Nunc sodales nisl vel placerat rutrum. Nam tincidunt, nulla at vehicula ultrices, odio quam consequat nunc, vel imperdiet ante ante in tortor. Aenean blandit vel lectus maximus congue. Sed at eros commodo, malesuada justo non, tincidunt purus. Nam euismod, libero id semper mollis, nulla quam mattis odio, ut pretium nulla libero ac ipsum. Donec aliquam vehicula ipsum, ullamcorper vestibulum elit accumsan vel. Maecenas varius ex at est tristique ultrices. Sed magna nisl.
			</p>

			<h4 class="contest_heading">
				CONTEST TYPE : <span>Daily</span>
			</h4>
			<p class="contest_date_s">
				<i class="fa fa-calendar fa-lg"> </i> Fir, Mar 16, 3:00 Pm Fir, Mar 16, 3:00 Pm
			</p>
			<button class="btn btn-info s-btn-info" type="button" data-toggle="modal" data-target="#myModal">JOIN CONTEST</button>

		</div>
		<div class="col-md-6">
			<div class="img_video">
				<img src="{{asset('public/assets/images/contest_video.png')}}" class="img-responsive">
			</div>
		</div>
	</div>
	<!-- Modal -->
	  <div class="modal fade" id="myModal" role="dialog">
	    <div class="modal-dialog">
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="s-modal-title">Join Contest</h4>
	        </div>
	        <div class="modal-body">
						<form action="/action_page.php">
							<div class="form-group">
								<div class="radio" style="display: inline;">
								  <label>
										<input type="radio" name="optradio_contest" value="select" checked>Select Song
									</label>
								</div>
								<div class="radio" style="display: inline; margin-left:5px">
								  <label>
										<input type="radio" name="optradio_contest" value="file"> Upload Song
									</label>
								</div>
							</div>
						  <div class="form-group s-form-group" id="combox_song">
						    <label for="songs">Select Song :</label>
								<select class="form-control s-form-control" name="song_list" id="song_list">
									<option selected disabled>Select Song</option>
									<option>Song 1</option>
									<option>Song 1</option>
									<option>Song 1</option>
									<option>Song 1</option>
									<option>Song 1</option>
								</select>
						  </div>
							<div class="form-group s-form-group" id="file_song" style="display:none">
						    <label for="songs">Upload Song :</label>
								<input type="file" class="form-control s-form-control" name="upload_song" value="" id="upload_song" disabled style="line-height: 1;">
						  </div>
							<div class="form-group text-right">
							  <button type="submit" class="btn btn-default">Submit</button>
							</div>
						</form>
	        </div>
	      </div>

	    </div>
	  </div>

</div>
 <div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3 class="contest_subheading">
				TOP &nbsp; RANKINGS
			</h3>
		</div>
	</div>
</div>
<div class="container-fluid border_bottom">
	<div class="container">
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12 border_right">
			<div class="row">
				<div class="col-md-4">
					<div class="top_ranking"><img src="{{asset('public/assets/images/contest_1.png')}}" class="img-responsive"></div>
				</div>
				<div class="col-md-8">
					<h3 class="ranking">
						IST
					</h3>
					<p class="track_name">
						Track Name: Insurgency
					</p>
					<p class="track_name">
						lbum Name: Insurgency
					</p>
					<p class="track_name">
						Artist: John Doe
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="row">
				<div class="col-md-4">
					<div class="top_ranking"><img src="{{asset('public/assets/images/contest_2.png')}}" class="img-responsive"></div>
				</div>
				<div class="col-md-8">
					<h3 class="ranking">
						2ND
					</h3>
					<p class="track_name">
						Track Name: Xscape
					</p>
					<p class="track_name">
						lbum Name: Xscape
					</p>
					<p class="track_name">
						Artist: Michael Jackson
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<div class="container-fluid border_bottom">
	<div class="container">
     <div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12 border_right">
			<div class="row">
				<div class="col-md-4">
					<div class="top_ranking"><img src="{{asset('public/assets/images/contest_3.png')}}" class="img-responsive"></div>
				</div>
				<div class="col-md-8">
					<h3 class="ranking">
						3RD
					</h3>
					<p class="track_name">
						Track Name: All Apologees
					</p>
					<p class="track_name">
						Album Name: Nevermind
					</p>
					<p class="track_name">
						Artist: Nirvana
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="row">
				<div class="col-md-4">
					<div class="top_ranking"><img src="{{asset('public/assets/images/contest_4.png')}}" class="img-responsive"></div>
				</div>
				<div class="col-md-8">
					<h3 class="ranking">
						4TH
					</h3>
					<p class="track_name">
						Track Name: American Idiot
					</p>
					<p class="track_name">
						Album Name: American Idiot
					</p>
					<p class="track_name">
						Artist: Green Day
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<div class="container-fluid border_bottom">
	<div class="container">
     <div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12 border_right">
			<div class="row">
				<div class="col-md-4">
					<div class="top_ranking"><img src="{{ asset('public/assets/images/contest_5.png') }}" class="img-responsive"></div>
				</div>
				<div class="col-md-8">
					<h3 class="ranking">
						4TH
					</h3>
					<p class="track_name">
						Track Name: Hey You
					</p>
					<p class="track_name">
						Album Name: Dark Side of the Moon
					</p>
					<p class="track_name">
						Artist: Pink Floyd
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="row">
				<div class="col-md-4">
					<div class="top_ranking"><img src="{{asset('public/assets/images/contest_6.png')}}" class="img-responsive"></div>
				</div>
				<div class="col-md-8">
					<h3 class="ranking">
						6TH
					</h3>
					<p class="track_name">
						Track Name: Arabella
					</p>
					<p class="track_name">
						Album Name: Do I wanna Know
					</p>
					<p class="track_name">
						Artist: Arctic Monkeys
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<div class="container-fluid border_bottom">
	<div class="container">
     <div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12 border_right">
			<div class="row">
				<div class="col-md-4">
					<div class="top_ranking"><img src="{{asset('public/assets/images/contest_7.png')}}" class="img-responsive"></div>
				</div>
				<div class="col-md-8">
					<h3 class="ranking">
						5TH
					</h3>
					<p class="track_name">
						Track Name: 99 Problems
					</p>
					<p class="track_name">
						Album Name: The Black Album
					</p>
					<p class="track_name">
						Artist: Jay-Z
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="row">
				<div class="col-md-4">
					<div class="top_ranking"><img src="{{asset('public/assets/images/contest_8.png')}}" class="img-responsive"></div>
				</div>
				<div class="col-md-8">
					<h3 class="ranking">
						8TH
					</h3>
					<p class="track_name">
						Artist: Jay-Z
					</p>
					<p class="track_name">
						Album Name: Badlands
					</p>
					<p class="track_name">
						Artist: Halsey
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<div class="container-fluid">
	<div class="container">
     <div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12 border_right">
			<div class="row">
				<div class="col-md-4">
					<div class="top_ranking"><img src="{{asset('public/assets/images/contest_9.png')}}" class="img-responsive"></div>
				</div>
				<div class="col-md-8">
					<h3 class="ranking">
						6TH
					</h3>
					<p class="track_name">
						rack Name: Stairway To Heaven
					</p>
					<p class="track_name">
						Album Name: Kashmir
					</p>
					<p class="track_name">
						Artist: Led Zepplin
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="row">
				<div class="col-md-4">
					<div class="top_ranking"><img src="{{asset('public/assets/images/contest_10.png')}}" class="img-responsive"></div>
				</div>
				<div class="col-md-8">
					<h3 class="ranking">
						10TH
					</h3>
					<p class="track_name">
						Track Name: Beautiful
					</p>
					<p class="track_name">
						Album Name: Recovery
					</p>
					<p class="track_name">
						Artist: Eminem
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3 class="contest_subheading">
				PREVIOUS &nbsp; CONTEST
			</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="border_contest"><img src="{{asset('public/assets/images/contest_img1.png')}}" class="img-responsive"></div>
			<h3 class="contest_winner">
				IST RUNNER UP
			</h3>
			<h3 class="contest_winner">
				JOHNATHAN DOE
			</h3>
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="border_contest"><img src="{{asset('public/assets/images/contest_img2.png')}}" class="img-responsive winner"></div>
			<h3 class="contest_winner">
				IST RUNNER UP
			</h3>
			<h3 class="contest_winner">
				JOHNATHAN DOE
			</h3>
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="border_contest"><img src="{{asset('public/assets/images/contest_img3.png')}}" class="img-responsive"></div>
			<h3 class="contest_winner">
				IST RUNNER UP
			</h3>
			<h3 class="contest_winner">
				JOHNATHAN DOE
			</h3>
		</div>
	</div>
</div>
@endsection
