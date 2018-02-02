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

 .ui-checks input[type="radio"] + i, .ui-checks input[type="radio"] + i:before {
    border-radius: 0%;
}
</style>



    <div class="row">

          <div class="col-md-6 col-md-offset-2">

          <div class=""align="center"><img src="{{ route('baseurl') }}/images/bigLogo.png" alt="GranPlay" height="65" width="212">
          </div><br>



                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" placeholder="Full Name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" style="margin-top:-10px" placeholder="E-Mail Address" value="{{ old('email') }}" required >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" style="margin-top:-10px" placeholder="Password" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" style="margin-top:-10px" placeholder="Confirm Password"name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <input id="phone" pattern="[0-9+]{8,16}" class="form-control" name="phone" style="margin-top:-10px" placeholder="Phone No." value="{{ old('phone') }}" required >

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div>
                            <label for="email" class="col-md-4 control-label"></label>

                            <div class="col-md-6"style="margin-top:-10px">
                                <div class="checkbox">
                                 <label class="ui-checks ui-checks-lg">
                                   <input type="radio" name="gender" value="1" checked>
                                   <i></i>Male
                                 </label>

                                 <label class="ui-checks ui-checks-lg" style="padding-left:40px">
                                   <input type="radio" name="gender" value="0 ">
                                   <i></i>Female
                                 </label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox no-margin">
                                    <label class="ui-checks">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> <i style="background-color:#D3D3D3;color:black;" ></i>I Have Read And Agree To The
                                        <a class="" target="_blank" href="{{url('/terms_of_use')}}" style="color:#FDBA4F;">
                                        Terms Of Use
                                        </a> And
                                        <a class="" target="_blank" href="{{url('/private_policies')}}" style="color:#FDBA4F;">
                                        Privacy Policy
                                        </a>
                                    </label>
                                </div>

                                <br><p>Already have an account?<a class="" href="{{ route('login') }}" style="color:#FDBA4F">
                                    Access my account
                                </a></p>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" style="background-color:#FDBA4F; border-color: #FDBA4F #FDBA4F;">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
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
  padding: 10px 16px;
}

.btn-primary {
  color: #fff;
  background-color: #FDBA4F;
  border-color: #FDBA4F;
}

</style>

@endsection
