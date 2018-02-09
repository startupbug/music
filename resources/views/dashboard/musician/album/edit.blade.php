<?php include('header.php') ?>

<?php include('sidebar.php') ?>

<style media="screen">
  .dashboard_album {
    position: relative;
  }
  .dashboard_album .middle i{
    font-size: 20px;
  }
  .dashboard_album .middle {
    position: absolute;
    top: 6px;
    right: 9px;
  }
  .dashboard_album .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    top: 21px;
    right: 9px;
    padding: 5px 0 3px 0;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }

  .dropdown-content a {
    color: black;
    padding: 0px 3px 3px 3px;
    text-decoration: none;
    display: block;
    text-align: left;
    font-size: 11px;
    font-weight: bold;
  }

  /* .dropdownmenu:hover .dropdown-content {
      display: block;
  } */

  .dropdownmenu:hover .middle i {
      color: gray;
  }

  .dropdownmenu .dropdown-content a:hover {
      color: gray;
  }

/* new css */

  .btn-group{
    left: 0%;
    margin-top: 0px;
    width: 100%;
  }
  button.multiselect.dropdown-toggle.btn.btn-default {
        width: 100%;
  }
  ul.multiselect-container.dropdown-menu {
    width: 100%;
  }
</style>
  <div class="col-md-9">
    <h3 class="heading_dashboard">
        ARTIST DASHBOARD
    </h3>
    <div class="border_red">
        <h3 class="album">
            MY ALBUMS
        </h3>
    </div>
    <div class="row">
      <div class="col-md-10 color_bottom">
          <h3 class="all_album">
              ALBUM NAME
          </h3>
      </div>
      <div class="col-md-2 color_bottom">
          <div class="btn-group" style="margin-top:32px">
            <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="quant[1]">
              <span class="glyphicon glyphicon-pencil" style="color:#fff"></span>
            </button>
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
              Action <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a data-toggle="modal" data-target="#EditAlbumModal">Edit</a></li>
              <li><a href="#">Delete</a></li>
            </ul>
          </div>
      </div>
    </div>
    <hr class="line">
    <div class="row">
      <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="dashboard_album">
          <img src="./assets/images/album_one.png" width="100%" class="img-thumbnail">
        </div>
      </div>
      <div class="col-md-6 col-sm-12 col-xs-12">
         <div class="header">
              <h1>Lorem Ipsum</h1>
              <h4>Web Developer</h4>
              <span>ALBUM Count</span>
         </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-10 color_bottom">
        <h3 class="all_album">
            ALL VIDEOS &nbsp
        </h3>
      </div>
      <div class="col-md-2 color_bottom">
        <div class="btn-group"  style="margin-top:32px">
          <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="quant[1]">
            <span class="glyphicon glyphicon-pencil" style="color:#fff"></span>
          </button>
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            Action <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <li><a data-toggle="modal" data-target="#AddVideoModal">Add Video</a></li>
            <li><a data-toggle="modal" data-target="#UploadVideoModal">Upload Video</a></li>
          </ul>
        </div>
      </div>
    </div>
    <hr class="line">
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="dashboard_album">
            <video width="100%" controls>
              <source src="movie.mp4" type="video/mp4">
              <source src="movie.ogg" type="video/ogg">
              Your browser does not support the video tag.
            </video>
            <div class="dropdownmenu">
              <div class="middle"><i class="fa fa-ellipsis-v"></i></div>
              <div class="dropdown-content">
                <a href="#">Edit</a>
                <a href="#">Delete</a>
                <a href="#">Delete From Album</a>
              </div>
            </div>
            <h3 class="album_person_name">
      				XSCAPE
      			</h3>
          </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="dashboard_album">
            <video width="100%" controls>
              <source src="movie.mp4" type="video/mp4">
              <source src="movie.ogg" type="video/ogg">
              Your browser does not support the video tag.
            </video>
            <div class="dropdownmenu">
              <div class="middle"><i class="fa fa-ellipsis-v"></i></div>
              <div class="dropdown-content">
                <a href="#">Edit</a>
                <a href="#">Delete</a>
                <a href="#">Delete From Album</a>
              </div>
            </div>
            <h3 class="album_person_name">
      				XSCAPE
      			</h3>
          </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="dashboard_album">
            <video width="100%" controls>
              <source src="movie.mp4" type="video/mp4">
              <source src="movie.ogg" type="video/ogg">
              Your browser does not support the video tag.
            </video>
            <div class="dropdownmenu">
              <div class="middle"><i class="fa fa-ellipsis-v"></i></div>
              <div class="dropdown-content">
                <a href="#">Edit</a>
                <a href="#">Delete</a>
                <a href="#">Delete From Album</a>
              </div>
            </div>
            <h3 class="album_person_name">
      				XSCAPE
      			</h3>
          </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="dashboard_album">
            <video width="100%" controls>
              <source src="movie.mp4" type="video/mp4">
              <source src="movie.ogg" type="video/ogg">
              Your browser does not support the video tag.
            </video>
            <div class="dropdownmenu">
              <div class="middle"><i class="fa fa-ellipsis-v"></i></div>
              <div class="dropdown-content">
                <a href="#">Edit</a>
                <a href="#">Delete</a>
                <a href="#">Delete From Album</a>
              </div>
            </div>
            <h3 class="album_person_name">
      				XSCAPE
      			</h3>
          </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="dashboard_album">
            <video width="100%" controls>
              <source src="movie.mp4" type="video/mp4">
              <source src="movie.ogg" type="video/ogg">
              Your browser does not support the video tag.
            </video>
            <div class="dropdownmenu">
              <div class="middle"><i class="fa fa-ellipsis-v"></i></div>
              <div class="dropdown-content">
                <a href="#">Edit</a>
                <a href="#">Delete</a>
                <a href="#">Delete From Album</a>
              </div>
            </div>
            <h3 class="album_person_name">
      				XSCAPE
      			</h3>
          </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="dashboard_album">
            <video width="100%" controls>
              <source src="movie.mp4" type="video/mp4">
              <source src="movie.ogg" type="video/ogg">
              Your browser does not support the video tag.
            </video>
            <div class="dropdownmenu">
              <div class="middle"><i class="fa fa-ellipsis-v"></i></div>
              <div class="dropdown-content">
                <a href="#">Edit</a>
                <a href="#">Delete</a>
                <a href="#">Delete From Album</a>
              </div>
            </div>
            <h3 class="album_person_name">
      				XSCAPE
      			</h3>
          </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="dashboard_album">
            <video width="100%" controls>
              <source src="movie.mp4" type="video/mp4">
              <source src="movie.ogg" type="video/ogg">
              Your browser does not support the video tag.
            </video>
            <div class="dropdownmenu">
              <div class="middle"><i class="fa fa-ellipsis-v"></i></div>
              <div class="dropdown-content">
                <a href="#">Edit</a>
                <a href="#">Delete</a>
                <a href="#">Delete From Album</a>
              </div>
            </div>
            <h3 class="album_person_name">
      				XSCAPE
      			</h3>
          </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="dashboard_album">
            <video width="100%" controls>
              <source src="movie.mp4" type="video/mp4">
              <source src="movie.ogg" type="video/ogg">
              Your browser does not support the video tag.
            </video>
            <div class="dropdownmenu">
              <div class="middle"><i class="fa fa-ellipsis-v"></i></div>
              <div class="dropdown-content">
                <a href="#">Edit</a>
                <a href="#">Delete</a>
                <a href="#">Delete From Album</a>
              </div>
            </div>
            <h3 class="album_person_name">
      				XSCAPE
      			</h3>
          </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="dashboard_album">
            <video width="100%" controls>
              <source src="movie.mp4" type="video/mp4">
              <source src="movie.ogg" type="video/ogg">
              Your browser does not support the video tag.
            </video>
            <div class="dropdownmenu">
              <div class="middle"><i class="fa fa-ellipsis-v"></i></div>
              <div class="dropdown-content">
                <a href="#">Edit</a>
                <a href="#">Delete</a>
                <a href="#">Delete From Album</a>
              </div>
            </div>
            <h3 class="album_person_name">
      				XSCAPE
      			</h3>
          </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="dashboard_album">
            <video width="100%" controls>
              <source src="movie.mp4" type="video/mp4">
              <source src="movie.ogg" type="video/ogg">
              Your browser does not support the video tag.
            </video>
            <div class="dropdownmenu">
              <div class="middle"><i class="fa fa-ellipsis-v"></i></div>
              <div class="dropdown-content">
                <a href="#">Edit</a>
                <a href="#">Delete</a>
                <a href="#">Delete From Album</a>
              </div>
            </div>
            <h3 class="album_person_name">
      				XSCAPE
      			</h3>
          </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="dashboard_album">
            <video width="100%" controls>
              <source src="movie.mp4" type="video/mp4">
              <source src="movie.ogg" type="video/ogg">
              Your browser does not support the video tag.
            </video>
            <div class="dropdownmenu">
              <div class="middle"><i class="fa fa-ellipsis-v"></i></div>
              <div class="dropdown-content">
                <a href="#">Edit</a>
                <a href="#">Delete</a>
                <a href="#">Delete From Album</a>
              </div>
            </div>
            <h3 class="album_person_name">
      				XSCAPE
      			</h3>
          </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="dashboard_album">
            <video width="100%" controls>
              <source src="movie.mp4" type="video/mp4">
              <source src="movie.ogg" type="video/ogg">
              Your browser does not support the video tag.
            </video>
            <div class="dropdownmenu">
              <div class="middle"><i class="fa fa-ellipsis-v"></i></div>
              <div class="dropdown-content">
                <a href="#">Edit</a>
                <a href="#">Delete</a>
                <a href="#">Delete From Album</a>
              </div>
            </div>
            <h3 class="album_person_name">
      				XSCAPE
      			</h3>
          </div>
      </div>
    </div>
    <div class="button_dashboard"><button type="button" class="btn">LOAD MORE</button></div>
  </div>

  <div class="container">
    <!-- Edit Album Modal -->
    <div class="modal fade" id="EditAlbumModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>UPDATE ALBUM</b></h4>
          </div>
          <div class="modal-body">
            <form class="" action="#" method="post">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <h4><b>ALBUM NAME</b></h4>
                  <input type="text" class="form-control">
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <h4><b>ALBUM IMAGE</b></h4>
                  <div class="input-group">
                    <input type="text" class="form-control" readonly>
                    <label class="input-group-btn label_cus">
                        <span class="btn btn-primary">SELECT IMAGE<input type="file" style="display: none;" multiple>
                        </span>
                    </label>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <button type="submit" name="button" class="btn btn-primary" style="width:100%">SUBMIT</button>
                </div>
              </div>
            </form>
            <br>
          </div>
        </div>
      </div>
    </div>
    <!-- Add Video Modal -->
    <div class="modal fade" id="AddVideoModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>ADD VIDEO</b></h4>
          </div>
          <div class="modal-body">
            <form class="" action="#" method="post">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <h4><b>TITLE</b></h4>
                  <select id="example-getting-started" class="form-control" multiple="multiple">
                      <option value="cheese">Cheese</option>
                      <option value="tomatoes">Tomatoes</option>
                      <option value="mozarella">Mozzarella</option>
                      <option value="mushrooms">Mushrooms</option>
                      <option value="pepperoni">Pepperoni</option>
                      <option value="onions">Onions</option>
                  </select>
                  <!-- <input type="text" class="form-control"> -->
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <button type="submit" name="button" class="btn btn-primary" style="width:100%">SUBMIT</button>
                </div>
              </div>
            </form>
            <br>
          </div>
        </div>
      </div>
    </div>
    <!-- Upload Video Modal -->
    <div class="modal fade" id="UploadVideoModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>UPLOAD VIDEO</b></h4>
          </div>
          <div class="modal-body">
            <form class="" action="#" method="post">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <h4><b>TITLE</b></h4>
                  <input type="text" class="form-control">
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <h4><b>VIDEO</b></h4>
                  <div class="input-group">
                    <input type="text" class="form-control" readonly>
                    <label class="input-group-btn label_cus">
                        <span class="btn btn-primary">SELECT VIDEO<input type="file" style="display: none;" multiple>
                        </span>
                    </label>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <button type="submit" name="button" class="btn btn-primary" style="width:100%">SUBMIT</button>
                </div>
              </div>
            </form>
            <br>
          </div>
        </div>
      </div>
    </div>

  </div>
<?php include('footer.php') ?>

<!-- Include the plugin's CSS and JS: -->
