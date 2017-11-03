<?php
require_once("headerlogin.php");
session_start();
?>
<div class="alert alert-secondary"><h1>Login</h1></div>
<div class="container-fluid" style="margin-top: 75px;margin-bottom: 75px;">
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
			<form action="code.php" role="form" method="post">
				<div class="form-group">
					 
					<label for="rn">
						Roll No
					</label>
					<input class="form-control" id="rn" type="text" name="rn"/>
				</div>
				<div class="form-group">
					 
					<label for="ps">
						Password
					</label>
					<input class="form-control" id="ps" type="password" name="ps"/>
				</div> 

				<button type="submit" class="btn btn-default" value="Login" name="btn">
					Login
				</button>
			</form>
			<br/>
			<a href="register.php">Register</a>
		</div>
		<div class="col-md-2">
		</div>
	</div>
</div>
<font color="red">
<h4> 
<?php
if(@$_GET["msg"]==1)
{
  ?>
  Enter Correct username and password
  <?php
}
?>
</h4></font>
<?php
require_once("footer.php");
?>