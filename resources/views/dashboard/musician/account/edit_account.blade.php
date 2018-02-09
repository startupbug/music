@extends('layouts.dashboard_index')
@section('content')      
      <div class="col-md-9">
        <h3 class="heading_dashboard">
             ARTIST DASHBOARD
        </h3>
        <div class="border_red">
          <h3 class="album">
              SETTINGS
          </h3>
        </div>
        <div class="row">
            <div class="col-md-12 color_bottom">
                <h3 class="all_album">
                   EDIT ACCOUNT INFORMATION
                </h3>
            </div>
        </div>
        <hr class="line">
        <div class='form'>          
          <form action="{{route('update_account',['id'=>$musician->id])}}" method="POST">
            {{csrf_field()}}
            <div class='fields'>
              <label for='name'>Full name</label>
              <input id='name' name='name' type='text' value="{{$musician->name}}" class="form-control" >
            </div>
            <div class='fields'>
              <label for='email'>Phone</label>
              <input id='email' name='phone' type='number' value="{{$musician->phone}}" class="form-control">
            </div>
            <div class='fields'>
              <label for='email'>Email</label>
              <input id='email' name='email' value="{{$musician->email}}" type='email' class="form-control">
            </div>
            <div class='fields'>
              <label for='password'>Password</label>
               <input id='password' name='password' type='password' value="{{$musician->password}}" class="form-control">
            </div>
            <div class='fields'>
              <label for='username'>Username</label>
              <input id='username' name='username' type='text' value="{{$musician->username}}" class="form-control">
            </div>
             <div class='fields'>
              <label for='account'>Account Type</label>
              <input id='account' name='account' type='text' value="{{$roles->name}}" class="form-control" readonly>
            </div>
            <div class="field-button">
             <button type="submit" name="button" class="btn btn-default" style="width:100%">Update</button>
           </div>          
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
