@extends('layouts.promoter_index')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
            <div class="input-group" id="adv-search">
                <input type="text" class="form-control placeholder" placeholder="Search artist" />
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="search">Artist</span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <form class="form-horizontal" role="form">
                                  <div class="form-group">
                                    <label for="filter">Filter by</label>
                                    <select class="form-control">
                                        <option value="0" selected>All Snippets</option>
                                        <option value="1">Featured</option>
                                        <option value="2">Most popular</option>
                                        <option value="3">Top rated</option>
                                        <option value="4">Most commented</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="contain">Author</label>
                                    <input class="form-control" type="text" />
                                  </div>
                                  <div class="form-group">
                                    <label for="contain">Contains the words</label>
                                    <input class="form-control" type="text" />
                                  </div>
                                  <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                </form>
                            </div>
                        </div>


                        <div class="dropdown dropdown-lg">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="search">Genre</span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <form class="form-horizontal" role="form">
                                  <div class="form-group">
                                    <label for="filter">Filter by</label>
                                    <select class="form-control">
                                        <option value="0" selected>All Snippets</option>
                                        <option value="1">Featured</option>
                                        <option value="2">Most popular</option>
                                        <option value="3">Top rated</option>
                                        <option value="4">Most commented</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="contain">Author</label>
                                    <input class="form-control" type="text" />
                                  </div>
                                  <div class="form-group">
                                    <label for="contain">Contains the words</label>
                                    <input class="form-control" type="text" />
                                  </div>
                                  <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                </form>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </div>
                </div>
            </div>
          </div>
        </div>
	</div>


<div class="container">
	<div class="row">
		<div class="col-md-3 col-sm-6 col-xs-12">
			
  <div class="content">
   
      <div class="content-overlay"></div>
    <img src="images/michael_da.png" class="img-responsive">
     <div class="img_shape b_hide"><img src="images/shape_img.png" class="img-responsive"></div>
      <h1 class="name b_hide">Michael_Da_1</h1>
      <div class="content-details fadeIn-top">
        <h3 class="Cook">IAmDCook</h3>
        <p class="name_person">David Cook</p>





		<div class="col-md-4">
			<img src="images/instagram_img.png">
			<h3 class="sub_heading">
				1881
			</h3>
      <p class="paragraph_follow">FOLLOWERS</p>
			
		</div>
		<div class="col-md-4">
			<img src="images/facebook_img.png">
			<h3 class="sub_heading">
				2.5K
			</h3>
      <p class="paragraph_like">LIKES</p>
			
		</div>
		<div class="col-md-4">
			<img src="images/google plus_img.png">
			<h3 class="sub_heading">
				1200
			</h3>
      <p class="paragraph_follow">FOLLOWERS</p>
			
		</div>
	</div>

    
  </div>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="content">
   
      <div class="content-overlay"></div>
    <img src="images/king_lamar.png" class="img-responsive">
     <div class="img_shape b_hide"><img src="images/shape_img.png" class="img-responsive"></div>
      <h1 class="name b_hide">King_Lamar</h1>
      <div class="content-details fadeIn-top">
         <h3 class="Cook">IAmDCook</h3>
        <p class="name_person">David Cook</p>





    <div class="col-md-4">
      <img src="images/instagram_img.png">
      <h3 class="sub_heading">
        1881
      </h3>
      <p class="paragraph_follow">FOLLOWERS</p>
      
    </div>
    <div class="col-md-4">
      <img src="images/facebook_img.png">
      <h3 class="sub_heading">
        2.5K
      </h3>
      <p class="paragraph_like">LIKES</p>
      
    </div>
    <div class="col-md-4">
      <img src="images/google plus_img.png">
      <h3 class="sub_heading">
        1200
      </h3>
      <p class="paragraph_follow">FOLLOWERS</p>
      
    </div>
  </div>

    
  </div>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">

        <div class="content">
   
      <div class="content-overlay"></div>
    <img src="images/king_img.png" class="img-responsive">
     <div class="img_shape b_hide"><img src="images/shape_img.png" class="img-responsive"></div>
      <h1 class="name b_hide">King_Lamar</h1>
      <div class="content-details fadeIn-top">
        <h3 class="Cook">IAmDCook</h3>
        <p class="name_person">David Cook</p>





    <div class="col-md-4">
      <img src="images/instagram_img.png">
      <h3 class="sub_heading">
        1881
      </h3>
      <p class="paragraph_follow">FOLLOWERS</p>
      
    </div>
    <div class="col-md-4">
      <img src="images/facebook_img.png">
      <h3 class="sub_heading">
        2.5K
      </h3>
      <p class="paragraph_like">LIKES</p>
      
    </div>
    <div class="col-md-4">
      <img src="images/google plus_img.png">
      <h3 class="sub_heading">
        1200
      </h3>
      <p class="paragraph_follow">FOLLOWERS</p>
      
    </div>
  </div>

    
  </div>

			
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">

      <div class="content">
   
      <div class="content-overlay"></div>
    <img src="images/maroons_img.png" class="img-responsive">
     <div class="img_shape b_hide"><img src="images/shape_img.png" class="img-responsive"></div>
      <h1 class="name b_hide">MaRooN5</h1>
      <div class="content-details fadeIn-top">
        <h3 class="Cook">IAmDCook</h3>
        <p class="name_person">David Cook</p>

    <div class="col-md-4">
      <img src="images/instagram_img.png">
      <h3 class="sub_heading">
        1881
      </h3>
      <p class="paragraph_follow">FOLLOWERS</p>
      
    </div>
    <div class="col-md-4">
      <img src="images/facebook_img.png">
      <h3 class="sub_heading">
        2.5K
      </h3>
      <p class="paragraph_like">LIKES</p>
      
    </div>
    <div class="col-md-4">
      <img src="images/google plus_img.png">
      <h3 class="sub_heading">
        1200
      </h3>
      <p class="paragraph_follow">FOLLOWERS</p>
      
    </div>
  </div>

    
  </div>

			
		</div>
	</div>
