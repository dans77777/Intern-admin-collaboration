<?php
extract($_REQUEST);
include('conn.php');

$sql=mysqli_query($con,"select * from employee where id='$id'");
$row=mysqli_fetch_array($sql);

unlink("../intern/changeDP/$row[dp]");
echo $con->error;
mysqli_query($con,"delete from employee where id='$id'");

header("Location:viewinterns.php");

?>