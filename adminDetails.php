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
    $id = $_GET['ID'];

    $sql = "select * from tbl_user where id = $id";
    $user = $con->query($sql) or die($con->error);
    $row = $user->fetch_array();

    if(isset($_POST['accept']))
    {
        
        $sql = "update tbl_user set status='Ok' where id = '$id'";
        $con->query($sql) or die($con->error);

        $name = $_POST['name'];  
        $sqll = "INSERT INTO tbl_studentPoints(name,points,studID) VALUES('$name','5','$id')";
        $con->query($sqll) or die($con->error);
        header("location:adminStudentRegistration.php");
    }
    if(isset($_POST['decline']))
    {
        $sql = "update tbl_user set status = 'Decline' where id = '$id'";
        $con->query($sql) or die($con->error);
        header("location:adminStudentRegistration.php");
    }

?>
<?php

if(!isset($_SESSION))
{
    session_start();
}
include_once("connection.php");
$con = connection();


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Student Details</title>
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
            
            <!-- logout -->
        <!-- <form action="logout.php" method="post">
            <button type="submit" name="logout">Logout Account</button>
        </form> -->

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
        <h1 class="m-0 text-dark">Student Details</h1>
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

      <!-- button sa accept and decline -->
      <form action="" method="post">
        <button type="submit" name="accept">Accept Student</button>
        &nbsp &nbsp <button type="submit" name="decline">Decline Student</button><br><br>

          <!-- wag mong pansinin to naka hidden naman  -->
          <input type="hidden" name="name" value="<?php echo $row['name'];?>" readonly> <br>
      </form>

        <form action="adminEdit.php?ID=<?php echo $row['id'];?>" method="post">
            <button type="submit" name="edit">Edit Student Account</button>
        </form>
    
    <h3>
    Name: <?php echo $row['name'];?><br><br>
    Contact No: <?php echo $row['contact'];?><br><br>
    Address: <?php echo $row['address'];?><br><br>
    Username: <?php echo $row['username'];?><br><br>
    Password: <?php echo $row['password'];?><br><br>
    School Name: <?php echo $row['school'];?><br><br>

    School Year: <?php echo $row['schoolyear'];?><br><br>
    Semester: <?php echo $row['semester'];?><br><br>
    <!-- receipt picture -->
    Payment Type: <?php echo $row['paymentType'];?><br><br>
    Receipt: <br><?php echo "<img src='".$row['receipt']."' height='40%' width='50%'>"?><br><br>
    
    </h3>

    <!-- assessment picture -->
    <h3>School Approval: (Assessment or Student ID)</h3>
    <?php echo "<img src='".$row['image']."' height='40%' width='50%'>"?>
      </div>
    </div>
  </div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
<strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
All rights reserved.
<div class="float-right d-none d-sm-inline-block">
  <b>Version</b> 3.0.5
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
