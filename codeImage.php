<?php
require_once("DataConnection.php");
if($_FILES["f1"]["error"]==0)
{
	$FileName=$_FILES["f1"]["name"];
	$Path=$_FILES["f1"]["tmp_name"];
	$Size=$_FILES["f1"]["size"];
	
	$title=isset($_POST["t1"])?$_POST["t1"]:"";
	$extname = pathinfo($FileName,PATHINFO_EXTENSION);
		$strInsert="insert into imageData(title,ImageName,ext,uploadDate) values('$title','$FileName','$extname',now())";	

	if($extname=="jpg")
	{
		$result=mysqli_query($con,$strInsert);
		if($result==true)
		{
		$pid = mysqli_insert_id($con);
		$pathName = "uploads/" .  $pid  . "." . $extname;
		move_uploaded_file($Path,$pathName);
		echo "Record Submitted...";
		}
	}
	else
		echo "Please Select *.jpg file";
	
}
else
	echo "Please Select File...";
?>