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
        <td><input type="submit" name="btn" value="Search" class="btn btn-secondary"/></td>
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

<center><h2>Description</h2></center>
<table border="1" cellpadding="10" cellspacing="10" class="table" style="margin-top: 20px">
	<tr>
    	<td>Serial no</td>
        <td><?php echo $row[7]?></td>
    </tr>
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

?><center>
<a href="sell.php" class="btn btn-primary">Sell something</a></center>
</body>
</html>