<?php
session_start();
require_once("DataConnection.php");
$name=isset($_POST["name_r"])?$_POST["name_r"]:"";
$user=isset($_POST["user_r"])?$_POST["user_r"]:"";
$pass=isset($_POST["pass_r"])?$_POST["pass_r"]:"";
$email=isset($_POST["email_r"])?$_POST["email_r"]:"";
$phone=isset($_POST["phone_r"])?$_POST["phone_r"]:"";

$querySelect="insert into logins(name,user,email,phone,pass) values('$name',$user,'$email',$phone,'$pass')";
$result=mysqli_query($con,$querySelect);
header("location:index.php");
?>
