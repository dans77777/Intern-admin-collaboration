<?php

include('conn.php');

$id = $_GET['id'];
echo $id;
echo 'hello world';
$sql= 'select * from attendance where id ="'.$id.'"';
echo $con->error;
$query= mysqli_query($con,$sql);
$sql1=mysqli_fetch_array($query);
echo $con->error;
if( $sql1['present']< $sql1['totaldays'])

{
$new= $sql1['present'] + 1;
echo $con->error;
$sql= 'UPDATE attendance set present= "'.$new.'" where id="'.$id.'"';
mysqli_query($con,$sql);
}

else{
    $sql= 'DELETE from attendance  where id="'.$id.'"';
mysqli_query($con,$sql);

}
if( mysqli_query($con,$sql))
{
echo 'success';

}
else{
    echo $con->error;
}
mysqli_error($con);

header('location:attendance2.php');

?>