@extends('layouts.master')

@section('content')

{{ HTML::ul($errors->all()) }}
<div class="p-h-md p-v bg-white box-shadow pos-rlt">
  <h3 class="no-margin">Association Photos</h3>
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

<form class="" action="{{url('/association_photo_store/'.$assoc->id)}}" method="post" enctype="multipart/form-data">

  {{ csrf_field() }}

<div class="p-h-md p-v bg-white box-shadow pos-rlt well" style="margin: 22px;">

    <div class="row" style="margin-bottom:14px;">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-4"> <label id="textlabel">Association Name:</label></div>
                <div class="col-lg-8">{{$assoc->name}}</div>
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
                      <input type="file" name="url" required>
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
                      <input type="text"name="title"class="form-control" required>
                    </div>

                </div>
            </div>
    </div>
    <div class="row" style="margin-bottom:14px;">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-2"> <label id="textlabel">Description :</label></div>
                <div class="col-lg-10"><textarea name="description" class="form-control" rows="8"></textarea></div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-0"></div>
        <div class="col-lg-3">
          <button type="submit" class="btn btn-edit">Upload</button>
        </div>
    </div>


</div>

</form>


<div class="p-h-md p-v bg-white box-shadow pos-rlt well" style="margin: 22px;">
  <div class="row">
    @if(count($associationphoto) > 0)
      @foreach ($associationphoto as $assocphoto)
        <div class="col-lg-3 col-md-3 col-sm-12" align="center" style="margin-bottom:10px">
          <img src="{{ route('baseurl') }}/images/association/{{$assoc->id}}/{{$assocphoto->photo}}" width="280px" height="200px" style="border: 2px solid #000;" alt="">
          <div class="" style="height:60px;">
            <h3>{{$assocphoto->title}}</h3>
          </div>
          <div class="col-lg-12" align="left">
            <span class="more">{{$assocphoto->description}}</span>
          </div>
          <div class="col-lg-12">
            <a href="{{url('/association_photo_delete/'.$assocphoto->id.'/'.$assocphoto->assoc_id)}}">
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


@endsection
