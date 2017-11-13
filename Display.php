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
if(@$_GET['msg']==3)
{
    echo "This is already sold.";//
}
?>
<a href="sell.php" class="btn btn-success btn-large" style="margin-top: 10px;margin-bottom: 10px;z-index:3;margin-right: 10px">Sell</a>
<center>
<table cellpadding="10" cellspacing="10" class="table table-bordered" style="vertical-align: middle;margin-top: 20px;margin-bottom: 20px">
<thead class="thead-light">
    <tr>
    	<th>Name</th>
    	<th>Type</th>
    	<th>Price</th>
        <th>Status</th>
        <th>Select Record</th>
    </tr>
</thead>
<tbody>
    <?php
require_once("DataConnection.php");
$querySelect="select * from product";
$result=mysqli_query($con,$querySelect);

if($result==true and mysqli_num_rows($result)>0)
{
	while($row=mysqli_fetch_array($result))
	{
		?>
	<tr>
    	<td><?php echo $row[4]?></td>
    	<td><?php echo $row[6]?></td>
    	<td><?php echo $row[2]?></td>
        <td><center><h4><div class="badge badge-secondary badge-lg" style="vertical-align: middle;"><?php echo $row[0]?></div></h4></center></td>
        <td>
        <a class="btn btn-primary" href="SelectRecord.php?name=<?php echo $row[4]?>">
        	<div>View Description</div>
        </a>
        </td>

        

        
    </tr>        
        <?php
	}
}

mysqli_close($con);
	?>

</table>
<a href="SelectRecord.php?msg=1" class="btn btn-warning"><img src="images/search.png" height="20px" width="20px"></img>  Search Record</a>
</center>    
<?php
require_once("footer.php")
?>
