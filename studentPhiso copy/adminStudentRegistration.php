<?php 

    include_once("connection.php");
    $con = connection();

    if(!isset($_SESSION))
    {
        session_start();
    }
    if(isset($_SESSION['UserLogin']))
    {
        echo "Welcome ". $_SESSION['UserLogin'];
    }
    else
    {
        header("location:login.php");
    }

    $sql = "select * from tbl_user where access = 'user'";
    $user = $con->query($sql) or die($con->error);
    $row = $user->fetch_array();

    if(isset($_POST['back']))
    {
        header("location:admin.php");
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
    <form action="" method="post">
    <button type="submit" name="back">Back to lobby</button>
    </form>

    <!-- displaying the student registered  -->
    <table>
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Username</th>
                <th>Password</th>
                <th>School</th>
                <th>Contact Number</th>
                <th>Address</th>
                <th>Status</th>
                <th>Confirmation</th>
            </tr>
        </thead>

        <tbody>
            <?php do{?>
                <tr>
                    <td><a href="adminDetails.php?ID=<?php echo $row['id']?>">View</a></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['username'];?></td>
                    <td><?php echo $row['password'];?></td>
                    <td><?php echo $row['school'];?></td>
                    <td>+63<?php echo $row['contact'];?></td>
                    <td><?php echo $row['address'];?></td>
                    <td><?php echo $row['status'];?></td>
                    <td><?php echo "<img src='".$row['image']."' height='50' width='50'>"?></td>
                </tr>
            <?php }while($row = $user->fetch_array());?>
        </tbody>
    </table>
</body>
</html>