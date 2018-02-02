@extends('layouts.master')

@section('content')

<div class="row p-h-md p-v bg-white box-shadow pos-rlt no-margin">
    <div class="col-lg-9 ">
        <h3 class="no-margin">Price/Time Policy</h3>
    </div>
    <div class="col-lg-3">
        <a class="btn btn-main pull-right" style="padding: 5px 50px;" href="{{url('/price_time_policy_create')}}">
        Create New Price/Time Policy</a>
    </div>
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

  <div class="row" style="margin: 22px;">
    <div class="p-h-md p-v bg-white box-shadow pos-rlt col-lg-3 pull-right " style="border: 1px solid #e8ecf2;">
      <form class="input-group col-lg-12 pull-right">
        <input type="text" class="form-control no-border input-sm no-bg " maxlength="25" placeholder="Search Price / Time Policy..." >
         <span class="input-group-btn" >
           <button type="submit" class="btn btn-sm no-bg btn-icon no-shadow no-padder"  style="background-color:#FDBA4F; border-radius:3px">
             <i class="ti-search" ></i>
           </button>
         </span>
       </form>
    </div>
  </div>

<div ui-view="" style="margin:22px;">
  <div class="panel panel-default">
    <table class="table table-striped">
      <thead  style="background-color:#0E302B">
        <tr style="color:#ffffff">
          <th class="col-sm-1">S No.</th>
          <th class="col-sm-2">Policy Name</th>
          <th class="col-sm-3">Actions</th>
        </tr>
      </thead>
      <tbody id="data">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

        <script>
          $( document ).ready(function() {
            var value = localStorage.getItem("assoc_id");
            // console.log(value);
            // $("#assoc_value").val(value);
            $.get($("#baseurl").val()+'/price_time_policy_api/' + value, function(data) {
                // console.log(data);
                $('#data').empty();
                var count=0;
                $.each(data.data, function(index,assoc){
                        console.log(assoc);
                        count++;
                        $('#data').append(
                          "<tr>"+
                            "<td class='col-sm-1'>"+assoc.id+"</td>"+
                            "<td class='col-sm-6'><a href='{{url('/price_time_policy_show')}}/"+assoc.id+"'>"+assoc.pricetimename+"</a></td>"+
                            "<td class='col-sm-4'>"+
                              "<a class='btn w-xs btn-edit' style='margin-right:1%' href='{{url('price_time_policy_edit')}}/"+assoc.id+"'>"+
                              "Edit" +
                              "</a>"+
                              "<a class='btn w-xs btn-deactivate' style='margin-right:1%' href='{{url('price_time_policy_slot')}}/"+assoc.id+"'>"+
                              "[+] Slot"+
                              "</a>"+
                              "<a class='btn w-xs btn-deactivate' href='{{url('price_time_policy_delete')}}/"+assoc.id+"'>"+
                              "Deactivate"+
                              "</a>"+
                            "</td>"+
                          "</tr>"
                      );
                });
                $("#count").text(count);
                // console.log(data.next_page_url);
                // console.log(data.prev_page_url);
                // console.log(data.current_page);
                $("#pagenum").text(data.current_page);
                $("#next_value").val(data.next_page_url);
                $("#previous_value").val(data.prev_page_url);
            });

          });

  				$('#association').on('change', function(e){
  						var association_id = e.target.value;
              localStorage.setItem("assoc_id", association_id);
              // console.log(association_id);
              $("#assoc_value").val(association_id);
  						$.get($("#baseurl").val()+'/price_time_policy_api/' + association_id, function(data) {
  								// console.log(data);

  								$('#data').empty();
  								var count=0;
  								$.each(data.data, function(index,assoc){
  												console.log(assoc);
  												count++;
  												$('#data').append(
                            "<tr>"+
                              "<td class='col-sm-1'>"+assoc.id+"</td>"+
                              "<td class='col-sm-6'><a href='{{url('/price_time_policy_show')}}/"+assoc.id+"'>"+assoc.pricetimename+"</a></td>"+
                              "<td class='col-sm-4'>"+
                                "<a class='btn w-xs btn-edit' style='margin-right:1%' href='{{url('price_time_policy_edit')}}/"+assoc.id+"'>"+
                                "Edit" +
                                "</a>"+
                                "<a class='btn w-xs btn-deactivate' style='margin-right:1%' href='{{url('price_time_policy_slot')}}/"+assoc.id+"'>"+
                                "[+] Slot"+
                                "</a>"+
                                "<a class='btn w-xs btn-deactivate' href='{{url('price_time_policy_delete')}}/"+assoc.id+"'>"+
                                "Deactivate"+
                                "</a>"+
                              "</td>"+
                            "</tr>"
  											);
  								});
  								$("#count").text(count);
                  // console.log(data.next_page_url);
                  // console.log(data.prev_page_url);
                  // console.log(data.current_page);
                  $("#pagenum").text(data.current_page);
                  $("#next_value").val(data.next_page_url);
                  $("#previous_value").val(data.prev_page_url);
  						});

          });

          // Pagination Apply Policy
          $(document).ready(function(){
              $("#next").click(function(){
                  var nextvalue = $("#next_value").val();
                  // alert(nextvalue);
                  if (nextvalue) {
                    $.get(nextvalue, function(data) {
                        // console.log(data);

                        $('#data').empty();
                        var count=0;
                        $.each(data.data, function(index,assoc){
                                console.log(assoc);
                                count++;
                                $('#data').append(
                                  "<tr>"+
                                    "<td class='col-sm-1'>"+assoc.id+"</td>"+
                                    "<td class='col-sm-6'><a href='{{url('/price_time_policy_show')}}/"+assoc.id+"'>"+assoc.pricetimename+"</a></td>"+
                                    "<td class='col-sm-4'>"+
                                      "<a class='btn w-xs btn-edit' style='margin-right:1%' href='{{url('price_time_policy_edit')}}/"+assoc.id+"'>"+
                                      "Edit" +
                                      "</a>"+
                                      "<a class='btn w-xs btn-deactivate' style='margin-right:1%' href='{{url('price_time_policy_slot')}}/"+assoc.id+"'>"+
                                      "[+] Slot"+
                                      "</a>"+
                                      "<a class='btn w-xs btn-deactivate' href='{{url('price_time_policy_delete')}}/"+assoc.id+"'>"+
                                      "Deactivate"+
                                      "</a>"+
                                    "</td>"+
                                  "</tr>"
                              );
                        });
                        $("#count").text(count);
                        // console.log(data.next_page_url);
                        // console.log(data.prev_page_url);
                        // console.log(data.current_page);
                        $("#pagenum").text(data.current_page);
                        $("#next_value").val(data.next_page_url);
                        $("#previous_value").val(data.prev_page_url);
                    });
                  }
              });

              $("#previous").click(function(){
                var previousvalue = $("#previous_value").val();
                // alert(previousvalue);
                if (previousvalue) {
                  $.get(previousvalue, function(data) {
                      // console.log(data);

                      $('#data').empty();
                      var count=0;
                      $.each(data.data, function(index,assoc){
                              console.log(assoc);
                              count++;
                              $('#data').append(
                                "<tr>"+
                                  "<td class='col-sm-1'>"+assoc.id+"</td>"+
                                  "<td class='col-sm-6'><a href='{{url('/price_time_policy_show')}}/"+assoc.id+"'>"+assoc.pricetimename+"</a></td>"+
                                  "<td class='col-sm-4'>"+
                                    "<a class='btn w-xs btn-edit' style='margin-right:1%' href='{{url('price_time_policy_edit')}}/"+assoc.id+"'>"+
                                    "Edit" +
                                    "</a>"+
                                    "<a class='btn w-xs btn-deactivate' style='margin-right:1%' href='{{url('price_time_policy_slot')}}/"+assoc.id+"'>"+
                                    "[+] Slot"+
                                    "</a>"+
                                    "<a class='btn w-xs btn-deactivate' href='{{url('price_time_policy_delete')}}/"+assoc.id+"'>"+
                                    "Deactivate"+
                                    "</a>"+
                                  "</td>"+
                                "</tr>"
                            );
                      });
                      $("#count").text(count);
                      // console.log(data.next_page_url);
                      // console.log(data.prev_page_url);
                      // console.log(data.current_page);
                      $("#pagenum").text(data.current_page);
                      $("#next_value").val(data.next_page_url);
                      $("#previous_value").val(data.prev_page_url);
                  });
                }
              });
          });
  			</script>

      </tbody>
    </table>


    <div class="panel-heading" style="background-color:#0E302B">
      <div class="row">
        <div class="col-sm-3 top-7" style="color:white">
            Page Number: <b><span id="pagenum"></span></b>
        </div>

        <div class="col-sm-4 pull-right">
          <input type="hidden" name="" id="next_value" value="">
          <input type="hidden" name="" id="previous_value" value="">

          <button class="btn w-xs btn-edit pull-right" style="margin-left:5px" id="next">Next</button>
          <button class="btn w-xs btn-edit pull-right" id="previous">Previous</button>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

<style type="text/css">
.truncate {
  /*white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  display: flex;
  max-width: 3%;*/
}
</style>
