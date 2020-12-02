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
                $sql = "insert into tbl_user(name,username,school,schoolyear,semester,receipt,paymentType,password,contact,address,image,access,status) values('$name','$user','$school','$schoolyear','$semester','$files','$type','$pass','$contact','$address','$file','user','Pending')";
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
    <link rel="stylesheet" href="css/styleRegForm.css?v=<?php echo time();?>">
</head>
<body>
 
    <!-- back to lobby button -->

    <!-- Registration form -->
<div class="reg-form-box">
    <div class="container">
        <div class="registration-header">
            <div class="reg-banner-img">
                <img src="img/pexels-register.png">
                <div class="centered">ACCOUNT REGISTRATION</div>
            </div>
        </div>
        <div class="main-reg-form">
            <div class="main-reg-form">
            <form action="" method="post" enctype="multipart/form-data">

            <label>Name: </label><br>
            <input type="text" name="name" required><br><br>

            <label>Contact No.: </label><br>
            <input type="text" name="contact"required><br><br>

            <label>Address: </label><Br>
            <input type="text" name="address" required><br><br>

            <label>Name of School: </label><br>
            <input type="text" name="school"required><br><br>

            <label>Student No.: </label><br>
            <input type="text" name="username"required><br><br>

            <!-- latest -->
            <label>School Year: </label><Br>
            <input type="text" name="schoolyear" required><br><br>

            <!-- semester -->
            <label>Semester</label><br>
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

            <label>Password: </label><br>
            <input type="text" name="password"required><br><br>

            <label>Confirm Password: </label><Br>
            <input type="text" name="cpassword"required><br><br>

            <label for="">Insert picture of (School ID or Assessment form)</label>
            <input style="background-color: transparent;"type="file" name="image" required><br><br>

            <!-- payment type -->
            <label>Payment Type: </label><br>
            <select name="type" id="">
                <option value="cash">Cash</option>
                <option value="installment">Installment</option>
            </select>
            <br><br>
            <!-- insert the receipt -->
            <label for="">Insert picture of (Receipt)</label><br>
            <input style="background-color: transparent;" type="file" name="images" required><br><br>
            
            <div class="func-button">
                
                <input id="btn_submit" type="submit" name="submit"><Br><Br><br>

                <!-- <form action="" method="post">
                    <button type="submit" style="width: 200px;
                    padding-top: 10px;
                    padding-bottom: 10px;
                    background-color:  #1d76cd;
                    color: white;
                    border: none;  
                    cursor: pointer;" 
                    target = "_parent" name="back" href="index.php">Back to Lobby</button><br><br>
                    </form>
                </form> -->
                
            </div>

            
        </div>
    </div>
</div>
</body>
</html>