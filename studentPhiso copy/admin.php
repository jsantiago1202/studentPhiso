<?php 

    if(!isset($_SESSION))
    {
        session_start();
    }
    
    include_once("connection.php");
    $con = connection();

    
    if(isset($_SESSION['UserLogin']))
    {
        echo "Welcome ". $_SESSION['UserLogin'];
    }
    else
    {
        header("location:login.php");
    }

    if(isset($_POST['admin']))
    {
        header("location:adminStudentRegistration.php");
    }
    elseif(isset($_POST['pay']))
    {
        header("location:adminStudentPay.php");
    }
    elseif(isset($_POST['consult']))
    {
        header("location:adminConsultation.php");
    }
    elseif(isset($_POST['post']))
    {
        header("location:adminStudentPost.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Student PHISO</title>
</head>
<body>
    <br><br>
    <!--Logout button-->
    <form action="logout.php" method="post">
        <button type="submit" name="logout">Logout Account</button>
    </form><br>

    <!-- For view the student registration -->
    <form action="" method="post">
        <button type="submit" name="admin">Student Registration</button><br><br>

        <button type="submit" name="pay">Student Pay Insurance</button><br><br>

        <button type="submit" name="post">View Student Post</button><br><br>

        <button type="submit" name="consult">Student Appointment/Consultation</button><br><br>
    </form>

</body>
</html>