@extends('layouts.master')

@section('content')

{{ HTML::ul($errors->all()) }}

<div class="p-h-md p-v bg-white box-shadow pos-rlt">
  <h3 class="no-margin">Edit Profile</h3>
</div>

@if(Session::has('message'))
  <div class="text-center">
      <div class="row">
          <div class="col-lg-4 col-lg-offset-4">
              <div class="alert alert-success no-border">
                  <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                  <span class="text-semibold">Success!</span> {{ Session::get('message') }}
              </div>
          </div>
      </div>
  </div>
  @endif


<form class="" action="" method="post" enctype="multipart/form-data">

  {{ csrf_field() }}



<div class="p-h-md p-v bg-white box-shadow pos-rlt well" style="margin: 22px;">

    <p style="font-size:20px">Update Password</p>

    <div class="row" style="margin-bottom:14px;">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-4"> <label id="textlabel">New Password:</label></div>
                <div class="col-lg-8"><input type="text" name="name" class="form-control"></div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-bottom:14px;">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-4"> <label id="textlabel">Confirm New Password:</label></div>
                <div class="col-lg-8"><input type="text" name="name" class="form-control"></div>
            </div>
        </div>
    </div>





    <div class="row">
      <div class="col-lg-8"></div>
      <div class="col-lg-4">


        <button type="submit" class="btn btn-edit"  style="padding: 6px 50px;">Update</button>
        <!-- <a class="btn w-xs btn-danger" href="">Cancel</a> -->
          <a class="btn btn-deactivate" style="padding: 6px 50px;" href="">Cancel</a>

      </div>
    </div>


</div>

</form>



@endsection
