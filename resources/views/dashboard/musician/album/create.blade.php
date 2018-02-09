@extends('layouts.dashboard_index')
@section('content')

<div class="col-md-9">
    <h3 class="heading_dashboard">
        ARTIST DASHBOARD
    </h3>
    <div class="border_red">
        <h3 class="album">
            Create ALBUM
        </h3>
    </div>
    <div class="row">
        <div class="col-md-12 color_bottom">
            <h3 class="all_album">
                LET YOUR VOICE BEHEARD!
            </h3>
        </div>
    </div>
    <hr class="line">
    <div class="row">
      <div class="col-md-7 col-sm-12 col-xs-12 col-md-offset-3 ">
        <h3>SELECT TRACKS</h3>
        <div class="input-group">
          <input type="text" class="form-control" readonly>
          <label class="input-group-btn label_cus">
              <span class="btn btn-primary">SELECT FILES<input type="file" style="display: none;" multiple>
              </span>
          </label>
        </div>
      </div>
      <div class="col-md-7 col-sm-12 col-xs-12 col-md-offset-3">
        <h3>SELECT ALBUM COVER ART</h3>
        <div class="input-group">
          <input type="text" class="form-control" readonly>
          <label class="input-group-btn label_cus">
              <span class="btn btn-primary">SELECT A FILE<input type="file" style="display: none;" multiple>
              </span>
          </label>
        </div>
      </div>
      <div class="col-md-7 col-sm-12 col-xs-12 col-md-offset-3">
        <div class="input-group">
          <button type="button" name="button" class="btn btn-primary">UPLOAD</button>
        </div>
      </div>
    </div>
</div>
@endsection
