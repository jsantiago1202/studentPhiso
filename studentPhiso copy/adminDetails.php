<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    include_once("connection.php");
    $con = connection();
    $id = $_GET['ID'];

    $sql = "select * from tbl_user where id = $id";
    $user = $con->query($sql) or die($con->error);
    $row = $user->fetch_array();

    if(isset($_POST['accept']))
    {
        
        $sql = "update tbl_user set status='Ok',points = '5' where id = '$id'";
        $con->query($sql) or die($con->error);
        header("location:adminStudentRegistration.php");
    }
    if(isset($_POST['decline']))
    {
        $sql = "update tbl_user set status = 'Decline' where id = '$id'";
        $con->query($sql) or die($con->error);
        header("location:adminStudentRegistration.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details of the Student</title>
</head>
<body>
<a href="admin.php">Back</a><br><br>
    <form action="" method="post">
        <button type="submit" name="accept">Accept Student</button>
        &nbsp &nbsp <button type="submit" name="decline">Decline Student</button><br><br>
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
    Status: <?php echo $row['status'];?>
    </h3>
    <h3>School Approval: </h3>
    <?php echo "<img src='".$row['image']."' height='40%' width='50%'>"?>
</body>
</html>