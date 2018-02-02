@extends('layouts.master')

@section('content')
<style>
    @media screen and (max-width: 520px) and (min-width: 385px) {
    body{
      background-color: hotpink !important;
    }
  }
</style>


<div class="row p-h-sm p-v bg-white box-shadow pos-rlt no-margin">
    <div class="col-lg-9 col-md-9 col-sm-9">
        <h3 class="no-margin">Association</h3>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3">
        <a class="btn btn-main pull-right" style="padding: 5px 50px;" href="{{url('/association_create')}}">
        Create New Association</a>
    </div>
</div>



@if(Session::has('message'))
  <div class="text-center">
      <div class="row">
          <div class="col-lg-4 col-lg-offset-4" >
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
        <input type="text" class="form-control no-border input-sm no-bg " maxlength="25" placeholder="Search Association..." >
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
                    <th class="col-sm-2">Association Name:</th>
                    <th class="col-sm-1">Status</th>
                    <th class="col-sm-2">State:</th>
                    <th class="col-sm-2">Area</th>
                    <th class="col-sm-5">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($association_view as $assoc)
                <tr>
                    <td class="col-sm-1">{{ $assoc->id }}</td>
                    <td class="col-sm-2">
                        <a href="{{url('/association_show/'.$assoc->id)}}"> {{ $assoc->name }}</a>
                    </td>
                    <td class="col-sm-1">
                        <span>Active</span>
                    </td>
                    <td class="col-sm-2">
                        <span>{{ $assoc->state }}</span>
                    </td>
                    <td class="col-sm-2">
                        <span>{{ $assoc->neighbourhood }}</span>
                    </td>

                    <td class="col-sm-4">
                      <a class="btn w-xs btn-edit"  href="{{url('/association_edit/'.$assoc->id)}}">Edit</a>
                      <a class="btn w-xs btn-deactivate"  href="{{url('/association_delete/'.$assoc->id)}}">Deactivate</a>
                      <a class="btn w-xs btn-deactivate"  href="{{url('/association_photos/'.$assoc->id)}}">Photos</a>
                    </td>
                </tr>
                @endforeach
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
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
