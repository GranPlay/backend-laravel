@extends('layouts.master')

@section('content')

{{ HTML::ul($errors->all()) }}
<div class="p-h-md p-v bg-white box-shadow pos-rlt">
  <h3 class="no-margin">Reservation Policy</h3>
</div>

<form class="" action="store_new_reservation_policy" method="post" enctype="multipart/form-data">

  {{ csrf_field() }}



    <div class="p-h-md p-v bg-white box-shadow pos-rlt well" style="margin: 22px;">
        <div class="row" style="margin-bottom:14px;">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-4"> <label id="textlabel">*Policy Name:</label></div>
                    <div class="col-lg-8"><input type="text"name="policyname"class="form-control"></div>
                </div>
            </div>
            @if (Auth::user()->roles == 1)
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-4"> <label id="textlabel">*Select Association:</label></div>
                    <div class="col-lg-6">
                      <select class="form-control" name="association">
                        @foreach (\App\Association::all() as $assoc)
                        <option value="{{ $assoc->id }}">{{ $assoc->name }}</option>
                        @endforeach
                      </select>
                    </div>
                </div>
            </div>
            @endif
        </div>

        <div class="row" style="margin-bottom:14px;">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-4"> <label id="textlabel">*Maximum Time Window For Reservation</label></div>
                    <div class="col-lg-5">
                      <select class="form-control" name="max_time_reservation">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>15</option>
                        <option>30</option>
                      </select>
                    </div>
                    <div class="col-lg-3">days</div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-4"> <label id="textlabel">*Maximum Reservations Allowed In Time Window:</label></div>
                    <div class="col-lg-6"><input type="text"name="max_reservatrions"class="form-control"></div>

                </div>
            </div>
        </div>

        <div class="row" style="margin-bottom:14px;">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-4"> <label id="textlabel">*Distance Of Players From Association For Successful Checkin (Meters):</label></div>
                    <div class="col-lg-5"><input type="text"name="players_distance"class="form-control"></div>
                    <div class="col-lg-3">meters</div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-4"> <label id="textlabel">*Minimum Time Window For Player Checkin To Uphold Reservation</label></div>
                    <div class="col-lg-5">
                      <select class="form-control" name="min_time_uphold_reservation">
                        <option>15</option>
                        <option>30</option>
                        <option>45</option>
                        <option>60</option>
                        <option>90</option>
                        <option>120</option>
                      </select>
                    </div>
                    <div class="col-lg-3">minutes</div>
                </div>
            </div>
        </div>






        <div class="row">
            <div class="col-lg-8"></div>
                <div class="col-lg-4">
                    <!-- <button type="button" class="btn btn-warning"> -->

                    <button type="submit" class="btn btn-edit" style="padding: 6px 50px;" >Submit</button>
                    <a class="btn btn-deactivate" style="padding: 6px 50px;" href="{{url('/reservation_policy/')}}">Cancel</a>

                    <!-- </button> -->
                </div>
        </div>


    </div>

  </form>


<!-- </div> -->




@endsection
