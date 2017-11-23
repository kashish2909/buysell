<?php
require_once("DataConnection.php");
$rn=isset($_POST["rn"])?$_POST["rn"]:"";
$querySelect="select * from logins where user=$rn";
$result=mysqli_query($con,$querySelect);
if($result==true and mysqli_num_rows($result)>0)
{
	$row=mysqli_fetch_array($result);
	$to=$row[2];
	$pass=$row[4];
	$subject="Password recovery(buysell)";
	$message="Your password is ".$pass;
	$result=mail($to,$subject,$message);
	if($result==true)
	{
		header("location:forgot.php?msg=2");
	}
	else
	{
		header("location:forgot.php?msg=3");
	}
}
else
{
	header("location:forgot.php?msg=1");
}
?>