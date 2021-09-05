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
    $intimate = $_POST['intimate'];
    $interview = $_POST['interview'];
    $confirmation = $_POST['confirmation'];
    $mailing = $_POST['mailing'];
    $database = $_POST['database'];
    $poster = $_POST['poster'];
    $video = $_POST['video'];
    $graphic = $_POST['graphic'];
    $induction = $_POST['induction'];


    $sql1="SELECT * from employee WHERE email='{$_SESSION['legitEmail']}'";
    $data = mysqli_query($conn,$sql1);
    //$result = $conn->query($sql1) or die($conn->error);

    //$row = mysqli_fetch_assoc($results);
                                            
    while($row = $data->fetch_assoc()) {
        $Department= $row['dept'];
    };

    $sql="INSERT INTO `curricular`(`name`, `email`, `department`, `initimatecall`, `interviewcall`, `confirmcall`, `mailing`, `databasehandle`, `postermake`, `videomake`, `graphicdesign`, `inductionmeet`) VALUES ('$Name','$Email','$Department','$intimate','$interview','$confirmation','$mailing','$database','$poster','$video','$graphic','$induction')";

    if(!mysqli_query($conn,$sql))
    {
        echo "<script type='text/javascript'>alert('Not Inserted!')</script>";
    }else{
        echo "<script type='text/javascript'>alert('Inserted!')</script>";
    }

    header("refresh:1; url=dash.php");

?>