@extends('layouts.master')

@section('content')

<style media="screen">
  .ui-checks input:checked + i:before {
   background-color: #0E302B;
 }

 .ui-checks input[type="radio"] + i, .ui-checks input[type="radio"] + i:before {
    border-radius: 0%;
}
</style>

<div class="row p-h-sm p-v bg-white box-shadow pos-rlt no-margin">
    <div class="col-lg-9 col-md-9 col-sm-9">
        <h3 class="no-margin">App Users / Members</h3>
    </div>
</div>

<div class="row" style="margin:22px">
  <div class="col-lg-4" style="padding-top:5px">
    <div class="checkbox">
     <label class="ui-checks ui-checks-lg">
       <input type="radio" name="a" checked>
       <i></i>
       Both
     </label>

     <label class="ui-checks ui-checks-lg" style="padding-left:40px">
       <input type="radio" name="a">
       <i></i>
       App Users
     </label>
     <label class="ui-checks ui-checks-lg" style="padding-left:40px">
       <input type="radio" name="a">
       <i></i>
       Members
     </label>
    </div>
  </div>

    <div class="p-h-md p-v bg-white box-shadow pos-rlt col-lg-3 pull-right " style="border: 1px solid #e8ecf2;">
      <form class="input-group col-lg-12 pull-right">
        <input type="text" class="form-control no-border input-sm no-bg " maxlength="25" placeholder="Search App Users / Members`..." >
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
                    <th class="col-sm-2">Email Address:</th>
                    <th class="col-sm-1">Status</th>
                    <th class="col-sm-1">Phone</th>
                    <th class="col-sm-1">Gender</th>
                    <th class="col-sm-1">Membership Start</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="col-sm-1">1</td>
                    <td class="col-sm-1">Muneeb</td>
                    <td class="col-sm-2">muneeb@granplay.com</td>
                    <td class="col-sm-1">Active</td>
                    <td class="col-sm-1">+123345</td>
                    <td class="col-sm-1">Male</td>
                    <td class="col-sm-1">Membership Start</td>
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
