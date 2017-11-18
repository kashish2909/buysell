<?php
require_once("DataConnection.php");
session_start();
$name=$_SESSION["name"];
$rn=$_SESSION["rollno"];



$queryselect="Select * from product where name='$name'";
//echo $queryselect;
$resu=mysqli_query($con,$queryselect);
if($resu==true and mysqli_num_rows($resu)>0)
{
	$row1=mysqli_fetch_array($resu);
	$serial=$row1[7];
}
$querysell="insert into sell(username,sr_no,time_of_sell,date_of_sell) values('$rn',$serial,curtime(),now())";
$result=mysqli_query($con,$querysell);
//echo $querysell;
header('location:buysell.php');
?>