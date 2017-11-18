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
<h2 class="h2 text-center alert alert-secondary" style="z-index: 1">SALE YOUR PRODUCT</h2>
<?php
$msg=isset($_GET["msg"])?$_GET["msg"]:"";
if($msg=="1")
{
	echo "Record Inserted...";
}
else if($msg==2)
{
	echo "Record not Inserted...";
}
?>
</h1>
<form action="sellinsert.php" method="post">
<table cellpadding="10" cellspacing="10" class="table">
<tr>
<td>Name</td>
<td>
<input type="text" name="t1" placeholder="Enter name of your product" required="required"/></td>
</tr>
<tr>
<td>Address and phone no</td>
<td>
<textarea rows="5" cols="50" name="t2" placeholder="Enter your address and phone number"></textarea>
</tr>

<tr>
<td>Expected Price</td>
<td>
<input type="text" name="t3" placeholder="Enter price"/></td>
</tr>
<tr>
<td>Description</td>
<td>
<textarea rows="5" cols="50" name="t4"></textarea>
</td>
</tr>
<tr>
	<td>Enter type of product</td>
	<td><select name="t5">
	<option disabled="disabled" selected="true">--Please Select--</option>
        <?php
require_once("DataConnection.php");
$querySelect="select * from type";
$result=mysqli_query($con,$querySelect);

if($result==true and mysqli_num_rows($result)>0)
{
	while($row=mysqli_fetch_array($result))
	{
		?>
        <option value="<?php echo $row[0]?>"><?php echo $row[0]?></option>
        <?php
	}
}
		?>
    
</select></td>

<tr>
<td colspan="2">
<input class="btn btn-primary" type="submit" name="btn" value="Sell"/></td>
</tr>

</table>
</form>
<?php
require_once("footer.php");
?>
