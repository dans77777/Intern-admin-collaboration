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
    $Link = $_POST['link'];
    $Start = $_POST['start'];
    $End = $_POST['end'];
    $Status = $_POST['status'];
    $statusMsg = '';
    $targetDir = "uploadposters/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database

    $sql="INSERT INTO event (name,start,end,status,posterimg,link) VALUES('$Name','$Start','$End','$Status','$fileName','$Link')";

    if(!mysqli_query($con,$sql))
    {
        echo "<script type='text/javascript'>alert('Not Inserted!')</script>";
    }else{
        echo "<script type='text/javascript'>alert('Inserted!')</script>";
    }

    header("refresh:1; url=eventdetails.php");
}
    }
}

?>