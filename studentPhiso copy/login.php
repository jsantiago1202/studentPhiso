<?php
    include_once("connection.php");
    $con = connection();
    if(!isset($_SESSION))
    {
        session_start();
    }

    if(isset($_POST['login']))
    {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        
        $sql = "select * from tbl_user where username = '$user' and password = '$pass' and status = 'Ok'";
        $result = $con->query($sql) or die($con->error);

        $sqll = "select * from tbl_user where username = '$user' and password = '$pass'";
        //  and status = 'Pending'
        $user = $con->query($sqll) or die($con->error);
        $rows = $user->fetch_array();
        $total = $user->num_rows;


        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_array($result))
            {
                if($row['access'] == "admin")
                {
                    $_SESSION['UserLogin'] = $row['username'];
                    header("location:admin.php");
                }

                elseif($row['access'] == "user")
                {
                    $_SESSION['Names'] = $row['name'];
                    $_SESSION['UserLogin'] = $row['username'];
                    $_SESSION['StudentID'] = $row['id'];
                    header("location:studentMain.php");
                }

                elseif($row['access'] == "partners")
                {
                    $_SESSION['UserLogin'] = $row['name'];
                    header("location:partnersMain.php");
                }   

            }
        }
        else if($total>0)
        {
                if($rows['status'] == "Pending")
                {
                    $_SESSION['Names'] = $rows['name'];
                    $_SESSION['UserLogin'] = $rows['username'];
                    $_SESSION['StudentID'] = $rows['id'];
                    header("location:declarationForm.php");
                }
                else if($rows['status'] == "Waiting")
                {
                    echo "Your account is under approval wait 24 hours";
                    
                }
                
        } 
        
 
 
        else
        {
            echo "Invalid Username or Password Please try again.";
            /*header("location:login.php");*/
        }
    }
    elseif(isset($_POST['register']))
    {
        header("location:registration.php");
    }
    elseif(isset($_POST['back']))
    {
        header("location:index.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<h1>Login</h1>
    <form action="" method="post">

        <button type="submit" target = "_parent" name="back">Back to Lobby</button><br><br>

        <label>Username: </label>
        <input type="text" name="username" require><br><br>

        <label>Password: </label>
        <input type="password" name="password"><br><br>

        <button type="submit" name="login">Submit</button><br><br>

        <!-- <button type= "submit" name="register">Register Account</button> -->
    </form>
</body>
</html>