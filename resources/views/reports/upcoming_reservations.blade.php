@extends('layouts.master')

@section('content')

<div class="row p-h-sm p-v bg-white box-shadow pos-rlt no-margin">
    <div class="col-lg-9 col-md-9 col-sm-9">
        <h3 class="no-margin">Upcoming Reservations</h3>
    </div>
</div>

<div class="row" style="margin: 22px;">
  <div class="p-h-md p-v bg-white box-shadow pos-rlt col-lg-3 pull-right " style="border: 1px solid #e8ecf2;">
    <form class="input-group col-lg-12 pull-right">
      <input type="text" class="form-control no-border input-sm no-bg " maxlength="25" placeholder="Search Upcoming Reservations..." >
       <span class="input-group-btn" >
         <button type="submit" class="btn btn-sm no-bg btn-icon no-shadow no-padder"  style="background-color:#FDBA4F; border-radius:3px">
           <i class="ti-search" ></i>
         </button>
       </span>
     </form>
  </div>
</div>

<div class="" style="margin: 22px;">
  <div class="panel panel-default">
    <table class="table table-striped">
        <thead  style="background-color:#0E302B">
            <tr style="color:#ffffff">
                <th class="col-sm-1">S No.</th>
                <th class="col-sm-1">Name</th>
                <th class="col-sm-1">Court</th>
                <th class="col-sm-1">Date:</th>
                <th class="col-sm-1">Slot Time:</th>
                <th class="col-sm-2">Opponents Invited:</th>
                <th class="col-sm-2">Opponents Confirmed:</th>
                <th class="col-sm-1">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="col-sm-1">1</td>
                <td class="col-sm-1">Muneeb</td>
                <td class="col-sm-1">Hard Court</td>
                <td class="col-sm-1">01 Nov 2017</td>
                <td class="col-sm-1">1</td>
                <td class="col-sm-2">Team 1</td>
                <td class="col-sm-2">Team 1</td>
                <td class="col-sm-1">Pending</td>
            </tr>
        </tbody>
      </table>

        <div class="panel-heading"  style="background-color:#0E302B">
            <div class="row">
                <div class="col-sm-3 top-7" style="color:white">
                    Page Number: <b>1</b>

                </div>
                <div class="col-sm-4 pull-right" >
                  <button class="btn w-xs btn-edit pull-right" style="margin-left:5px">Next</button>
                  <button class="btn w-xs btn-edit pull-right">Previous</button>
                  <!-- <a class="btn w-xs btn-primary" >Edit</a> -->

                </div>
            </div>
        </div>




  </div>



</div>

@endsection
