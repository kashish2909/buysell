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
<form action="SelectRecord.php" method="post">
<table>
	<span class="border border-primary">
	<!--<div class="form-group">
		<h3>Search for an item</h3>
	<tr>
    	<td><label for="name">Enter name</label></td>
        <td><input type="text" name="name" value="" class="form-control"/></td>
    </tr>
	<tr>
        <td><input type="submit" name="btn" value="Search" class="btn btn-warning"/></td>
    </tr>
    </div>--></span>
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

<center><h2 class="alert alert-secondary">Description of Item</h2></center>
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
        <td>Username of Seller</td>
        <td><a href="info.php?user=<?php echo $row[12]?>"><?php echo $row[12]?></a></td>
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

?>

<?php
    if(@$_REQUEST["message"]=="fail")
    {
        echo "<div class=\"alert alert-danger\">Seller cannot buy product</div>";
    }
    ?>
<?php
$status="unsold";
if($name!=null and $result==true and mysqli_num_rows($result)>0)
{
    if($row[0]==$status)
    {
?>
<form action="buycode.php" method="post" onsubmit="return confirm('Do you want to buy this?');">
	<input type="hidden" name="srno" id="srno" value="<?php echo $row[7];?>" />
	<input type="hidden" name="nm" id="nm" value="<?php echo $row[6];?>" />

<input id="buy" type="submit" class="btn btn-primary" value="Buy this"></input></form></center><?php 
}
else
{?>
    
    <center><h2 class="alert alert-secondary">Description of buyer</h2></center>
<table border="1" cellpadding="10" cellspacing="10" class="table" style="margin-top: 20px">
    <tr>
        <td>Name</td>
        <td><?php echo $row[8]?></td>
    </tr>
    <tr>
        <td>Roll no</td>
        <td><?php echo $row[9] ?></td>
    <tr>
        <td>Email</td>
        <td><?php echo $row[10]?></td>
    </tr>
    <tr>
        <td>Phone</td>
        <td><?php echo $row[11]?></td>
    </tr>
</table>



<?php }
$sold="sold";
$unsold="unsold";
$namesell=$_SESSION["namelog"];
if($row[0]==$sold && $row[8]==$namesell)
{?>
    <a href="unbuy.php?sr=<?php echo $row[7];?>" class="alert alert-secondary" onclick="return confirm('Do you want to cancel this order?');">Cancel order</a>
<?php }

if($row[0]==$unsold && $row[12]==$namesell)
{?><div align="right" style="margin-right: 30px;">
    <a href="remove.php?sr=<?php echo $row[7];?>" class="alert alert-secondary" onclick="return confirm('Do you want to remove this ad?');">Remove Ad</a></div>
<?php }
}
 ?> 

<center>
<a href="sell.php" class="btn btn-warning">Sell something</a></center>
<?php 
require_once("footer.php");
?>