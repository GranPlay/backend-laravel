@extends('layouts.master')

@section('content')

{{ HTML::ul($errors->all()) }}
<div class="row p-h-md p-v bg-white box-shadow pos-rlt no-margin">
    <div class="col-lg-9 col-md-9 col-sm-9">
        <h3 class="no-margin">Price Time Policy</h3>
    </div>
    <div class="col-lg-3 col-md-9 col-sm-9">
        <!-- <button type="button" class="btn btn-warning"> -->
        <a class="btn btn-edit btn pull-right" style="padding: 5px 50px;"  href="{{url('/price_time_policy_create')}}">
        Create New Price/Time Policy</a>
        <!-- </button> -->
    </div>
</div>


  {{ method_field('PUT') }}
  {{ csrf_field() }}

  <div class="p-h-md p-v bg-white box-shadow pos-rlt well" style="margin: 22px;">
      <div class="row" >
          <div class="col-lg-6">
              <div class="row" >
                  <div class="col-lg-12"> <label id="textlabel"><b>Association Name :</b> {{$assoc->name}}</label></div>
              </div>
          </div>
      </div>
  </div>

<div class="p-h-md p-v bg-white box-shadow pos-rlt well" style="margin: 22px;">

    <div class="row" style="margin-bottom:14px; padding:0px;">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-2"> <label id="textlabel"><b>Policy Name : </b></label></div>
                <div class="col-lg-10">{{$pricetime->pricetimename}}</div>
            </div>
        </div>
  </div>

  <div class="row" style="margin-bottom:14px; padding:0px;">
      <div class="col-lg-12">
          <div class="row">
              <div class="col-lg-2"> <label id="textlabel"><b>Description : </b></label></div>
              <div class="col-lg-10">{{$pricetime->pricetimedesc}}</div>
          </div>
      </div>
</div>

<div class="row" style="margin-bottom:14px; padding:0px;">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-2"> <label id="textlabel"><b>Slot time : </b></label></div>
            <div class="col-lg-10">{{$pricetime->pricetimeslot}}&nbsp;minutes</div>
        </div>
    </div>
</div>

</div>

@endsection
