<?php
session_start();
$uname="";
if($_SESSION["rollno"]!=NULL)
{
	$uname=$_SESSION["rollno"];
}
else
	header("location:index.php");
?>

<?php
$srno=isset($_REQUEST["sr"])?$_REQUEST["sr"]:"";
	require_once("DataConnection.php");
	$querySelect="delete from product where sr_no=$srno";
	$result=mysqli_query($con,$querySelect);
	$querydelete="delete from sell where sr_no=$srno";
	$result=mysqli_query($con,$querydelete);
	header("location: buysell.php");
?>
