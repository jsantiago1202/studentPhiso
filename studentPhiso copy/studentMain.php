<?php 
    if(!isset($_SESSION))
    {
        session_start();
    }
    if(isset($_SESSION['UserLogin']))
    {
        /*echo "Welcome ". $_SESSION['UserLogin'];*/
        echo "Welcome ". $_SESSION['Names'].$_SESSION['StudentID'];
    }
    else
    {
        header("location:login.php");
    }

    include_once("connection.php");
    $con  = connection();


    $studID = $_SESSION['StudentID'];
    $sql = "select * from tbl_user where id = '$studID'";
    $user = $con->query($sql) or die($con->error);
    $row = $user->fetch_array();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="logout.php" method="post">
    <button type="submit" name="logout">Logout Account</button>
    </form>
    <!-- Viewing of points -->
    <h2>Your points: <?php echo $row['points'];?></h2>

    <!-- for student pay insurance -->
    <form action="studentPay.php?ID=<?php echo $studID;?>" method="post">
        <button type="submit" name="pay">Pay Insurance</button><br><br>
    </form>

    <!-- For the consultation request -->
    <form action="studentConsultation.php?ID=<?php echo $studID;?>" method="post">
        <button type="submit" name="request">Request for Consultation/Appointment</button>
    </form>

    <!-- For the blog request -->
    <form action="studentBlog.php?ID=<?php echo $studID;?>" method="post">
        <button type="submit" name="blog">Post your Experience in Student PHISO</button>
    </form>
</body>
</html>