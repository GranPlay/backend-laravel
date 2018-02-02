@extends('layouts.master')

@section('content')

{{ HTML::ul($errors->all()) }}
<div class="p-h-md p-v bg-white box-shadow pos-rlt">
  <h3 class="no-margin">Court</h3>
</div>
<form class="" action="court_store" method="post" enctype="multipart/form-data">

{{ csrf_field() }}

<div class="p-h-md p-v bg-white box-shadow pos-rlt well" style="margin: 22px;">

    <div class="row" style="margin-bottom:14px; padding:0px;">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-4"> <label id="textlabel">*Court Name:</label></div>
                <div class="col-lg-8"><input type="text" name="courtname"class="form-control" value="{{old('courtname')}}"></div>
            </div>
        </div>
        @if (Auth::user()->roles == 2)
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-4"> <label id="textlabel">*Select Association:</label></div>
                <div class="col-lg-6">
                  <select class="form-control" name="association_id">
                    @foreach (\App\Association::all() as $assoc)
                    <option value="{{ $assoc->id }}" {{(old('association_id')== $assoc->id)?'selected':''}}>{{ $assoc->name }}</option>
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
                        <option value="Asphalt" {{(old('courttype')== "Asphalt")?'selected':''}}>Asphalt</option>
                        <option value="Concrete" {{(old('courttype')== "Concrete")?'selected':''}}>Concrete</option>
                        <option value="Clay" {{(old('courttype')== "Clay")?'selected':''}}>Clay</option>
                        <option value="Grass" {{(old('courttype')== "Grass")?'selected':''}}>Grass</option>
                        <option value="Sand" {{(old('courttype')== "Sand")?'selected':''}}>Sand</option>
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
                            <input type="checkbox" name="courtoperational" {{(old('courtoperational'))?'checked':''}} >
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
                <div class="col-lg-10"><textarea name="courtdesc" class="form-control" rows="8">{{old('courtdesc')}}</textarea></div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-8"></div>
        <div class="col-lg-4">
        <!-- <button type="button" class="btn btn-warning"> -->
        <!-- <a class="btn btn-warning" href="{{url('/create_new_association')}}">
        Cancel</a> -->
        <!-- </button> -->
        <button type="submit" class="btn btn-edit"  style="padding: 6px 50px;">Submit</button>
        <!-- <a class="btn w-xs btn-danger" href="">Cancel</a> -->
          <a class="btn btn-deactivate" style="padding: 6px 50px;" href="{{url('/court/')}}">Cancel</a>

        </div>
    </div>


</div>
</form>


@endsection
