@extends('layouts.master')

@section('content')

{{ HTML::ul($errors->all()) }}
<div class="p-h-md p-v bg-white box-shadow pos-rlt">
  <h3 class="no-margin">Court</h3>
</div>
<form class="" action="{{url('/court_update/'.$court->id)}}" method="post" enctype="multipart/form-data">

  {{ method_field('PUT') }}
  {{ csrf_field() }}


<div class="p-h-md p-v bg-white box-shadow pos-rlt well" style="margin: 22px;">

    <div class="row" style="margin-bottom:14px; padding:0px;">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-4"> <label id="textlabel">*Court Name:</label></div>
                <div class="col-lg-8"><input type="text" name="courtname"class="form-control" value="{{$court->courtname}}"></div>
            </div>
        </div>
        @if (Auth::user()->roles == 2)
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-4"> <label id="textlabel">*Select Association:</label></div>
                <div class="col-lg-8">
                  <!-- <input type="text" name="" value="{{$assoc->id}}"> -->
                  <select class="form-control" name="association" >
                    @foreach (\App\Association::all() as $assocs)
                    <option value="{{ $assocs->id }}" {{ ($assoc->id == $assocs->id) ? 'selected="selected"' : '' }} >{{ $assocs->name }}</option>
                    @endforeach
                  </select>
                </div>
            </div>
        </div>
        @endif
    </div>

    <div class="row" style="margin-bottom:14px;">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-4"> <label id="textlabel">*Court Type</label></div>
                    <div class="col-lg-8">
                      <select class="form-control" name="courttype">
                        <option value="Asphalt" {{ ($court->courttype == 'Asphalt') ? 'selected="selected"' : '' }}>Asphalt</option>
                        <option value="Concrete" {{ ($court->courttype == 'Concrete') ? 'selected="selected"' : '' }}>Concrete</option>
                        <option value="Clay" {{ ($court->courttype == 'Clay') ? 'selected="selected"' : '' }}>Clay</option>
                        <option value="Grass" {{ ($court->courttype == 'Grass') ? 'selected="selected"' : '' }}>Grass</option>
                        <option value="Sand" {{ ($court->courttype == 'Sand') ? 'selected="selected"' : '' }}>Sand</option>
                      </select>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-4"> <label id="textlabel">Operational</label></div>
                    <div class="col-lg-5">
                        <label class="ui-switch m-t-xs m-r">
                            @if($court->courtoperational == 0)
                            <input type="checkbox"  name="courtoperational">
                            @else
                            <input type="checkbox" checked name="courtoperational">
                            @endif
                            <i></i>
                        </label>
                    </div>

                </div>
            </div>
    </div>





    <div class="row" style="margin-bottom:14px;">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-2"> <label id="textlabel">Court Description:</label></div>
                <div class="col-lg-10"><textarea name="courtdesc" class="form-control" rows="8">{{$court->courtdesc}}</textarea></div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-9"></div>
        <div class="col-lg-3">
        <!-- <button type="button" class="btn btn-warning"> -->
        <button type="submit" class="btn btn-warning">Submit</button>
        <a class="btn w-xs btn-danger" href="{{url('/court/')}}">Cancel</a>
        <!-- <a class="btn btn-warning" href="{{url('/create_new_association')}}">
        Cancel</a> -->
        <!-- </button> -->
        </div>
    </div>


</div>
</form>


    <style>
        #textlabel {
            font-size:15px;
        }

        .btn {
          display: inline-block;
          padding: 6px 12px;
          margin-bottom: 0;
          font-size: 14px;
          font-weight: normal;
          line-height: 1.02857143;
          text-align: center;
          white-space: nowrap;
          vertical-align: middle;
          cursor: pointer;
          -webkit-user-select: none;
             -moz-user-select: none;
              -ms-user-select: none;
                  user-select: none;
          background-image: none;
          border: 1px solid transparent;
          border-radius: 8px;
          padding: 10px 16px;
        }

        .btn-primary {
          color: #fff;
          background-color: #FDBA4F;
          border-color: #FDBA4F;
        }

        .btn-danger {
          color: #fff;
          background-color: #0E302B;
          border-color: #0E302B;
        }

    </style>


@endsection
