@extends('layouts.public_index')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
            <div class="input-group" id="adv-search">
                <input type="text" class="form-control" placeholder="Search artist" />
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
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
  <div class="row border">
    <div class="col-md-6">

      <h1 class="left_heading">TRACKS</h1>
    </div>
    <div class="col-md-6">

      <h1 class="right_heading">SEE MORE</h1>
    </div>
  </div>
</div>

<div class="container images_video">
<div class="row">
            <?php
            for ($a = 1; $a <= 5; $a++) { ?>
            <div class="col-xs-12 col-sm-6 col-md-2 change_width">
                <div class="songs_box">
                    <a href="javascript:">
                        <img src="{{asset('public/assets/images/song_img_'. $a.'.png')}}" class="img-responsive center-block"/>
                        <div class="mask">
                            <span class="play_icon">
                                <i class="fa fa-play fa-5x" aria-hidden="true"></i>
                                <span data-img="images/song_img_<?php echo $a; ?>.png"
                                  data-Tname="Xscape <?php echo $a; ?>"
                                  data-album="Insurgency" data-artis="Michael Jackson" data-rating="">
                              </span>
                          </span>
                      </div>
                  </a>
                  <p><a href="#">Xscape</a></p>
                  <p>Michael Jackson</p>
              </div>
          </div>
          <?php
      }
      ?>
  </div>
  </div>

<div class="container">
  <div class="row border">
    <div class="col-md-6">

      <h1 class="left_heading">ARTISTS</h1>
    </div>
    <div class="col-md-6">

      <h1 class="right_heading">SEE MORE</h1>
    </div>
  </div>
</div>

  <div class="container">
  <div class="row">
    <div class="col-md-2 col-md-6 col-md-12 width_change">
      <div class="images_person"><img src="{{asset('public/assets/images/michael.png')}}" class="img-responsive"></div>
      <h3 class="artist">
        MICHAEL JACKSON
      </h3>
    </div>
    <div class="col-md-2 col-md-6 col-md-12 width_change">
      <div class="images_person"><img src="{{asset('public/assets/images/nirvana.png')}}" class="img-responsive"></div>
      <h3 class="artist">
        NIRVANA
      </h3>
    </div>

    <div class="col-md-2 col-md-6 col-md-12 width_change">
      <div class="images_person"><img src="{{asset('public/assets/images/greenday.png')}}" class="img-responsive"></div>
      <h3 class="artist">
        GREEN DAY
      </h3>

    </div>
    <div class="col-md-2 col-md-6 col-md-12 width_change">
      <div class="images_person"><img src="{{asset('public/assets/images/floyd.png')}}" class="img-responsive"></div>
      <h3 class="artist">
        PINK FLOYD
      </h3>

    </div>
    <div class="col-md-2 col-md-6 col-md-12 width_changes">
      <div class="images_person"><img src="{{asset('public/assets/images/zee.png')}}" class="img-responsive"></div>
      <h3 class="artist">
        JAY-Z
      </h3>

    </div>
  </div>
</div>

@endsection