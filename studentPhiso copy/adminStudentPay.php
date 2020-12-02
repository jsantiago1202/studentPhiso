<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    
    include_once("connection.php");
    $con = connection();


    $sql = "select * from tbl_studentpay";
    $student = $con->query($sql) or die($con->error);
    $row = $student->fetch_array();
    
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
    <title>Document</title>
</head>
<body>

    <form action="" method="post">  
        <button type="submit" name="back">Back to lobby</button>
    </form>

    <!-- Viewing of the Students who pay insurance -->
    <table>

        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Username</th>
                <th>School Name</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Reference No.</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            <?php do{?>
                <tr>
                    <td><a href="adminStudentPayView.php?ID=<?php echo $row['id'];?>">View</a></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['username'];?></td>
                    <td><?php echo $row['school'];?></td>
                    <td><?php echo $row['contact'];?></td>
                    <td><?php echo $row['address'];?></td>
                    <td><?php echo $row['reference'];?></td>
                    <td><?php echo $row['status'];?></td>
                </tr>
            <?php }while($row = $student->fetch_array());?>
        </tbody>
    
    </table>
</body>
</html>