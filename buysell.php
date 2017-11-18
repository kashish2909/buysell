<?php
require_once("header.php");
?>
<?php
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
$query="Select * from logins where user=$uname";
$result=mysqli_query($con,$query);
if($result==true and mysqli_num_rows($result)>0)
{
	$row=mysqli_fetch_array($result);
	$name=$row[5];
}
?>

<h1 style="margin-top: 50px;"><p class="alert alert-success">Welcome, <?php echo $name?></p></h1>
<a style="float: right;margin-top: 10px; margin-right: 10px" href="Display.php" class="btn btn-warning"><img src="images/search.png" height="20px" width="20px"></img>  Search Product</a>
	<select name="category" class="form-control" onchange="location = this.value;" style="margin-top: 100px">
	<option disabled="disabled" selected="true">--Search by category--</option>
        <?php
require_once("DataConnection.php");
$querySelect="select * from type";
$result=mysqli_query($con,$querySelect);

if($result==true and mysqli_num_rows($result)>0)
{
	while($row=mysqli_fetch_array($result))
	{
		?>
		
        <option value="category.php?cat='<?php echo $row[0]?>'"><?php echo $row[0]?></option>
        <?php
	}
}
		?>
    
</select>
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