<?php

    if(!isset($_SESSION))
    {
        session_start();
    }

    include_once("connection.php");
    $con = connection();
    $studentID = $_GET['ID'];

    $sql = "select * from tbl_studentBlog where id = '$studentID'";
    $student = $con->query($sql) or die($con->error);
    $row = $student->fetch_array();

    if(isset($_POST['accept']))
    {
        $sql = "update tbl_studentBlog set status = 'Ok' where id = '$studentID'";
        $con->query($sql) or die($con->error);

        header("location:adminStudentPost.php");
    }

    elseif(isset($_POST['decline']))
    {
        $sql = "update tbl_studentBlog set status = 'Decline' where id = '$studentID'";
        $con->query($sql) or die($con->error);

        header("location:adminStudentPost.php");
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
        <button type="submit" name="back">Back to lobby</button>
    </form>
    <h1>The Student Post</h1>
    <form action="" method="post">
    
        <button type="submit" name="accept">Accept Post</button> &nbsp &nbsp
        <button type="submit" name="decline">Decline Post</button>
    
    </form>

    <h4>
    Name: <?php echo $row['name'];?><br><br>
    Caption: <?php echo $row['post'];?><br><br>
    Status: <?php echo $row['status'];?><br><br>
    Image Posted: <?php echo "<img src='studentPost/".$row['image']."' height = '5%'>";?><br><br>
    </h4>

</body>
</html>