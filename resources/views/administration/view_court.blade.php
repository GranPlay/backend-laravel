@extends('layouts.master')

@section('content')

{{ HTML::ul($errors->all()) }}
<div class="row p-h-md p-v bg-white box-shadow pos-rlt no-margin">
    <div class="col-lg-9 col-md-9 col-sm-9">
        <h3 class="no-margin">Court</h3>
    </div>
    <div class="col-lg-3 col-md-9 col-sm-9">
        <a class="btn btn-edit btn pull-right" style="padding: 5px 50px;" href="{{url('/court_create')}}">
        Create New Court</a>
    </div>
</div>


<div class="p-h-md p-v bg-white box-shadow pos-rlt well" style="margin: 22px;">
  <a class="btn btn-edit" href="{{url('/court_photos/'.$court->id)}}">Add New Photos</a>
  <!-- <a class="btn btn-deactivate">
  View Photos</a> -->
</div>

{{ method_field('PUT') }}
{{ csrf_field() }}

<div class="p-h-md p-v bg-white box-shadow pos-rlt well" style="margin: 22px;">
    <div class="row" >
        <div class="col-lg-12">
            <div class="row" >
                <div class="col-lg-12"> <label id="textlabel"><b>Association Name : </b>{{$assoc->name}}</label></div>

            </div>
        </div>
    </div>
</div>


<div class="p-h-md p-v bg-white box-shadow pos-rlt well" style="margin: 22px;">

    <div class="row" style="margin-bottom:14px; padding:0px;">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-4"> <label id="textlabel"><b>Court Name : </b></label></div>
                <div class="col-lg-8">{{$court->courtname}}</div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-4"> <label id="textlabel"><b>Court Type : </b></label></div>
                <div class="col-lg-8">{{$court->courttype}}</div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-bottom:14px; padding:0px;">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-4"> <label id="textlabel"><b>Operational : </b></label></div>
                @if($court->courtoperational == 1)
                <div class="col-lg-8"><i class="fa fa-check fa-lg" aria-hidden="true" style="color:green;"></i></div>
                @else
                <div class="col-lg-8"><i class="fa fa-times fa-lg" aria-hidden="true" style="color:red;"></i></div>
                @endif
            </div>
        </div>
    </div>

    <div class="row" style="margin-bottom:14px;">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-2"> <label id="textlabel"><b>Court Description : </b></label></div>
                <div class="col-lg-10">{{$court->courtdesc}}</div>
            </div>
        </div>
    </div>

</div>


@endsection
