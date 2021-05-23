<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for registration
if(isset($_POST['submit']))
{


	
$money=$_POST['money'];
$email=$_POST["email"];

	$sql6="SELECT * FROM userregistration WHERE email='$email';";
	    $set6=$mysqli->query($sql6);
		
		 $sql7="SELECT * FROM registration WHERE email='$email';";
	    $set7=$mysqli->query($sql7);
		
		if(mysqli_num_rows($set6)<1){
		  
		  echo "<script>alert('Sorry this is not registered email account');</script>";
	  }
		else if(mysqli_num_rows($set7)<1){
			  echo "<script>alert('Sorry you are not alloted');</script>";
		 }
		 else{

$sql="SELECT * from rent WHERE email='$email';";
$set=$mysqli->query($sql);
$data=$set->fetch_assoc();
$money_paid =$data['total_bill_paid'];
$m=$money_paid + $money;

$query="update rent set total_bill_paid='$m',verified='NOT VERIFIED' where email='$email';";
        $stmt = $mysqli->query($query);
echo"<script>alert('rent updated Succssfully');</script>";
		 }







}


?>

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<title>Rent</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/validation.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>


</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Rent</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Fill all Info</div>
								<div class="panel-body">
									<form method="post" action="" class="form-horizontal">
						
<div class="form-group">
<label class="col-sm-4 control-label"><h4 style="color: green" align="left">Rent Related info </h4> </label>
</div>


											


<div class="form-group">
<label class="col-sm-2 control-label">Email</label>
<div class="col-sm-8">
<input type="text" name="email" id="email"  class="form-control"  >
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Money paid</label>
<div class="col-sm-8">
<input type="text" name="money" id="money"  class="form-control"  >
</div>
</div>

<div class="col-sm-6 col-sm-offset-4">
<button class="btn btn-default" type="submit">Cancel</button>
<input type="submit" name="submit" Value="submit" class="btn btn-primary">
</div>
</form>

									</div>
									</div>
								</div>
							</div>
						</div>
							</div>
						</div>
					</div>
				</div> 	
			</div>
		</div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>

</html>