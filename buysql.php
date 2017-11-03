<?php
require_once("DataConnection.php");
$srndb=$_POST["srno"];
$namet=$_POST["nm"];
$querysold="select status from product where sr_no=$srndb";
$check=mysqli_query($con,$querysold);
$row=mysqli_fetch_array($check);
if($row[0]=="unsold")
{
	$queryinsert="update product set status='sold'";
	$result=mysqli_query($con,$queryinsert);
	if($result==true)
		{
	
			header('location:Display.php');
		}
}
else
	header('location:Display.php?msg=3'); 
?>