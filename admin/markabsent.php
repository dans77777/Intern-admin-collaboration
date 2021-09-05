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
$amt=1;
$new= $sql1['absent'] + $amt;
echo $con->error;
echo $new;
$sql= 'UPDATE attendance set `absent`= "'.$new.'" where id="'.$id.'"';
mysqli_query($con,$sql);

if( mysqli_query($con,$sql))
{
echo 'success';

}
else{
    echo $con->error;
}
mysqli_error($con);
echo $new;


header('location:attendance2.php');

?>