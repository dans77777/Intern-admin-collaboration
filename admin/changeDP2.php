

<?php

session_start();
   
$e =$_SESSION['legitEmail'];

include("conn.php");

if(isset($_POST['but_upload'])){
 
   // $Email = $_POST['email'];
  $name = $_FILES['file']['name'];
  $target_dir = "changeDP2/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
 
     // Insert record
     $sql=mysqli_query($con,"select * from alogin where email='$e'");
     $row=mysqli_fetch_array($sql);
     unlink("./changeDP2/$row[dp]");
     mysqli_query($con,"delete dp from alogin where email='$e'");
     $query = "update alogin set dp='".$name."' where email='".$e."'";
     mysqli_query($con,$query);
  
     // Upload file
     move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

  }
 
}
header("refresh:1; url=adminprofile.php");
?>
