@extends('layouts.master')

@section('content')

{{ HTML::ul($errors->all()) }}
<div class="p-h-md p-v bg-white box-shadow pos-rlt">
  <h3 class="no-margin">Association</h3>
</div>
<form class="" action="association_store" method="post" enctype="multipart/form-data">

  {{ csrf_field() }}

  <div class="p-h-md p-v bg-white box-shadow pos-rlt well" style="margin: 22px;">

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">*Association Name:</label></div>
                  <div class="col-lg-8"><input type="text" name="name" class="form-control" value="{{old('name')}}"></div>
              </div>
          </div>

          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">*cpf/cnpj:</label></div>
                  <div class="col-lg-8">
                    <select class="form-control" name="associationrole" >
                      <option value="1" {{(old('associationrole')==1)?'selected':''}}>cpf</option>
                      <option value="2" {{(old('associationrole')==2)?'selected':''}}>cnpj</option>
                    </select>
                  </div>
              </div>
          </div>
      </div>

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-12">
              <div class="row">
                  <div class="col-lg-2"> <label id="textlabel">Description:</label></div>
                  <div class="col-lg-10"><textarea name="description" class="form-control" rows="6">{{old('description')}}</textarea></div>
              </div>
          </div>
      </div>

      <div class="row" style="margin{{(old('associationrole')==1)?'selected':''}}-bottom:14px;">
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">Website Url:</label></div>
                  <div class="col-lg-8"><input type="url"name="weburl"class="form-control"  maxlength="180" value="{{old('weburl')}}"></div>
              </div>
          </div>
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">Facebook Page Url:</label></div>
                  <div class="col-lg-8"><input type="url"name="fbpageurl"class="form-control"  maxlength="180" value="{{old('fbpageurl')}}"></div>
              </div>
          </div>
      </div>

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">*Streetline 1:</label></div>
                  <div class="col-lg-8"><input type="text" name="streetline1" class="form-control"  maxlength="180" value="{{old('streetline1')}}"></div>
              </div>
          </div>
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">Streetline 2:</label></div>
                  <div class="col-lg-8"><input type="text" name="streetline2" class="form-control" maxlength="180" value="{{old('streetline2')}}"></div>
              </div>
          </div>
      </div>

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">*Neighbourhood</label></div>
                  <div class="col-lg-8"><input type="text" name="neighbourhood" class="form-control" maxlength="180" value="{{old('neighbourhood')}}"></div>
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
                      <option value="{{$state->id}}" {{(old('state') == $state->id)?'selected':''}}>{{ $state->name }}</option>
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
                    <input type="text" name="latitude" id="latitude" class="form-control" value="{{old('latitude')}}">
                    <div class="geocordnates-button">
                      <input type="button" id="myBtn" name="" value="Click Here" style="color:#FDBA4F; background-color:transparent; border-color:transparent">
                      <span id="map_value"> to hide your geocordinates</span>
                    </div>
                  </div>
              </div>
          </div>

          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">*Longitude:</label></div>
                  <div class="col-lg-8"><input type="text" name="longitude" id="longitude" class="form-control" value="{{old('longitude')}}"></div>
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
                var coordinates = {lat: 37.769, lng: -122.446};
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

                if (navigator.geolocation) {
                  navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                      lat: position.coords.latitude,
                      lng: position.coords.longitude
                    };

                    infoWindow.setPosition(pos);
                    infoWindow.setContent('Latitude: '+position.coords.latitude+ '<br>Longitude: '+position.coords.longitude);
                    infoWindow.open(map);
                    map.setCenter(pos);

                  }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                  });
                } else {
                  handleLocationError(false, infoWindow, map.getCenter());
                }

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
                  <div class="col-lg-8">
                    <input type="text" name="postalcode" id="postalcode" class="form-control" pattern="^\[0-9]{5}-[0-9]{3}$" value="{{old('postalcode')}}">
                  </div>
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
              <div class="col-lg-4">
                <div class="col-lg-4" style="margin-left:-1em;">
                  <select class="form-control" name="code1">
                    <option value="+55">+55</option>
                  </select>
                </div>
                <div class="col-lg-8">
                  <input class="form-control" type="text" name="phone1" id="phone1" value="{{old('phone1')}}">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="col-lg-4" style="margin-left:-1em;">
                  <select class="form-control" name="code2">
                    <option value="+55">+55</option>
                  </select>
                </div>
                <div class="col-lg-8">
                  <input class="form-control" type="text" name="phone2" id="phone2" value="{{old('phone2')}}">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="col-lg-4" style="margin-left:-1em;">
                  <select class="form-control" name="code3">
                    <option value="+55">+55</option>
                  </select>
                </div>
                <div class="col-lg-8">
                  <input class="form-control" type="text" name="phone3" id="phone3" value="{{old('phone3')}}">
                </div>
              </div>
            </div>
          </div>
      </div>

      <div class="row" style="margin-bottom:14px;">
          <div class="col-lg-6">
              <div class="row">
                  <div class="col-lg-4"> <label id="textlabel">*Association Type:</label></div>
                  <div class="col-lg-8">
                    <select class="form-control" name="associationtype" id="ddlFruits">
                      <option value="1" {{(old('associationtype') == 1)?'selected':''}}>Association</option>
                      <option value="2" {{(old('associationtype') == 2)?'selected':''}}>Public courts</option>
                      <option value="3" {{(old('associationtype') == 3)?'selected':''}}>Condominium membership</option>
                      <option value="4" {{(old('associationtype') == 4)?'selected':''}}>Commercial courts</option>
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
                    <option value="15" {{(old('max_time_singlematches') == 15)?'selected':''}}>15</option>
                    <option value="30" {{(old('max_time_singlematches') == 30)?'selected':''}}>30</option>
                    <option value="45" {{(old('max_time_singlematches') == 45)?'selected':''}}>45</option>
                    <option value="60" {{(old('max_time_singlematches') == 60)?'selected':''}}>60</option>
                    <option value="90" {{(old('max_time_singlematches') == 90)?'selected':''}}>90</option>
                    <option value="120" {{(old('max_time_singlematches') == 120)?'selected':''}}>120</option>
                  </select>
                  <br>
                  <label style="border:1px solid #e8ecf2; padding:10px">Max Slot Time For Singles Matches Information"</label>
                </div>
                <div class="col-lg-3">minutes</div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-4"> <label id="textlabel">Max Slot Time For Double Matches</label></div>
                <div class="col-lg-5">
                  <select class="form-control" name="max_time_doublematches">
                    <option value="15" {{(old('max_time_doublematches') == 15)?'selected':''}}>15</option>
                    <option value="30" {{(old('max_time_doublematches') == 30)?'selected':''}}>30</option>
                    <option value="45" {{(old('max_time_doublematches') == 45)?'selected':''}}>45</option>
                    <option value="60" {{(old('max_time_doublematches') == 60)?'selected':''}}>60</option>
                    <option value="90" {{(old('max_time_doublematches') == 90)?'selected':''}}>90</option>
                    <option value="120" {{(old('max_time_doublematches') == 120)?'selected':''}}>120</option>
                  </select>
                  <br>
                  <label style="border:1px solid #e8ecf2; padding:10px">Max Slot Time For Double Matches Information"</label>
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
                    <option value="0" {{(old('max_time_invite_confirmation') == 0)?'selected':''}}>0</option>
                    <option value="1" {{(old('max_time_invite_confirmation') == 1)?'selected':''}}>1</option>
                    <option value="2" {{(old('max_time_invite_confirmation') == 2)?'selected':''}}>2</option>
                    <option value="3" {{(old('max_time_invite_confirmation') == 3)?'selected':''}}>3</option>
                    <option value="4" {{(old('max_time_invite_confirmation') == 4)?'selected':''}}>4</option>
                    <option value="5" {{(old('max_time_invite_confirmation') == 5)?'selected':''}}>5</option>
                  </select>
                  <br>
                  <label style="border:1px solid #e8ecf2; padding:10px">Maximum Time For Invite Confirmation Information"</label>
                </div>
                <div class="col-lg-3">hours</div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-4"> <label id="textlabel">*Number Of Guests Allowed</label></div>
                <div class="col-lg-5"><input type="text"name="guests_allowed"class="form-control" value="{{old('guests_allowed')}}" required>
                <br>
                <label style="border:1px solid #e8ecf2; padding:10px">Number Of Guests Allowed Information"</label>
                </div>
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
        $("#map_value").text("to get your geocordinates");
    }
    else if (modal.style.display == "none") {
        modal.style.display = "block";
        btn.value = "Click Here";
        $("#map_value").text("to hide your geocordinates");
    }
  }

  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }
</script>

    @endsection
