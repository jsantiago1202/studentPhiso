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
    // if(isset($_SESSION['UserLogin']))
    // {
    //     /*echo "Welcome ". $_SESSION['UserLogin'];*/
    //     echo "Welcome ". $_SESSION['Names'].$_SESSION['StudentID'];
    // }
    // else
    // {
    //     header("location:login.php");
    // }

    include_once("connection.php");
    $con  = connection();


    $studID = $_SESSION['StudentID'];
    $sql = "select * from tbl_user where id = '$studID'";
    $user = $con->query($sql) or die($con->error);
    $row = $user->fetch_array();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Student Dashboard</title>
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
          <a href="studentProfile.php?ID=<?php echo $studID;?>" class="d-block">
          
          <?php
          if(isset($_SESSION['UserLogin']))
          {
            
        /*echo "Welcome ". $_SESSION['UserLogin'];*/
          echo $_SESSION['Names'];
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
            <a href="studentMain.php" class="nav-link">
              <i class="fas fa-home"></i>
              <p>
              Home
              </p>
            </a>
          </li>
          <!-- /home -->  
        <li class="nav-item">
            <a href="studentInsurance.php" class="nav-link">
              <i class="fas fa-money-bill-alt"></i>
              <p>
              Insurance
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="studentForecast.php" class="nav-link">
              <i class="fas fa-chart-line"></i>
              <p>
                Forecast
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="studentPay.php?ID=<?php echo $studID;?>" class="nav-link">
              <i class="fas fa-money-check"></i>
              <p>
                Payments
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="studentFaq.php" class="nav-link">
              <i class="fas fa-question"></i>
              <p>
                FAQ
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-info-circle"></i>
              <p>
                Help Center
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="studentBlog.php?ID=<?php echo $studID?>" class="nav-link">
              <i class="fas fa-smile-beam"></i>
              <p>
                Testimonial
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="studentConsultation.php?ID=<?php echo $studID;?>" class="nav-link">
              <i class="fas fa-file-medical-alt"></i>
              <p>
                Consultation
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="studentAssessment.php?ID=<?php echo $studID;?>" class="nav-link">
              <i class="fas fa-align-justify"></i>
              <p>
                Assesment
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="studentRewards.php?ID=<?php echo $studID;?>" class="nav-link">
              <i class="fas fa-award"></i>
              <p>
                Rewards
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
            <h1 class="m-0 text-dark">FREQUENTLY ASKED QUESTIONS (FAQ)<br>
             Student PHISO WEBSITE
            </h1>
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
          <!-- dito ka maglagay ng logo -->
          <div class="col-sm">
            <div class="FAQ">
            <div class="">
                <h3>How to create my Online Web Portal Account?</h3>
                <h5>Go to the Student PHISO Website and click on Register to create you account and wait for 2-3 working days for your account to be approved by our team.</h5>

                <h3>How to recover access on my Online Web Portal Account?</h3>
                <h5>To recover your access credentials on your Web Portal, kindly go to Support and contact our support team thru our email accounts and contact numbers stated on the Support Page of our website.</h5>

                <h3>How to report problems on my Online Web Portal Account?</h3>
                <h5>Go to Support and contact us using the contact details specified in the account portal. There are email addresses and contact numbers that you will use to report problems that arise in our Web Portal Account. </h5>

                <h3>How to pay my insurance on my Online Web Portal Account?</h3>
                <h5>The Student PHISO Website offers a complex and aesthetically pleasing platform for the students who will be monitoring and checking their insurance details and other information stipulated on this website.  </h5>

                <h3>How and When do we pay the insurance on my Online Web Portal Account?</h3>
                <h5>Go to the Payment Area on your Web Portal and type in your Official Receipt (OR) number.<br>

                You will need to wait for 2-3 working days for our team to verify and confirm your payment details sent to us.<br>

                Our payment scheme will be a Quarterly Basis Payment.<br>
                </h5>

                <h3>What will happen if my insurance payment was delayed?</h3>
                <h5>In an instance that you have a delayed payment, your insurance will incur penalty charges. It will cause your insurance to recalculate its matrix to a new payment scheme with the penalty rate added to your insurance payment schedule.<br>

                Kindly pay your insurance on time to avoid this kind of inconvenience.
                </h5>
            </div>
          </div>
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
