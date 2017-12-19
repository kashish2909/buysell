<?php
session_start();
require_once("DataConnection.php");
$sr=isset($_POST["srno"])?$_POST["srno"]:"";
$rn=$_SESSION["rollno"];
$name=$_SESSION["namelog"];
$querySelect="select * from logins where user='$rn'";
$result=mysqli_query($con,$querySelect);

if($result==true and mysqli_num_rows($result)>0)
{
	$row=mysqli_fetch_array($result);
$name=$row[0];
$user=$row[1];
$email=$row[2];
$phone=$row[3];
$srno=isset($_POST["sr"])?$_POST["sr"]:"";

$status='sold';
}

$querySelectpro="select * from product where sr_no='$sr'";
$res=mysqli_query($con,$querySelectpro);

if($res==true and mysqli_num_rows($res)>0)
{
$row1=mysqli_fetch_array($res);
$serial=$row1[7];
$namepro=$row1[4];
$nameseller=$row1[12];
}

/*$query="Select status from logins where user=$srno";
$result=mysqli_query($con,$query);
if($result==true and mysqli_num_rows($result)>0)
{
	$row=mysqli_fetch_array($result);
	$status=$row[0];
}*/
if($nameseller==$name)
{
	$mes="fail";

    header("location:SelectRecord.php?name=$namepro&message=$mes");
}
else
{
$querySelect="update product set nameb='$name',userb='$user',emailb='$email',phoneb='$phone',status='$status' where sr_no=$sr";
$result=mysqli_query($con,$querySelect);
$querybuy="insert into buy(username,sr_no,date_of_buy,time_of_buy) values('$user',$serial,now(),curtime())";
$result=mysqli_query($con,$querybuy);
//echo $querybuy;
header("location: buysell.php");
}

$querymail="select email from logins where name='$nameseller'";
$resmail=mysqli_query($con,$querymail);
if($resmail==true and mysqli_num_rows($resmail)>0)
{
	$rowmail=mysqli_fetch_array($resmail);
	$to=$rowmail[0];
	$subject="Product Bought";
	$message="Someone has bought your product. Go, check out!";
	mail($to,$subject,$message);
}
?>