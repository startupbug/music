@extends('layouts.promoter_index')
@section('content')
    <div class="col-md-9">
        <h3 class="heading_dashboard">
          PROMOTER DASHBOARD
     </h3>
     <div class="border_red">
        <h3 class="album">
            SETTINGS
        </h3>
    </div>
    <div class="row">
        <div class="col-md-12 color_bottom">
            <h3 class="all_album">
               ACCOUNT
            </h3>
            <?php $promoter_id = Auth::user()->id?>
            <h3 class="add_album">
              <a href="{{route('editpromoter',['id'=>$promoter_id])}}">
                EDIT
                </a>
            </h3>
        </div>
    </div>
    <hr class="line">
 <div class='form'>
    <form>
      <div class='field'>
        <label for='name'>Full name</label>
        <input id='name' name='name' type='text' value='{{($user->name)}}' readonly>
      </div>
      <div class='field'>
        <label for='email'>Phone</label>
        <input id='email' name='phone' type='phone' value='{{($user->phone)}}' readonly>
      </div>
      <div class='field'>
        <label for='email'>Email</label>
        <input id='email' name='email' type='email' value='{{($user->email)}}' readonly>
      </div>
      <div class='field'>
        <label for='password'>Password</label>
        <!--<input id='password' name='password' type='password' value=''>-->
           <input id='password' name='password' type='password' value="********" readonly>
      </div>
      <div class='field'>
        <label for='username'>Username</label>
        <input id='username' name='username' type='username' value='{{($user->username)}}' readonly>
      </div>     
      <div class='field'>
          <label for='account'>Account Type</label>
          <input id='account' name='account' type='account' value='{{$roles->name}}' readonly>
      </div>    
    </form>
  </div>
 <div class="row">
        <div class="col-md-12 color_bottom">
            <h3 class="all_album">
               LINKS
            </h3>
            <a href="{{route('promoter_edit_links',['id'=>$promoter_id])}}">
        <h3 class="add_album">
        EDIT
        </h3>
        </a>
        </div>
    </div>
    <hr class="line">
    <div class='form'>
    <form>
      <div class='field'>
        <label for='name'>Facebook</label>
        <input id='name' name='name' type='text' value='fb.com/king_lamar' readonly>
      </div>
      <div class='field'>
        <label for='email'>Twitter</label>
        <input id='email' name='phone' type='phone' value='twitter.com/KingLamar' readonly>
      </div>
      <div class='field'>
        <label for='email'>Instagram</label>
        <input id='email' name='email' type='email' value='@King_Lamar' readonly>
      </div>
      </form>
  </div>
</div>
</div>
</div>
</div>
@endsection