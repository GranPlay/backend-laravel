@extends('layouts.auth')

@section('content')

<link rel="stylesheet" href="{{ route('baseurl') }}/bower_components/animate.css/animate.css" type="text/css" />
<link rel="stylesheet" href="{{ route('baseurl') }}/bower_components/bootstrap/dist/css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="{{ route('baseurl') }}/bower_components/font-awesome/css/font-awesome.css" type="text/css" />
<link rel="stylesheet" href="{{ route('baseurl') }}/styles/font.css" type="text/css" />
<link rel="stylesheet" href="{{ route('baseurl') }}/styles/app.css" type="text/css" />
<link rel="stylesheet" href="{{ route('baseurl') }}/styles/themify-icons.css" type="text/css" />

<style media="screen">
  .ui-checks input:checked + i:before {
   background-color: #FDBA4F;
 }

}
</style>

<div class="row">


        <div class="col-md-6 col-md-offset-2" >

            <div class=""align="center"><img src="{{ route('baseurl') }}/images/bigLogo.png" alt="GranPlay" height="65" width="212">
            </div><br>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label"></label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" placeholder="algeum@example.com" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="no-margin form-group{{ $errors->has('password') ? ' has-error' : '' }}" style="margin-top:-10px">
                        <label for="password" class="col-md-4 control-label"></label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" placeholder="password" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>



                        <div class="form-group">
                          <div class="col-md-6 col-md-offset-4" >
                            <div class="checkbox no-margin" >
                              <label class="ui-checks">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><i  style="background-color:#D3D3D3;color:black;" ></i> Keep me signed in
                              </label>
                            </div>
                          </div>
                        </div><br>



                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary" style="background-color:#FDBA4F; border-color: #FDBA4F #FDBA4F;padding: 9px 35px">
                            Access My Account
                        </button>
                        <br><br><a class="" href="{{ route('password.request') }}" style="color:#FDBA4F;">
                        I forgot my password
                    </a>
                    <br><br><p>Do you have an account?<a class="" href="{{ route('register') }}" style="color:#FDBA4F">
                        Sign Up
                    </a></p>
                            </div>
                        </div>
                    </form>
                </div>



</div>

<style>

.btn {
  display: inline-block;
  padding: 6px 12px;
  margin-bottom: 0;
  font-size: 14px;
  font-weight: normal;
  line-height: 1.02857143;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  cursor: pointer;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  background-image: none;
  border: 1px solid transparent;
  border-radius: 8px;
  padding: 10px 26px;
}

.btn-primary {
  color: #fff;
  background-color: #FDBA4F;
  border-color: #FDBA4F;
}

</style>


@endsection
