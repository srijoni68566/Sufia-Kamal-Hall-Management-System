<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for add Food
if(isset($_POST['fsubmit']))
{
$Day=$_POST['day'];
$item1=$_POST['itm1'];
$item2=$_POST['itm2'];
$item3=$_POST['itm3'];
$item4=$_POST['itm4'];
$item5=$_POST['itm5'];
/*
$sql="SELECT it1 FROM foodmenu where it1=?";
$stmt1 = $mysqli->prepare($sql);
$stmt1->bind_param('i',$item1);
$stmt1->execute();
$stmt1->store_result(); 
$row_cnt=$stmt1->num_rows;;
if($row_cnt>0)
{
echo"<script>alert('Food alreadt exist');</script>";
}
else
{*/
$sql="SELECT * from foodmenu WHERE day='$Day';";

$stmt = $mysqli->query($sql);
if(mysqli_num_rows($stmt)<1){
         $query="insert into foodmenu(day,it1,it2,it3,it4,it5) values('$Day','$item1','$item2','$item3','$item4','$item5')";

         $stmt2 = $mysqli->query($query);
         echo"<script>alert('Food has been added successfully');</script>";	
}
else
{
echo"<script>alert('Food menu has already been decided for this day');</script>";		
}

/*$rc=$stmt->bind_param('iiiiii',$day,$it1,$it2,$it3,$it4,$it5);
$stmt->execute();*/
/*exit();*/

/*}*/
}
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<title>Create Room</title>
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
</head>
<body>
	
	<?php
        $aid=$_SESSION['id'];		
		if($aid == '4')
		{
			?>
			<div class="brand clearfix">
		<a href="#" class="logo" style="font-size:16px;">Sufia Kamal Hall</a>
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
			<li class="ts-account">
				<a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li><a href="admin-profile-dining_manager.php">My Account</a></li>
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
		if($aid == '4')
		{
			?>
			<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
			
				<li class="ts-label">Main</li>
				

				<li><a href="#"><i class="fa fa-desktop"></i>Food </a>
					<ul>
						<li><a href="cfood.php">Add a Food</a></li>
						<li><a href="manage-food.php">Manage Foods</a></li>
						
					</ul>
				</li>


				<li><a href="Adining.php"><i class="glyphicon glyphicon-cutlery"></i> Dining</a></li>

			
		</nav><?php
		}
		else{
		include('includes/sidebar.php');
		}?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Add a food </h2>
	
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Add a food</div>
									<div class="panel-body">
									<?php if(isset($_POST['submit']))
{ ?>
<!-- <p style="color: red"><?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg']=""); ?></p> -->
<?php } ?>
										<form method="post" class="form-horizontal">
											
											<div class="hr-dashed"></div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Select Day  </label>
												<div class="col-sm-8">
												<Select name="day" class="form-control" required>
													<option value="">Select Day</option>
													<option value="1">1st Day</option>
													<option value="2">2nd Day</option>
													<option value="3">3rd Day</option>
													<option value="4">4th Day</option>
													<option value="5">5th Day</option>
													<option value="6">6th Day</option>
													<option value="7">7th Day</option>
												</Select>
</div>
</div>



<div class="form-group">
<label class="col-sm-2 control-label">Item No-1</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="itm1" id="itm1" value="" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Item No-2</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="itm2" id="itm2" value="" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Item No-3</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="itm3" id="itm3" value="" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Item No-4</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="itm4" id="itm4" value="" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Item No-5</label>
<div class="col-sm-8">
<input type="text" class="form-control" name="itm5" id="itm5" value="" required="required">
</div>
</div>

<div class="col-sm-8 col-sm-offset-2">
<input class="btn btn-primary" type="submit" name="fsubmit" value="Create Items ">
												</div>
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
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</script>
</body>

</html>