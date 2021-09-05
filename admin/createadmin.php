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
    $Password = $_POST['pass'];
    $HashPassword=password_hash($Password,PASSWORD_BCRYPT,array('cost'=>11));
    $Department=$_POST['department'];
    $Type="Admin";

    $sql="INSERT INTO alogin (name,email,password,Department,type) VALUES('$Name','$Email','$HashPassword','$Department','$Type')";

    if(!mysqli_query($con,$sql))
    {
        echo'<script language="javascript">';  
        echo'alert("Admin with same email already exists!")'; 
        echo'</script>';
    }else{
        echo'<script language="javascript">';  
        echo'alert("Admin added successfully!")'; 
        echo'</script>';
    }

    header("refresh:1; url=createsubadmin.php");

?>