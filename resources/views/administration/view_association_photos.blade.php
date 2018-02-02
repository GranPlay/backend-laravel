@extends('layouts.master')

@section('content')

{{ HTML::ul($errors->all()) }}
<div class="row p-h-md p-v bg-white box-shadow pos-rlt no-margin">
    <div class="col-lg-9 col-md-9 col-sm-9">
        <h3 class="no-margin">Association Photos</h3>
    </div>
    <div class="col-lg-3 col-md-9 col-sm-9">
        <!-- <button type="button" class="btn btn-warning"> -->
        <a class="btn btn-warning btn" href=href="{{url('/add_association_photos/'.$association->id)}}">
        Add New Photos</a>
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


  {{ csrf_field() }}

  <div class="p-h-md p-v bg-white box-shadow pos-rlt well" style="margin: 22px;">

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">*Association Name:</label></div>
                  <div class="col-lg-8"><input type="text" name="name" class="form-control" value="{{$association->name}}"></div>
              </div>
          </div>
      </div>

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">Website Url:</label></div>
                  <div class="col-lg-8"><input type="text"name="weburl" value="{{$association->weburl}}" class="form-control"></div>
              </div>
          </div>
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">Facebook Page Url:</label></div>
                  <div class="col-lg-8"><input type="text"name="fbpageurl" value="{{$association->fbpageurl}}" class="form-control"></div>
              </div>
          </div>
      </div>

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">*Streetline 1:</label></div>
                  <div class="col-lg-8"><input type="text" name="streetline1" value="{{$association->streetline1}}" class="form-control"></div>
              </div>
          </div>
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">Streetline 2:</label></div>
                  <div class="col-lg-8"><input type="text" name="streetline2" value="{{$association->streetline2}}" class="form-control"></div>
              </div>
          </div>
      </div>

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">*Neighbourhood</label></div>
                  <div class="col-lg-8"><input type="text" name="neighbourhood" value="{{$association->neighbourhood}}" class="form-control"></div>
              </div>
          </div>
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">*State:</label></div>
                  <div class="col-lg-8"><input type="text" name="state" value="{{$association->state}}" class="form-control"></div>
              </div>
          </div>
      </div>

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">*City</label></div>
                  <div class="col-lg-8"><input type="text" name="city" value="{{$association->city}}" class="form-control"></div>
              </div>
          </div>
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">*Country:</label></div>
                  <div class="col-lg-8"><input type="text" name="country" value="{{$association->country}}" class="form-control"></div>
              </div>
          </div>
      </div>

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">*Lititude:</label></div>
                  <div class="col-lg-8"><input type="text" name="latitude" value="{{$association->latitude}}" class="form-control"></div>
              </div>
          </div>
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">*Longitude:</label></div>
                  <div class="col-lg-8"><input type="text" name="longitude" value="{{$association->longitude}}" class="form-control"></div>
              </div>
          </div>
      </div>

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">*Postal/Zip Code:</label></div>
                  <div class="col-lg-8"><input type="text" name="postalcode" value="{{$association->postalcode}}" class="form-control"></div>
              </div>
          </div>
      </div>

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-2">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">*Phone:</label></div>
              </div>
          </div>
          <div class="col-lg-10">
              <div class="row">
              <div class="col-lg-4"><input type="text" name="phone1" class="form-control" value="{{$association->phone1}}"></div>
              <div class="col-lg-4"><input type="text"name="phone2"class="form-control"  value="{{$association->phone2}}"></div>
              <div class="col-lg-4"><input type="text"name="phone3"class="form-control"  value="{{$association->phone3}}"></div>
              </div>
          </div>
      </div>

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">*Association Type:</label></div>
                  <div class="col-lg-8">
                    <select class="form-control" name="associationtype" value="{{$association->associationtype}}">
                      <option>Association</option>
                      <option>Public courts</option>
                      <option>Condominium membership</option>
                      <option>Commercial courts</option>
                    </select>
                  </div>
              </div>
          </div>
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-1"></div>
                  <div class="col-lg-7"> <label id="textlabel">*Allow Commercial Reservations:</label></div>
                  <div class="col-lg-4">
                      <label class="ui-switch m-t-xs m-r">
                          <input type="checkbox" name="allowcommercialreservations" value="{{$association->allowcommercialreservations}}">
                          <i></i>
                      </label>
                  </div>
              </div>
          </div>
      </div>

      <div class="row">
        <div class="col-lg-9"></div>
        <div class="col-lg-3">
          <button type="submit" class="btn btn-warning">Submit</button>
        </div>
      </div>


  </div>


    <style>
        #textlabel {
            font-size:15px;
        }
    </style>

    @endsection
