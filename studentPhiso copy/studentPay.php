<?php
  if(!isset($_SESSION))
  {
      session_start();
  }
    include_once("connection.php");
    $con = connection();
    $students = $_SESSION['StudentID'];

    //for getting the value of the students
    $sql = "select * from tbl_user where id = '$students'";
    $student = $con->query($sql) or die($con->error);
    $row = $student->fetch_array();

    //for viewing of the bills 
    $sqll = "select * from tbl_studentpay where studID = '$students'";
    $pays = $con->query($sqll) or die($con->error);
    $rows = $pays->fetch_array();

    if(isset($_POST['payInsurance']))
    {
        $name = $_POST['name'];
        $username = $_POST['user'];
        $school = $_POST['school'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $pay = $_POST['pay'];
        
        $sql = "insert into tbl_studentpay(name,username,school,contact,address,reference,studID) values('$name','$username','$school','$contact','$address','$pay','$students')";
        $con->query($sql) or die($con->error);
    }
    elseif(isset($_POST['back']))
    {
        header("location:studentMain.php");
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
            <!-- button for the back -->
            <button type="submit" name="back">Back lobby</button><br><br>

            Name: <input type="text" name="name" value="<?php echo $row['name'];?>" readonly> <br><br>
        
            Username: <input type="text" name="user" value="<?php echo $row['username'];?>" readonly><br><br>

            School Name: <input type="text" name="school" value="<?php echo $row['school'];?>" readonly><br><br>

            Contact No.: <input type="text" name="contact" value="<?php echo $row['contact'];?>" readonly><br><br>

            Address: <input type="text" name="address" value="<?php echo $row['address'];?>" readonly><br><br>

        <label>OR No.: </label>
            <input type="text" name="pay" placeholder="Enter your OR No"><br><br>

            <button type="submit" name="payInsurance">Submit</button>
    </form>

    <!-- table for viewing of your payment of your insurance -->
    <h1>History of Payment</h1>
    <table>

        <thead>
            <tr>
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
                    <td><?php echo $rows['name'];?></td>
                    <td><?php echo $rows['username'];?></td>
                    <td><?php echo $rows['school'];?></td>
                    <td><?php echo $rows['contact'];?></td>
                    <td><?php echo $rows['address'];?></td>
                    <td><?php echo $rows['reference'];?></td>
                    <td><?php echo $rows['status'];?></td>
                </tr>
            <?php }while($rows = $pays->fetch_array());?>
        </tbody>
    
    </table>
</body>
</html>