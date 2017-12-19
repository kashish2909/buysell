<?php
session_start();
require_once("DataConnection.php");
$name=isset($_POST["name_r"])?$_POST["name_r"]:"";
$user=isset($_POST["user_r"])?$_POST["user_r"]:"";
$pass=isset($_POST["pass_r"])?$_POST["pass_r"]:"";
$email=isset($_POST["email_r"])?$_POST["email_r"]:"";
$phone=isset($_POST["phone_r"])?$_POST["phone_r"]:"";
$orname=isset($_POST["orname_r"])?$_POST["orname_r"]:"";

$querycheck="select name,user,email from logins";
$res=mysqli_query($con,$querycheck);

if($res==true and mysqli_num_rows($res)>0)
{
	while($row=mysqli_fetch_array($res))
	{
		if($row[0]==$name)
		{
			$err="dup1";
			header("location:register.php?err=$err");
			break;
		}
		else
		if($row[1]==$user)
		{
			$err="dup2";
			header("location:register.php?err=$err");
			break;
		}
		else
		if($row[0]==$email)
		{
			$err="dup3";
			header("location:register.php?err=$err");
			break;
		}
		else
		{
			$querySelect="insert into logins(name,user,email,phone,pass,orname) values('$name',$user,'$email',$phone,'$pass','$orname')";
			$result=mysqli_query($con,$querySelect);
			if($result=true)
			header("location:index.php");
		}
	}
}


?>
