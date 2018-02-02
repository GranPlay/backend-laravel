@extends('layouts.master')

@section('content')

<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<style media="screen">
  .ui-checks input:checked + i:before {
   background-color: #0E302B;
 }

 .ui-checks input[type="radio"] + i, .ui-checks input[type="radio"] + i:before {
    border-radius: 0%;
}
</style>

{{ HTML::ul($errors->all()) }}

<div class="p-h-md p-v bg-white box-shadow pos-rlt">
  <h3 class="no-margin">Court</h3>
</div>

<form class="" action="apply_policy_store" method="post" enctype="multipart/form-data">

  {{ csrf_field() }}

  <div class="p-h-md p-v bg-white box-shadow pos-rlt well" style="margin: 22px;">

      <div class="row" style="margin-bottom:15px;">
          <div class="col-lg-6">
              <div class="col-lg-3"><label id="textlabel">*Select Policy:</label></div>
              <div class="col-lg-8">
                <select class="form-control" name="policy" id="policy_id" required></select>

                <div id="option" class="checkbox">
                   <label class="ui-checks ui-checks-md" style="padding-right:30px; margin-top:20px;">
                     <input id="opt1" type="radio" name="option" value="1" checked>
                     <i></i>
                     Calendar
                   </label>
                   <label class="ui-checks ui-checks-md" style="padding-right:30px; margin-top:20px;">
                     <input id="opt2" type="radio" name="option" value="2">
                     <i></i>
                     Weekdays
                   </label>
                </div>
              </div>
          </div>

          <div class="col-lg-6">
              <div class="col-lg-3"> <label id="textlabel">*Select Court :</label></div>
              <div class="col-lg-8">
                <select class="form-control" name="courts[]" id="court_id" multiple required></select>
              </div>
          </div>
      </div>

      <div class="row">
          <div id="calendar" class="col-lg-6">
              <div class="col-lg-3"> <label id="textlabel">Date :</label></div>
              <div class="col-lg-8">
                <input type="text" class="form-control date" name="dates" style="color:white;" />
              </div>
          </div>
          <div id="weekdays" class="col-lg-6">
              <div class="col-lg-3"> <label id="textlabel">Select Year:</label></div>
              <div class="col-lg-8">
                <select class="form-control" name="years[]" multiple disabled>
                  @for($i=date("Y"); $i<=2030; $i++)
                  <option value="{{$i}}">{{$i}}</option>
                  @endfor
                </select>
                <div class="checkbox">
                   <label class="ui-checks ui-checks-md" style="padding-right:10px;">
                     <input type="checkbox" name="days[]" value="sunday" disabled>
                     <i></i>
                     S
                   </label>
                   <label class="ui-checks ui-checks-md" style="padding-right:10px;">
                     <input type="checkbox" name="days[]" value="monday" disabled>
                     <i></i>
                     M
                   </label>
                   <label class="ui-checks ui-checks-md" style="padding-right:10px;">
                     <input type="checkbox" name="days[]" value="tuesday" disabled>
                     <i></i>
                     Tu
                   </label>
                   <label class="ui-checks ui-checks-md" style="padding-right:10px;">
                     <input type="checkbox" name="days[]" value="wednesday" disabled>
                     <i></i>
                     W
                   </label>
                   <label class="ui-checks ui-checks-md" style="padding-right:10px;">
                     <input type="checkbox" name="days[]" value="thursday" disabled>
                     <i></i>
                     Th
                   </label>
                   <label class="ui-checks ui-checks-md" style="padding-right:10px;">
                     <input type="checkbox" name="days[]" value="friday" disabled>
                     <i></i>
                     F
                   </label>
                   <label class="ui-checks ui-checks-md" style="padding-right:10px;">
                     <input type="checkbox" name="days[]" value="saturday" disabled>
                     <i></i>
                     Sa
                   </label>
                </div>
              </div>
          </div>
      </div>

      <br>

      <div class="row">
          <div class="col-lg-8"></div>
          <div class="col-lg-4">
              <button type="submit" class="btn btn-edit"  style="padding: 6px 50px;">Submit</button>
              <a class="btn btn-deactivate" style="padding: 6px 50px;" href="{{url('/court/')}}">Cancel</a>
          </div>
      </div>
  </div>
</form>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
  $('#option').on('change', function(){
      if ($('#opt1').is(':checked')) {
        $('#calendar').find(':input').prop('disabled', false);
        $('#weekdays').find(':input').prop('disabled', true);
      }
      else {
        $('#calendar').find(':input').prop('disabled', true);
        $('#weekdays').find(':input').prop('disabled', false);
      }
  });
</script>

<script type="text/javascript">
  $( document ).ready(function() {
      var value = localStorage.getItem("assoc_id");
      // console.log(value);
      $("#assoc_value").val(value);
      $.get($("#baseurl").val()+'/court_api?assoc_id=' + value, function(data) {
          // console.log(data);
          $('#court_id').empty();
          $.each(data, function(index,courts){
              $('#court_id').append('<option value="'+courts.id+'"{{(old("court_id")=="'+courts.id+'")?"selected":""}}>'+courts.courtname+'</option>');
          });
      });

      $.get($("#baseurl").val()+'/price_time_policy_api?association_id=' + value, function(data) {
          // console.log(data);
          $('#policy_id').empty();
          $.each(data, function(index,policys){
              $('#policy_id').append('<option value="'+policys.id+'" {{(old("policy_id")=="'+policys.id+'")?"selected":""}}>'+policys.pricetimename+'</option>');
          });
      });

  });

  $('#association').on('change', function(e){
      // console.log(e);
      var assoc_id = e.target.value;
      localStorage.setItem("assoc_id", assoc_id);
      $("#assoc_value").val(assoc_id);

      $.get($("#baseurl").val()+'/court_api?assoc_id=' + assoc_id, function(data) {
          // console.log(data);
          $('#court_id').empty();
          $.each(data, function(index,courts){
              $('#court_id').append('<option value="'+courts.id+'"{{(old("court_id")=="'+courts.id+'")?"selected":""}}>'+courts.courtname+'</option>');
          });
      });

      $.get($("#baseurl").val()+'/price_time_policy_api?association_id=' + assoc_id, function(data) {
          // console.log(data);
          $('#policy_id').empty();
          $.each(data, function(index,policys){
              $('#policy_id').append('<option value="'+policys.id+'"{{(old("policy_id")=="'+policys.id+'")?"selected":""}}>'+policys.pricetimename+'</option>');
          });
      });

  });
</script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
$('.date').datepicker({
  multidate: true
  });
  $('.date').datepicker('setDates', [])
</script>
@endsection
