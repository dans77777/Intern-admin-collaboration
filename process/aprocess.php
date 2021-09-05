<?php
session_start();
require_once ('dbh.php');

$email = $_POST['mailuid'];
$password = $_POST['pwd'];

$sql = "SELECT * from `alogin` WHERE email = '$email'";
$sqlname = "SELECT name FROM `alogin` WHERE email = '$email'";
$sqlemail = "SELECT email FROM `alogin` WHERE email = '$email'";
$sqldepartment = "SELECT Department FROM `alogin` WHERE email = '$email'";
$sqlusertype = "SELECT type FROM `alogin` WHERE email = '$email'";

$result = mysqli_query($conn, $sql);
$name = mysqli_query($conn , $sqlname);
$email = mysqli_query($conn , $sqlemail);
$department= mysqli_query($conn , $sqldepartment);
$usertype= mysqli_query($conn , $sqlusertype);

$adminname = "";
$adminemail = "";
$admindepartment = "";
$admintype = "";

$result=mysqli_fetch_array($result);

if(password_verify($password,$result['password'])){
    $admin = mysqli_fetch_array($name);
	$adminname = ($admin['name']);
	$admin = mysqli_fetch_array($email);
	$adminemail = ($admin['email']);
	$admin = mysqli_fetch_array($department);
    $admindepartment = ($admin['Department']);
    $admin = mysqli_fetch_array($usertype);
    $admintype = ($admin['type']);
    
    $_SESSION['legitEmail']=$adminemail;
    $_SESSION['legitUser'] = $adminname;
    $_SESSION['legitDepartment']=$admindepartment;
    $_SESSION['legitType']=$admintype;
    $_SESSION['legitCDE'] = 'Admin';
	header("Location:../admin/dash.php");
} else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Invalid Email or Password')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}

?>