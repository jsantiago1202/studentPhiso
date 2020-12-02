<?php

    if(!isset($_SESSION))
    {
        session_start();
    }
    if(isset($_SESSION['UserLogin']))
    {
        $_SESSION['UserLogin'];
    }
    else
    {
        header("location:login.php");
    }
    include_once("connection.php");
    $con = connection();

    // for the Registration
      //count the number of who are approved
      $sql1 = "SELECT COUNT(id) totals FROM tbl_user WHERE status = 'Ok'";
      $chart1 = $con->query($sql1) or die($con->error);
      $rowNumApproved = $chart1->fetch_object();

      //count the number of who are Pending
      $sql2 = "SELECT COUNT(id) totalsb FROM tbl_user WHERE status = 'Pending'";
      $chart2 = $con->query($sql2) or die($con->error);
      $rowNumPending = $chart2->fetch_object();

      //count the number of who are Decline
      $sql3 = "SELECT COUNT(id) totalse FROM tbl_user WHERE status = 'Waiting'";
      $chart3 = $con->query($sql3) or die($con->error);
      $rowNumWaiting = $chart3->fetch_object();

      //showing the approved status
      $sql4 = "select * from tbl_user where status='Ok'";
      $chart4 = $con->query($sql4) or die($con->error);
      $rowShowApproved = $chart4->fetch_array();

      //showing the Pending status
      $sql5 = "select * from tbl_user where status='Pending'";
      $chart5 = $con->query($sql5) or die($con->error);
      $rowShowPending = $chart5->fetch_array();

      //showing the approved Decline status
      $sql6 = "select * from tbl_user where status='Waiting'";
      $chart6 = $con->query($sql6) or die($con->error);
      $rowShowWaiting = $chart6->fetch_array();

      //all value who are register
      $sql7 = "SELECT COUNT(id) totalsb FROM tbl_user";
      $chart7 = $con->query($sql7) or die($con->error);
      $rowc = $chart7->fetch_object();


    // for the Insurance

    $sql11 = "SELECT COUNT(id) totals1 FROM tbl_studentpay WHERE status = 'Ok'";
    $chart11 = $con->query($sql11) or die($con->error);
    $rowNumApproved1 = $chart11->fetch_object();

    //count the number of who are Pending
    $sql22 = "SELECT COUNT(id) totalsb1 FROM tbl_studentpay WHERE status = 'Pending'";
    $chart22 = $con->query($sql22) or die($con->error);
    $rowNumPending1 = $chart22->fetch_object();

    //count the number of who are Decline
    $sql33 = "SELECT COUNT(id) totalse1 FROM tbl_studentpay WHERE status = 'Decline'";
    $chart33 = $con->query($sql33) or die($con->error);
    $rowNumDecline1 = $chart33->fetch_object();

    //showing the approved status
    $sql44 = "SELECT * from tbl_studentpay where status='Ok'";
    $chart44 = $con->query($sql44) or die($con->error);
    $rowShowApproved1 = $chart44->fetch_array();

    //showing the Pending status
    $sql55 = "SELECT * from tbl_studentpay where status='Pending'";
    $chart55 = $con->query($sql55) or die($con->error);
    $rowShowPending1 = $chart55->fetch_array();

    //showing the approved Decline status
    $sql66 = "SELECT * from tbl_studentpay where status='Decline'";
    $chart66 = $con->query($sql66) or die($con->error);
    $rowShowDecline1 = $chart66->fetch_array();

    $sql77 = "SELECT COUNT(id) totalsb1 FROM tbl_studentpay";
    $chart77 = $con->query($sql77) or die($con->error);
    $rowc1 = $chart77->fetch_object();


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Dashboard</title>
  <link rel="icon" type="icon" href="C:\xampp7_4\htdocs\Philam_Backup\img\logo.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">




<!-- For dashboard Pie Graph sa registration -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['status', 'total'],
          <?php
               echo "['".$rowShowApproved['status']."', ".$rowNumApproved->totals."],
                     ['".$rowShowPending['status']."', ".$rowNumPending->totalsb."],
                     ['".$rowShowWaiting['status']."', ".$rowNumWaiting->totalse."]";
          ?>
        ]);

        var options = {
          title: 'Registered Students'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>


<!-- Graph para sa  Pay insurance-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['status', 'total'],
          <?php
               echo "['".$rowShowApproved1['status']."', ".$rowNumApproved1->totals1."],
                     ['".$rowShowPending1['status']."', ".$rowNumPending1->totalsb1."],
                     ['".$rowShowDecline1['status']."', ".$rowNumDecline1->totalse1."]";
          ?>
        ]);

        var options = {
          title: 'Students Insurance'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }
    </script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>

    <!-- SEARCH FORM -->


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="C:\xampp7_4\htdocs\Philam_Backup\img\PHISO-LOGO-TEXT.png" alt="" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">&nbsp;</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="dist/img/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
          <?php
          if(isset($_SESSION['UserLogin']))
          {
            
        /*echo "Welcome ". $_SESSION['UserLogin'];*/
          echo $_SESSION['UserLogin'];
          }
          ?>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- home -->
          <li class="nav-item">
            <a href="admin.php" class="nav-link">
              <i class="fas fa-home"></i>
              <p>
              Home
              </p>
            </a>
          </li>
          <!-- /home -->
          <li class="nav-item">
            <a href="adminStudentPay.php" class="nav-link">
              <i class="fas fa-money-bill-alt"></i>
              <p>
              Students Pay Insurance
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="adminStudentRegistration.php" class="nav-link">
              <i class="fas fa-money-check"></i>
              <p>
              Students Registration
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="adminStudentPost.php" class="nav-link">
              <i class="fas fa-smile-beam"></i>
              <p>
                Testimonials
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="adminConsultation.php" class="nav-link">
              <i class="fas fa-file-medical-alt"></i>
              <p>
                Appointment/Consultation
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="logout.php" class="nav-link">
            <i class="fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>

        </ul>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Admin Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <!-- DITO KA MAGLAGAY KATZ NG SECTION 11111111111111111111111111111111111111111111111111111111111111111111111111111-->
      <div class="container-fluid">
        <div class="row">
            <div class="col-sm">
            <div id="piechart" style="width: 700px; height: 500px;"></div><br>
            <h5>Registered Students who are approved/ok:  <?php echo $rowNumApproved->totals?></h5>
            <h5>Registered Students who are Pending: <?php echo $rowNumPending->totalsb?></h5>
            <h5>Registered Students who are waiting for approval: <?php echo $rowNumWaiting->totalse?></h5>
            <h5>Count of all Registered Students: <?php echo $rowc->totalsb?></h5>
            </div>
            
            

            <!-- pie chart for insurance -->
            <div class="col-sm">
            <div id="piechart2" style="width: 700px; height: 500px;"></div>

            <h5>Students who are approved/ok in payment insurance:  <?php echo $rowNumApproved1->totals1?></h5>
            <h5>Students who are Pending in payment insurance: <?php echo $rowNumPending1->totalsb1?></h5>
            <h5>Students who are decline for the payment insurance: <?php echo $rowNumDecline1->totalse1?></h5>
            <h5>Count of all Students pay insurance: <?php echo $rowc1->totalsb1?></h5>

            </div>
          <!-- <div class="col-sm">
            One of three columns
          </div> -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Student Phiso 2020</strong>
    <div class="float-right d-none d-sm-inline-block">
     
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
