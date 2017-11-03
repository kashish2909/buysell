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
<h1>Welcome!!! <?php echo $uname?></h1>
<a style="float: right;margin-top: 10px; margin-right: 10px" href="SelectRecord.php?msg=1" class="btn btn-warning"><img src="images/search.png" height="20px" width="20px"></img>  Search Record</a>
<div class="container-fluid" style="margin-top: 100px; margin-bottom: 100px">
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-4">
			 
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