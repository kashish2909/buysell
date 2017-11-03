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
<form action="SelectRecord.php" method="post">
<table>
	<span class="border border-primary">
	<div class="form-group">
		<h3>Search for an item</h3>
	<tr>
    	<td><label for="name">Enter name</label></td>
        <td><input type="text" name="name" value="" class="form-control"/></td>
    </tr>
	<tr>
        <td><input type="submit" name="btn" value="Search" class="btn btn-warning"/></td>
    </tr>
    </div></span>
</table>
</form>

<?php
$action=isset($_POST["btn"])?$_POST["btn"]:"";

	$name=isset($_REQUEST["name"])?$_REQUEST["name"]:"";
	require_once("DataConnection.php");
	$querySelect="select * from product where name='$name'";
	$result=mysqli_query($con,$querySelect);
	
	if($result==true and mysqli_num_rows($result)>0)
	{
		$row=mysqli_fetch_array($result);

?>

<center><h2 class="alert alert-secondary">Description</h2></center>
<div><h4>Note the information before buying</h4></div>
<table border="1" cellpadding="10" cellspacing="10" class="table" style="margin-top: 20px">
	<tr>
    	<td>Serial no</td>
        <td><?php echo $row[7]?></td>
    </tr>
    <tr>
    	<td>Status</td>
    	<td><h4><div class="badge badge-secondary badge-lg" style="vertical-align: middle;"><?php echo $row[0]?></div></h4></td>
	<tr>
    	<td>Name of item</td>
        <td><?php echo $row[4]?></td>
    </tr>
	<tr>
    	<td>Type name</td>
        <td><?php echo $row[6]?></td>
    </tr>
	<tr>
    	<td>Address</td>
        <td><?php echo $row[5]?></td>
    </tr>
    <tr>
    	<td>Description</td>
        <td><?php echo $row[3]?></td>
    </tr>
    <tr>
    	<td>Price</td>
        <td><?php echo $row[2]?></td>
    </tr>
    <tr>
    	<td>Date of upload</td>
        <td><?php echo $row[1]?></td>
    </tr>
</table>


<?php
		
	}
	else
		if(@$_REQUEST["msg"]==1)
		{
			echo "<h1>Enter Record to be searched</h1>";
		}
	else
	{
		echo "<h1>No Record Found...</h1>";
	}

?>
<?php
if($name!=null and $result==true and mysqli_num_rows($result)>0)
{
?>
<form action="buysql.php" method="post">
	<input type="hidden" name="srno" id="srno" value="<?php echo $row[7];?>" />
	<input type="hidden" name="nm" id="nm" value="<?php echo $row[6];?>" />

<input type="submit" class="btn btn-primary" value="Buy this"></input></form></center><?php } ?> 
<center>
<a href="sell.php" class="btn btn-warning">Sell something</a></center>
<?php 
require_once("footer.php");
?>