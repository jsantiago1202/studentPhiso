<?php
    

    // if(isset($_POST['logout']))
    // {
        session_start();
        unset($_SESSION['UserLogin']);
        unset($_SESSION['access']);
        unset($_SESSION['Names']);
        unset($_SESSION['StudentID']);
        unset($_SESSION['pays']);
        header("location:login.php");
    // }

?>