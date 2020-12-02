<?php

    include_once("connection.php");
    $con  = connection();
    $studentID = $_GET['ID'];

    $query = "select * from tbl_user where id = '$studentID'";
    $que = $con->query($query) or die($con->error);
    $row = $que->fetch_array();

    if(isset($_POST['submit']))
    {
        $target = "studentPost/".basename($file = $_FILES['image']['name']);
        $name = $_POST['name'];
        $post = $_POST['post'];
        $file = $_FILES['image']['name'];

        $sql = "insert into tbl_studentBlog(name,image,post,studID,status) values('$name','$file','$post','$studentID','Pending')";
        $con->query($sql) or die($con->error);
        //move_uploaded_file($_FILES['image']['tmp_name'],$file);
        echo "Success, Wait for 2-3 days and our admin check your information";

        if(move_uploaded_file($_FILES['image']['tmp_name'],$target))
        {
            echo "Success, Wait for 2-3 days and our admin check your information";
        }
        
    }
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
    <title>Document</title>
</head>
<body>
    <h1>Post your Experience in Student PHISO</h1>
    <!-- back to lobby button -->
    <form action="" method="post">
    <button type="submit" name="back">Back to Lobby</button><br><br>
    </form>

    <!-- this form for posted blog of the student -->
    <form action="" method="post" enctype="multipart/form-data">

    <label>Name: </label>
    <input type="text" name="name" value="<?php echo $row['name']?>" required><br><br>

    <label>Your comment: </label>
    
    <textarea name="post" id="" cols="50" rows="10"></textarea><br><br>

    <label for="">Insert picture of (School ID or Assessment form)</label>
    <input type="file" name="image" required><br><br>

    <input type="submit" name="submit">
    </form>
</body>
</html>