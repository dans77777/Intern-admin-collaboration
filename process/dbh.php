<?php

$servername = "localhost";
$dBUsername = "root";
$dbPassword = "";
$dBName = "intern";

$conn = mysqli_connect($servername, $dBUsername, $dbPassword, $dBName);

if(!$conn){
	echo "Databese Connection Failed";
}

?>