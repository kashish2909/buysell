<?php
session_start();
require_once("DataConnection.php");
$name=isset($_POST["t1"])?$_POST["t1"]:"";
$address=isset($_POST["t2"])?$_POST["t2"]:"";
$price=isset($_POST["t3"])?$_POST["t3"]:"";
$description=isset($_POST["t4"])?$_POST["t4"]:"";
$type=isset($_POST["t5"])?$_POST["t5"]:"";
$rn=$_SESSION["rollno"];
$queryname="select name from logins where user=$rn";
//echo $queryname;
$res=mysqli_query($con,$queryname);
if($res==true and mysqli_num_rows($res)>0)
{
	$row=mysqli_fetch_array($res);
	$nameseller=$row[0];
}

$querySelect="insert into product(status,date_pro,price,description,name,address,type_name,names) values('unsold',now(),$price,'$description','$name','$address','$type','$nameseller')";
$result=mysqli_query($con,$querySelect);
//echo $querySelect;
header("location: buysell.php");
?>