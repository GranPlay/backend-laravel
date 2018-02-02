<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>GranPlay</title>
  <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />


  <link rel="stylesheet" href="{{ route('baseurl') }}/bower_components/animate.css/animate.css" type="text/css" />
  <link rel="stylesheet" href="{{ route('baseurl') }}/bower_components/bootstrap/dist/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="{{ route('baseurl') }}/bower_components/font-awesome/css/font-awesome.css" type="text/css" />
  <link rel="stylesheet" href="{{ route('baseurl') }}/styles/font.css" type="text/css" />
  <link rel="stylesheet" href="{{ route('baseurl') }}/styles/app.css" type="text/css" />
  <link rel="stylesheet" href="{{ route('baseurl') }}/styles/themify-icons.css" type="text/css" />
  <link rel="stylesheet" href="{{ route('baseurl') }}/css/multi-select.css" type="text/css" />
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/inputmask.min.js" charset="utf-8"></script>

  <script src="{{ route('baseurl') }}/js/jquery_file.js" charset="utf-8"></script>

  <style>
    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    /* The Close Button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }


    @import compass;

    .ui-datepicker td span, .ui-datepicker td a
      text-align: center;

    .ui-widget-content .ui-state-default
      background: darken(#E6E6E6, 20%) url(images/ui-bg_glass_75_e6e6e6_1x400.png) 50% 50% repeat-x;

    .ui-state-default.ui-state-active
      background: lighten(#E6E6E6, 10%) url(images/ui-bg_glass_75_e6e6e6_1x400.png) 50% 50% repeat-x;

        #textlabel {
            font-size:15px;
        }


      .btn {

        border: 1px solid transparent;
        border-radius: 8px;
        font-size: 15px;
        text-align: center;
      }


      /*button main*/
        .btn-main,.btn-main:visited, .btn-main:hover, .btn-main:focus {
          color:  #252f40;
          background-color: #FDBA4F;
          border-color: #FDBA4F;
        }
        .btn-main:active {
          color: #252f40;
          background-color: #367c36;
          border-color: #367c36;
        }

      /*button edit*/
      .btn-edit,.btn-edit:visited, .btn-edit:hover,  .btn-edit:focus {
        background-color: #FDBA4F;
        border-color: #FDBA4F;
        color: #252f40;
      }
      .btn-edit:active {
        background-color: #224f77;
        border-color: #224f77;
        color: #252f40;
      }

      /*button deactivate/photos */
      .btn-deactivate,.btn-deactivate:visited, .btn-deactivate:hover,  .btn-deactivate:focus {
        background-color: #0E302B;
        border-color: #0E302B;
        color: #FFF;
      }
      .btn-deactivate:active {
        background-color: #ac2925;
        border-color: #ac2925;
        color: #FFF;
      }

      a{
        color:#0E302B;
      }
      a:hover{
        color:#0E302B;
      }
      a:visited{
        color:#0E302B;
      }
  </style>
  <style media="screen">
    .morecontent span {
      display: none;
    }
    .morelink {
      display: block;
    }
  </style>
  <script type="text/javascript">
    $(document).ready(function() {
      // Configure/customize these variables.
      var showChar = 50;  // How many characters are shown by default
      var ellipsestext = "...";
      var moretext = "Show more >";
      var lesstext = "Show less";


      $('.more').each(function() {
          var content = $(this).html();

          if(content.length > showChar) {

              var c = content.substr(0, showChar);
              var h = content.substr(showChar, content.length - showChar);

              var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

              $(this).html(html);
          }

      });

      $(".morelink").click(function(){
          if($(this).hasClass("less")) {
              $(this).removeClass("less");
              $(this).html(moretext);
          } else {
              $(this).addClass("less");
              $(this).html(lesstext);
          }
          $(this).parent().prev().toggle();
          $(this).prev().toggle();
          return false;
      });
    });
  </script>

</head>
<body>
  <input type="hidden" id="baseurl" value="{{ route('baseurl') }}">
