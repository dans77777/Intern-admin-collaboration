<?php
extract($_REQUEST);
include('conn.php');

$sql=mysqli_query($con,"select * from certificate where id='$id'");
$row=mysqli_fetch_array($sql);

unlink("./uploads/$row[image]");

mysqli_query($con,"delete from certificate where id='$id'");

header("Location:createcertificate.php");

?>