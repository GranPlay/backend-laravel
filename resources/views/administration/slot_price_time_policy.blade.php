@extends('layouts.master')

@section('content')

{{ HTML::ul($errors->all()) }}
<div class="p-h-md p-v bg-white box-shadow pos-rlt">
  <h3 class="no-margin">Price/Time Policy</h3>
</div>

  {{ method_field('PUT') }}
  {{ csrf_field() }}

<div class="p-h-md p-v bg-white box-shadow pos-rlt well" style="margin: 22px;">

    <div class="row" style="margin-bottom:14px; padding:0px;">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-2"> <label id="textlabel"><b>Policy Name : </b></label></div>
          <div class="col-lg-10">
            {{$pricetime->pricetimename}}
            <!-- <input type="text" name="pricetimename"class="form-control" value="{{$pricetime->pricetimename}}" disabled> -->
          </div>
        </div>
      </div>
    </div>

    <div class="row" style="margin-bottom:14px;">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-2"> <label id="textlabel"><b>Description : </b></label></div>
                <div class="col-lg-10">{{$pricetime->pricetimedesc}}</div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-bottom:14px;">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-4"> <label id="textlabel"><b>Max Slot Time For Singles Matches : </b></label></div>
                <div class="col-lg-8">{{$assoc->max_time_singlematches}}</div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-4"> <label id="textlabel"><b>Max Slot Time For Double Matches : </b></label></div>
                <div class="col-lg-8">{{$assoc->max_time_doublematches}}</div>
            </div>
        </div>
    </div>


    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/> -->


    <br>
    <div class="panel panel-default p-sm">
      <form action="{{ url('/price_time_policy_slot_store/'.$pricetime->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row margin-a-10">
          <div class="timeslots">
            <div class="row" style="padding-left:10px;">
              <!-- <div class="col-sm-4">
                <label class="col-sm-1 p-sm ng-binding">Date</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control date" name="dates" style="color:transparent;" required/>

                  <script type="text/javascript">
                  $('.date').datepicker({
                    multidate: true
                    });
                    $('.date').datepicker('setDates', [])
                  </script>
                </div>
              </div> -->
              @if((\App\Association::findOrFail($pricetime->assoc_id)->guests_allowed) == null OR (\App\Association::findOrFail($pricetime->assoc_id)->guests_allowed) == 0)
                <div class="col-sm-4">
                  <label class="col-sm-2 p-sm ng-binding">Time</label>
                  <div class="col-sm-10">
                    <input type="time" class="form-control" name="time" required/>
                  </div>
                </div>
                <input type="hidden" class="form-control" name="price" value="0" />
              @else
                <div class="col-sm-4">
                  <label class="col-sm-2 p-sm ng-binding">Time</label>
                  <div class="col-sm-10">
                    <input type="time" class="form-control" name="time" required/>
                  </div>
                </div>
                <div class="col-sm-6">
                  <label class="col-sm-3 p-sm ng-binding">Price|Slot(Br.$)</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" name="price" />
                  </div>
                </div>
              @endif

              <div class="col-sm-2">
                <button class="btn btn-edit" type="submit">Add New Slot</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!--  -->
      @if (count($slots) > 0)
      <table class="table table-striped">
        <thead>
          <tr>
            <th class="">S No.</th>
            <th class="">Start Time</th>
            <th class="">Price (Br.$)</th>
            <th class="">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($slots as $slot)
          <tr>
            <td class="col-sm-1">{{ $slot->id }}</td>
            <td class="">{{ $slot->time }}</td>
            <td class="">${{ number_format($slot->price) }}</td>
            <td>
              <a href="{{ url('/price_time_policy_slot_delete/'.$slot->id) }}">
                <button class="btn w-xs btn-deactivate">Deactivate</button>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @endif
      <div class="panel-heading"> </div>
    </div>
  </div>
@endsection
