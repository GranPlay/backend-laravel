@extends('layouts.master')

@section('content')
<div class="row p-h-md p-v bg-white box-shadow pos-rlt no-margin">
    <div class="col-lg-9 ">
        <h3 class="no-margin">Reservation Policy</h3>
    </div>
    <div class="col-lg-3">
        <!-- <button type="button" class="btn btn-warning"> -->
        <a class="btn btn-main pull-right" style="padding: 5px 50px;" href="{{url('/create_new_reservation_policy')}}">
        Create New Reservation Policy</a>
        <!-- </button> -->
    </div>
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

  <div class="row" style="margin: 22px;">
    <div class="p-h-md p-v bg-white box-shadow pos-rlt col-lg-3 pull-right " style="border: 1px solid #e8ecf2;">
      <form class="input-group col-lg-12 pull-right">
        <input type="text" class="form-control no-border input-sm no-bg " maxlength="25" placeholder="Search Reservation Policy..." >
         <span class="input-group-btn" >
           <button type="submit" class="btn btn-sm no-bg btn-icon no-shadow no-padder"  style="background-color:#FDBA4F; border-radius:3px">
             <i class="ti-search" ></i>
           </button>
         </span>
       </form>
    </div>
  </div>


<div ui-view="" style="margin: 22px;">
  <div class="panel panel-default">
    <table class="table table-striped">
      <thead  style="background-color:#0E302B">
        <tr style="color:#ffffff">
          <th class="">S No.</th>
          <th class="">Policy Name</th>
          <th class="">Max Res/Time</th>
          <th class="">Players Distance</th>
          <th class="">CheckIn Time</th>
          <th class="">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($reservation_view as $res)
        <tr >
          <td class="col-sm-1">{{ $res->id }}</td>
          <td>
          <a href="{{url('/view_reservation_policy/'.$res->id)}}"> {{ $res->policyname }}</a>
          </td>
          <td><span>{{ $res->max_time_reservation }}&nbsp;days</span></td>
          <td><span>{{ $res->players_distance }}&nbsp;meters</span></td>
          <td><span>{{ $res->min_time_uphold_reservation }}&nbsp;minutes</span></td>

          <td class="col-sm-4">

            <a class="btn w-xs btn-edit"  href="{{url('/edit_reservation_policy/'.$res->id)}}">Edit</a>
            <a class="btn w-xs btn-deactivate"  href="{{url('/delete_reservation_policy/'.$res->id)}}">Deactivate</a>

          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="panel-heading" style="background-color:#0E302B">
        <div class="row">
            <div class="col-sm-3 top-7" style="color:white">
                Page Number: <b>1</b>
                <!-- Page Number: <b>1</b> -->

            </div>
            <div class="col-sm-4 pull-right">
                <!-- {{$reservation_view->render()}} -->
                <button class="btn w-xs btn-edit pull-right" style="margin-left:5px">Next</button>
                <button class="btn w-xs btn-edit pull-right">Previous</button>

                <!-- <button class="btn w-xs btn-primary pull-right">Next</button>
                <button class="btn w-xs btn-primary pull-right">Previous</button> -->
            </div>
        </div>
    </div>

  </div>
</div>

@endsection
