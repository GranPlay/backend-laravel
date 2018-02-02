@extends('layouts.master')

@section('content')

{{ HTML::ul($errors->all()) }}
<div class="row p-h-md p-v bg-white box-shadow pos-rlt no-margin">
    <div class="col-lg-9 col-md-9 col-sm-9">
        <h3 class="no-margin">Reservation Policy</h3>
    </div>
    <div class="col-lg-3 col-md-8 col-sm-9">
        <!-- <button type="button" class="btn btn-warning"> -->
        <a class="btn btn-edit btn pull-right" style="padding: 5px 50px;" href="{{url('/create_new_reservation_policy')}}">
        Create New Reservation Policy</a>
        <!-- </button> -->
    </div>
</div>

<!-- <div class="container col-lg-12 "> -->


  {{ method_field('PUT') }}
  {{ csrf_field() }}

  <div class="p-h-md p-v bg-white box-shadow pos-rlt well" style="margin: 22px;">
      <div class="row" >
          <div class="col-lg-6">
              <div class="row" >
                  <div class="col-lg-6"> <label id="textlabel">Association Name:{{$assoc->name}}</label></div>
                  <div class="col-lg-5"></div>
              </div>
          </div>
      </div>
  </div>



    <div class="p-h-md p-v bg-white box-shadow pos-rlt well" style="margin: 22px;">

        <div class="row" style="margin-bottom:14px;">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-9"> <label id="textlabel">Policy Name:</label></div>
                    <div class="col-lg-2">{{$res->policyname}}</div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-bottom:14px;">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-9"> <label id="textlabel">Maximum Time Window For Reservation</label></div>
                    <div class="col-lg-2">{{$res->max_time_reservation}}&nbsp;days</div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-bottom:14px;">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-9"> <label id="textlabel">Minimum Time Window For Player Checkin To Uphold Reservation</label></div>
                    <div class="col-lg-2 ">{{$res->min_time_uphold_reservation}}&nbsp;minutes</div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-bottom:14px;">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-9"> <label id="textlabel">Distance Of Players From Association For Successful Checkin (Meters):</label></div>
                    <div class="col-lg-2">{{$res->players_distance}}&nbsp;meters</div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-bottom:14px;">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-9"> <label id="textlabel">System Auto-Checkin Player When Inside The Defined Zone:</label></div>
                    <div class="col-lg-2">{{$res->auto_checkin}}</div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-bottom:14px;">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-9"> <label id="textlabel">System Sends Game Reminders/Notifications To Player At Fixed Intervals:</label></div>
                    <div class="col-lg-2">{{$res->game_reminders_notification}}</div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-bottom:14px;">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-9"> <label id="textlabel">Maximum Reservations Allowed In Time Window:</label></div>
                    <div class="col-lg-2">{{$res->max_reservatrions}}</div>
                </div>
            </div>
        </div>



        <div class="row" style="margin-bottom:14px;">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-9"> <label id="textlabel">System Sends Reservation Cancellation Reminder/Notifications To Players:</label></div>
                    <div class="col-lg-2">{{$res->cancel_reservation_notification}}</div>
                </div>
            </div>
        </div>


    </div>




<!-- </div>

@endsection
