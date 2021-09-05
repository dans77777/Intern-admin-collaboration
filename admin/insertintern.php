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
    $Password = $_POST['password'];
    $HashPassword=password_hash($Password,PASSWORD_BCRYPT,array('cost'=>11));
    $Birthday = $_POST['birth'];
    $Joindate = $_POST['joindate'];
    $Enddate = $_POST['enddate'];
    $Gender = $_POST['gender'];
    $Contact = $_POST['contact'];
    $Whatsapp = $_POST['whatsapp'];
    $College = $_POST['college'];
    $Refrence = $_POST['refrence'];
    $Degree = $_POST['degree'];
    $Department = $_POST['department'];
    $Leader = $_POST['leader'];
    $City = $_POST['city'];
    $State = $_POST['state'];
    $Status="Active";

    $earlier = new DateTime("$Enddate");
    $later = new DateTime("$Joindate");

    $Totaldays = $later->diff($earlier)->format("%a");

    $sql="INSERT INTO employee (name,email,password,birthday,joindate,enddate,totaldays,status,gender,contact,whatsapp,college,refrence,degree,dept,head,city,state) VALUES('$Name','$Email','$HashPassword','$Birthday','$Joindate','$Enddate','$Totaldays','$Status','$Gender','$Contact','$Whatsapp','$College','$Refrence','$Degree','$Department','$Leader','$City','$State')";

    if(!mysqli_query($con,$sql))
    {
        echo'<script language="javascript">';  
        echo'alert("Intern with same email already exists!")'; 
        echo'</script>';
    }else{
        echo'<script language="javascript">';  
        echo'alert("Intern inserted successfully!")'; 
        echo'</script>';
    }

    header("refresh:1; url=viewinterns.php");

?>