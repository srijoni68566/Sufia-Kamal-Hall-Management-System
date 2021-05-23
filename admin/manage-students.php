<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if(isset($_GET['del']))
{
	/*$id=intval($_GET['del']);
	$adn="delete from registration where id=?";
		$stmt= $mysqli->prepare($adn);
		$stmt->bind_param('i',$id);
        $stmt->execute();
        $stmt->close();	   
        echo "<script>alert('Data Deleted');</script>" ;*/
		
		
		
		
		$id=intval($_GET['del']);			
		

$query="update registration set alert='DEALLOCATED' where id='$id';";
        $stmt = $mysqli->query($query);

echo"<script>alert('Allotation cancelled Succssfully');</script>";
		
}
else if(isset($_GET['id']))
	
{
	
		$aid=$_GET['id'];

$query="update registration set alert='green' where id='$aid';";
        $stmt = $mysqli->query($query);

echo"<script>alert('Alloted Succssfully');</script>";
		
}



?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>Manage Students</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+510+',height='+430+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}
</script>
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
						<h2 class="page-title">Manage Students</h2>
						<div class="panel panel-default">
							<div class="panel-heading">All Room Details</div>
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Sno.</th>
											<th>users Name</th>
										
											<th>Contact no </th>
											<th>room no  </th>
											<th>Seater </th>
											<th>Staying From </th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Sno.</th>
											<th>Student Name</th>
											
											<th>Contact no </th>
											<th>Room no  </th>
											<th>Seater </th>
											<th>Staying From </th>
										<?php if($aid != '5'){	?><th>Action</th><?php }?>
										</tr>
									</tfoot>
									<tbody>
<?php	
$aid=$_SESSION['id'];
$ret="select * from registration";
$stmt= $mysqli->prepare($ret) ;
//$stmt->bind_param('i',$aid);
$stmt->execute() ;//ok
$res=$stmt->get_result();
$cnt=1;
while($row=$res->fetch_object())
	  {
	  	?>
<tr><td><?php echo $cnt;;?></td>
<td><?php echo $row->firstName;?> <?php echo $row->lastName;?></td>

<td>0<?php echo $row->contactno;?></td>
<td><?php echo $row->roomno;?></td>
<td><?php echo $row->seater;?></td>
<td><?php echo $row->booking_date;?></td>
<td>
	           <a href="room-details.php?id=<?php echo $row->id;?>"> Details </a>
			   <?php $alert=$row->alert;
			   if($alert == 'DEALLOCATED')
			   {
				   echo '(DEALLOTED)';
				   
				    if($aid != '5'){
				   ?>
				  
				    <a href="manage-students.php?id=<?php echo $row->id;?>"> Allot? </a>

					<?php }  }
			   else if($aid !='5'){?>

<a href="manage-students.php?del=<?php echo $row->id;?>" title="Delete Record" onclick="return confirm("Do you want to delete");"><i class="fa fa-close"></i></a></td>
			<?php   } ?>	</tr>
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
