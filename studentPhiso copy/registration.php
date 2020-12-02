<?php

    include_once("connection.php");
    $con  = connection();

    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $user = $_POST['username'];
        $school = $_POST['school'];
        // latest add 
        $schoolyear = $_POST['schoolyear'];
        $semester = $_POST['semester'];
        // /latest add
        $pass = $_POST['password'];
        $cpass = $_POST['cpassword'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $file = $_FILES['image']['name'];
        $files = $_FILES['images']['name'];
        $type = $_POST['type'];
       
        if($name && $user && $pass && $cpass && $contact && $address && $file && $type && $files)
        {
            if($pass == $cpass)
            {
                $sql = "insert into tbl_user(name,username,school,schoolyear,semester,receipt,paymentType,password,contact,address,image,access,status,Points) values('$name','$user','$school','$schoolyear','$semester','$files','$type','$pass','$contact','$address','$file','user','Pending',0)";
                $con->query($sql) or die($con->error);
                move_uploaded_file($_FILES['image']['tmp_name'],$file);
                move_uploaded_file($_FILES['images']['tmp_name'],$files);
                echo "Success, Wait for 2-3 days and our admin check your information";
            }
            else
            {
                echo "Wrong input password";
            }
        }
    }
    if(isset($_POST['back']))
    {
        header("location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>
    <h1>Registration</h1>
    <!-- back to lobby button -->
    <form action="" method="post">
    <button type="submit"  target = "_parent" name="back">Back to Lobby</button><br><br>
    </form>

    <!-- Registration form -->
    <form action="" method="post" enctype="multipart/form-data">

    <label>Name: </label>
    <input type="text" name="name" required><br><br>

    <label>Contact No.: </label>
    <input type="text" name="contact"required><br><br>

    <label>Address: </label>
    <input type="text" name="address" required><br><br>

    <label>Name of School: </label>
    <input type="text" name="school"required><br><br>

    <label>Student No.: </label>
    <input type="text" name="username"required><br><br>

    <!-- latest -->
    <label>School Year: </label>
    <input type="text" name="schoolyear" required><br><br>

    <!-- semester -->
    <label>Semester</label>
    <select name="semester" id="">
        <option value="1yr1sem">1st Year First Semester</option>
        <option value="1yr2sem">1st Year Second Semester</option>
        <option value="2yr1sem">2nd Year First Semesterem</option>
        <option value="2yr2sem">2nd Year Second Semester</option>
        <option value="3yr1sem">3rd Year First Semester</option>
        <option value="3yr2sem">3rd Year Second Semester</option>
        <option value="4yr1sem">4th Year First Semester</option>
        <option value="4yr2sem">4th Year Second Semester</option>
    </select>

    <br><br>
    <!-- /latest -->

    <label>Password: </label>
    <input type="text" name="password"required><br><br>

    <label>Confirm Password: </label>
    <input type="text" name="cpassword"required><br><br>

    <label for="">Insert picture of (School ID or Assessment form)</label>
    <input type="file" name="image" required><br><br>

    <!-- payment type -->
    <label>Payment Type: </label>
    <select name="type" id="">
        <option value="cash">Cash</option>
        <option value="installment">Installment</option>
    </select>
    <br><br>
    <!-- insert the receipt -->
    <label for="">Insert picture of (Receipt)</label>
    <input type="file" name="images" required><br><br>

    <input type="submit" name="submit">
    </form>
</body>
</html>