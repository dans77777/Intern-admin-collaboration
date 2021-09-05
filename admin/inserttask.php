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
    $dept= $_POST['dept'];
    $Taskname = $_POST['taskname'];
    $Assigndate = $_POST['assigndate'];
    $Deadlinedate = $_POST['deadlinedate'];
    $Status="Not Completed";

    if($Name=='' ||$Email=='' ||$dept==''|| $Taskname==''||$Assigndate=='' || $Deadlinedate=='')
    {
        echo'<script language="javascript">';  
        echo'alert("Fields are mandatory")'; 
        echo'</script>';	
        header("refresh:1; url=createtask.php");
    }else{
        $sql="INSERT INTO task (email,name, dept,taskname,assdate,deadline,status) VALUES('$Email','$Name','$dept','$Taskname','$Assigndate','$Deadlinedate','$Status')";
        if(!mysqli_query($con,$sql))
        {
            echo'<script language="javascript">';  
            echo'alert("Not Inserted")'; 
            echo'</script>';	
        }else{
            echo'<script language="javascript">';  
            echo'alert("Inserted Successfully!")'; 
            echo'</script>';	
        }
        header("refresh:1; url=createtask.php");
    }	
?>