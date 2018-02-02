@extends('layouts.master')

@section('content')

{{ HTML::ul($errors->all()) }}
<div class="p-h-md p-v bg-white box-shadow pos-rlt">
  <h3 class="no-margin">Price/Time Policy</h3>
</div>

<form class="" action="price_time_policy_store" method="post" enctype="multipart/form-data">

{{ csrf_field() }}

<div class="p-h-md p-v bg-white box-shadow pos-rlt well" style="margin: 22px;">

    <div class="row" style="margin-bottom:14px; padding:0px;">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-4"> <label id="textlabel">Policy Name <span style="color:red">*</span> :</label></div>
                <div class="col-lg-8"><input type="text" name="pricetimename"class="form-control" value="{{old('pricetimename')}}" required></div>
            </div>
        </div>
        @if (Auth::user()->roles == 2)
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-4"> <label id="textlabel">Select Association <span style="color:red">*</span> :</label></div>
                <div class="col-lg-8">
                  <select class="form-control" name="assoc_id" required>
                    @foreach (\App\Association::all() as $assoc)
                    <option value="{{ $assoc->id }}" {{(old('assoc_id')==$assoc->id)?'selected':''}}>{{ $assoc->name }}</option>
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
                <div class="col-lg-2"> <label id="textlabel">Description <span style="color:red">*</span> :</label></div>
                <div class="col-lg-10"><textarea name="pricetimedesc" class="form-control" rows="8" required>{{old('pricetimedesc')}}</textarea></div>
            </div>
        </div>
    </div>



    <div class="row">
    <div class="col-lg-8"></div>
      <div class="col-lg-4">
          <button type="submit" class="btn btn-edit"  style="padding: 6px 50px;">Submit</button>
          <a class="btn btn-deactivate"  style="padding: 6px 50px;" href="{{url('/price_time_policy')}}">Cancel</a>
  </div>
</div>


</div>

</form>

@endsection
