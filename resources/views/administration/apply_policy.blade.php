@extends('layouts.master')

@section('content')

<div class="row p-h-md p-v bg-white box-shadow pos-rlt no-margin">
    <div class="col-lg-9 ">
        <h3 class="no-margin">Apply Policy</h3>
    </div>
    <div class="col-lg-3">
        <a class="btn btn-main pull-right" style="padding: 5px 50px;" href="{{url('/apply_policy_create')}}">
        Create New Policy</a>
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
        <input type="text" class="form-control no-border input-sm no-bg " maxlength="25" placeholder="Search Court..." >
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
          <th class="col-sm-1">S No..</th>
          <th class="col-sm-3">Court Name</th>
          <th class="col-sm-2">Policy</th>
          <th class="col-sm-2">Date</th>
          <th class="col-sm-4">Actions</th>
        </tr>
      </thead>
    <tbody  id="data">


      <script>
        $( document ).ready(function() {
          var value = localStorage.getItem("assoc_id");
          // console.log(value);
          $("#assoc_value").val(value);
          $.get($("#baseurl").val()+'/api/apply_policy/' + value, function(data) {
              // console.log(data);
              $('#data').empty();
              var count=0;
              $.each(data.data, function(index,applycourt){
                  count++;
                  $('#data').append(
                    "<tr>"+
                      "<td class='col-sm-1'>"+applycourt.id+"</td>"+
                      "<td class='col-sm-1'>"+applycourt.courtname+"</td>"+
                      "<td class='col-sm-3'>"+applycourt.pricetimename+"</td>"+
                      "<td class='col-sm-2'>"+applycourt.date+"</td>"+
                      "<td class='col-sm-4'>"+
                        "<a class='btn w-xs btn-deactivate' style='margin-right:1%' href='{{url('/apply_policy_delete')}}/"+applycourt.id+"'>"+
                        "Deactivate"+
                        "</a>"+
                      "</td>"+
                    "</tr>"
                );
              });
              $("#count").text(count);
              console.log(data.next_page_url);
              console.log(data.prev_page_url);
              console.log(data.current_page);
              $("#pagenum").text(data.current_page);
              $("#next_value").val(data.next_page_url);
              $("#previous_value").val(data.prev_page_url);
          });
        });

        $('#association').on('change', function(e){
            var assoc_id = e.target.value;
            localStorage.setItem("assoc_id", assoc_id);
            // console.log(assoc_id);
            $("#assoc_value").val(assoc_id);
            $.get($("#baseurl").val()+'/api/apply_policy/' + assoc_id, function(data) {
                console.log(data);

                $('#data').empty();
                var count=0;
                $.each(data.data, function(index,applycourt){
                      count++;
                      $('#data').append(
                        "<tr>"+
                          "<td class='col-sm-1'>"+applycourt.id+"</td>"+
                          "<td class='col-sm-1'>"+applycourt.courtname+"</td>"+
                          "<td class='col-sm-3'>"+applycourt.pricetimename+"</td>"+
                          "<td class='col-sm-2'>"+applycourt.date+"</td>"+
                          "<td class='col-sm-4'>"+
                            "<a class='btn w-xs btn-deactivate' style='margin-right:1%' href='{{url('/apply_policy_delete')}}/"+applycourt.id+"'>"+
                            "Deactivate"+
                            "</a>"+
                          "</td>"+
                        "</tr>"
                    );
                });
                $("#count").text(count);
                console.log(data.next_page_url);
                console.log(data.prev_page_url);
                console.log(data.current_page);
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
                      console.log(data);
                      $('#data').empty();
                      var count=0;
                      $.each(data.data, function(index,applycourt){
                          count++;
                          $('#data').append(
                            "<tr>"+
                              "<td class='col-sm-1'>"+applycourt.id+"</td>"+
                              "<td class='col-sm-1'>"+applycourt.courtname+"</td>"+
                              "<td class='col-sm-3'>"+applycourt.pricetimename+"</td>"+
                              "<td class='col-sm-2'>"+applycourt.date+"</td>"+
                              "<td class='col-sm-4'>"+
                                "<a class='btn w-xs btn-deactivate' style='margin-right:1%' href='{{url('/apply_policy_delete')}}/"+applycourt.id+"'>"+
                                "Deactivate"+
                                "</a>"+
                              "</td>"+
                            "</tr>"
                        );
                      });
                      $("#count").text(count);
                      console.log(data.next_page_url);
                      console.log(data.prev_page_url);
                      console.log(data.current_page);
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
                    console.log(data);
                    $('#data').empty();
                    var count=0;
                    $.each(data.data, function(index,applycourt){
                        count++;
                        $('#data').append(
                          "<tr>"+
                            "<td class='col-sm-1'>"+applycourt.id+"</td>"+
                            "<td class='col-sm-1'>"+applycourt.courtname+"</td>"+
                            "<td class='col-sm-3'>"+applycourt.pricetimename+"</td>"+
                            "<td class='col-sm-2'>"+applycourt.date+"</td>"+
                            "<td class='col-sm-4'>"+
                              "<a class='btn w-xs btn-deactivate' style='margin-right:1%' href='{{url('/apply_policy_delete')}}/"+applycourt.id+"'>"+
                              "Deactivate"+
                              "</a>"+
                            "</td>"+
                          "</tr>"
                      );
                    });
                    $("#count").text(count);
                    console.log(data.next_page_url);
                    console.log(data.prev_page_url);
                    console.log(data.current_page);
                    $("#pagenum").text(data.current_page);
                    $("#next_value").val(data.next_page_url);
                    $("#previous_value").val(data.prev_page_url);
                });
              }
            });
        });
      </script>
      <!-- "<a class='btn w-xs btn-edit' style='margin-right:1%' href='{{url('/apply_policy_edit')}}/"+applycourt.id+"'>"+
      "Edit" +
      "</a>"+ -->
    </tbody>
    </table>
    <div class="panel-heading"  style="background-color:#0E302B">
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
