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
	$querySelect="update product set status='unsold',nameb=null,userb=null,phoneb=null,emailb=null where sr_no=$srno";
	$result=mysqli_query($con,$querySelect);
	$querydelete="delete from buy where sr_no=$srno";
	$result=mysqli_query($con,$querydelete);
	header("location: buysell.php");
?>
