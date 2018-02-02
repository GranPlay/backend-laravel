@extends('layouts.master')

@section('content')

{{ HTML::ul($errors->all()) }}
<div class="p-h-md p-v bg-white box-shadow pos-rlt">
  <h3 class="no-margin">Managers</h3>
</div><br>

<form class="" action="store_new_managers" method="post" enctype="multipart/form-data">

{{ csrf_field() }}

<div class="p-h-md p-v bg-white box-shadow pos-rlt well" style="margin: 22px;">

<div class="row" style="margin-bottom:14px;  padding:10px;"><br>
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-4"> <label id="textlabel">Manager Name:</label></div>
                <div class="col-lg-8"><input type="text"name="weburl"class="form-control"></div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-4"> <label id="textlabel">Create New Manager</label></div>
                <div class="col-lg-8"><input type="text"name="fburl"class="form-control"></div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-bottom:14px;">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-4"> <label id="textlabel">All Permissions</label></div>
                    <div class="col-lg-5">
                        <label class="ui-switch m-t-xs m-r">
                            <input type="checkbox" id="allpermissions">
                            <i></i>
                        </label>
                    </div>

                </div>
            </div>
    </div>

    <script>
    $('#allpermissions').on('change', function() {
      // console.log($('#allpermissions').val());
      if ($('#allpermissions').is(":checked")) {
        // console.log(1);
        $('input:checkbox').not(this).prop('checked', true);
      }
      else {
        // console.log(0);
        $('input:checkbox').not(this).prop('checked', false);
      }
    });
    </script>




    <table class="table table-striped bordered-table">
      <thead>
        <tr>
          <th class="col-sm-1">S No.</th>
          <th class="col-sm-3">Module</th>
          <th class="col-sm-7">permissions</th>
          <th class="col-sm-1 ">all</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="col-sm-1">1</td>
          <td class="col-sm-2"> <a>Association</a> </td>
          <td class="col-sm-8">
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">enable: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allassoc"> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">view: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allassoc"> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">create: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allassoc"> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">Update: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allassoc"> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">delete: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox"  class="allassoc"> <i></i> </label>
              </div>
          </td>
          <td class="col-sm-1 ">
              <div>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allassociation"> <i></i> </label>
              </div>
          </td>
        </tr>

        <script>
        $('.allassociation').on('change', function() {
          // console.log($('#allpermissions').val());
          if ($('.allassociation').is(":checked")) {
            // console.log(1);
            $('.allassoc').not(this).prop('checked', true);
          }
          else {
            // console.log(0);
            $('.allassoc').not(this).prop('checked', false);
          }
        });
        </script>

        <tr>
          <td class="col-sm-1">2</td>
          <td class="col-sm-2"> <a>Courts</a> </td>
          <td class="col-sm-8">
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">enable: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allcourt"> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">view: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allcourt"> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">create: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allcourt"> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">Update: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allcourt"> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">delete: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allcourt"> <i></i> </label>
              </div>
          </td>
          <td class="col-sm-1 ">
              <div>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allcourts"> <i></i> </label>
              </div>
          </td>
        </tr>

        <script>
        $('.allcourts').on('change', function() {
          // console.log($('#allpermissions').val());
          if ($('.allcourts').is(":checked")) {
            // console.log(1);
            $('.allcourt').not(this).prop('checked', true);
          }
          else {
            // console.log(0);
            $('.allcourt').not(this).prop('checked', false);
          }
        });
        </script>

        <tr>
          <td class="col-sm-1">3</td>
          <td class="col-sm-2"> <a>Price/Time Policy</a> </td>
          <td class="col-sm-8">
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">enable: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allpricetimepolicy"> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">view: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allpricetimepolicy"> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">create: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allpricetimepolicy"> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">Update: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allpricetimepolicy"> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">delete: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allpricetimepolicy"> <i></i> </label>
              </div>
          </td>
          <td class="col-sm-1 ">
              <div>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allpricetimepolicies"> <i></i> </label>
              </div>
          </td>
        </tr>

        <script>
        $('.allpricetimepolicies').on('change', function() {
          // console.log($('#allpermissions').val());
          if ($('.allpricetimepolicies').is(":checked")) {
            // console.log(1);
            $('.allpricetimepolicy').not(this).prop('checked', true);
          }
          else {
            // console.log(0);
            $('.allpricetimepolicy').not(this).prop('checked', false);
          }
        });
        </script>

        <tr>
          <td class="col-sm-1">4</td>
          <td class="col-sm-2"> <a>Reservation Policy</a> </td>
          <td class="col-sm-8">
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">enable: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allreservationpolicy"> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">view: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allreservationpolicy"> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">create: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allreservationpolicy"> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">Update: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allreservationpolicy"> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">delete: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allreservationpolicy" > <i></i> </label>
              </div>
          </td>
          <td class="col-sm-1 ">
              <div>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allreservationpolicies"> <i></i> </label>
              </div>
          </td>
        </tr>

        <script>
        $('.allreservationpolicies').on('change', function() {
          // console.log($('#allpermissions').val());
          if ($('.allreservationpolicies').is(":checked")) {
            // console.log(1);
            $('.allreservationpolicy').not(this).prop('checked', true);
          }
          else {
            // console.log(0);
            $('.allreservationpolicy').not(this).prop('checked', false);
          }
        });
        </script>

        <tr>
          <td class="col-sm-1">5</td>
          <td class="col-sm-2"> <a>Members</a> </td>
          <td class="col-sm-8">
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">enable: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allmember"> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">view: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allmember"> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">create: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allmember"> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">Update: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allmember"> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">delete: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allmember"> <i></i> </label>
              </div>
          </td>
          <td class="col-sm-1 ">
              <div>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allmembers"> <i></i> </label>
              </div>
          </td>
        </tr>

        <script>
        $('.allmembers').on('change', function() {
          // console.log($('#allpermissions').val());
          if ($('.allmembers').is(":checked")) {
            // console.log(1);
            $('.allmember').not(this).prop('checked', true);
          }
          else {
            // console.log(0);
            $('.allmember').not(this).prop('checked', false);
          }
        });
        </script>

        <tr>
          <td class="col-sm-1">6</td>
          <td class="col-sm-2"> <a>Court Photos</a> </td>
          <td class="col-sm-8">
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">enable: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allcourtphoto"> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">view: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allcourtphoto"> <i></i> </label>
              </div>
              <!-- <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">create: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox"> <i></i> </label>
              </div> -->
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">Upload: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allcourtphoto"> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">delete: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allcourtphoto"> <i></i> </label>
              </div>
          </td>
          <td class="col-sm-1 ">
              <div>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allcourtphotos"> <i></i> </label>
              </div>
          </td>
        </tr>

        <script>
        $('.allcourtphotos').on('change', function() {
          // console.log($('#allpermissions').val());
          if ($('.allcourtphotos').is(":checked")) {
            // console.log(1);
            $('.allcourtphoto').not(this).prop('checked', true);
          }
          else {
            // console.log(0);
            $('.allcourtphoto').not(this).prop('checked', false);
          }
        });
        </script>

        <tr>
          <td class="col-sm-1">7</td>
          <td class="col-sm-2"> <a>Association Photos</a> </td>
          <td class="col-sm-8">
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">enable: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allassociationphoto"> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">view: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allassociationphoto"> <i></i> </label>
              </div>
              <!-- <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">create: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox"> <i></i> </label>
              </div> -->
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">Upload: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allassociationphoto"> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">delete: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allassociationphoto"> <i></i> </label>
              </div>
          </td>
          <td class="col-sm-1 ">
              <div>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allassociationphotos"> <i></i> </label>
              </div>
          </td>
        </tr>

        <script>
        $('.allassociationphotos').on('change', function() {
          // console.log($('#allpermissions').val());
          if ($('.allassociationphotos').is(":checked")) {
            // console.log(1);
            $('.allassociationphoto').not(this).prop('checked', true);
          }
          else {
            // console.log(0);
            $('.allassociationphoto').not(this).prop('checked', false);
          }
        });
        </script>

        <tr>
          <td class="col-sm-1">8</td>
          <td class="col-sm-2"> <a>Reservations</a> </td>
          <td class="col-sm-8">
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">enable: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allreservation"> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">view: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allreservation"> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">create: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allreservation"> <i></i> </label>
              </div>
              <!-- <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">Upload: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox"> <i></i> </label>
              </div> -->
              <!-- <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">delete: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox"> <i></i> </label>
              </div> -->
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">cancel: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allreservation"> <i></i> </label>
              </div>
          </td>
          <td class="col-sm-1 ">
              <div>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allreservations"> <i></i> </label>
              </div>
          </td>
        </tr>

        <script>
        $('.allreservations').on('change', function() {
          // console.log($('#allpermissions').val());
          if ($('.allreservations').is(":checked")) {
            // console.log(1);
            $('.allreservation').not(this).prop('checked', true);
          }
          else {
            // console.log(0);
            $('.allreservation').not(this).prop('checked', false);
          }
        });
        </script>

        <tr>
          <td class="col-sm-1">9</td>
          <td class="col-sm-2"> <a>Past Reservations</a> </td>
          <td class="col-sm-8">
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">enable: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allpastreservation"> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">view: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allpastreservation"> <i></i> </label>
              </div>
              <!-- <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">create: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox"> <i></i> </label>
              </div> -->
              <!-- <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">Upload: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox"> <i></i> </label>
              </div> -->
              <!-- <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">delete: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox"> <i></i> </label>
              </div> -->
              <!-- <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">cancel: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox"> <i></i> </label>
              </div> -->
          </td>
          <td class="col-sm-1 ">
              <div>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allpastreservations"> <i></i> </label>
              </div>
          </td>
        </tr>

        <script>
        $('.allpastreservations').on('change', function() {
          // console.log($('#allpermissions').val());
          if ($('.allpastreservations').is(":checked")) {
            // console.log(1);
            $('.allpastreservation').not(this).prop('checked', true);
          }
          else {
            // console.log(0);
            $('.allpastreservation').not(this).prop('checked', false);
          }
        });
        </script>

        <tr>
          <td class="col-sm-1">10</td>
          <td class="col-sm-2"> <a>Cancel Reservations</a> </td>
          <td class="col-sm-8">
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">enable: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allcanelreservation"> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">view: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allcancelreservation"> <i></i> </label>
              </div>
              <!-- <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">create: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox"> <i></i> </label>
              </div> -->
              <!-- <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">Upload: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox"> <i></i> </label>
              </div> -->
              <!-- <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">delete: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox"> <i></i> </label>
              </div> -->
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">cancel: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allcancelreservation"> <i></i> </label>
              </div>
          </td>
          <td class="col-sm-1 ">
              <div>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allcancelreservations"> <i></i> </label>
              </div>
          </td>
        </tr>

        <script>
        $('.allcancelreservations').on('change', function() {
          // console.log($('#allpermissions').val());
          if ($('.allcancelreservations').is(":checked")) {
            // console.log(1);
            $('.allcancelreservation').not(this).prop('checked', true);
          }
          else {
            // console.log(0);
            $('.allcancelreservation').not(this).prop('checked', false);
          }
        });
        </script>

        <tr>
          <td class="col-sm-1">11</td>
          <td class="col-sm-2"> <a>Notifications</a> </td>
          <td class="col-sm-8">
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">enable: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allnotification"> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">view: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allnotification"> <i></i> </label>
              </div>
              <!-- <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">create: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox"> <i></i> </label>
              </div> -->
              <!-- <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">Upload: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox"> <i></i> </label>
              </div> -->
              <!-- <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">delete: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox"> <i></i> </label>
              </div> -->
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">add: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allnotification"> <i></i> </label>
              </div>
          </td>
          <td class="col-sm-1 ">
              <div>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allnotifications"> <i></i> </label>
              </div>
          </td>
        </tr>

        <script>
        $('.allnotifications').on('change', function() {
          // console.log($('#allpermissions').val());
          if ($('.allnotifications').is(":checked")) {
            // console.log(1);
            $('.allnotification').not(this).prop('checked', true);
          }
          else {
            // console.log(0);
            $('.allnotification').not(this).prop('checked', false);
          }
        });
        </script>

        <tr>
          <td class="col-sm-1">12</td>
          <td class="col-sm-2"> <a>App Users</a> </td>
          <td class="col-sm-8">
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">enable: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allappuser"> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">view: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allappuser"> <i></i> </label>
              </div>
              <!-- <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">create: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox"> <i></i> </label>
              </div> -->
              <!-- <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">Upload: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox"> <i></i> </label>
              </div> -->
              <!-- <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">delete: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox"> <i></i> </label>
              </div> -->
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">add: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allappuser"> <i></i> </label>
              </div>
          </td>
          <td class="col-sm-1 ">
              <div>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allappusers"> <i></i> </label>
              </div>
          </td>
        </tr>

        <script>
        $('.allappusers').on('change', function() {
          // console.log($('#allpermissions').val());
          if ($('.allappusers').is(":checked")) {
            // console.log(1);
            $('.allappuser').not(this).prop('checked', true);
          }
          else {
            // console.log(0);
            $('.allappuser').not(this).prop('checked', false);
          }
        });
        </script>

        <tr>
          <td class="col-sm-1">13</td>
          <td class="col-sm-2"> <a>Upload Players</a> </td>
          <td class="col-sm-8">
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">enable: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="alluploadplayer"> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">view: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="alluploadplayer"> <i></i> </label>
              </div>
              <!-- <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">create: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox"> <i></i> </label>
              </div> -->
              <!-- <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">Upload: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox"> <i></i> </label>
              </div> -->
              <!-- <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">delete: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox"> <i></i> </label>
              </div> -->
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">add: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="alluploadplayer"> <i></i> </label>
              </div>
          </td>
          <td class="col-sm-1 ">
              <div>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="alluploadplayers"> <i></i> </label>
              </div>
          </td>
        </tr>

        <script>
        $('.alluploadplayers').on('change', function() {
          // console.log($('#allpermissions').val());
          if ($('.alluploadplayers').is(":checked")) {
            // console.log(1);
            $('.alluploadplayer').not(this).prop('checked', true);
          }
          else {
            // console.log(0);
            $('.alluploadplayer').not(this).prop('checked', false);
          }
        });
        </script>

        <tr>
          <td class="col-sm-1">14</td>
          <td class="col-sm-2"> <a>Reporting Players</a> </td>
          <td class="col-sm-8">
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">enable: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allreportingplayer"> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">view: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allreportingplayer"> <i></i> </label>
              </div>
              <!-- <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">create: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox"> <i></i> </label>
              </div> -->
              <!-- <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">Upload: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox"> <i></i> </label>
              </div> -->
              <!-- <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">delete: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox"> <i></i> </label>
              </div> -->
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">update: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allreportingplayer"> <i></i> </label>
              </div>
          </td>
          <td class="col-sm-1 ">
              <div>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allreportingplayers"> <i></i> </label>
              </div>
          </td>
        </tr>

        <script>
        $('.allreportingplayers').on('change', function() {
          // console.log($('#allpermissions').val());
          if ($('.allreportingplayers').is(":checked")) {
            // console.log(1);
            $('.allreportingplayer').not(this).prop('checked', true);
          }
          else {
            // console.log(0);
            $('.allreportingplayer').not(this).prop('checked', false);
          }
        });
        </script>

        <tr>
          <td class="col-sm-1">15</td>
          <td class="col-sm-2"> <a>Reporting Reservations</a> </td>
          <td class="col-sm-8">
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">enable: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allreportingreservation"> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">view: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allreportingreservation"> <i></i> </label>
              </div>
              <!-- <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">create: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox"> <i></i> </label>
              </div> -->
              <!-- <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">Upload: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox"> <i></i> </label>
              </div> -->
              <!-- <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">delete: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox"> <i></i> </label>
              </div> -->
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">update: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allreportingreservation"> <i></i> </label>
              </div>
          </td>
          <td class="col-sm-1 ">
              <div>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allreportingreservations"> <i></i> </label>
              </div>
          </td>
        </tr>

        <script>
        $('.allreportingreservations').on('change', function() {
          // console.log($('#allpermissions').val());
          if ($('.allreportingreservations').is(":checked")) {
            // console.log(1);
            $('.allreportingreservation').not(this).prop('checked', true);
          }
          else {
            // console.log(0);
            $('.allreportingreservation').not(this).prop('checked', false);
          }
        });
        </script>

        <tr>
          <td class="col-sm-1">16</td>
          <td class="col-sm-2"> <a>Reporting Cancellations</a> </td>
          <td class="col-sm-8">
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">enable: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allreportingcancellation"> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">view: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allreportingcancellation"> <i></i> </label>
              </div>
              <!-- <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">create: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox"> <i></i> </label>
              </div> -->
              <!-- <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">Upload: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox"> <i></i> </label>
              </div> -->
              <!-- <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">delete: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox"> <i></i> </label>
              </div> -->
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">update: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allreportingcancellation"> <i></i> </label>
              </div>
          </td>
          <td class="col-sm-1 ">
              <div>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" class="allreportingcancellations"> <i></i> </label>
              </div>
          </td>
        </tr>

        <script>
        $('.allreportingcancellations').on('change', function() {
          // console.log($('#allpermissions').val());
          if ($('.allreportingcancellations').is(":checked")) {
            // console.log(1);
            $('.allreportingcancellation').not(this).prop('checked', true);
          }
          else {
            // console.log(0);
            $('.allreportingcancellation').not(this).prop('checked', false);
          }
        });
        </script>

      </tbody>
    </table>























