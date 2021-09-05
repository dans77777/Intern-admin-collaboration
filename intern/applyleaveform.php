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
    $Email = $_SESSION['legitEmail'];
    $dept = $_POST['dept'];
    $Reason = $_POST['reason'];
    $Start = $_POST['start'];
    $End = $_POST['end'];
    $Status='on progress';

    if($Name=='' || $Reason==''){
        echo'<script language="javascript">';  
        echo'alert("Fields are mandatory")'; 
        echo'</script>';	
        header("applyleave.php");
    }else{
        $sql="INSERT INTO employee_leave (name,email,dept,reason,start,end,status) VALUES('$Name','$Email','$dept','$Reason','$Start','$End','$Status')";
    
        if(!mysqli_query($con,$sql))
        {
            echo'<script language="javascript">';  
            echo'alert("Leave Not Applied!")'; 
            echo'</script>';
            
        }else{
            echo'<script language="javascript">';  
            echo'alert("Leave Successfully Applied!")'; 
            echo'</script>';
        }
    
       header("refresh:1; url=applyleave.php");

    }


?>