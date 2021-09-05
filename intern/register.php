<?php
extract($_REQUEST);
include('conn.php');

$sql=mysqli_query($con,"select * from event where name='$name'");
$row=mysqli_fetch_array($sql);

$msg=$row['link'];
echo "<script>alert($msg);</script>"; 

//header("Location:register.php");

?>