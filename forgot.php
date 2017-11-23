<?php
require_once("headerlogin.php");
?>
<div class="alert alert-secondary"><h1>Forgot Password</h1></div>
<div class="container-fluid" style="margin-top: 75px;margin-bottom: 75px;">
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
			<form action="codeforget.php" role="form" method="post">
				<div class="form-group">
					 
					<label for="rn">
						Roll No
					</label>
					<input class="form-control" id="rn" type="text" name="rn"/>
				</div>
				
				<?php
					if(@$_GET["msg"]==1)
					{
						?>
						<div class="alert alert-danger">
						<?php echo "Enter correct Roll No"; ?>
					</div>
					<?php 
					}
					else if(@$_GET["msg"]==2)
					{
						?>
						<div class="alert alert-success">

						<?php echo "Mail sent successfully"; ?>
					</div>
					<?php
					}
					else if(@$_GET["msg"]==3)
					{
						?>
						<div class="alert alert-info">
						<?php
						echo "Mail not sent"; ?>
					</div>
					<?php
					}
				?>
				<div class="form-group">
				<button type="submit" class="btn btn-default" value="Login" name="btn">
					Submit
				</button>
			</form>
			<br/>
			
		</div>
		<div class="col-md-2">
		</div>
	</div>
</div>
<font color="red">
<h4> 
</h4></font>
<?php
require_once("footerlogin.php");
?>