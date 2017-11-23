<?php
require_once("header.php");
//this is a registration page
?>
<?php
$name=$_SESSION["namelog"];
require_once("DataConnection.php");
$queryselect="select * from logins where name='$name'";
$result=mysqli_query($con,$queryselect);
if($result==true and mysqli_num_rows($result)>0)
{
	$row=mysqli_fetch_array($result);
}
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
			<h3 class="text-center alert alert-secondary">
				Register
			</h3>
			<form role="form" action="codechange.php" method="post" id="myForm" onsubmit="return validateForm()">
				<div class="form-group">
					 
					<label for="name_r">
						UserName
					</label>
					<input class="form-control" id="name_r" type="text" name="name_r" required="required" value="<?php echo $row[0];?>" />
				</div>
				<div class="form-group">
					 
					<label for="orname_r">
						Name
					</label>
					<input class="form-control" id="orname_r" type="text" name="orname_r" required="required" value="<?php echo $row[5];?>"/>
				</div>
				<div class="form-group">
					 
					<label for="user_r">
						Roll no
					</label>
					<input class="form-control" id="user_r" type="text" name="user_r" value="<?php echo $row[1];?>" required="required" />
				</div>
				
				<div class="form-group">
					 
					<label for="pass_r">
						Password
					</label>
					<input class="form-control" id="pass_r" type="password" name="pass_r" required="required" />
				</div>
				<div class="form-group">
					 
					<label for="email_r">
						Email
					</label>
					<input class="form-control" id="email_r" type="Email" name="email_r" value="<?php echo $row[2];?>"/>
				</div>
				<div class="form-group">
					 
					<label for="phone_r">
						Phone
					</label>
					<input class="form-control" id="phone_r" type="Phone" name="phone_r" required="required" value="<?php echo $row[3];?>"/>
				</div>
				<p id="error"></p>
				<?php
				$check1="dup1";
				$check2="dup2";
				$check3="dup3";
					if(@$_GET["err"]==$check1)
					{
						echo "<div class=\"alert alert-danger\">Duplicate Username found</div>";
					}
					else
					if(@$_GET["err"]==$check2)
					{
						echo "<div class=\"alert alert-danger\">Duplicate Roll No found</div>";
					}
					else
					if(@$_GET["err"]==$check3)
					{
						echo "<div class=\"alert alert-danger\">Duplicate Email found</div>";
					}
				?>
				
				<button type="submit" class="btn btn-default">
					Submit
				</button>
			</form>
		</div>
		<div class="col-md-2">
		</div>
	</div>
</div>
<script>
function validateForm() {
    var e, text;

    // Get the value of the input field with id="numb"
    e = document.getElementById("user_r").value;

    // If x is Not a Number or less than one or greater than 10
    if (isNaN(e) || e.length<9 || e.length>10) {
        text = "<div class=\"alert alert-danger\">Not a Roll no</div>";
        document.getElementById("error").innerHTML = text;
        return false;
    }

    f = document.getElementById("phone_r").value;

    // If x is Not a Number or less than one or greater than 10
    if (isNaN(f) || f.length!=10) {
        text = "<div class=\"alert alert-danger\">Not a phone number</div>";
        document.getElementById("error").innerHTML = text;
        return false;
    }


}
</script>
<?php
require_once("footer.php");
?>