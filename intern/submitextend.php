<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "intern";
    error_reporting(0);
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Days = $_POST['days'];

    $sql1="SELECT * from employee WHERE email='{$_SESSION['legitEmail']}'";
    $data = mysqli_query($conn,$sql1);
    //$result = $conn->query($sql1) or die($conn->error);

    //$row = mysqli_fetch_assoc($results);
                                            
    while($row = $data->fetch_assoc()) {
        $Department= $row['dept'];
    };

    $sql="INSERT INTO `internshipextend`(`name`, `email`, `extenddays`, `dept`) VALUES ('$Name','$Email','$Days','$Department')";

    if(!mysqli_query($conn,$sql))
    {
        echo "<script type='text/javascript'>alert('Not Inserted!')</script>";
    }else{
        echo "<script type='text/javascript'>alert('Inserted!')</script>";
    }

    header("refresh:1; url=dash.php");

?>