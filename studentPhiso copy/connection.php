<?php

    function connection()
    {
        $con = new mysqli('localhost','root','','db_philam');

        if($con->connect_error)
        {
            echo $con->connect_error;
        }
        else
        {
            return $con;
        }
    }

?>