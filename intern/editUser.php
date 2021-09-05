<?php
    session_start();
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
    $Birthday = $_POST['birth'];
    $Gender = $_POST['gender'];
    $Contact = $_POST['contact'];
    $Whatsapp = $_POST['whatsapp'];
    $Degree = $_POST['degree'];

    $sql="UPDATE `employee` SET `name`='$Name',`birthday`='$Birthday',`gender`='$Gender',`contact`='$Contact',`whatsapp`='$Whatsapp',`degree`='$Degree' WHERE email='{$_SESSION['legitEmail']}'";
    
    if(!mysqli_query($con,$sql))
    {
        echo "<script type='text/javascript'>alert('Not Inserted!')</script>";
    }else{
        echo "<script type='text/javascript'>alert('Inserted!')</script>";
    }

    header("refresh:1; url=internprofile.php");

?>