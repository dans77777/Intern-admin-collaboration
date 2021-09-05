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

    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $dept = $_POST['dept'];
    $Amount = $_POST['amount'];
    $Year = $_POST['year'];
    $Month = $_POST['month'];
    $Status = $_POST['status'];

    $sql="INSERT INTO salary (name,email,dept,amount,year,month,status) VALUES('$Name','$Email','$dept','$Amount','$Year','$Month','$Status')";

    if(!mysqli_query($con,$sql))
    {
        echo "<script type='text/javascript'>alert('Not Inserted!')</script>";
    }else{
        echo "<script type='text/javascript'>alert('Inserted!')</script>";
    }

    header("refresh:1; url=salary.php");

?>