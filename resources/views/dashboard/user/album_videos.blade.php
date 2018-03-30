@extends('layouts.dashboard_index') 
@section('content')
<div class="col-md-9">
    <h3 class="heading_dashboard">
        ARTIST &nbsp; DASHBOARD
    </h3>
    <div class="border_red">
        <h3 class="album">
            MY &nbsp; ALBUMS
        </h3>
    </div>
    <div class="row">
      <div class="col-md-10 color_bottom">
          <h3 class="all_album">
              {{$edit_album->name}}
          </h3>
      </div>      
    </div>
    <hr class="line">
    <div class="row">
      <div class="col-md-3 col-sm-12 col-xs-12">
        <div class="dashboard_album">        
            <img src="{{asset('public/dashboard/musician/albums/images/'.$edit_album->image)}}" width="100%" class="img-thumbnail">        
        </div>
      </div>
    </div> 
    <div class="row">
      @foreach($all_videos as $value)
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard_album">
              <a href="{{route('musicvoting_genre',['id' => $value->id])}}">
             
              <video width="100%" height="160px" controls>
                <source src="{{asset('public/dashboard/musician/tracks/videos/'.$value->video)}}" type="video/mp4">             
              </video>
              </a>              
              <h3 class="album_person_name">
                {{$value->name}}
              </h3>
            </div>
        </div>
        <div class="modal fade" id="EditVideoModal{{$value->id}}" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>ADD VIDEO</b></h4>
              </div>
              <div class="modal-body">
                <form action="{{route('update_video',['id'=>$value->id])}}" enctype="multipart/form-data" method="post" >   
                {{csrf_field()}}       
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <input type="hidden" name="track_id" value="{{$value->id}}">
                      <h4><b>EDIT VIDEO</b></h4>
                      <div class="input-group">
                        <input type="text" class="form-control" readonly>
                        <label class="input-group-btn label_cus">
                            <span class="btn btn-primary">SELECT VIDEO
                              <input type="file" name="video" style="display: none;">
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
      @endforeach   
    </div>  
    <hr class="line">    
</div>
@endsection