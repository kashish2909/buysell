<?php
session_start();
require_once("DataConnection.php");
$rollno=isset($_POST["rn"])?$_POST["rn"]:"";
$pwd=isset($_POST["ps"])?$_POST["ps"]:"";
$querySelect="select * from logins where user=$rollno and pass='$pwd'";
$result=mysqli_query($con,$querySelect);
if($result==true and mysqli_num_rows($result)>0)
{
	$row=mysqli_fetch_array($result);
	$_SESSION["rollno"]=$rollno;
	$_SESSION["namelog"]=$row[0];
	header("location:buysell.php");
}
else
	header("location:index.php?msg=1");
?>
