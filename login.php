<?php
    include_once("connection.php");
    $con = connection();
    if(!isset($_SESSION))
    {
        session_start();
    }

    // if(isset($_POST['login']))
    // {
    //     $user = $_POST['username'];
    //     $pass = $_POST['password'];
        
    //     $sql = "select * from tbl_user where username = '$user' and password = '$pass' and status = 'Ok'";
    //     $result = $con->query($sql) or die($con->error);

    //     $sqll = "select * from tbl_user where username = '$user' and password = '$pass'";
    //     //  and status = 'Pending'
    //     $user = $con->query($sqll) or die($con->error);
    //     $rows = $user->fetch_array();
    //     $total = $user->num_rows;


    //     if(mysqli_num_rows($result) > 0)
    //     {
    //         while($row = mysqli_fetch_array($result))
    //         {
    //             if($row['access'] == "admin")
    //             {
    //                 $_SESSION['UserLogin'] = $row['username'];
    //                 header("location:admin.php");
    //             }

    //             elseif($row['access'] == "user")
    //             {
    //                 $_SESSION['Names'] = $row['name'];
    //                 $_SESSION['UserLogin'] = $row['username'];
    //                 $_SESSION['StudentID'] = $row['id'];
    //                 header("location:studentMain.php");
    //             }

    //             elseif($row['access'] == "partners")
    //             {
    //                 $_SESSION['UserLogin'] = $row['name'];
    //                 header("location:partnersMain.php");
    //             }   

    //         }
    //     }
    //     else if($total>0)
    //     {
    //             if($rows['status'] == "Pending")
    //             {
    //                 $_SESSION['Names'] = $rows['name'];
    //                 $_SESSION['UserLogin'] = $rows['username'];
    //                 $_SESSION['StudentID'] = $rows['id'];
    //                 header("location:declarationForm.php");
    //             }
    //             else if($rows['status'] == "Waiting")
    //             {
    //                 echo "Your account is under approval wait 24 hours";
                    
    //             }
                
    //     } 
        
 
 
    //     else
    //     {
    //         echo "Invalid Username or Password Please try again.";
    //         /*header("location:login.php");*/
    //     }
    // }
    // elseif(isset($_POST['register']))
    // {
    //     header("location:registration.php");
    // }
    // elseif(isset($_POST['back']))
    // {
    //     header("location:index.php");
    // }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styleLogin.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
<form action="" method="post">
<div class="own-container">
            <div class="form-box">
                <div class="login-box">
                    <div class="login-box-img">
                        <img src="img/PHISO-LOGO-TEXT.png" width="400px">
                    </div>
                    <div class="login-box-main">
                    <h1 id="login-h1">Log In</h1>
                    

                    <div class="login-user-tb">
                            
                        <label><i class="fas fa-user"></i></label>
                        <input type="text" name="username" placeholder="username" require><br>
                    </div>
                    <div class="login-user-pass">
                        <label><i class="fas fa-lock"></i></label>
                        <input type="password" name="password" placeholder="password"><br>
                    </div>
                    <a href="#"><p id="forgot-password">Forgot Password ?</p></a>
                    <div class="login-warning">
                    <?php
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
                    $_SESSION['pays'] = $row['paymentType'];
                    header("location:studentMain.php");
                }

                // elseif($row['access'] == "partners")
                // {
                //     $_SESSION['UserLogin'] = $row['name'];
                //     header("location:partnersMain.php");
                // }   

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
                    </div>
                    <button type="submit" name="login" id="login-button-submit">Submit</button><br>

 
                    <div>
                        <?php
                                if(isset($_POST['back']))
                                {
                                        header("location:index.php");
                                }
                        ?>
                        <button id="login-button-return"type="submit" name="back"><i class="fas fa-home">&nbsp;Return home</i></button><br>
                    </div>
        <!-- <button type= "submit" name="register">Register Account</button> -->
                </div>   
            </div>       
        </div>
    </div>
    </form>
</body>
</html>