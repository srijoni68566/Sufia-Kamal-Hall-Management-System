<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for registration
if(isset($_POST['submit']))
{


	
$date=$_POST['date'];
$month=$_POST['month'];
$year=$_POST['year'];
$mill=$_POST['mill'];
$email=$_POST["email"];
$dat=0;
$sql="SELECT * from dining WHERE Email='$email';";
$stmt = $mysqli->query($sql);

		
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
    if(mysqli_num_rows($stmt)<1){
	$query="insert into  dining(Date,Mill,Email,month,year) values('$date','$mill','$email','$month','$year')";
    $stmt2 = $mysqli->query($query);
	
	 
		$sql11="update registration set food_status='1' where email='$email';";
        $stmt = $mysqli->query($sql11);
echo"<script>alert('Mill update Succssfully');</script>";
	
}
else{

			while($data=mysqli_fetch_assoc($stmt)){
				if($data['Date']==$date && $data['year']==$year && $data['month']==$month){
					$dat=1;
				
					
				}
				else $dat=0;
				
			}

if($dat==1)
{
	echo"<script>alert('Already booked meal for this date');</script>";
	
}
else if($dat ==0)
{
		$query="insert into  dining(Date,Mill,Email,month,year) values('$date','$mill','$email','$month','$year')";
    $stmt = $mysqli->query($query);
echo"<script>alert('Mill update Succssfully');</script>";
}
}

  }

}


?>

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<title>Dining</title>
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
					
						<h2 class="page-title">Dining</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Fill all Info</div>
								<div class="panel-body">
									<form method="post" action="" class="form-horizontal">
						
<div class="form-group">
<label class="col-sm-4 control-label"><h4 style="color: green" align="left">Dining Related info </h4> </label>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Date </label>
<div class="col-sm-8">
<select name="date" id="date"class="form-control"  onChange="getSeater(this.value);" onBlur="checkAvailability()" required> 
		<option value="">Select Date</option>
		<option value="1">01</option>
		<option value="2">02</option>
		<option value="3">03</option>
		<option value="4">04</option>
		<option value="5">05</option>
		<option value="6">06</option>
		<option value="7">07</option>
		<option value="8">08</option>
		<option value="9">09</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12 </option>
		<option value="13">13 </option>
		<option value="14">14 </option>
		<option value="15">15 </option>
		<option value="16">16 </option>
		<option value="17">17 </option>
		<option value="18">18 </option>
		<option value="19">19 </option>
		<option value="20">20 </option>
		<option value="21">21 </option>
		<option value="22">22 </option>
		<option value="23">23 </option>
		<option value="24">24 </option>
		<option value="25">25 </option>
		<option value="26">26 </option>
		<option value="27">27 </option>
		<option value="28">28 </option>
		<option value="29">29 </option>
		<option value="30">30 </option>
		<option value="31">31 </option>


		</select> 
<span id="room-availability-status" style="font-size:12px;"></span>

</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Month</label>
<div class="col-sm-8">
<select name="month" id="month"class="form-control"  onChange="getSeater(this.value);" onBlur="checkAvailability()" required> 
		<option value="">Select Month</option>
		<option value="January">January</option>
		<option value="February">February</option>
		<option value="March">March</option>
		<option value="April">April</option>
		<option value="May">May</option>
		<option value="June">June</option>
		<option value="July">July</option>
		<option value="August">August</option>
		<option value="September">September</option>
		<option value="October">October</option>
		<option value="Nobember">Nobember</option>
		<option value="December">December</option>


		</select> 
<span id="room-availability-status" style="font-size:12px;"></span>

</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Year</label>
<div class="col-sm-8">
<input type="text" name="year" id="year"  class="form-control"  >
</div>
</div>
											
<div class="form-group">
<label class="col-sm-2 control-label">Mill</label>
<div class="col-sm-8">
<select name="mill" id="mill "class="form-control"  onChange="getSeater(this.value);" onBlur="checkAvailability()" required> 
		<option value="">No of mill</option>
		<option value="1">01</option>
		<option value="2">02</option>



		</select> 

</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Email</label>
<div class="col-sm-8">
<input type="text" name="email" id="email"  class="form-control"  >
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