<input type="hidden" id="baseurl" value="{{ route('baseurl') }}">

<div class="app app-header-fixed">

  <!-- header -->
  <header id="header" class="app-header navbar" role="menu">
          <!-- navbar header -->
      <div class="navbar-header" style="background-color:#0E302B">
        <button class="pull-right visible-xs" ui-toggle="show" target=".navbar-collapse">
          <i class="ti-settings"></i>
        </button>
        <button class="pull-right visible-xs" ui-toggle="show" target=".app-aside">
          <i class="ti-menu"></i>
        </button>
        <!-- brand -->
        <a class="navbar-brand text-lt">



          <img src="{{ route('baseurl') }}/images/logo.png" alt="GranPlay" width="150px" style="max-height:45px;">

        </a>
        <!-- / brand -->
      </div>
      <!-- / navbar header -->

      <!-- navbar collapse -->
      <div class="navbar-collapse bg-white box-shadow-md hidden-xs" style="background-color:#0E302B">
        <!-- nav -->
        <ul class=" nav navbar-nav navbar-left">
          <li>
            <a href="" style="font-size:12px; font-family:'Raleway', sans-serif;">
              Dashboard
            </a>
          </li style="">
          <!-- <li style="padding-left:20px"> -->



          <li style="margin-top:13px;margin-left:10px;width:45px">
            <div class="btn-group dropdown open" uib-dropdown="" is-open="status.isopen">
              <div class="dropdown-flags dropdown-toggle" uib-dropdown-toggle="" ng-disabled="disabled" aria-haspopup="true" aria-expanded="true"> <!-- ngIf: vm.currentLang === 'portuguese' --> <!-- ngIf: vm.currentLang === 'english' -->
                <img ng-if="vm.currentLang === 'english'" style="width:32px;height:20px" src="{{ route('baseurl') }}/images/american-flag-small.png" class="ng-scope"><!-- end ngIf: vm.currentLang === 'english' -->
              </div>
            </div>
          </li>
          <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
          <!-- <script type="text/javascript">

            $( document ).ready(function() {

                $.get($("#baseurl").val()+'/association_api', function(data) {
                    var value = $("#assoc_value").val();
                    console.log(value)
                    $('#association').empty();
                    $.each(data, function(index,assoct){
                        $('#association').append('<option {{("'+assoct.id+'=='+'20'+'") ? "selected" : '' }} value="'+assoct.id+'">'+assoct.name+'</option>');
                    });
                });

            });

          </script> -->
          <li>
            <!-- <input type="text" name="" value="+value+"> -->
            <select class="form-control" style="margin-top:8px; width:355%;" id="association">
              <option value="" disabled selected>Select Association</option>
              @foreach (\App\Association::all() as $assoc)
              <option value="{{ $assoc->id }}">{{ $assoc->name }}</option>
              @endforeach
            </select>
            <input type="hidden" name="" id="assoc_value" >
          </li>
        </ul>
        <!-- / nav -->

        <!-- nabar right -->
        <ul class="nav navbar-nav navbar-right m-r-n" style="background-color:#FDBA4F">

          <li class="dropdown">
            <a href="#" class="clear no-padding-h acc" data-toggle="dropdown">
              <span class="hidden-sm m-l" style="color:#0E302B; font-size:13px">{{Auth::user()->name}}</span>
              <b class="caret m-h-xs hidden-sm"></b>
            </a>
            <ul class="dropdown-menu pull-right no-b-t">
              <li>
                <a href="{{url('/update_password')}}">Update Password</a>
              </li>
              <!-- <li>
                <a href="page.settings.html">Logout</a>
              </li> -->
              <li>
                  <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                      Logout
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
              </li>
            </ul>
          </li>
        </ul>
        <!-- / navbar right -->


      </div>
      <!-- / navbar collapse -->

      <!-- aside -->
  </header>
  <!-- / header -->
  <style media="screen">
    select[multiple]:focus option:checked {
      background: #0E302B linear-gradient(0deg, #0E302B 0%, #0E302B 100%);
    }
    select:focus option:checked{
      background: #0E302B linear-gradient(0deg, #0E302B 0%, #0E302B 100%);
      color: #fff;
    }

  </style>
  <style>
    /*.active .active-list {
      background-color: yellow;
    }*/
    /*.nav > li.active > a{

    color: #fff;
    background-color: #000;
    }*/


    nav ul.nav li.abc a {
      background-color: #0E302B;
      color: #9da9bc;
      position: relative;
      display: block;
      font-weight: normal;
      text-transform: none;
    }
    nav ul.nav li.def.active a {
    background-color: #252f40;
    color: #fff;
    position: relative;
    display: block;
    font-weight: normal;
    text-transform: none;
    }

    .nav > li.def > a:hover
    {

      background-color: #FDBA4F;

    }
    .nav > li.def.active > a:hover
    {

      background-color: #FDBA4F;

    }
    .nav > li.abc > a:hover
    {

      background-color: #FDBA4F;

    }

    nav ul.nav > li:hover
    {
      background-color: #252f40;

    }




  </style>

  <aside id="aside" class="app-aside hidden-xs lt topNav_color" style="background-color:#0E302B;">
    <div class="app-aside-inner" bs-affix>
      <div class="app-aside-body scrollable hover">
        <nav ui-nav>
          <ul class="nav">
            <li style="margin-bottom: 15%;"></li>
            <li class="abc {{ (Request::is('association*') || Request::is('reservation_policy*') || Request::is('price_time_policy*') || Request::is('*apply_policy*') || Request::is('court*')  || Request::is('manager*') ) ? 'active' : '' }}">
              <a class="active-list">
                <span class="pull-right text-muted">
                  <i class="fa fa-caret-down"></i>
                </span>
                <i class="icon glyphicon glyphicon-briefcase text-lt"></i>
                <span class="font-normal">Administration</span>
              </a>
              <ul class=" nav nav-sub bg">
                  <li class="def {{ (Request::is('association*')) ? 'active' : '' }} " >
                    <a href="{{url('/association')}}">Association</a>
                  </li>
                  <li class="def {{ (Request::is('court*') ) ? 'active' : '' }}">
                    <a href="{{url('/court')}}">Court</a>
                  </li>
                  <li class="def {{ (Request::is('price_time_policy*')) ? 'active' : '' }}">
                    <a href="{{url('/price_time_policy')}}">Price/Time Policy</a>
                  </li>
                  <li class="def {{ (Request::is('apply_policy*')) ? 'active' : '' }}">
                    <a href="{{url('/apply_policy')}}">Apply Policy</a>
                  </li>
                  <li class="def {{ (Request::is('manager*') ) ? 'active' : '' }}">
                    <a href="{{url('/managers')}}">Managers</a>
                  </li>
              </ul>
            </li>
            <li style="margin-bottom: 8%;"></li>
            <li class="abc {{ (Request::is('app_users_members*') || Request::is('new_reservation*') || Request::is('upload_players*')) ? 'active' : '' }}">
              <a>
                <span class="pull-right text-muted">
                  <i class="fa fa-caret-down"></i>
                </span>
                <i class="icon glyphicon glyphicon-briefcase text-lt"></i>
                <span class="font-normal">Operations</span>
              </a>
              <ul class="nav nav-sub bg">
                  <li class="def {{ (Request::is('app_users_members*')) ? 'active' : '' }}">
                    <a href="{{url('/app_users_members')}}">App Users / Membres</a>
                  </li>
                  <li class="def {{ ( Request::is('new_reservation*')) ? 'active' : '' }}">
                    <a href="{{url('/new_reservation')}}">New Reservation</a>
                  </li>
                  <li class="def {{ (Request::is('upload_players*')) ? 'active' : '' }}">
                    <a href="{{url('/upload_players')}}">Upload Players</a>
                  </li>
              </ul>
            </li>
            <li style="margin-bottom: 8%;"></li>
            <li  class="abc {{ (Request::is('uploaded_players*') || Request::is('checkin_checkout*') || Request::is('scores*') || Request::is('upcoming_reservations*') || Request::is('past_reservations*') || Request::is('cancelled_reservations*')) ? 'active' : '' }}">
              <a>
                <span class="pull-right text-muted">
                  <i class="fa fa-caret-down"></i>
                </span>
                <i class="icon glyphicon glyphicon-briefcase text-lt"></i>
                <span class="font-normal">Reports</span>
              </a>
              <ul class="nav nav-sub bg">
                  <li  class="def {{ (Request::is('uploaded_players*')) ? 'active' : '' }}">
                    <a href="{{url('/uploaded_players')}}">Uploaded Players</a>
                  </li>
                  <li  class="def {{ (Request::is('checkin_checkout*')) ? 'active' : '' }}">
                    <a href="{{url('/checkin_checkout')}}">Checkin / Checkout</a>
                  </li>
                  <li  class="def {{ (Request::is('scores*')) ? 'active' : '' }}">
                    <a href="{{url('/scores')}}">Scores</a>
                  </li>
                  <li  class="def {{ (Request::is('upcoming_reservations*')) ? 'active' : '' }}">
                    <a href="{{url('/upcoming_reservations')}}">Upcoming Reservations</a>
                  </li>
                  <li  class="def {{ (Request::is('past_reservations*')) ? 'active' : '' }}">
                    <a href="{{url('/past_reservations')}}">Past Reservations</a>
                  </li>
                  <li  class="def {{ (Request::is('cancelled_reservations*')) ? 'active' : '' }}">
                    <a href="{{url('/cancelled_reservations')}}">Cancelled Reservations</a>
                  </li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </aside>
  <!-- / aside -->

  <!-- content -->
  <div id="content" class="app-content" role="main">