</div>







<div class="container">
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      
  <div class="content">
   
      <div class="content-overlay"></div>
    <img src="images/michael_da.png" class="img-responsive">
     <div class="img_shape b_hide"><img src="images/shape_img.png" class="img-responsive"></div>
      <h1 class="name b_hide">Michael_Da_1</h1>
      <div class="content-details fadeIn-top">
        <h3 class="Cook">IAmDCook</h3>
        <p class="name_person">David Cook</p>





    <div class="col-md-4">
      <img src="images/instagram_img.png">
      <h3 class="sub_heading">
        1881
      </h3>
      <p class="paragraph_follow">FOLLOWERS</p>
      
    </div>
    <div class="col-md-4">
      <img src="images/facebook_img.png">
      <h3 class="sub_heading">
        2.5K
      </h3>
      <p class="paragraph_like">LIKES</p>
      
    </div>
    <div class="col-md-4">
      <img src="images/google plus_img.png">
      <h3 class="sub_heading">
        1200
      </h3>
      <p class="paragraph_follow">FOLLOWERS</p>
      
    </div>
  </div>

    
  </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="content">
   
      <div class="content-overlay"></div>
    <img src="images/king_lamar.png" class="img-responsive">
     <div class="img_shape b_hide"><img src="images/shape_img.png" class="img-responsive"></div>
      <h1 class="name b_hide">King_Lamar</h1>
      <div class="content-details fadeIn-top">
        <h3 class="Cook">IAmDCook</h3>
        <p class="name_person">David Cook</p>




    <div class="col-md-4">
      <img src="images/instagram_img.png">
      <h3 class="sub_heading">
        1881
      </h3>
      <p class="paragraph_follow">FOLLOWERS</p>
      
    </div>
    <div class="col-md-4">
      <img src="images/facebook_img.png">
      <h3 class="sub_heading">
        2.5K
      </h3>
      <p class="paragraph_like">LIKES</p>
      
    </div>
    <div class="col-md-4">
      <img src="images/google plus_img.png">
      <h3 class="sub_heading">
        1200
      </h3>
      <p class="paragraph_follow">FOLLOWERS</p>
      
    </div>
  </div>

    
  </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">

        <div class="content">
   
      <div class="content-overlay"></div>
    <img src="images/king_img.png" class="img-responsive">
     <div class="img_shape b_hide"><img src="images/shape_img.png" class="img-responsive"></div>
      <h1 class="name b_hide">King_Lamar</h1>
      <div class="content-details fadeIn-top">
         <h3 class="Cook">IAmDCook</h3>
        <p class="name_person">David Cook</p>





    <div class="col-md-4">
      <img src="images/instagram_img.png">
      <h3 class="sub_heading">
        1881
      </h3>
      <p class="paragraph_follow">FOLLOWERS</p>
      
    </div>
    <div class="col-md-4">
      <img src="images/facebook_img.png">
      <h3 class="sub_heading">
        2.5K
      </h3>
      <p class="paragraph_like">LIKES</p>
      
    </div>
    <div class="col-md-4">
      <img src="images/google plus_img.png">
      <h3 class="sub_heading">
        1200
      </h3>
      <p class="paragraph_follow">FOLLOWERS</p>
      
    </div>
  </div>

    
  </div>

      
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">

      <div class="content">
   
      <div class="content-overlay"></div>
    <img src="images/maroons_img.png" class="img-responsive">
     <div class="img_shape b_hide"><img src="images/shape_img.png" class="img-responsive"></div>
      <h1 class="name b_hide">MaRooN5</h1>
      <div class="content-details fadeIn-top">
         <h3 class="Cook">IAmDCook</h3>
        <p class="name_person">David Cook</p>

    <div class="col-md-4">
      <img src="images/instagram_img.png">
      <h3 class="sub_heading">
        1881
      </h3>
      <p class="paragraph_follow">FOLLOWERS</p>
      
    </div>
    <div class="col-md-4">
      <img src="images/facebook_img.png">
      <h3 class="sub_heading">
        2.5K
      </h3>
      <p class="paragraph_like">LIKES</p>
      
    </div>
    <div class="col-md-4">
      <img src="images/google plus_img.png">
      <h3 class="sub_heading">
        1200
      </h3>
      <p class="paragraph_follow">FOLLOWERS</p>
      
    </div>
  </div>

    
  </div>

      
    </div>
  </div>
</div>


<div class="container">
  <div class="row">
    <div class="col-md-12">
<div class="button_last"><button type="button" class="btn">LOAD MORE</button></div>
</div>
</div>
</div>
@endsection