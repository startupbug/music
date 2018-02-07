@extends('layouts.default')
@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-12">
            <div class="input-group" id="adv-search">
                <input type="text" class="form-control" placeholder="Search artist" />
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        


                       
                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </div>
                </div>
            </div>
          </div>
        </div>
	</div>




	<div class="container">

<div class="tab-content custom-tab-content">
  <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs custom-tab" role="tablist">
    <li class="left_width" role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><span class="link-lable">All</span></a></li>
   <li  class="left_width" role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><span class="link-lable">HIPHOP</span></a></li>
    <li  class="left_width" role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><span class="link-lable">ROCK</span></a></li>
    <li class="left_width" role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><span class="link-lable">POP</span></a></li>
    <li class="left_width" role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><span class="link-lable">ELECTRONIC</span></a></li>
	
    <li class="left_width" role="presentation"><a href="#test5" aria-controls="test5" role="tab" data-toggle="tab"><span class="link-lable"> TRAP</span></a></li>
  </ul>

<div class="tab-content">
  <div role="tabpanel" class="tab-pane fade in active" id="home">

  	<div class="col-md-8">
			<div class="row">
				<div class="col-md-3">
					<div class="genre"><img src="{{assets('pulic/assets/images/genre_image.png" class="img-responsive"></div>
				</div>
				<div class="col-md-9">
					<h3 class="top_heading">
						GASOLINE
					</h3>
					<h3 class="mid_heading">
						BY HALSEY
					</h3>
					<h3 class="rating">Rating:</h3>

					<div class="star-rating">
        <span class="fa fa-star-o" data-rating="1"></span>
        <span class="fa fa-star-o" data-rating="2"></span>
        <span class="fa fa-star-o" data-rating="3"></span>
        <span class="fa fa-star-o" data-rating="4"></span>
        <span class="fa fa-star-o" data-rating="5"></span>
        <input type="hidden" name="whatever1" class="rating-value" value="2.56">
      </div>

					<div class="col-md-12">
							<ul>
								
								<li class="social_media"><img src="{{assets('pulic/assets/images/instagram.png"><h2 class="mid_head">1881</h2><h3 class="mid_side">FOLLOWERS</h3></li>

								<li class="social_media"><img src="{{assets('pulic/assets/images/facebook.png"><h2 class="mid_head">2.5K</h2><h3 class="mid_like">LIKES</h3></li>
								<li class="social_media"><img src="{{assets('pulic/assets/images/google-plus.png"><h2 class="mid_head">1200</h2><h3 class="mid_side">FOLLOWERS</h3></li>
							</ul>
							</div>
              </div>


              



       
				

				<div class="col-md-12 border">

			<div class="comment-wrap">
				<div class="photo">
						<!--<div class="avatar" style="background-image: url(img src="images/comment_male.png"></div>-->
						<div class="avatar"><img src="{{asset('pulic/assets/images/comment_male.png')}}"></div>
				</div>
				<div class="comment-block">
						<form action="">
								<textarea name="comment" id="comment" cols="30" rows="3" placeholder="Write a comment..."></textarea>
						</form>
				</div>
		</div>
		<div class="button_comment"><button type="button" class="btn">POST</button></div>

	<div class="comment-wrap">
				<div class="photo">
						<!--<div class="avatar" style="background-image: url('https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg')">-->
							<div class="avatar"><img src="{{asset('pulic/assets/images/comment_img.png')}}"></div>
						
				</div>
				<div class="comment-block">
						<p class="comment-text">The best track I’ve heard in a while</p>
						<p>#GoMusic #Rock</p>
						
				</div>
		</div>
		<div class="comment-wrap">
				<div class="photo">
						<!--<div class="avatar" style="background-image: url('https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg')">-->
							
							<div class="avatar"><img src="{{asset('pulic/assets/images/com_img.png')}}"></div>
						
				</div>
				<div class="comment-block">
						<p class="comment-text">Okayish... Heard Better</p>
						
						
				</div>
		</div>

		<div class="comment-wrap">
				<div class="photo">
						<div class="avatar"><img src="{{asset('pulic/assets/images/comment_image.png')}}"></div>
				</div>
				<div class="comment-block">
						<p class="comment-text">Wow! Blown away, Strong performance
