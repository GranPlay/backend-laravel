@extends('layouts.master')

@section('content')

{{ HTML::ul($errors->all()) }}
<div class="p-h-md p-v bg-white box-shadow pos-rlt">
  <h3 class="no-margin">Court Photos</h3>
</div>
<form class="" action="{{url('/court_photo_store/'.$court->id)}}" method="post" enctype="multipart/form-data">

  {{ csrf_field() }}

<div class="p-h-md p-v bg-white box-shadow pos-rlt well" style="margin: 22px;">

    <div class="row" style="margin-bottom:14px;">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-4"> <label id="textlabel">Association Name:</label></div>
                <div class="col-lg-8">{{$assoc->name}}</div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-4"> <label id="textlabel">Court Name:</label></div>
                <div class="col-lg-8">{{$court->courtname}}</div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-bottom:14px;">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-4">
                      <label id="textlabel">
                        Image URL <span style="color:red;">*</span>
                      </label>
                    </div>
                    <div class="col-lg-8">
                      <input type="file" name="url">
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-4">
                      <label id="textlabel">
                        Title <span style="color:red;">*</span>
                      </label>
                    </div>
                    <div class="col-lg-8">
                      <input type="text"name="title"class="form-control">
                    </div>

                </div>
            </div>
    </div>





    <div class="row" style="margin-bottom:14px;">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-2"> <label id="textlabel">Description:</label></div>
                <div class="col-lg-10"><textarea name="description" class="form-control" rows="8"></textarea></div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-0"></div>
        <div class="col-lg-3">
        <button type="submit" class="btn btn-warning">Upload</button>
        </div>
    </div>


</div>

</form>


<div class="p-h-md p-v bg-white box-shadow pos-rlt well" style="margin:22px;">
  <div class="row">
    @if(count($courtphoto) > 0)
      @foreach ($courtphoto as $courtimage)
        <div class="col-lg-3 col-md-3 col-sm-12" align="center" style="margin-bottom:10px">
          <img src="{{ route('baseurl') }}/images/association/{{$assoc->id}}/courts/{{$courtimage->court_id}}/{{$courtimage->photo}}" width="280px" height="200px" style="border: 2px solid #000;" alt="">
          <h3>{{$courtimage->title}}</h3>
          <div class="col-lg-12" align="left">
            <span class="more">{{$courtimage->description}}</span>
          </div>
          <div class="col-lg-12">
            <a href="{{url('/court_photos_delete/'.$courtimage->id.'/'.$courtimage->court_id)}}">
              <button type="button" class="btn btn-edit" style="padding-left: 70px; padding-right: 70px;">Delete</button>
            </a>
          </div>
        </div>
      @endforeach
    @else
      <div class="" align="center">
        <h3>No Image Found...</h3>
      </div>
    @endif
  </div>
</div>

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
