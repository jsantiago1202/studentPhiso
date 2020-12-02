<?php

    if(!isset($_SESSION))
    {
        session_start();
    }

    include_once("connection.php");
    $con = connection();
    $studentID = $_GET['ID'];

    $sql = "select * from tbl_user where id = '$studentID'";
    $student = $con->query($sql) or die($con->error);
    $row = $student->fetch_array();

    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $username = $_POST['user'];
        $school = $_POST['school'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $date = $_POST['date'];
        $concern = $_POST['concern'];

        $sql = "insert into tbl_studentConsultation(name,username,school,contact,address,date,concern,studID,status,acceptBy,comment) values('$name','$username','$school','$contact','$address','$date','$concern','$studentID','Pending','Pending','Pending')";
        $con->query($sql) or die($con->error);

        echo "Send";
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
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <button type="submit" name="back">Back to lobby</button><br><br>
    </form>

    <!-- form for the view history of consultation -->
    <form action="studentViewConsultation.php?ID=<?php echo $row['id'];?>" method="post">

        <button type="submit" name="history">View History</button>
    
    </form>

    <br><br>

    <form action="" method="post">  
        

        <!-- viewing of information -->
            Name: <input type="text" name="name" value="<?php echo $row['name'];?>" readonly> <br><br>
        
            Username: <input type="text" name="user" value="<?php echo $row['username'];?>" readonly><br><br>

            School Name: <input type="text" name="school" value="<?php echo $row['school'];?>" readonly><br><br>

            Contact No.: <input type="text" name="contact" value="<?php echo $row['contact'];?>" readonly><br><br>

            Address: <input type="text" name="address" value="<?php echo $row['address'];?>" readonly><br><br>

            Date:   <input type="text" name="date" ><br><br>

            What is your Concern? <br>
            
            (For example: Gym Instructor / Doctor, and your concern):<br>

            <textarea name="concern" id="" cols="50" rows="5"></textarea><br><br>

            <button type="submit" name="submit">Submit Request</button>

    </form>
</body>
</html>