<?php


$username ="root";
$password ="";
$server ="localhost";
$database = "intern";


$con = mysqli_connect($server, $username,$password,$database);

if($con){
	echo "";
}else{
	die("not not insrted" . mysqli_connect_error());
}
?>