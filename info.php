<?php
require_once("header.php");
$uname="";
if($_SESSION["rollno"]!=NULL)
{
	$uname=$_SESSION["rollno"];
}
else
	header("location:index.php");
?>

<?php
$username=isset($_REQUEST["user"])?$_REQUEST["user"]:"";
	require_once("DataConnection.php");
	$querySelect="select * from logins where name='$username'";
	$result=mysqli_query($con,$querySelect);
	
	if($result==true and mysqli_num_rows($result)>0)
	{
		$row=mysqli_fetch_array($result);
?>
<center><h2 class="alert alert-secondary">Description of User</h2></center>
<table border="1" cellpadding="10" cellspacing="10" class="table" style="margin-top: 20px">
	<tr>
    	<td>Username</td>
        <td><?php echo $row[0]?></td>
    </tr>
    <tr>
    	<td>Roll No</td>
    	<td><?php echo $row[1]?></td>
        <tr>
        <td>Name</td>
        <td><?php echo $row[5]?></td>
    </tr>
	<tr>
    	<td>Email</td>
        <td><?php echo $row[2]?></td>
    </tr>
	
</table>
<?php
}
else
{
	echo "User has removed the account";
}
?>
<?php 
require_once("footer.php");
?>