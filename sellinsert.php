<?php
session_start();
require_once("DataConnection.php");
echo $_FILES["f1"]["error"];
if($_FILES["f1"]["error"]==0)
{
	$FileName=$_FILES["f1"]["name"];
	$Path=$_FILES["f1"]["tmp_name"];
	$Size=$_FILES["f1"]["size"];
	
	$title=isset($_POST["t1"])?$_POST["t1"]:"";
	$extname = pathinfo($FileName,PATHINFO_EXTENSION);
		$strInsert="insert into imageData(title,ImageName,ext,uploadDate) values('$title','$FileName','$extname',now())";	

	if($extname=="jpg" or $extname=="png" or $extname="jpeg")
	{
		$result=mysqli_query($con,$strInsert);
		if($result==true)
		{
		$pid = mysqli_insert_id($con);
		$strid="update imageData set id=$pid where title='$title'";
		mysqli_query($con,$strid);
		$pathName = "uploads/" .  $title  . "." . $extname;
		move_uploaded_file($Path,$pathName);
		}
	}
	else
		echo "Please Select *.jpg file";
	
}
else
	echo "Please Select File...";
$name=isset($_POST["t1"])?$_POST["t1"]:"";
$address=isset($_POST["t2"])?$_POST["t2"]:"";
$price=isset($_POST["t3"])?$_POST["t3"]:"";
$description=isset($_POST["t4"])?$_POST["t4"]:"";
$type=isset($_POST["t5"])?$_POST["t5"]:"";
$rn=$_SESSION["rollno"];
$_SESSION["name"]=$name;
$queryname="select name from logins where user=$rn";
//echo $queryname;
$res=mysqli_query($con,$queryname);
if($res==true and mysqli_num_rows($res)>0)
{
	$row=mysqli_fetch_array($res);
	$nameseller=$row[0];
}



$queryinsert="insert into product(status,date_pro,price,description,name,address,type_name,names) values('unsold',now(),$price,'$description','$name','$address','$type','$nameseller')";
$result=mysqli_query($con,$queryinsert);
header("location: sellcode.php");
?>