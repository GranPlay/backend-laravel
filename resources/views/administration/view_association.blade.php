@extends('layouts.master')

@section('content')

{{ HTML::ul($errors->all()) }}
<div class="row p-h-md p-v bg-white box-shadow pos-rlt no-margin">
    <div class="col-lg-9 col-md-9 col-sm-9">
        <h3 class="no-margin">Association</h3>
    </div>
    <div class="col-lg-3 col-md-9 col-sm-9">
        <a class="btn btn-edit btn pull-right" style="padding: 5px 50px;" href="{{url('/association_create')}}">
        Create New Association</a>
    </div>
</div>


<div class="p-h-md p-v bg-white box-shadow pos-rlt well" style="margin: 22px;">
  <a class="btn btn-edit"  href="{{url('/association_photos/'.$assoc->id)}}">Add New Photos</a>
  <!-- <a class="btn btn-deactivate"  href="{{url('/association_photos/'.$assoc->id)}}">
  View Photos</a> -->
</div>


  <div class="p-h-md p-v bg-white box-shadow pos-rlt well" style="margin: 22px;">

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel"><b>Association Name : </b></label></div>
                  <div class="col-lg-8">{{$assoc->name}}</div>
              </div>
          </div>
          <div class="col-lg-6">
            <div class="row">
              <div class="col-lg-4"><b>cpf/cnpj : </b></div>
              @if($assoc->association_role == 1)
              <div class="col-lg-8">cpf</div>
              @elseif($assoc->association_role == 2)
              <div class="col-lg-8">cnpj</div>
              @endif
            </div>
          </div>
      </div>



      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-12">
              <div class="row">
                  <div class="col-lg-2"> <label id="textlabel"><b>Description : </b></label></div>
                  <div class="col-lg-10">{{$assoc->description}}</div>
              </div>
          </div>
      </div>

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel"><b>Website Url : </b></label></div>
                  <div class="col-lg-8">{{$assoc->weburl}}</div>
              </div>
          </div>
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel"><b>Facebook Page Url : </b></label></div>
                  <div class="col-lg-8">{{$assoc->fbpageurl}}</div>
              </div>
          </div>
      </div>

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel"><b>Streetline 1 : </b></label></div>
                  <div class="col-lg-8">{{$assoc->streetline1}}</div>
              </div>
          </div>
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel"><b>Streetline 2 : </b></label></div>
                  <div class="col-lg-8">{{$assoc->streetline2}}</div>
              </div>
          </div>
      </div>

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel"><b>Neighbourhood : </b></label></div>
                  <div class="col-lg-8">{{$assoc->neighbourhood}}</div>
              </div>
          </div>

          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel"><b>Country : </b></label></div>
                  <div class="col-lg-8">Brazil</div>
              </div>
          </div>
      </div>

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel"><b>State : </b></label></div>
                  <div class="col-lg-8">{{ \App\State::findOrFail($assoc->state)->name }}</div>
              </div>
          </div>
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel"><b>City : </b></label></div>
                  @if($assoc->city == null)
                  <div class="col-lg-8">{{$assoc->city}}</div>
                  @else
                  <div class="col-lg-8">{{ \App\City::findOrFail($assoc->city)->name }}</div>
                  @endif
              </div>
          </div>
      </div>

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel"><b>Lititude : </b></label></div>
                  <div class="col-lg-8">{{$assoc->latitude}}</div>
              </div>
          </div>
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel"><b>Longitude : </b></label></div>
                  <div class="col-lg-8">{{$assoc->longitude}}</div>
              </div>
          </div>
      </div>

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel"><b>Postal/Zip Code : </b></label></div>
                  <div class="col-lg-8">{{$assoc->postalcode}}</div>
              </div>
          </div>
      </div>

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-2">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel"><b>Phone: </b></label></div>
              </div>
          </div>
          <div class="col-lg-10">
            <div class="row">
              @if($assoc->phone1)
                <div class="col-lg-4"><label style="margin-right:10px"><b>Phone 1 : </b></label>{{$assoc->phone1}}</div>

              @endif

              @if($assoc->phone2)
                <div class="col-lg-4"><label style="margin-right:10px"><b>Phone 2 : </b></label>{{$assoc->phone2}}</div>

              @endif

              @if($assoc->phone3)
                <div class="col-lg-4"><label style="margin-right:10px"><b>Phone 3 : </b></label>{{$assoc->phone3}}</div>

              @endif
            </div>
          </div>
      </div>

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel"><b>Association Type : </b></label></div>
                  @if($assoc->associationtype == "1")
                  <div class="col-lg-8">Association</div>
                  @elseif($assoc->associationtype == "2")
                  <div class="col-lg-8">Public Courts</div>
                  @elseif($assoc->associationtype == "3")
                  <div class="col-lg-8">Condominium Membership</div>
                  @elseif($assoc->associationtype == "4")
                  <div class="col-lg-8">Commercial Courts</div>
                  @endif
              </div>
          </div>

      </div>

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-8">
              <div class="row">
                  <div class="col-lg-5"> <label id="textlabel"><b>Max Slot Time For Singles Matches : </b></label></div>
                  <div class="col-lg-2">{{$assoc->max_time_singlematches}}&nbsp;minutes</div>
              </div>
          </div>
      </div>

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-8">
              <div class="row">
                  <div class="col-lg-5"> <label id="textlabel"><b>Max Slot Time For Double Matches : </b></label></div>
                  <div class="col-lg-2">{{$assoc->max_time_doublematches}}&nbsp;minutes</div>
              </div>
          </div>
      </div>

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-8">
              <div class="row">
                  <div class="col-lg-5"> <label id="textlabel"><b>Maximum Time For Invite Confirmation : </b></label></div>
                  <div class="col-lg-2">{{$assoc->max_time_invite_confirmation}}&nbsp;hours</div>
              </div>
          </div>
      </div>

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-8">
              <div class="row">
                  <div class="col-lg-5"> <label id="textlabel"><b>Number Of Guests Allowed : </b></label></div>
                  <div class="col-lg-2">{{$assoc->guests_allowed}}&nbsp;persons</div>
              </div>
          </div>
      </div>




  </div>


    @endsection
