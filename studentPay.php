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
    $studID = $_SESSION['StudentID'];

    //for getting the value of the students
    $sql = "select * from tbl_user where id = '$studID'";
    $student = $con->query($sql) or die($con->error);
    $row = $student->fetch_array();

    //for viewing of the bills 
    $sqll = "select * from tbl_studentpay where studID = '$studID'";
    $pays = $con->query($sqll) or die($con->error);
    $rows = $pays->fetch_array();

    if(isset($_POST['submit']))
    {
        // $target = "studentInsuranceReceipt/".basename($file = $_FILES['image']['name']);
        $name = $_POST['name'];
        $username = $_POST['user'];
        $school = $_POST['school'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $pay = $_POST['pay'];
        // $file = $_FILES['imagessssss']['name'];
        $value = $_POST['value'];
        
        $sql = "insert into tbl_studentpay(name,username,school,contact,address,reference,value,studID,status) values('$name','$username','$school','$contact','$address','$pay','$value','$studID','Pending')";
        $con->query($sql) or die($con->error);

        // $sql = "insert into tbl_studentpay(name,username,school,contact,address,reference,receipt,value,studID,status) values('$name','$username','$school','$contact','$address','$pay','$file','$value','$students','Pending')";

        // move_uploaded_file($_FILES['imagessssss']['tmp_name'],$file);
        // echo "Success, Wait for 2-3 days and our admin check your information";

        // if(move_uploaded_file($_FILES['image']['tmp_name'],$target))
        // {
        //     echo "Success, Wait for 2-3 days and our admin check your information";
        // }
    }

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

  <link rel="stylesheet" href="style.css">
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
            <a href="studentBlog.php?ID=<?php echo $studID;?>" class="nav-link">
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
            <h1 class="m-0 text-dark">Payments</h1>
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
          <form action="" method="post">

          

          <br><br>

          <?php if(($_SESSION['pays'] =='cash')){?>
            <h3>Cash</h3>
            Name: <input type="text" name="name" value="<?php echo $row['name'];?>" readonly> <br><br>
        
            Username: <input type="text" name="user" value="<?php echo $row['username'];?>" readonly><br><br>

            School Name: <input type="text" name="school" value="<?php echo $row['school'];?>" readonly><br><br>

            Contact No.: <input type="text" name="contact" value="<?php echo $row['contact'];?>" readonly><br><br>

            Address: <input type="text" name="address" value="<?php echo $row['address'];?>" readonly><br><br>

            <label>OR No.: </label>
            <input type="text" name="pay" placeholder="Enter your OR No"><br><br>

            <!-- <label for="">Insert picture of Receipt</label>
                <input type="file" name="imagessssss"><br><br> -->

            Amount: <input type="text" name="value"><br><br>

            <input type="submit" name="submit">
            <h1>History of Payment</h1>
            <?php }?>

            <!-- <button type="submit" name="payInsurance">Submit</button> -->
        </form>
          </div>

            <!-- for table na div  -->
          <!-- <div class="col-sm" style="margin-right:500px;"><br></div> -->

          <!-- Button for installment students only -->
          <?php if(($_SESSION['pays'] =='installment')){?>
            <form action="studentInstallmentPay.php?ID=<?php echo $studID;?>" method="post">
              <button type="submit" name="installment">Installment payments</button>
            </form>
          <?php }?>

            
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>School Name</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Reference No.</th>
                <th>Amount</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            <?php do{?>
                <tr>
                    <td><?php echo $rows['name'];?></td>
                    <td><?php echo $rows['username'];?></td>
                    <td><?php echo $rows['school'];?></td>
                    <td><?php echo $rows['contact'];?></td>
                    <td><?php echo $rows['address'];?></td>
                    <td><?php echo $rows['reference'];?></td>
                    <td><?php echo $rows['value'];?></td>
                    <td><?php echo $rows['status'];?></td>
                </tr>
            <?php }while($rows = $pays->fetch_array());?>
        </tbody>
    </table>
          
          

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
