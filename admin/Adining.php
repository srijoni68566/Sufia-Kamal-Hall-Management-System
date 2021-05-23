<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if(isset($_GET['del']))
{
	$id=intval($_GET['del']);
	$adn="delete from dining where id=?";
		$stmt= $mysqli->prepare($adn);
		$stmt->bind_param('i',$id);
        $stmt->execute();
        $stmt->close();	   
        echo "<script>alert('Data Deleted');</script>" ;
}
?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	
	<title>Manage Dining</title>
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
		else if($aid == '5')
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
		else if($aid == '5')
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
						<h2 class="page-title">Manage Dining</h2>
						<div class="panel panel-default">
							<div class="panel-heading">All Mill Details</div>
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											
										
											<th>Date</th>
						                    <th>Month</th>
										    <th>Year</th>
											<th>Mill</th>
											<th>Email </th>

										
											<th>Action</th>
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
$ret="select * from dining";
$stmt= $mysqli->prepare($ret) ;
$stmt->execute() ;//ok
$res=$stmt->get_result();
$cnt=1;
while($row=$res->fetch_object())
	  {
	  	?>

<td><?php echo $row->Date;?></td>
<td><?php echo $row->month;?></td>
<td><?php echo $row->year;?></td>
<td><?php echo $row->Mill;?></td>
<td><?php echo $row->Email;?></td>

<td>
<a href="Adining.php?del=<?php echo $row->id;?>" onclick="return confirm("Do you want to delete");"><i class="fa fa-close"></i></a></td>
										</tr>
									<?php
$cnt=$cnt+1;
									 } ?>
											
										
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
