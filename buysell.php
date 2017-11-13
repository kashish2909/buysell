<?php
require_once("header.php");
?>
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
require_once("DataConnection.php");
$query="Select (name) from logins where user=$uname";
$result=mysqli_query($con,$query);
if($result==true and mysqli_num_rows($result)>0)
{
	$row=mysqli_fetch_array($result);
	$name=$row[0];
}
?>

<h1><p class="alert alert-success">Welcome!!! <?php echo $name?></p></h1>
<a style="float: right;margin-top: 10px; margin-right: 10px" href="SelectRecord.php?msg=1" class="btn btn-warning"><img src="images/search.png" height="20px" width="20px"></img>  Search Record</a>
<div class="container-fluid" style="margin-top: 100px; margin-bottom: 100px">
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-4" style="margin-bottom: 30px">
			 
			<a class="btn btn-primary btn-lg btn-block" href="Display.php">
				Buy
			</a>
		</div>
		<div class="col-md-4">
			 
			<a class="btn btn-primary btn-lg btn-block" href="sell.php">
				Sell
			</a>
		</div>
		<div class="col-md-2">
		</div>
	</div>
</div>
<?php
require_once("footer.php");
?>