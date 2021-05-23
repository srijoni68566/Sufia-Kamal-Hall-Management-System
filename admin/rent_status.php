<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if(isset($_GET['del']))
{
		
		$id=intval($_GET['del']);			
		$sql="SELECT * from rent where id='$id';";
        $set=$mysqli->query($sql);
        $data=$set->fetch_assoc();
		$email= $data['email'];

$query="update registration set alert='DEALLOCATED' where email='$email';";
        $stmt = $mysqli->query($query);

echo"<script>alert('The student has been dealloted Succssfully');</script>";
		
}
?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	
	<title>Rent Status</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
	div.absolute {
  position: absolute;
  top: 80px;
  right: 0;
  width: 200px;
  height: 100px;
  border: 3px solid #73AD21;
}
	
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
						<h2 class="page-title">Rent Status checking</h2>
						<div class="panel panel-default">
							<div class="panel-heading">Rent status Details</div>
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											
										    <th>Email </th>
											<th>Bill Not paid</th>
											<th>Alert</th>
											

										
									<?php if($aid != '5'){	?><th>Action</th><?php }?>
										</tr>
									</thead>
									<tfoot>
										<!-- <tr>
											<th>Sno.</th>
											<th>Seater</th>
											<th>Room No.</th>
										
											<th>Fees (PM) </th>
											<th>Posting Date  </th>
											<th>Action</th>
										</tr> -->
									</tfoot>
									<tbody>
<?php	
$aid=$_SESSION['id'];
$ret="select * from rent";
$stmt= $mysqli->prepare($ret) ;
$stmt->execute() ;//ok
$res=$stmt->get_result();
$cnt=1;


while($row=$res->fetch_object())
	  {
		  $email=$row->email;
		  $sql="select * from registration where email='$email';";
		  $stmt2 = $mysqli->query($sql);
		   $data1 = $stmt2->fetch_assoc();
		   $alert1=$data1['alert'];
		   
if($alert1 != 'DEALLOCATED')
{
	

		  
	  	?>

<td><?php echo $row->email;?></td>
<td><?php 
$email=$row->email;
$ret2="select * from registration where email='$email'";
$stmt2= $mysqli->prepare($ret2) ;
$stmt2->execute() ;
$res2=$stmt2->get_result();
$row2=$res2->fetch_object();

$bd=$row2->booking_date;
$food_status=$row2->food_status;
$sql="SELECT CURRENT_TIMESTAMP() as time ;";
$set=$mysqli->query($sql);
$ct2=$set->fetch_assoc();
$ct=$ct2['time'];


$sql2="SELECT TIMESTAMPDIFF(YEAR,'$bd','$ct') as difference;";
$set2=$mysqli->query($sql2);
$dr_data=$set2->fetch_assoc();
$dr=$dr_data['difference'];

	
		$sql3="SELECT * from rent where email='$email';";
        $set3=$mysqli->query($sql3);
        $data3=$set3->fetch_assoc();
		$u_paid= $data3['ultimate_paid'];
		
		$mill=0;
		$sql4="SELECT * from dining WHERE Email='$email';";
        $stmt4 = $mysqli->query($sql4);
		
		while($data4=mysqli_fetch_assoc($stmt4)){
             $mill_taken=$data4['Mill'];
			 $mill=$mill+$mill_taken;
				
			}
		
		

$hall_dues=$dr*1000;

if ($food_status=='1')
{ 
$pm=25;
$food_bill=$mill*$pm;

$total_bill= $food_bill + $hall_dues-$u_paid;
if($total_bill >3000)
{
	$alert="RED";
}

else if($total_bill >1500 && $total_bill <3000)
{
	$alert="Yellow";
}
else
{
	$alert="GREEN";
}
echo $total_bill;
}
else
{
	$total_bill=$hall_dues-$u_paid;
	
	if($total_bill >3000)
{
	$alert="RED";
}

else if($total_bill >1500 && $total_bill <3000)
{
	$alert="Yellow";
}
else
{
	$alert="GREEN";
}
echo $total_bill;
}
?></td>
<td><?php echo $alert;?></td>

<td>
<?php if($aid != '5'){?>
<a href="rent_status.php?del=<?php echo $row->id;?>" onclick="return confirm("Do you want to delete");"><i class="fa fa-close"></i></a></td>
<?php } ?>
										</tr>
									<?php
$cnt=$cnt+1;
}} ?>
											
										
									</tbody>
								</table>

								
							</div>
						</div>

					
					</div>
				</div>

			

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
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
