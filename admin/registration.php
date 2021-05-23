<?php
session_start();
include('includes/config.php');
if(isset($_POST['submit']))
{
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$contactno=$_POST['contact'];
$emailid=$_POST['email'];
$password=$_POST['password'];
$egycontactno=$_POST['egycontactno'];
$guardianName=$_POST['guardianName'];
$guardianRelation=$_POST['guardianRelation'];
$guardianContactno=$_POST['guardianContactno'];
$corresAddress=$_POST['corresAddress'];
$pmntAddress=$_POST['pmntAddress'];

		
		$sql6="SELECT * FROM userregistration WHERE email='$emailid';";
	    $set6=$mysqli->query($sql6);
		
		
		if(mysqli_num_rows($set6)>0){
		  
		  echo "<script>alert('Already registered from this email');</script>";
	  }
else{
$query="insert into  userregistration(firstName,lastName,contactNo,email,password,egycontactno,guardianName,guardianRelation,guardianContactno,corresAddress,pmntAddress) values('$fname','$lname','$contactno','$emailid','$password','$egycontactno','$guardianName','$guardianRelation','$guardianContactno','$corresAddress','$pmntAddress')";

$stmt = $mysqli->query($query);

/*$query2="insert into  registration(firstName,lastName,contactno,email,egycontactno,guardianName,guardianRelation,guardianContactno,corresAddress,pmntAddress) values('$fname','$lname','$contactno','$emailid','$egycontactno','$guardianName','$guardianRelation','$guardianContactno','$corresAddress','$pmntAddress')";

$stmt = $mysqli->query($query2);*/



echo"<script>alert('Student Succssfully registered');</script>";
}
}
?>

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<title>User Registration</title>
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

<script type="text/javascript">
function valid()
{
if(document.registration.password.value!= document.registration.cpassword.value)
{
alert("Password and Re-Type Password Field do not match  !!");
document.registration.cpassword.focus();
return false;
}
return true;
}
</script>
</head>
<body>
	<?php
        $aid=$_SESSION['id'];		
		
		if($aid == '5')
		{
			?>
			<div class="brand clearfix">
		<a href="#" class="logo" style="font-size:16px;">Sufia Kamal Hall</a>
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
			<li class="ts-account">
				<a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li><a href="admin-profile_official.php">My Account</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</li>
		</ul>
	</div><?php
		}
		
		else{
		include('includes/header.php');
		}?>
	<div class="ts-main-content">
		<?php
        $aid=$_SESSION['id'];		
		
		if($aid == '5')
		{
			?>
			<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
			
				<li class="ts-label">Main</li>
		

					

				<li><a href="#"><i class="fa fa-desktop"></i>Food </a>
					<ul>
					
						<li><a href="manage-food.php">Manage Foods</a></li>
						
					</ul>
				</li>


				<li><a href="registration.php"><i class="fa fa-user"></i>User Registration</a></li>
				<li><a href="manage-students.php"><i class="fa fa-users"></i>Manage Students</a></li>
				<li><a href="Adining.php"><i class="glyphicon glyphicon-cutlery"></i> Dining</a></li>
								<li><a href="#"><i class="fa fa-money"></i>Rent</a>
					<ul>
						<li><a href="rent_verify.php">Verify rent</a></li>
						<li><a href="rent_status.php">Rent status</a></li>
						<!-- <li><a href="manage-rooms.php">Manage Dining</a></li> -->
					</ul>
				</li>

			
		</nav><?php
		}
		else{
		include('includes/sidebar.php');
		}?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">User Registration </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Fill all Info</div>
									

									<div class="panel-body">
			<form method="post" action="" name="registration" class="form-horizontal" onSubmit="return valid();">
											
										




<div class="form-group">
<label class="col-sm-2 control-label">First Name : </label>
<div class="col-sm-8">
<input type="text" name="fname" id="fname"  class="form-control" required="required" >
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Last Name : </label>
<div class="col-sm-8">
<input type="text" name="lname" id="lname"  class="form-control" required="required">
</div>
</div>



<div class="form-group">
<label class="col-sm-2 control-label">Contact No : </label>
<div class="col-sm-8">
<input type="text" name="contact" id="contact"  class="form-control" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Emergency Contact No :</label>
<div class="col-sm-8">
<input type="text" name="egycontactno" id="egycontactno"  class="form-control" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Guardian name : </label>
<div class="col-sm-8">
<input type="text" name="guardianName" id="guardianName"  class="form-control" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Guardian Relation : </label>
<div class="col-sm-8">
<input type="text" name="guardianRelation" id="guardianRelation"  class="form-control" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Guardian Contact No : </label>
<div class="col-sm-8">
<input type="text" name="guardianContactno" id="guardianContactno"  class="form-control" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Address : </label>
<div class="col-sm-8">
<input type="text" name="corresAddress" id="corresAddress"  class="form-control" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Parmanent Address : </label>
<div class="col-sm-8">
<input type="text" name="pmntAddress" id="pmntAddress"  class="form-control" required="required">
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Email id: </label>
<div class="col-sm-8">
<input type="email" name="email" id="email"  class="form-control" onBlur="checkAvailability()" required="required">
<span id="user-availability-status" style="font-size:12px;"></span>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Password: </label>
<div class="col-sm-8">
<input type="password" name="password" id="password"  class="form-control" required="required">
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Confirm Password : </label>
<div class="col-sm-8">
<input type="password" name="cpassword" id="cpassword"  class="form-control" required="required">
</div>
</div>
						



<div class="col-sm-6 col-sm-offset-4">
<button class="btn btn-default" type="submit">Cancel</button>
<input type="submit" name="submit" Value="Register" class="btn btn-primary">
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
	<script>
function checkAvailability() {

$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function ()
{
event.preventDefault();
alert('error');
}
});
}
</script>

</html>