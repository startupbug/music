
@extends('layouts.public_index')
@section('content')
<div class="container">
	<div class="row">
			<div class="col-md-12 text-center s_text_color">
			@if (Session::has('insert_track'))
                <div class="alert alert-success">{{ Session::get('insert_track') }}</div>
            @endif
            @if(Session::has('vote'))
                <div class="alert alert-danger">{{ Session::get('vote') }}</div>
            @endif
            @if(Session::has('votes'))
                <div class="alert alert-danger">{{ Session::get('votes') }}</div>
            @endif
            @if(Session::has('not_insert'))
                <div class="alert alert-danger">{{ Session::get('not_insert') }}</div>
            @endif
			<h3 class="contest_heading s_text_color">
				{{$contest->name}}
			</h3>

		</div>
		<div class="col-md-6">
			<h3 class="contest_heading">
				Description
			</h3>
			<p class="contest_paragraph">
				{{$contest->description}}
			</p>

			<h4 class="contest_heading">
				CONTEST TYPE : 
				<span>
					@if($contest->contest_type == 1) 
			          Daily 
			        @elseif($contest->contest_type == 2) 
			          Weekly
			        @elseif($contest->contest_type == 3)
			          Monthly
			        @endif
			    </span>
			</h4>
			<p class="contest_date_s">
				<i class="fa fa-calendar fa-lg"> </i> FROM, {{$contest->start_date}} TO, {{$contest->end_date}}
			</p>
			<button class="btn btn-info s-btn-info" type="button" data-toggle="modal" data-target="#myModal">JOIN CONTEST</button>

		</div>
		<div class="col-md-6">
			<div class="img_video">
				<img src="{{asset('public/storage/contest_images/'.$contest->contest_image)}}" class="img-responsive">
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
 				@if(Auth::check() == true && Auth::user()->role_id == 2)
					<form action="{{route('join_contest')}}" enctype="multipart/form-data" method="post">
						{{csrf_field()}}
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
								@foreach($tracks as $track)
									<option value="{{$track->id}}">{{$track->name}}</option>
								@endforeach
							</select>
					  	</div>
						<div id="file_song" style="display:none">
							<div class="form-group s-form-group">
								<label for="name">Title :</label>
								<input type="text" class="form-control s-form-control" name="name" id="name" disabled required>
							</div>
							<div class="form-group s-form-group">
								<label for="description">Description :</label>
								<input type="text" class="form-control s-form-control" name="description" id="description" disabled required>
							</div>
							<div class="form-group s-form-group">
								<label for="category_list">Category :</label>
								<select class="form-control s-form-control" name="category" id="category_list" disabled required>
									<option selected disabled>Select Category</option>
									@foreach($categories as $category)
										<option value="{{$category->id}}">{{$category->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group s-form-group">
								<label for="upload_song">Select Track :</label>
								<input type="file" class="form-control s-form-control" name="audio" id="upload_song" disabled required style="line-height: 1;">
							</div>
							<div class="form-group s-form-group">
								<label for="upload_image">Select Track Art :</label>
								<input type="file" class="form-control s-form-control" name="image" id="upload_image" required disabled style="line-height: 1;">
							</div>
						</div>
						<input type="hidden" name="contest_id" value="{{$contest->id}}">
						<div class="form-group text-right">
						  <button type="submit" class="btn btn-default">Submit</button>
						</div>
					</form>
				@elseif(Auth::check() == true && Auth::user()->role_id != 2)
					<form class="form-horizontal" method="POST" action="" id="loginForm">
                        {{ csrf_field() }}
				        <label>ONLY MUSICIAN CAN TAKE PART IN CONTEST</label>
            		</form>
				@elseif(Auth::check() == false)
					<form class="form-horizontal" method="POST" action="{{ route('login') }}" id="loginForm">
                        {{ csrf_field() }}
				        <div class="form-group validationEmail">
				          <input type="email" name="email" class="form-control red-color" id="loginemail" placeholder="Email">

				            <span class="help-block validationEmail">
				                <strong id="display_error"></strong>
				            </span>
				        </div>
				        <div class="form-group validationPassword">
				          <input type="password" name="password" class="form-control red-color" id="pwd" placeholder="Password">

				                <span class="help-block validationPassword">
				                    <strong id="display_error"></strong>
				                </span>
				        </div>
				        <div class="form-group">
				          <input type="submit" class="btn btn-default" style="width:100%" id="submit_login" name="submit" value="Submit">
				        </div>
            		</form>
				@endif
	        </div>
	      </div>
	    </div>
	  </div>
</div>
 @if(count($errors))
        <div class="form-group">
         <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $erroring)
                  <li>{{$erroring}}  </li>
                  @endforeach
            </ul>
          </div>
        </div>
        @endif
 <div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3 class="contest_subheading">
				TOP &nbsp; RANKINGS
			</h3>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="container">
		<div class="row s_row_border">
			@foreach($tracks_list as $track_list)
				<div class="col-md-6 col-sm-6 col-xs-12 s_col_border">
					<div class="row">
						<div class="col-md-4">
							<div class="top_ranking"><img src="{{asset('public/dashboard/musician/tracks/images/'.$track_list->track_image)}}" class="img-responsive"></div>
						</div>
						<div class="col-md-8">
							<h3 class="ranking">
								IST
							</h3>
							<p class="track_name">
								Track Name: {{$track_list->track_name}}
							</p>
							<p class="track_name">
								Artist: {{$track_list->user_name}}
							</p>
							<button class="btn btn-default top_ranking_button col-md-3" type="button" onclick="music('{{asset('public/dashboard/musician/tracks/videos/'.$track_list->track_video)}}')">
								Play
							</button>
							<form action="{{route('voting')}}" method="post">
								{{csrf_field()}}
								<input type="hidden" name="track_id" value="{{$track_list->track_id}}">
								<input type="hidden" name="contest_id" value="{{$track_list->contest_id}}">
								@if(empty($voter))
								<input type="submit" name="vote" value="Vote" class="btn btn-default top_ranking_button">
								@elseif(!empty($voter))
								<input type="submit" name="vote" value="Vote" class="btn btn-default top_ranking_button" disabled="">
								@endif
							</form>

								Total Votes: {{($track_list->votes)}}
						</div>
					</div>
				</div>
			@endforeach
			{{ $tracks_list->links() }}
		</div>
	</div>
</div>
</div>
<audio controls class="top_ranking_play" id="song_play" controlsList="nodownload" style="display:none">
	<source src="" type="audio/mpeg">
	Your browser does not support the audio element.
</audio>
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
