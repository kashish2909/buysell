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
if(@$_GET['msg']==3)
{
    echo "This is already sold.";//
}
?>
<center>

    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search products" style="margin-top: 50px"></input>
<table cellpadding="10" id="myTable" cellspacing="10" class="table table-bordered table-responsive" style="vertical-align: middle;margin-top: 20px;margin-bottom: 20px">
<thead class="thead-light">
    <tr>
      <th>Image</th>
    	<th>Name</th>
    	<th>Type</th>
    	<th>Price</th>
        <th>Select Record</th>
    </tr>
</thead>
<tbody>
    <?php
require_once("DataConnection.php");
$querySelect="select * from product where status='unsold'";
$result=mysqli_query($con,$querySelect);
$queryimage="select * from imageData";
$res=mysqli_query($con,$queryimage);

if($result==true and mysqli_num_rows($result)>0 and $res==true and mysqli_num_rows($res)>0)
{
	while($row=mysqli_fetch_array($result))
	{
    $row1=mysqli_fetch_array($res);
    $name=$row1[0].".".$row1[3];
		?>
	<tr>
    <td><img src="uploads/<?php echo $name?>" width="100" height="100"/></td>
    	<td><?php echo $row[4]?></td>
    	<td><?php echo $row[6]?></td>
    	<td><?php echo $row[2]?></td>
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
<!--
<a href="SelectRecord.php?msg=1" class="btn btn-warning"><img src="images/search.png" height="20px" width="20px"></img>  Search Record</a>-->
</center>    
<?php
require_once("footer.php")
?>
<style>
#myInput {
    background-image: url('/css/searchicon.png'); /* Add a search icon to input */
    background-position: 10px 12px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 100%; /* Full-width */
    font-size: 16px; /* Increase font-size */
    padding: 12px 20px 12px 40px; /* Add some padding */
    border: 1px solid #ddd; /* Add a grey border */
    margin-bottom: 12px; /* Add some space below the input */
}
</style>
<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
