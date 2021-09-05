<?php
include('conn.php'); // Do Database Connection in this file (create a file namely connect.php inside MyProject Folder)
extract($_POST);

$UploadedFileName=$_FILES['uploadImage']['name'];
if($UploadedFileName!='')
{
  $upload_directory = "MyUploadImages/"; //This is the folder which you created just now
  $TargetPath=time().$UploadedFileName;
  if(move_uploaded_file($_FILES['files']['tmp_name'], $upload_directory.$TargetPath)){    
    $QueryInsertFile="INSERT INTO `certificate` SET `image`='$TargetPath' "; 
    // Write Mysql Query Here to insert this $QueryInsertFile   .                   
  }
}
?>