@yield('content')

  </div>
  <!-- / content -->
</div>


<script src="{{ route('baseurl') }}/bower_components/jquery/dist/jquery.min.js"></script>
<script src="{{ route('baseurl') }}/bower_components/bootstrap/dist/js/bootstrap.js"></script>
<script src="{{ route('baseurl') }}/scripts/ui-load.js"></script>
<script src="{{ route('baseurl') }}/scripts/ui-jp.config.js"></script>
<script src="{{ route('baseurl') }}/scripts/ui-jp.js"></script>
<script src="{{ route('baseurl') }}/scripts/ui-nav.js"></script>
<script src="{{ route('baseurl') }}/scripts/ui-toggle.js"></script>
<script src="{{ route('baseurl') }}/js/jquery.multi-select.js"></script>

<script type="text/javascript">
  $('#association').on('change', function () {
      localStorage.setItem('assoc_id', $(this).val());
  });

  $(document).ready(function() {
      var assoc_id = localStorage.getItem('assoc_id');
      if (assoc_id){
          $('#association').val(assoc_id)
      }

      $("#assoc_value").val(assoc_id);
  });
</script>

<script type="text/javascript">
// run callbacks
  $('#callbacks').multiSelect({
    afterSelect: function(values){
      // alert("Select value: "+values);
    },
    afterDeselect: function(values){
      // alert("Deselect value: "+values);
    }
  });
</script>
</body>
<style>

/*nav ul.nav li.def.active a {
  background-color: #252f40;
  color: #fff;
}*/


/*nav ul li.abc.active a {
  background-color: #0E302B;

}*/


.nav > li.active:hover
{
  background-color: #252f40;

}

.nav > li > a
{

  font-family: Helvetica Neue,Helvetica,Arial,sans-serif;
  padding-top: 100px;
  color: #9da9bc;
  font-size: 15px;
}

.nav > li > a:hover
{

  background-color: #FDBA4F;

}

nav ul.nav li li a{

  font-family: "PT Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
  padding-top: 8px;
padding-bottom: 8px;
padding-left: 49px;
font-size:12px;
}
</style>
</html>
