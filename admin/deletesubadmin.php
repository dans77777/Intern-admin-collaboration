<?php

    $username ="root";
    $password ="";
    $server ="localhost";
    $database = "intern";

    $con = mysqli_connect($server, $username,$password);
    if(!$con){
        echo "Not Connected to Server";
    }

    if(!mysqli_select_db($con,$database))
    {
        echo "Database not selected";
    }
    
    if(isset($_GET['delete'])){
        $Id=$_GET['delete'];
        $sql="DELETE FROM `alogin` WHERE `alogin`.`id` = '$Id'";
        if(!mysqli_query($con,$sql))
        {
            echo'<script language="javascript">';  
            echo'alert("Not Deleted! Try again...")'; 
            echo'</script>';
        }else{
            echo'<script language="javascript">';  
            echo'alert("Deleted Successfully!")'; 
            echo'</script>';
        }
    }

      


    header("refresh:1; url=createsubadmin.php");

?>