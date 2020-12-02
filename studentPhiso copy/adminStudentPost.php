<?php

    if(!isset($_SESSION))
    {
        session_start();
    }

    include_once("connection.php");
    $con = connection();

    $sql = "select * from tbl_studentBlog";
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

    <h1>The Student Posted</h1>
    <table>
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Caption</th>
                <th>Image</th>
            </tr>
        </thead>

        <tbody>
            <?php do{?>
                <tr>
                    <td><a href="adminViewStudentPost.php?ID=<?php echo $row['id'];?>">View</a></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['post'];?></td>
                    <td><?php echo "<img src='studentPost/".$row['image']."' height = '5%'>";?></td>
                </tr>
            <?php }while($row = $student->fetch_array());?>
        </tbody>
    </table>
</body>
</html>