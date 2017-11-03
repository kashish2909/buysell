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
<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
			<h3 class="text-center">
				Register
			</h3>
			<form role="form" action="coderegister.php" method="post">
				<div class="form-group">
					 
					<label for="name_r">
						Name
					</label>
					<input class="form-control" id="name_r" type="text" name="name_r"/>
				</div>
				<div class="form-group">
					 
					<label for="user_r">
						Username
					</label>
					<input class="form-control" id="user_r" type="text" name="user_r"/>
				</div>
				<div class="form-group">
					 
					<label for="pass_r">
						Password
					</label>
					<input class="form-control" id="pass_r" type="password" name="pass_r"/>
				</div>
				<div class="form-group">
					 
					<label for="email_r">
						Email
					</label>
					<input class="form-control" id="email_r" type="Email" name="email_r"/>
				</div>
				<div class="form-group">
					 
					<label for="phone_r">
						Phone
					</label>
					<input class="form-control" id="phone_r" type="Phone" name="phone_r"/>
				</div>
				<button type="submit" class="btn btn-default">
					Submit
				</button>
			</form>
		</div>
		<div class="col-md-2">
		</div>
	</div>
</div>
<?php
require_once("footer.php");
?>