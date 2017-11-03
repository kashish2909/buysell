<?php
session_start();
require_once("DataConnection.php");
$name=isset($_POST["t1"])?$_POST["t1"]:"";
$address=isset($_POST["t2"])?$_POST["t2"]:"";
$price=isset($_POST["t3"])?$_POST["t3"]:"";
$description=isset($_POST["t4"])?$_POST["t4"]:"";
$type=isset($_POST["t5"])?$_POST["t5"]:"";

$querySelect="insert into product(status,date_pro,price,description,name,address,type_name) values('unsold',now(),$price,'$description','$name','$address','$type')";
$result=mysqli_query($con,$querySelect);
//echo $querySelect;
header("location: buysell.php");
?>