welldone!</p>
						
						
				</div>
		</div>
</div>

</div>
 </div>

 <div class="col-md-4">

			<h3 class="side_menu">
				TRACKS BY KENDRICK
			</h3>
	

	<ul id="nav1">
    <li><a href="#">MIRRORS</a>
    <ul>
      <li><a href="#">Stage1</a></li>
      <li><a href="#">Stage2</a></li>
      <li><a href="#">Stage3</a></li>
      <li><a href="#">Stage4</a></li>
    </ul>
    </li>
    <li><a href="#">PARADISE</a>
      <ul>
      <li><a href="#">Stage1</a></li>
      <li><a href="#">Stage2</a></li>
      <li><a href="#">Stage3</a></li>
      <li><a href="#">Stage4</a></li>
    </ul>
    </li>
    <li><a href="#">HEAVEN</a>
    <ul>
      <li><a href="#">Stage1</a></li>
      <li><a href="#">Stage2</a></li>
      <li><a href="#">Stage3</a></li>
      <li><a href="#">Stage4</a></li>
    </ul>
    </li>
     <li><a href="#">IRIS</a>
      <ul>
      <li><a href="#">Stage1</a></li>
      <li><a href="#">Stage2</a></li>
      <li><a href="#">Stage3</a></li>
      <li><a href="#">Stage4</a></li>
    </ul>
    </li>
     <li><a href="#">COMATOSE</a>
      <ul>
      <li><a href="#">Stage1</a></li>
      <li><a href="#">Stage2</a></li>
      <li><a href="#">Stage3</a></li>
      <li><a href="#">Stage4</a></li>
    </ul>
    </li>
     <li><a href="#">OH LOVE</a>
      <ul>
      <li><a href="#">Stage1</a></li>
      <li><a href="#">Stage2</a></li>
      <li><a href="#">Stage3</a></li>
      <li><a href="#">Stage4</a></li>
    </ul>
    </li>
     <li><a href="#">MIRRORS</a>
      <ul>
      <li><a href="#">Stage1</a></li>
      <li><a href="#">Stage2</a></li>
      <li><a href="#">Stage3</a></li>
      <li><a href="#">Stage4</a></li>
    </ul>
    </li>
     <li><a href="#">PARADISE</a>
      <ul>
      <li><a href="#">Stage1</a></li>
      <li><a href="#">Stage2</a></li>
      <li><a href="#">Stage3</a></li>
      <li><a href="#">Stage4</a></li>
    </ul>
    </li>
     <li><a href="#">HEAVEN</a>
      <ul>
      <li><a href="#">Stage1</a></li>
      <li><a href="#">Stage2</a></li>
      <li><a href="#">Stage3</a></li>
      <li><a href="#">Stage4</a></li>
    </ul>
    </li>
     <li><a href="#">IRIS</a>
      <ul>
      <li><a href="#">Stage1</a></li>
      <li><a href="#">Stage2</a></li>
      <li><a href="#">Stage3</a></li>
      <li><a href="#">Stage4</a></li>
    </ul>
    </li>
     <li><a href="#">COMATOSE</a>
      <ul>
      <li><a href="#">Stage1</a></li>
      <li><a href="#">Stage2</a></li>
      <li><a href="#">Stage3</a></li>
      <li><a href="#">Stage4</a></li>
    </ul>
    </li>
</ul>	
</div>


</div>


		
		
		






  <div role="tabpanel" class="tab-pane fade" id="messages"><h2>Tab 2</h2>
 <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></div>
  <div role="tabpanel" class="tab-pane fade" id="settings"><h2>Tab 3</h2>
 <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></div>
  
  <div role="tabpanel" class="tab-pane fade" id="test5"><h2>Tab 5</h2>
 <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></div>
</div>



</div>
</div>
</div>




<!--<audio controls autoplay>
  <source src="horse.ogg" type="audio/ogg">
  <source src="horse.mp3" type="audio/mpeg">

</audio>

</div>
</div>
</div>-->


<?php include('footer.php'); ?>