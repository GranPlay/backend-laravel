@extends('layouts.master')

@section('content')

<div class="row p-h-sm p-v bg-white box-shadow pos-rlt no-margin">
    <div class="col-lg-9 col-md-9 col-sm-9">
        <h3 class="no-margin">Scores</h3>
    </div>
</div>


<div class="" style="margin: 22px;">
  <div class="panel panel-default">
    <table class="table table-striped">
        <thead  style="background-color:#0E302B">
            <tr style="color:#ffffff">
                <th class="col-sm-1">S No.</th>
                <th class="col-sm-1">Created By</th>
                <th class="col-sm-1">Created On</th>
                <th class="col-sm-1">game type</th>
                <th class="col-sm-1">Reservation Date</th>
                <th class="col-sm-1">Winning Team</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="col-sm-1">1</td>
                <td class="col-sm-1">05:00</td>
                <td class="col-sm-1">05:00</td>
                <td class="col-sm-1">Tennis</td>
                <td class="col-sm-1">01 Nov 2017</td>
                <td class="col-sm-1">Team 1</td>
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
