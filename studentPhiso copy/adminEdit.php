<?php
    if(!isset($_SESSION))
    {
        session_start();
    }

    include_once("connection.php");
    $con = connection();
    $id = $_GET['ID'];

    $sql = "select * from tbl_user where id='$id'";
    $user = $con->query($sql) or die($con->error);
    $row = $user->fetch_array();

    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $school = $_POST['school'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $sql = "update tbl_user set name = '$name', contact = '$contact', address = '$address', school = '$school', username = '$user',password = '$pass' where id = '$id'";
        $con->query($sql) or die($con->error);

        header("location:admin.php");
    }

    if(isset($_POST['cancel']))
    {
        header("location:admin.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Account</title>
</head>
<body>
    <form action="" method="post">
    
        <label>Name: </label>
        <input type="text" name="name" value="<?php echo $row['name'];?>"><br><br>

        <label>Contac No: </label>
        <input type="text" name="contact" value="<?php echo $row['contact'];?>"><br><br>

        <label>Address: </label>
        <input type="text" name="address" value="<?php echo $row['address'];?>"><br><br>

        <label>School Name: </label>
        <input type="text" name="school" value="<?php echo $row['school'];?>"><br><br>
        
        <label>Username: </label>
        <input type="text" name="user" value="<?php echo $row['username']?>"><br><br>

        <label>Password: </label>
        <input type="text" name="pass" value="<?php echo $row['password'];?>"><br><br>

        <label>Status:  <?php echo $row['status'];?></label>  <br><br>

        <button type="submit" name="submit">Submit Profile</button> <br><br>

        <button type="submit" name="cancel">Cancel</button>
    </form>
</body>
</html>