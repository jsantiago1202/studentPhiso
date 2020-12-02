<?php

    if(!isset($_SESSION))
    {
        session_start();
    }

    include_once("connection.php");
    $con = connection();
    $studentID = $_GET['ID'];

    $sql = "select * from tbl_studentConsultation where studID = '$studentID'";
    $student = $con->query($sql) or die($con->error);
    $row = $student->fetch_array();

    if(isset($_POST['back']))
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
        <button type="submit" name="back">Back to lobby</button><br><br>
    </form>

    <h1>Your Consultation History</h1>

    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Concern</th>
                <th>Status</th>
                <th>Accept By</th>
                <th>Comment</th>
            </tr>
        </thead>

        <tbody>
        <?php do{?>
            <tr>
                <td><?php echo $row['date'];?></td>
                <td><?php echo $row['concern'];?></td>
                <td><?php echo $row['status'];?></td>
                <td><?php echo $row['acceptBy'];?></td>
                <td><?php echo $row['comment'];?></td>
            </tr>
        <?php }while($row = $student->fetch_array());?>
        </tbody>
    </table>
</body>
</html>