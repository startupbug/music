@extends('layouts.user_index')
@section('content')
      <div class="col-md-9">
        <h3 class="heading_dashboard">
             USER DASHBOARD
        </h3>
        <div class="border_red">
          <h3 class="album">
              SETTINGS
          </h3>
        </div>

        <div class="row">
          <div class="col-md-12 color_bottom">
              <h3 class="all_album">
                 EDIT LINKS
              </h3>
          </div>
        </div>
        <hr class="line">
        <div class='form'>
         <form action="{{route('user_update_links',['id'=>$user->id])}}" method="POST">
          {{csrf_field()}}
            <div class='fields'>
              <label for='name'>Facebook</label>
              <input id='facebook' name='facebook' type='text' value="{{$user->facebook}}" class="form-control">
            </div>
            <div class='fields'>
              <label for='email'>Twitter</label>
              <input id='twitter' name='twitter' type='text' value="{{$user->twitter}}" class="form-control">
            </div>
            <div class='fields'>
              <label for='email'>Instagram</label>
              <input id='instagram' name='instagram' type='text' value="{{$user->instagram}}" class="form-control">
            </div>
            <div class="field-button">
             <button type="submit" name="button" class="btn btn-default" style="width:100%">Update</button>
           </div>    
          </form>
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
      </div>
    </div>
  </div>
</div>
@endsection
