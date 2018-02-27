@extends('layouts.app')

@section('content')
<div class="container">
  <div class="modal fade" id="myLoginModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <!-- Modal content-->
      <div class="modal-content">
        <h4 class="login-title">Login</h4>
        <div class="modal-body">
          {{dd(123456)}}
          <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <input type="email" class="form-control red-color" id="email" placeholder="Email">
                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <input type="password" class="form-control red-color" id="pwd" placeholder="Password">
                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-default" style="width:100%">Submit</button>
            </div>
          </form>
        </div>
        <div class="login-footer">
          <a href="{{url('register')}}">Don`t have an account? Sign Up Now!</a>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
