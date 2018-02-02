<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>GranPlay</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <!-- laravel built-in css -->
  <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>

<body class="fixed-nav sticky-footer" id="page-top" style="background-color:#0E302B" >
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark  fixed-top" id="mainNav" >
    <a class="navbar-brand" href="index.html">
        <img src="images/logo.png" alt="GranPlay" height="45" width="150">
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive" >
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion" style="background-color:#0E302B">



        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components" >
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
          <i class="fa fa-briefcase" aria-hidden="true"></i>
            <span class="nav-link-text">Administration</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="{{url('/association')}}">Association</a>
            </li>
            <li>
              <a href="{{url('/reservation_policy')}}">Reservation Policy</a>
            </li>
            <li>
              <a href="{{url('/time_price_policy')}}">Time/Price Policy</a>
            </li>
            <li>
              <a href="{{url('/court')}}">Court</a>
            </li>
            <li>
              <a href="{{url('/managers')}}">Managers</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
          <i class="fa fa-briefcase" aria-hidden="true"></i>
            <span class="nav-link-text">Operations</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="login.html">App Users/Login Page</a>
            </li>
            <li>
              <a href="register.html">New Reservation/Registration Page</a>
            </li>
            <li>
              <a href="forgot-password.html">Members/Forgot Password Page</a>
            </li>
            <li>
              <a href="blank.html">Upload Players/Blank Page</a>
            </li>
            <li>
              <a href="blank.html">Uploaded Players</a>
            </li>
            <li>
              <a href="blank.html">Checkin</a>
            </li>
            <li>
              <a href="blank.html">Scores</a>
            </li>
            <li>
              <a href="blank.html">Upcoming Reservations</a>
            </li>
            <li>
              <a href="{{url('')}}">Past Reservations</a>
            </li>
            <li>
              <a href="blank.html">Cancelled Reservations</a>
            </li>

          </ul>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">New Messages:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>David Miller</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Jane Smith</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>John Doe</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all messages</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout>
          </a>

          <!-- <a href="{{ route('logout') }}"
              onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
              Logout
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form> -->
        </li>
      </ul>
    </div>
  </nav>


  <div class="content-wrapper">
    <div class="container-fluid">

    @yield('content')


    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->


    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2017</small>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>



</body>

</html>






<table class="table table-striped" >
<thead style="background-color:#0E302B">
<tr>
    <th class="col-sm-1 ng-binding">S No.</th>
    <th class="col-sm-2 ng-binding">Association Name:</th>
    <th class="col-sm-1 ng-binding">Status</th>
    <th class="col-sm-2 ng-binding">State:</th>
    <th class="col-sm-2 ng-binding">Area</th>
    <th class="col-sm-5 ng-binding">Actions</th>
</tr> </thead> <tbody>
<tr ng-repeat="item in vm.currentAssociations()" class="ng-scope">
<td class="col-sm-1 ng-binding">1</td>
<td class="col-sm-2"> <a ng-click="vm.view($index + (vm.pageNumber - 1) * 10)" class="ng-binding">assoc/123</a> </td>
<td class="col-sm-1"> <!-- ngIf: item.stus ==='A' --><span ng-if="item.stus ==='A'" class="ng-binding ng-scope">Active</span><!-- end ngIf: item.stus ==='A' --> <!-- ngIf: item.stus ==='I' --> </td>
<td class="col-sm-2"> <span class="ng-binding">Couze</span> </td>
<td class="col-sm-2"> <span class="ng-binding">Venezula</span> </td>
<td class="col-sm-4"> <!-- ngIf: vm.hasPermission('association', 'update') -->
<button ng-if="vm.hasPermission('association', 'update')" ng-click="vm.edit($index + (vm.pageNumber - 1) * 10)" class="btn w-xs btn-primary ng-binding ng-scope">Edit
</button><!-- end ngIf: vm.hasPermission('association', 'update') --> <!-- ngIf: vm.hasPermission('association', 'delete') -->
<button ng-click="vm.remove($index + (vm.pageNumber - 1) * 10)" class="btn w-xs btn-danger ng-binding ng-scope" ng-if="vm.hasPermission('association', 'delete')">Deactivate
</button><!-- end ngIf: vm.hasPermission('association', 'delete') --> <!-- ngIf: vm.hasPermission('associationPhotos', 'upload') -->
<button ng-if="vm.hasPermission('associationPhotos', 'upload')" ng-click="vm.addPhoto(item)" class="btn w-xs btn-danger ng-binding ng-scope"> Photos
</button><!-- end ngIf: vm.hasPermission('associationPhotos', 'upload') -->
</td>
</tr><!-- end ngRepeat: item in vm.currentAssociations() -->

<div class="panel-heading"> <div class="row"> <div class="col-sm-3 top-7 ng-binding"> Page Number: <b class="ng-binding">1</b> </div> <div class="col-sm-3 pull-right"> <button ng-disabled="!(vm.nextPageToken) &amp;&amp; vm.currentAssociations().length !== 10" ng-click="vm.loadMoreData()" class="btn width-80 pull-right ml-5 btn-primary btn-sm text-black ng-binding" disabled="disabled">Next</button> <button ng-disabled="!(vm.pageNumber > 1)" ng-click="vm.pageNumber > 1 ? vm.pageNumber = vm.pageNumber - 1 : ''" class="btn width-80 pull-right ml-5 btn-primary btn-sm text-black ng-binding" disabled="disabled">Previous</button> </div> </div> </div>
</tbody>
</table>