<!--
        <tr>
          <td class="col-sm-1">2</td>
          <td class="col-sm-2">
            <a>Courts</a>
          </td>
          <td class="col-sm-7">
            <div class="col-sm-4">
              <label style="position:relative;right:15px" class="col-sm-7">create: </label>
              <label class="ui-switch m-t-xs m-r"> <input type="checkbox" checked=""> <i></i> </label>
            </div>
            <div class="col-sm-4">
              <label style="position:relative;right:15px" class="col-sm-7">Update: </label>
              <label class="ui-switch m-t-xs m-r"> <input type="checkbox" checked=""> <i></i>
              </label>
            </div>
            <div class="col-sm-4">
              <label style="position:relative;right:15px" class="col-sm-7">delete: </label>
              <label class="ui-switch m-t-xs m-r"> <input type="checkbox" checked=""> <i></i> </label>
            </div>
          </td>
          <td class="col-sm-1">
            <div>
              <label class="ui-switch m-t-xs m-r">
                <input type="checkbox" checked=""> <i></i> </label>
              </div>
            </td>
          </tr>
          <tr> <td class="col-sm-1">3</td>
            <td class="col-sm-2"> <a>Price/Time Policy</a> </td>
            <td class="col-sm-7">
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">create: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" checked=""> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">Update: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" checked=""> <i></i> </label>
              </div>
              <div class="col-sm-4">
                <label style="position:relative;right:15px" class="col-sm-7">delete: </label>
                <label class="ui-switch m-t-xs m-r"> <input type="checkbox" checked=""> <i></i> </label>
              </div>
            </td>
            <td class="col-sm-1">
              <div> <label class="ui-switch m-t-xs m-r"> <input type="checkbox" checked=""> <i></i> </label>
              </div>
            </td>
          </tr>
          <tr>
            <td class="col-sm-1">4</td>
            <td class="col-sm-2"> <a>Reservation Policy</a> </td>
            <td class="col-sm-7">
              <div class="col-sm-4"> <label style="position:relative;right:15px" class="col-sm-7">create: </label>
                <label class="ui-switch m-t-xs m-r">
                  <input type="checkbox" checked=""> <i></i> </label>
                </div>
                <div class="col-sm-4">
                  <label style="position:relative;right:15px" class="col-sm-7">Update: </label>
                  <label class="ui-switch m-t-xs m-r"> <input type="checkbox" checked=""> <i></i> </label>
                </div>
                <div class="col-sm-4">
                  <label style="position:relative;right:15px" class="col-sm-7">delete: </label>
                  <label class="ui-switch m-t-xs m-r"> <input type="checkbox" checked=""> <i></i> </label>
                </div>
              </td>
              <td class="col-sm-1">
                <div>
                  <label class="ui-switch m-t-xs m-r"> <input type="checkbox" checked=""> <i></i> </label>
                </div>
              </td>
            </tr>
            <tr>
              <td class="col-sm-1">5</td>
              <td class="col-sm-2"> <a>members</a> </td>
              <td class="col-sm-7">
                <div class="col-sm-4">
                  <label style="position:relative;right:15px" class="col-sm-7">create: </label>
                  <label class="ui-switch m-t-xs m-r">
                    <input type="checkbox" checked=""> <i></i> </label>
                  </div>
                  <div class="col-sm-4">
                    <label style="position:relative;right:15px" class="col-sm-7">Update: </label>
                    <label class="ui-switch m-t-xs m-r">
                      <input type="checkbox" checked=""> <i></i> </label>
                    </div>
                    <div class="col-sm-4">
                      <label style="position:relative;right:15px" class="col-sm-7">delete: </label> <label class="ui-switch m-t-xs m-r"> <input ng-change="vm.setPermission(category.type, action, vm.permission[category.type][action])" ng-model="vm.permission[category.type][action]" type="checkbox" checked="" class="ng-pristine ng-untouched ng-valid ng-empty"> <i></i> </label>
                    </div>
                  </td>
                  <td class="col-sm-1">
                    <div> <label class="ui-switch m-t-xs m-r">
                      <input type="checkbox" checked=""> <i></i> </label>
                    </div>
                  </td>
                </tr>
                <tr> <td class="col-sm-1">6</td>
                  <td class="col-sm-2"> <a>Court Photos</a> </td>
                  <td class="col-sm-7">
                    <div class="col-sm-4">
                      <label style="position:relative;right:15px" class="col-sm-7">view: </label>
                      <label class="ui-switch m-t-xs m-r"> <input type="checkbox" checked=""> <i></i> </label>
                    </div>
                    <div class="col-sm-4">
                      <label style="position:relative;right:15px" class="col-sm-7">upload: </label>
                      <label class="ui-switch m-t-xs m-r"> <input type="checkbox" checked=""> <i></i> </label>
                    </div>
                  </td>
                  <td class="col-sm-1">
                    <div>
                      <label class="ui-switch m-t-xs m-r">
                        <input type="checkbox" checked=""> <i></i>
                      </label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="col-sm-1">7</td>
                  <td class="col-sm-2"><a>Association Photos</a> </td>
                  <td class="col-sm-7"><div class="col-sm-4">
                    <label style="position:relative;right:15px" class="col-sm-7">view: </label>
                    <label class="ui-switch m-t-xs m-r">
                      <input type="checkbox" checked=""> <i></i> </label>
                    </div>
                    <div class="col-sm-4">
                      <label style="position:relative;right:15px" class="col-sm-7">upload: </label>
                      <label class="ui-switch m-t-xs m-r">
                        <input type="checkbox" checked=""> <i></i> </label>
                      </div>
                      </td>
                      <td class="col-sm-1">
                        <div>
                          <label class="ui-switch m-t-xs m-r">
                            <input type="checkbox" checked=""> <i></i>
                          </label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="col-sm-1">8</td>
                      <td class="col-sm-2"> <a>Reservations</a> </td>
                      <td class="col-sm-7">
                        <div class="col-sm-4">
                          <label style="position:relative;right:15px" class="col-sm-7">view: </label>
                          <label class="ui-switch m-t-xs m-r">
                            <input type="checkbox" checked=""> <i></i>
                          </label>
                          </div>
                          <div class="col-sm-4">
                            <label style="position:relative;right:15px" class="col-sm-7">create: </label>
                            <label class="ui-switch m-t-xs m-r">
                              <input type="checkbox" checked=""> <i></i> </label>
                            </div>
                            <div class="col-sm-4">
                              <label style="position:relative;right:15px" class="col-sm-7">Cancel: </label>
                              <label class="ui-switch m-t-xs m-r"> <input type="checkbox" checked=""> <i></i> </label>
                            </div>
                          </td>
                          <td class="col-sm-1">
                            <div>
                              <label class="ui-switch m-t-xs m-r">
                                <input type="checkbox" checked=""> <i></i>
                              </label>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-1">9</td>
                          <td class="col-sm-2"><a>Past Reservations</a> </td>
                          <td class="col-sm-7">
                            <div class="col-sm-4"> <label style="position:relative;right:15px" class="col-sm-7">view: </label>
                              <label class="ui-switch m-t-xs m-r">
                                <input type="checkbox" checked=""> <i></i>
                              </label>
                            </div>
                          </td>
                          <td class="col-sm-1">
                            <div>
                              <label class="ui-switch m-t-xs m-r">
                                <input type="checkbox" checked=""> <i></i> </label>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td class="col-sm-1">10</td>
                            <td class="col-sm-2"> <a>Cancel Reservations</a> </td>
                            <td class="col-sm-7">
                              <div class="col-sm-4">
                                <label style="position:relative;right:15px" class="col-sm-7">Cancel: </label>
                                <label class="ui-switch m-t-xs m-r">
                                  <input type="checkbox" checked=""> <i></i>
                                </label>
                              </div>
                            </td>
                            <td class="col-sm-1">
                              <div>
                                <label class="ui-switch m-t-xs m-r">
                                  <input type="checkbox" checked=""> <i></i>
                                </label>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td class="col-sm-1">11</td>
                            <td class="col-sm-2"> <a>Notifications</a> </td>
                            <td class="col-sm-7">
                              <div class="col-sm-4">
                                <label style="position:relative;right:15px" class="col-sm-7">add: </label>
                                <label class="ui-switch m-t-xs m-r">
                                  <input type="checkbox" checked=""> <i></i>
                                </label>
                              </div>
                            </td>
                            <td class="col-sm-1">
                              <div>
                                <label class="ui-switch m-t-xs m-r">
                                  <input type="checkbox" checked=""> <i></i> </label>
                                </div>
                              </td>
                            </tr>
                            <tr> <td class="col-sm-1">12</td>
                              <td class="col-sm-2"> <a>App Users</a> </td>
                              <td class="col-sm-7">
                                <div class="col-sm-4">
                                  <label style="position:relative;right:15px" class="col-sm-7 ">add: </label>
                                  <label class="ui-switch m-t-xs m-r">
                                    <input type="checkbox" checked=""> <i></i> </label>
                                   </div>
                                   </td>
                                   <td class="col-sm-1">
                                     <div>
                                       <label class="ui-switch m-t-xs m-r">
                                         <input type="checkbox" checked=""> <i></i> </label>
                                       </div>
                                     </td>
                                   </tr>
                                   <tr> <td class="col-sm-1">13</td>
                                     <td class="col-sm-2"> <a>upload players</a>
                                     </td>
                                     <td class="col-sm-7">
                                       <div class="col-sm-4">
                                         <label style="position:relative;right:15px" class="col-sm-7">add: </label>
                                         <label class="ui-switch m-t-xs m-r">
                                           <input checked=""> <i></i> </label>
                                      </div>
                                          <div class="col-sm-4">
                                            <label style="position:relative;right:15px" class="col-sm-7">view: </label>
                                            <label class="ui-switch m-t-xs m-r">
                                              <input type="checkbox" checked=""> <i></i>
                                            </label>
                                          </div>
                                        </td>
                                        <td class="col-sm-1">
                                          <div>
                                            <label class="ui-switch m-t-xs m-r">
                                              <input type="checkbox"> <i></i>
                                            </label>
                                          </div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td class="col-sm-1">14</td>
                                        <td class="col-sm-2"> <a>Reporting Players</a> </td>
                                        <td class="col-sm-7">
                                          <div class="col-sm-4">
                                            <label style="position:relative;right:15px" class="col-sm-7">view: </label>
                                            <label class="ui-switch m-t-xs m-r">
                                              <input type="checkbox"> <i></i> </label>
                                            </div>
                                            <div class="col-sm-4">
                                              <label style="position:relative;right:15px" class="col-sm-7">Update: </label>
                                              <label class="ui-switch m-t-xs m-r">
                                                <input type="checkbox"> <i></i>
                                              </label>
                                            </div>
                                          </td>
                                          <td class="col-sm-1">
                                            <div> <label class="ui-switch m-t-xs m-r">
                                              <input type="checkbox"> <i></i>
                                            </label>
                                          </div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td class="col-sm-1">15</td>
                                        <td class="col-sm-2"> <a>Reporting Reservations</a> </td>
                                        <td class="col-sm-7">
                                          <div class="col-sm-4">
                                            <label style="position:relative;right:15px" class="col-sm-7">view: </label>
                                            <label class="ui-switch m-t-xs m-r">
                                              <input type="checkbox"> <i></i>
                                            </label>
                                          </div>
                                          <div class="col-sm-4">
                                            <label style="position:relative;right:15px" class="col-sm-7">Update: </label>
                                            <label class="ui-switch m-t-xs m-r"> <input type="checkbox"> <i></i>
                                            </label>
                                          </div>
                                        </td>
                                        <td class="col-sm-1">
                                          <div> <label class="ui-switch m-t-xs m-r">
                                            <input type="checkbox"> <i></i> </label>
                                          </div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td class="col-sm-1">16</td>
                                        <td class="col-sm-2"> <a>Reporting Cancellations</a> </td>
                                        <td class="col-sm-7">
                                          <div class="col-sm-4">
                                            <label style="position:relative;right:15px" class="col-sm-7">view: </label>
                                            <label class="ui-switch m-t-xs m-r"> <input type="checkbox"> <i></i>
                                            </label>
                                          </div>
                                          <div class="col-sm-4">
                                            <label style="position:relative;right:15px" class="col-sm-7">Update: </label>
                                            <label class="ui-switch m-t-xs m-r"> <input type="checkbox"> <i></i> </label>
                                          </div>
                                          </td>
                                          <td class="col-sm-1">
                                            <div>
                                              <label class="ui-switch m-t-xs m-r">
                                                <input type="checkbox"> <i></i>
                                              </label>
                                            </div>
                                          </td>
                                        </tr>
                                      </tbody>
                                      <thead>
                                        <tr>
                                          <th class="col-sm-1"></th>
                                          <th class="col-sm-2"></th>
                                          <th class="col-sm-7"></th>
                                          <th class="col-sm-2"></th>
                                        </tr>
                                      </thead>
                                    </table>
 -->


















    <div class="row">
        <div class="col-lg-8"></div>
        <div class="col-lg-4">
        <!-- <button type="button" class="btn btn-warning"> -->

        <button type="button" class="btn btn-edit"  style="padding: 6px 50px;">Submit</button>
        <!-- <a class="btn w-xs btn-danger" href="">Cancel</a> -->
          <a class="btn btn-deactivate" style="padding: 6px 50px;" href="{{url('/managers')}}">Cancel</a>


        <!-- </button> -->
        </div>
    </div>


</div>
</form>




@endsection
