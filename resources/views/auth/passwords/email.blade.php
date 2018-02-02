@extends('layouts.auth')

@section('content')

<link rel="stylesheet" href="{{ route('baseurl') }}/bower_components/animate.css/animate.css" type="text/css" />
<link rel="stylesheet" href="{{ route('baseurl') }}/bower_components/bootstrap/dist/css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="{{ route('baseurl') }}/bower_components/font-awesome/css/font-awesome.css" type="text/css" />
<link rel="stylesheet" href="{{ route('baseurl') }}/styles/font.css" type="text/css" />
<link rel="stylesheet" href="{{ route('baseurl') }}/styles/app.css" type="text/css" />
<link rel="stylesheet" href="{{ route('baseurl') }}/styles/themify-icons.css" type="text/css" />



    <div class="row">



          <div class="col-md-7 col-md-offset-2">

          <div class=""align="center"><img src="{{ route('baseurl') }}/images/bigLogo.png" alt="GranPlay" height="65" width="212">
          </div><br>


                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" placeholder="E-Mail Address" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary" style="background-color:#FDBA4F; border-color: #FDBA4F #FDBA4F;">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">

                          <br><p>Do you have an account?<a class="" href="{{ route('login') }}" style="color:#FDBA4F">
                          Access my account
                            </a></p>
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
