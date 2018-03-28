@extends('layouts.dashboard_index')
@section('content')
<div class="col-md-9">
  <h3 class="heading_dashboard">
    @if (Session::has('status'))
    <div class="alert alert-info">{{ Session::get('status') }}</div>
    @endif
    @if (Session::has('password_status'))
    <div class="alert alert-info">{{ Session::get('password_status') }}</div>
    @endif
     @if (Session::has('link_status'))
    <div class="alert alert-info">{{ Session::get('link_status') }}</div>
    @endif
  ARTIST &nbsp; DASHBOARD
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
        <?php
        $musician_id = Auth::user()->id;
        ?>
        <a href="{{route('edit_account',['id'=>$musician_id])}}">
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
          <label for='name'>Full name</label>
          <input id='name' name='name' type='text' value='{{$musician->name}}' readonly>
        </div>
        <div class='field'>
          <label for='email'>Phone</label>
          <input id='email' name='phone' type='phone' value='{{$musician->phone}}' readonly>
        </div>
        <div class='field'>
          <label for='email'>Email</label>
          <input id='email' name='email' type='email' value='{{$musician->email}}' readonly>
        </div>
        <div class='field'>
          <label for='password'>Password</label>
          <input id='password' name='password' type='password' value="*********" readonly>
        </div>
        <div class='field'>
          <label for='username'>Username</label>
          <input id='username' name='username' type='username' value='{{$musician->username}}' readonly>
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
        <a href="{{route('edit_links',['id'=>$musician_id])}}">
        <h3 class="add_album">
        EDIT
        </h3>
        </a>
      </div>
    </div>
  <hr class="line">
    <div class='form'>
      <form >
        <div class='field'>
          <label for='name'>Facebook</label>
          <input id='facebook' name='facebook' type='text' value='{{$musician->facebook}}' readonly>
        </div>
        <div class='field'>
          <label for='email'>Twitter</label>
          <input id='twitter' name='twitter' type='text' value='{{$musician->twitter}}' readonly>
        </div>
        <div class='field'>
          <label for='email'>Instagram</label>
          <input id='instagram' name='instagram' type='text' value='{{$musician->instagram}}' readonly>
        </div>
      </form>
    </div>
</div>

@endsection