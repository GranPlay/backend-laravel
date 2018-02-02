@extends('layouts.master')

@section('content')

{{ HTML::ul($errors->all()) }}
<div class="row p-h-sm p-v bg-white box-shadow pos-rlt no-margin">
    <div class="col-lg-9 col-md-9 col-sm-9">
        <h3 class="no-margin">Association</h3>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3">
        <a class="btn btn-main pull-right" style="padding: 6px 50px;" href="{{url('/association_create')}}">
        Create New Association</a>
    </div>
</div>
<form class="" action="{{url('/association_update/'.$assoc->id)}}" method="post" enctype="multipart/form-data">

  {{ method_field('PUT') }}
  {{ csrf_field() }}

  <div class="p-h-md p-v bg-white box-shadow pos-rlt well" style="margin: 22px;">

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">*Association Name:</label></div>
                  <div class="col-lg-8"><input type="text" name="name" class="form-control" value="{{$assoc->name}}"></div>
              </div>
          </div>

          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">*cpf/cnpj:</label></div>
                  <div class="col-lg-8">
                    <select class="form-control" name="associationrole" >

                       @if($assoc->association_role == "1")
                        <option value="1" selected>cpf</option>
                        <option value="2">cnpj</option>
                        @elseif($assoc->association_role == "2")
                          <option value="1">cpf</option>
                          <option value="2" selected>cnpj</option>
                      @endif
                    </select>
                  </div>
              </div>
          </div>
      </div>
      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-12">
              <div class="row">
                  <div class="col-lg-2"> <label id="textlabel">Description:</label></div>
                  <div class="col-lg-10"><textarea name="description" class="form-control" rows="6">{{$assoc->description}}</textarea></div>
              </div>
          </div>
      </div>
      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">Website Url:</label></div>
                  <div class="col-lg-8"><input type="text"name="weburl" value="{{$assoc->weburl}}" class="form-control"></div>
              </div>
          </div>
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">Facebook Page Url:</label></div>
                  <div class="col-lg-8"><input type="text"name="fbpageurl" value="{{$assoc->fbpageurl}}" class="form-control"></div>
              </div>
          </div>
      </div>

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">*Streetline 1:</label></div>
                  <div class="col-lg-8"><input type="text" name="streetline1" value="{{$assoc->streetline1}}" class="form-control"></div>
              </div>
          </div>
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">Streetline 2:</label></div>
                  <div class="col-lg-8"><input type="text" name="streetline2" value="{{$assoc->streetline2}}" class="form-control"></div>
              </div>
          </div>
      </div>

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">*Neighbourhood</label></div>
                  <div class="col-lg-8"><input type="text" name="neighbourhood" value="{{$assoc->neighbourhood}}" class="form-control"></div>
              </div>
          </div>
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">*Country:</label></div>
                  <div class="col-lg-8">
                    <select class="form-control" id="country" name="country" required disabled>
                      <option disabled>Select Country</option>
                      <option value="30" selected>{{ \App\Country::findOrFail(30)->name }}</option>
                    </select>
                  </div>
              </div>
          </div>
      </div>

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">*State:</label></div>
                  <div class="col-lg-8">
                    <select class="form-control" id="state" name="state" required >
                      <option disabled selected>Select State</option>
                      @foreach(\App\State::where('country_id', 30)->get() as $state)
                      <option value="{{$state->id}}" {{($assoc->state == $state->id)?'selected':''}}>{{ $state->name }}</option>
                      @endforeach
                    </select>
                  </div>
              </div>
          </div>
          <script type="text/javascript">
          $('#state').on('change', function(e){
              var state = e.target.value;
              var baseurl = $('#baseurl').val();
              console.log(baseurl);
              $.get(baseurl+'/cities/' + state, function(data) {

                  $('#city').empty();

                  $('#city').append('<option disabled selected>Select City</option>');

                  $.each(data, function(index, subcity){
                      $('#city').append('<option value="'+subcity.id+'">'+subcity.name+'</option>');
                  });

                  var count = $('#city').children('option').length;
                  if (count > 1) {
                    $('#city').prop('disabled', false);
                  }
                  else {
                    $('#city').prop('disabled', true);
                  }
              });
          });
          </script>
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">City</label></div>
                  <div class="col-lg-8">
                    <select class="form-control" id="city" name="city" >
                      @foreach(\App\City::where('state_id', $assoc->state)->get() as $city)
                      <option value="{{$city->id}}" {{($assoc->city == $city->id)?'selected':''}}>{{ $city->name }}</option>
                      @endforeach
                    </select>
                  </div>
              </div>
          </div>
      </div>

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">*Lititude:</label></div>
                  <div class="col-lg-8">
                    <input type="text" name="latitude" id="latitude" value="{{$assoc->latitude}}" class="form-control">
                    <div class="geocordnates-button">
                      <input type="button" id="myBtn" name="" value="Click Hide" style="color:#FDBA4F; background-color:transparent; border-color:transparent">
                      <span> to get your geocordinates</span>
                    </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">*Longitude:</label></div>
                  <div class="col-lg-8"><input type="text" name="longitude" id="longitude" value="{{$assoc->longitude}}" class="form-control"></div>
              </div>
          </div>
      </div>
      <div class="" id="myModal" style="display:block;">
        <div class="row">
          <div class="col-lg-12">
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9cfm8IlMEGsXERObUDW2-Gb_RUers_DI&callback=initMap"></script>
            <div id="map" title="Location (Mark the property loaction on map)" class="col-lg-12" style="height: 400px;"></div>
            <script type="text/javascript">
              var map;
              var lat = 0;
              var lng = 0;
              var markers = [];
              function initMap() {
                var getlat = $("#latitude").val();
                var getlog = $('#longitude').val();
                console.log(getlat);
                var coordinates = {lat: 38.090255780611486, lng: -122.003173828125};
                var pos = {
                  lat: getlat,
                  lng: getlog
                };
                map = new google.maps.Map(document.getElementById('map'), {
                  zoom: 12,
                  draggable: true,
                  center: coordinates,
                  mapTypeId: google.maps.MapTypeId.HYBRID
                });

                map.addListener('click', function(event) {
                  addMarker(event.latLng);
                });

                infoWindow = new google.maps.InfoWindow;



                marker = new google.maps.Marker({
                  position: pos,
                  draggable: true,
                  map: map
                });

                // infoWindow.setPosition(pos);
                infoWindow.setContent('Latitude: '+getlat+ '<br>Longitude: '+getlog);
                infoWindow.open(map,marker);
                markers.push(marker);
                map.setCenter(pos);
              }

              function addMarker(location) {
                marker = new google.maps.Marker({
                  position: location,
                  draggable: true,
                  map: map
                });

                var infowindow = new google.maps.InfoWindow({
                  content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng()
                });

                clearMarkers();
                infowindow.open(map,marker);
                markers.push(marker);

                lat = location.lat();
                lng = location.lng();

                $("#latitude").val(lat);
                $("#longitude").val(lng);
                // console.log(lat);
              }
              // Sets the map on all markers in the array.
              function setMapOnAll(map) {
                for (var i = 0; i < markers.length; i++) {
                  markers[i].setMap(map);
                }
              }
              // Removes the markers from the map, but keeps them in the array.
              function clearMarkers() {
                setMapOnAll(null);
              }
              // Shows any markers currently in the array.
              function showMarkers() {
                setMapOnAll(map);
              }
              // Deletes all markers in the array by removing references to them.
              function deleteMarkers() {
                clearMarkers();
                markers = [];
              }
            </script>
          </div>
        </div>
        <br><br>
      </div>

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">*Postal/Zip Code:</label></div>
                  <div class="col-lg-8"><input type="text" name="postalcode" id="postalcode"  value="{{$assoc->postalcode}}" class="form-control"></div>
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
              <div class="col-lg-4"><input type="text" name="phone1" id="phone1"  class="form-control" value="{{$assoc->phone1}}"></div>
              <div class="col-lg-4"><input type="text"name="phone2" id="phone2" class="form-control"  value="{{$assoc->phone2}}"></div>
              <div class="col-lg-4"><input type="text"name="phone3" id="phone3" class="form-control"  value="{{$assoc->phone3}}"></div>
              </div>
          </div>
      </div>

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">*Association Type:</label></div>
                  <div class="col-lg-8">
                    <select class="form-control" name="associationtype" id="ddlFruits">
                      <option value="1" {{ ($assoc->associationtype == 1) ? 'selected="selected"' : '' }}>Association</option>
                      <option value="2" {{ ($assoc->associationtype == 2) ? 'selected="selected"' : '' }}>Public courts</option>
                      <option value="3" {{ ($assoc->associationtype == 3) ? 'selected="selected"' : '' }}>Condominium membership</option>
                      <option value="4" {{ ($assoc->associationtype == 4) ? 'selected="selected"' : '' }}>Commercial courts</option>
                    </select>
                    <br>
                    <label id="textarea" style="border:1px solid #e8ecf2; padding:10px">Association123 Type Information"</label>
                  </div>
              </div>
          </div>
      </div>

      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/inputmask.min.js" charset="utf-8"></script>

      <script type="text/javascript">
          $(function () {
              $("#ddlFruits").change(function () {
                  var selectedText = $(this).find("option:selected").text();
                  var selectedValue = $(this).val();
                  if (selectedValue == "1") {

                      $("#textarea").text("Association123 Type Information");
                  }
                  else if (selectedValue == "2") {

                      $("#textarea").text("Public courts Type Information");
                  }
                  else if (selectedValue == "3") {

                      $("#textarea").text("Condominium membership Type Information");
                  }
                  else if (selectedValue == "4") {

                      $("#textarea").text("Commercial courts Type Information");
                  }
              });
          });

          function validate_int(myEvento) {
            if ((myEvento.charCode >= 48 && myEvento.charCode <= 57) || myEvento.keyCode == 9 || myEvento.keyCode == 10 || myEvento.keyCode == 13 || myEvento.keyCode == 8 || myEvento.keyCode == 116 || myEvento.keyCode == 46 || (myEvento.keyCode <= 40 && myEvento.keyCode >= 37)) {
              dato = true;
            } else {
              dato = false;
            }
            return dato;
          }

          function phone_number_mask() {
            var myMask = "(__) _____-____";
            var myCaja = document.getElementById("phone1");
            var myText = "";
            var myNumbers = [];
            var myOutPut = ""
            var theLastPos = 1;
            myText = myCaja.value;
            //get numbers
            for (var i = 0; i < myText.length; i++) {
              if (!isNaN(myText.charAt(i)) && myText.charAt(i) != " ") {
                myNumbers.push(myText.charAt(i));
              }
            }
            //write over mask
            for (var j = 0; j < myMask.length; j++) {
              if (myMask.charAt(j) == "_") { //replace "_" by a number
                if (myNumbers.length == 0)
                  myOutPut = myOutPut + myMask.charAt(j);
                else {
                  myOutPut = myOutPut + myNumbers.shift();
                  theLastPos = j + 1; //set caret position
                }
              } else {
                myOutPut = myOutPut + myMask.charAt(j);
              }
            }
            document.getElementById("phone1").value = myOutPut;
            document.getElementById("phone1").setSelectionRange(theLastPos, theLastPos);
          }
          document.getElementById("phone1").onkeypress = validate_int;
          document.getElementById("phone1").onkeyup = phone_number_mask;

          function phone_number_mask1() {
            var myMask = "(__) _____-____";
            var myCaja = document.getElementById("phone2");
            var myText = "";
            var myNumbers = [];
            var myOutPut = ""
            var theLastPos = 1;
            myText = myCaja.value;
            //get numbers
            for (var i = 0; i < myText.length; i++) {
              if (!isNaN(myText.charAt(i)) && myText.charAt(i) != " ") {
                myNumbers.push(myText.charAt(i));
              }
            }
            //write over mask
            for (var j = 0; j < myMask.length; j++) {
              if (myMask.charAt(j) == "_") { //replace "_" by a number
                if (myNumbers.length == 0)
                  myOutPut = myOutPut + myMask.charAt(j);
                else {
                  myOutPut = myOutPut + myNumbers.shift();
                  theLastPos = j + 1; //set caret position
                }
              } else {
                myOutPut = myOutPut + myMask.charAt(j);
              }
            }
            document.getElementById("phone2").value = myOutPut;
            document.getElementById("phone2").setSelectionRange(theLastPos, theLastPos);
          }
          document.getElementById("phone2").onkeypress = validate_int;
          document.getElementById("phone2").onkeyup = phone_number_mask1;

          function phone_number_mask2() {
            var myMask = "(__) _____-____";
            var myCaja = document.getElementById("phone3");
            var myText = "";
            var myNumbers = [];
            var myOutPut = ""
            var theLastPos = 1;
            myText = myCaja.value;
            //get numbers
            for (var i = 0; i < myText.length; i++) {
              if (!isNaN(myText.charAt(i)) && myText.charAt(i) != " ") {
                myNumbers.push(myText.charAt(i));
              }
            }
            //write over mask
            for (var j = 0; j < myMask.length; j++) {
              if (myMask.charAt(j) == "_") { //replace "_" by a number
                if (myNumbers.length == 0)
                  myOutPut = myOutPut + myMask.charAt(j);
                else {
                  myOutPut = myOutPut + myNumbers.shift();
                  theLastPos = j + 1; //set caret position
                }
              } else {
                myOutPut = myOutPut + myMask.charAt(j);
              }
            }
            document.getElementById("phone3").value = myOutPut;
            document.getElementById("phone3").setSelectionRange(theLastPos, theLastPos);
          }
          document.getElementById("phone3").onkeypress = validate_int;
          document.getElementById("phone3").onkeyup = phone_number_mask2;

          function postal_number_mask() {
            var myMask = "_____-___";
            var myCaja = document.getElementById("postalcode");
            var myText = "";
            var myNumbers = [];
            var myOutPut = ""
            var theLastPos = 1;
            myText = myCaja.value;
            //get numbers
            for (var i = 0; i < myText.length; i++) {
              if (!isNaN(myText.charAt(i)) && myText.charAt(i) != " ") {
                myNumbers.push(myText.charAt(i));
              }
            }
            //write over mask
            for (var j = 0; j < myMask.length; j++) {
              if (myMask.charAt(j) == "_") { //replace "_" by a number
                if (myNumbers.length == 0)
                  myOutPut = myOutPut + myMask.charAt(j);
                else {
                  myOutPut = myOutPut + myNumbers.shift();
                  theLastPos = j + 1; //set caret position
                }
              } else {
                myOutPut = myOutPut + myMask.charAt(j);
              }
            }
            document.getElementById("postalcode").value = myOutPut;
            document.getElementById("postalcode").setSelectionRange(theLastPos, theLastPos);
          }
          document.getElementById("postalcode").onkeypress = validate_int;
          document.getElementById("postalcode").onkeyup = postal_number_mask;
      </script>
  </div>

  <div class="p-h-md p-v bg-white box-shadow pos-rlt well" style="margin: 22px;">

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">*Max Slot Time For Singles Matches</label></div>
                  <div class="col-lg-5">
                    <select class="form-control" name="max_time_singlematches">
                      <option value="15" {{ ($assoc->max_time_singlematches == 15) ? 'selected="selected"' : '' }}>15</option>
                      <option value="30" {{ ($assoc->max_time_singlematches == 30) ? 'selected="selected"' : '' }}>30</option>
                      <option value="45" {{ ($assoc->max_time_singlematches == 45) ? 'selected="selected"' : '' }}>45</option>
                      <option value="60" {{ ($assoc->max_time_singlematches == 60) ? 'selected="selected"' : '' }}>60</option>
                      <option value="90" {{ ($assoc->max_time_singlematches == 90) ? 'selected="selected"' : '' }}>90</option>
                      <option value="120" {{ ($assoc->max_time_singlematches == 120) ? 'selected="selected"' : '' }}>120</option>
                    </select>
                  </div>
                  <div class="col-lg-3">minutes</div>
              </div>
          </div>
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">Max Slot Time For Double Matches</label></div>
                  <div class="col-lg-5">
                    <select class="form-control" name="max_time_doublematches" value="{{$assoc->max_time_doublematches}}">
                      <option value="15" {{ ($assoc->max_time_doublematches == 15) ? 'selected="selected"' : '' }}>15</option>
                      <option value="30" {{ ($assoc->max_time_doublematches == 30) ? 'selected="selected"' : '' }}>30</option>
                      <option value="45" {{ ($assoc->max_time_doublematches == 45) ? 'selected="selected"' : '' }}>45</option>
                      <option value="60" {{ ($assoc->max_time_doublematches == 60) ? 'selected="selected"' : '' }}>60</option>
                      <option value="90" {{ ($assoc->max_time_doublematches == 90) ? 'selected="selected"' : '' }}>90</option>
                      <option value="120" {{ ($assoc->max_time_doublematches == 120) ? 'selected="selected"' : '' }}>120</option>
                    </select>
                  </div>
                  <div class="col-lg-3">minutes</div>

              </div>
          </div>
      </div>

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">*Maximum Time For Invite Confirmation</label></div>
                  <div class="col-lg-5">
                    <select class="form-control" name="max_time_invite_confirmation">
                      <option value="0" {{ ($assoc->max_time_invite_confirmation == 0) ? 'selected="selected"' : '' }}>0</option>
                      <option value="1" {{ ($assoc->max_time_invite_confirmation == 1) ? 'selected="selected"' : '' }}>1</option>
                      <option value="2" {{ ($assoc->max_time_invite_confirmation == 2) ? 'selected="selected"' : '' }}>2</option>
                      <option value="3" {{ ($assoc->max_time_invite_confirmation == 3) ? 'selected="selected"' : '' }}>3</option>
                      <option value="4" {{ ($assoc->max_time_invite_confirmation == 4) ? 'selected="selected"' : '' }}>4</option>
                      <option value="5" {{ ($assoc->max_time_invite_confirmation == 5) ? 'selected="selected"' : '' }}>5</option>
                    </select>
                  </div>
                  <div class="col-lg-3">hours</div>
              </div>
          </div>

          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">*Number Of Guests Allowed</label></div>
                  <div class="col-lg-5"><input type="text"name="guests_allowed"class="form-control" value="{{$assoc->guests_allowed}}" required></div>
                  <div class="col-lg-3">persons</div>
              </div>
          </div>
      </div>

      <div class="row">
        <div class="col-lg-8"></div>
        <div class="col-lg-4">


          <button type="submit" class="btn btn-edit"  style="padding: 6px 50px;">Submit</button>
          <!-- <a class="btn w-xs btn-danger" href="">Cancel</a> -->
            <a class="btn btn-deactivate" style="padding: 6px 50px;" href="{{url('/association/')}}">Cancel</a>

        </div>
      </div>


  </div>

</form>
<script>
  // Get the modal
  var modal = document.getElementById('myModal');

  // Get the button that opens the modal
  var btn = document.getElementById("myBtn");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks the button, open the modal
  btn.onclick = function() {
    if (modal.style.display == "block") {
        modal.style.display = "none";
        btn.value = "Click Here"
    }
    else if (modal.style.display == "none") {
        modal.style.display = "block";
        btn.value = "Click Hide";
    }
  }

  // When the user clicks on <span> (x), close the modal
  // span.onclick = function() {
  //     modal.style.display = "none";
  // }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }
</script>
    @endsection
