@extends('layouts.master')

@section('content')

<div class="row p-h-md p-v bg-white box-shadow pos-rlt no-margin">
    <div class="col-lg-9 ">
        <h3 class="no-margin">Managers</h3>
    </div>
    <div class="col-lg-3">
        <a class="btn btn-main pull-right" style="padding: 5px 50px;" href="{{url('/manager_create')}}">
        Create New Managers</a>
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
        <input type="text" class="form-control no-border input-sm no-bg " maxlength="25" placeholder="Search Managers..." >
         <span class="input-group-btn" >
           <button type="submit" class="btn btn-sm no-bg btn-icon no-shadow no-padder"  style="background-color:#FDBA4F; border-radius:3px">
             <i class="ti-search" ></i>
           </button>
         </span>
       </form>
    </div>
  </div>

<div style="margin: 22px;">
  <div class="panel panel-default">
    <table class="table table-striped">
      <thead  style="background-color:#0E302B">
        <tr style="color:#ffffff">
          <th class="col-sm-1">S No.</th>
          <th class="col-sm-2">Manager Name</th>
          <th class="col-sm-2">Email Address</th>
          <th class="col-sm-2">Phone</th>
          <!-- <th class="col-sm-1">Date</th> -->
          <th class="col-sm-5">Actions</th>
        </tr>
      </thead>
      <tbody id="data">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

        <script>
          $( document ).ready(function() {
            var value = localStorage.getItem("assoc_id");
            // console.log(value);
            $("#assoc_value").val(value);

            $.get($("#baseurl").val()+'/manager_api?association_id=' + value, function(data) {
                // console.log(data);
                $('#data').empty();
                var count=0;
                $.each(data, function(index,manager){
                        // console.log(manager);
                        count++;
                        $('#data').append(
                          "<tr>"+
                            "<td class='col-sm-1'>"+manager.id+"</td>"+
                            "<td class='col-sm-3'>"+manager.name+"</td>"+
                            "<td class='col-sm-2'>"+manager.email+"</td>"+
                            "<td class='col-sm-2'>"+manager.phone+"</td>"+
                            "<td class='col-sm-4'>"+
                              "<a class='btn w-xs btn-edit' style='margin-right:1%' href='#'>"+
                              "Edit" +
                              "</a>"+
                              "<a class='btn w-xs btn-deactivate' style='margin-right:1%' href='#'>"+
                              "Deactivate"+
                              "</a>"+
                              "<a class='btn w-xs btn-deactivate' href='{{url('manager_photos')}}/"+manager.id+"'>"+
                              "Photos"+
                              "</a>"+
                            "</td>"+
                          "</tr>"
                      );
                });
                $("#count").text(count);
            });
          });

          $('#association').on('change', function(e){
              var assoc_id = e.target.value;
              localStorage.setItem("assoc_id", assoc_id);
              // console.log(assoc_id);
              $("#assoc_value").val(assoc_id);

              $.get($("#baseurl").val()+'/manager_api?association_id=' + assoc_id, function(data) {
                  // console.log(data);
                  $('#data').empty();
                  var count=0;
                  $.each(data, function(index,manager){
                          // console.log(manager);
                          count++;
                          $('#data').append(
                              "<tr>"+
                                "<td class='col-sm-1'>"+manager.id+"</td>"+
                                "<td class='col-sm-3'>"+manager.name+"</td>"+
                                "<td class='col-sm-2'>"+manager.email+"</td>"+
                                "<td class='col-sm-2'>"+manager.phone+"</td>"+
                                "<td class='col-sm-4'>"+
                                  "<a class='btn w-xs btn-edit' style='margin-right:1%' href='#'>"+
                                  "Edit" +
                                  "</a>"+
                                  "<a class='btn w-xs btn-deactivate' style='margin-right:1%' href='#'>"+
                                  "Deactivate"+
                                  "</a>"+
                                  "<a class='btn w-xs btn-deactivate' href='{{url('manager_photos')}}/"+manager.id+"'>"+
                                  "Photos"+
                                  "</a>"+
                                "</td>"+
                              "</tr>"
                        );
                  });
                  $("#count").text(count);
              });
          });
        </script>
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
</div>

@endsection
