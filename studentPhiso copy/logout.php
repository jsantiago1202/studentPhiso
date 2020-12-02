<?php
    session_start();

    if(isset($_POST['logout']))
    {
        unset($_SESSION['UserLogin']);
        unset($_SESSION['access']);
        unset($_SESSION['Names']);
        header("location:login.php");
    }

?>