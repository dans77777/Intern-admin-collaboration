<?php
extract($_REQUEST);
include('conn.php');

$sql=mysqli_query($con,"select * from event where id='$id'");
$row=mysqli_fetch_array($sql);

unlink("./uploadposters/$row[posterimg]");

mysqli_query($con,"delete from event where id='$id'");

header("Location:eventdetails.php");

?>