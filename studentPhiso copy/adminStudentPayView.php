<?php
    if(!isset($_SESSION))
    {
        session_start();
    }

    include_once("connection.php");
    $con = connection();
    $studentID = $_GET['ID'];

    $sql = "select * from tbl_studentpay where id = '$studentID'";
    $student = $con->query($sql) or die($con->error);
    $row = $student->fetch_array();
    if(isset($_POST['accept']))
    {
        $sql = "update tbl_studentpay set status = 'Ok' where id = '$studentID'";
        $con->query($sql) or die($con_error);
        header("location:adminStudentPay.php");
    }
    elseif(isset($_POST['pending']))
    {
        $sql = "update tbl_studentpay set status = 'Pending' where id = '$studentID'";
        $con->query($sql) or die($con_error);
        header("location:adminStudentPay.php");
    }
    elseif(isset($_POST['decline']))
    {
        $sql = "update tbl_studentpay set status = 'Decline' where id = '$studentID'";
        $con->query($sql) or die($con_error);
        header("location:adminStudentPay.php");
    }
    elseif(isset($_POST['back']))
    {
        header("location:admin.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">  
        <button type="submit" name="back">Back to lobby</button><br><br>
        <!--Button for the approval of the student -->
        <button type="submit" name="accept">Accept OR No./Reference No.</button>
            &nbsp &nbsp 
        <button type="submit" name="pending">Pending OR No./Reference No.</button>
            &nbsp &nbsp 
        <button type="submit" name="decline">Decline OR No./Reference No.</button><br><br><br>

        <!-- viewing of information -->
            Name: <input type="text" name="name" value="<?php echo $row['name'];?>" readonly> <br><br>
        
            Username: <input type="text" name="user" value="<?php echo $row['username'];?>" readonly><br><br>

            School Name: <input type="text" name="school" value="<?php echo $row['school'];?>" readonly><br><br>

            Contact No.: <input type="text" name="contact" value="<?php echo $row['contact'];?>" readonly><br><br>

            Address: <input type="text" name="address" value="<?php echo $row['address'];?>" readonly><br><br>

            OR No/Reference No.: <input type="text" name="address" value="<?php echo $row['reference'];?>" readonly><br><br>
    </form>

    
</body>
</html>