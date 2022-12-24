<?php include '../lib/session.php';
include '../helpers/format.php';
Session::checkSession();
$fm = new Format();
if(isset($_GET['action']) && $_GET['action']=='logout'){
Session::destroy();
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Admin Template</title> 
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="assets/materialize/css/materialize.min.css" media="screen,projection" />
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <link href="assets/css/bonus.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="assets/js/Lightweight-Chart/cssCharts.css"> 
    
    <link type="text/css" rel="stylesheet" href="../css/bonus.css" />
	<link type="text/css" rel="stylesheet" href="../css/bonus1.css" />
	<link type="text/css" rel="stylesheet" href="../css/cart.css" >
  <link type="text/css" rel="stylesheet" href="../css/style.css" />

    <!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
<script src="assets/js/jquery-1.10.2.js"></script>

<!-- Bootstrap Js -->
<script src="assets/js/bootstrap.min.js"></script>

<script src="assets/materialize/js/materialize.min.js"></script>

<!-- Metis Menu Js -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- Morris Chart Js -->
<script src="assets/js/morris/raphael-2.1.0.min.js"></script>
<script src="assets/js/morris/morris.js"></script>


<script src="assets/js/easypiechart.js"></script>
<script src="assets/js/easypiechart-data.js"></script>

<script src="assets/js/Lightweight-Chart/jquery.chart.js"></script>

<!-- Custom Js -->
<script src="assets/js/custom-scripts.js"></script>

	<script src="assets/js/easypiechart.js"></script>
	<script src="assets/js/easypiechart-data.js"></script>
	
	 <script src="assets/js/Lightweight-Chart/jquery.chart.js"></script>
	 <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script> 

</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle waves-effect waves-dark" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand waves-effect waves-dark" href="index.php"><i class="large material-icons">track_changes</i> <strong>Admin</strong></a>
				
		<div id="sideNav" href=""><i class="material-icons dp48">toc</i></div>
            </div>

            <ul class="nav navbar-top-links navbar-right"> 
				<!-- <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown4"><i class="fa fa-envelope fa-fw"></i> <i class="material-icons right">arrow_drop_down</i></a></li>				

				<li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown2"><i class="fa fa-bell fa-fw"></i> <i class="material-icons right">arrow_drop_down</i></a></li> -->
				  <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown1"><i class="fa fa-user fa-fw"></i> <b><?php echo Session::get('displayName'); ?></b> <i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
        </nav>
        <ul id="dropdown1" class="dropdown-content">
  <!-- <li><a href="#"><i class="fa fa-user fa-fw"></i> My Profile</a>
  </li>
  <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
  </li> -->

 

  <li><a href="?action=logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
  </li>
</ul>
<!-- <ul id="dropdown2" class="dropdown-content w250">
  <li>
    <div>
      <i class="fa fa-comment fa-fw"></i> New Comment
      <span class="pull-right text-muted small">4 min</span>
    </div>
    </a>
  </li>
  <li class="divider"></li>
  <li>
    <div>
      <i class="fa fa-twitter fa-fw"></i> 3 New Followers
      <span class="pull-right text-muted small">12 min</span>
    </div>
    </a>
  </li>
  <li class="divider"></li>
  <li>
    <div>
      <i class="fa fa-envelope fa-fw"></i> Message Sent
      <span class="pull-right text-muted small">4 min</span>
    </div>
    </a>
  </li>
  <li class="divider"></li>
  <li>
    <div>
      <i class="fa fa-tasks fa-fw"></i> New Task
      <span class="pull-right text-muted small">4 min</span>
    </div>
    </a>
  </li>
  <li class="divider"></li>
  <li>
    <div>
      <i class="fa fa-upload fa-fw"></i> Server Rebooted
      <span class="pull-right text-muted small">4 min</span>
    </div>
    </a>
  </li>
  <li class="divider"></li>
  <li>
    <a class="text-center" href="#">
      <strong>See All Alerts</strong>
      <i class="fa fa-angle-right"></i>
    </a>
  </li>
</ul>

<ul id="dropdown4" class="dropdown-content dropdown-tasks w250 taskList">
  <li>
    <div>
      <strong>John Doe</strong>
      <span class="pull-right text-muted">
        <em>Today</em>
      </span>
    </div>
    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
    </a>
  </li>
  <li class="divider"></li>
  <li>
    <div>
      <strong>John Smith</strong>
      <span class="pull-right text-muted">
        <em>Yesterday</em>
      </span>
    </div>
    <p>Lorem Ipsum has been the industry's standard dummy text ever since an kwilnw...</p>
    </a>
  </li>
  <li class="divider"></li>
  <li>
    <a href="#">
      <div>
        <strong>John Smith</strong>
        <span class="pull-right text-muted">
          <em>Yesterday</em>
        </span>
      </div>
      <p>Lorem Ipsum has been the industry's standard dummy text ever since the...</p>
    </a>
  </li>
  <li class="divider"></li>
  <li>
    <a class="text-center" href="#">
      <strong>Read All Messages</strong>
      <i class="fa fa-angle-right"></i>
    </a>
  </li>
</ul> -->