<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    include_once("connection.php");
    $con = connection();

    $sql ="select * from tbl_consultation";
    $consult = $con->query($sql) or die($con->error);
    $row = $consult->fetch_array();

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
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<button type="submit" name="back">Back To lobby</button>
    <table></table>
</body>
</html>