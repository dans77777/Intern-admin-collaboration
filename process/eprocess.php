<?php
session_start();
require_once ('dbh.php');

$email = $_POST['mailuid'];
$password = $_POST['pwd'];

$sql = "SELECT * FROM `employee` WHERE email = '$email'";
$sqlname = "SELECT name FROM `employee` WHERE email = '$email'";
$sqlemail = "SELECT email FROM `employee` WHERE email = '$email'";
$sqlstatus = "SELECT status FROM `employee` WHERE email = '$email'";

$result = mysqli_query($conn, $sql);
$name = mysqli_query($conn , $sqlname);
$email = mysqli_query($conn , $sqlemail);
$status= mysqli_query($conn , $sqlstatus);

$empname = "";
$empemail = "";
$empstatus = "";

$result=mysqli_fetch_array($result);
if(password_verify($password,$result['password'])){
	$employee = mysqli_fetch_array($name);
	$empname = ($employee['name']);
	$employee = mysqli_fetch_array($email);
	$empemail = ($employee['email']);
	$employee = mysqli_fetch_array($status);
	$empstatus = ($employee['status']);

	if($empstatus=='Active'){
		$_SESSION['legitEmail']=$empemail;
		$_SESSION['legitUser'] = $empname;
		$_SESSION['legitCDE'] = 'Intern';
		header("Location:../intern/dash.php");
	}else{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    	window.alert('Your account is Deactivated! Please Contact Administrator...')
    	window.location.href='javascript:history.go(-1)';
    	</SCRIPT>");
	}
} else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Invalid Email or Password')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}

?>