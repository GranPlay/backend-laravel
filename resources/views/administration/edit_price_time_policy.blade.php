@extends('layouts.master')

@section('content')

{{ HTML::ul($errors->all()) }}
<div class="p-h-md p-v bg-white box-shadow pos-rlt">
  <h3 class="no-margin">Price/Time Policy</h3>
</div>

<form class="" action="{{url('/price_time_policy_update/'.$pricetime->id)}}" method="post" enctype="multipart/form-data">

  {{ method_field('PUT') }}
  {{ csrf_field() }}

<div class="p-h-md p-v bg-white box-shadow pos-rlt well" style="margin: 22px;">

    <div class="row" style="margin-bottom:14px; padding:0px;">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-4"> <label id="textlabel">*Policy Name:</label></div>
                <div class="col-lg-8"><input type="text" name="pricetimename"class="form-control" value="{{$pricetime->pricetimename}}"></div>
            </div>
        </div>
        @if (Auth::user()->roles == 2)
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-4"> <label id="textlabel">*Select Association:</label></div>
                <div class="col-lg-8">
                  <select class="form-control" name="assoc_id">
                    @foreach (\App\Association::all() as $assoc)
                    <option {{($pricetime->assoc_id == $assoc->id)?'selected="selected"':''}} value="{{ $assoc->id }}">{{ $assoc->name }}</option>
                    @endforeach
                  </select>
                </div>
            </div>
        </div>
        @endif
    </div>

    <div class="row" style="margin-bottom:14px;">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-2"> <label id="textlabel">Description:</label></div>
                <div class="col-lg-10"><textarea name="pricetimedesc" class="form-control" rows="8">{{$pricetime->pricetimedesc}}</textarea></div>
            </div>
        </div>
    </div>


    <div class="row" style="padding-right:10px;">
      <div class="col-lg-8">
      </div>
      <div class="col-lg-2" align="center">
          <button type="submit" class="btn btn-edit"  style="padding: 6px 50px;">Update</button>
      </div>
      <div class="col-lg-2" align="center">
        <a class="btn btn-deactivate" style="padding: 6px 50px;" href="{{url('/price_time_policy/')}}">Cancel</a>
      </div>
    </div>

    </form>
  </div>
@endsection
