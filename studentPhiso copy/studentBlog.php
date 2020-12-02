<?php

    if(!isset($_SESSION))
    {
        session_start();
    }

    include_once("connection.php");
    $con = connection();
    $studentID = $_GET['ID'];

    // for viewing the post
    $sql = "select * from tbl_studentBlog where status = 'Ok'";
    $student = $con->query($sql) or die($con->error);
    $row = $student->fetch_array();

    $query = "select * from tbl_user where id = '$studentID'";
    $que = $con->query($query) or die($con->error);
    $rows = $que->fetch_array();

    // if(isset($_POST['submit']))
    // {
    //     $target = "studentPost/".basename($file = $_FILES['image']['name']);
    //     $name = $_POST['name'];
    //     $post = $_POST['post'];
    //     $file = $_FILES['image']['name'];

    //     $sql = "insert into tbl_studentBlog(name,image,post,studID,status) values('$name','$file','$post','$studentID','Pending')";
    //     $con->query($sql) or die($con->error);
    //     //move_uploaded_file($_FILES['image']['tmp_name'],$file);
    //     echo "Success, Wait for 2-3 days and our admin check your information";

    //     if(move_uploaded_file($_FILES['image']['tmp_name'],$target))
    //     {
    //         echo "Success, Wait for 2-3 days and our admin check your information";
    //     }
        
    // }


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

    <form action="studentCreateBlog.php?ID=<?php echo $rows['id']?>" method="post">

        <button type = "submit" name="post">Create Post</button>
    </form>
    
    <br><br><br><br>
    <table>
        <thead>
            <tr>
                <th>The Student Post
                </th>
            </tr>
        </thead>

        <tbody>
            <?php do{?>
            <tr>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo "<img src='studentPost/".$row['image']."' height='20%' width='20%'>"?> 
                        <br>
                            Caption: 
                        <br> 
                    &nbsp<?php echo $row['post'];?></td>
            </tr>
            <?php }while($row = $student->fetch_array());?>
        </tbody>

    </table>


</body>
</html>