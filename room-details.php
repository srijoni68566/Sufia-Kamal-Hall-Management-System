<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<title>Room Details</title>
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
  padding-top: 80px;
  right: 0;
  width: 200px;
  height: 100px;
  border: 3px solid #73AD21;
}

</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
			<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title" >Rooms Details</h2>
						<div class="panel panel-default">
							<div class="panel-heading">All Room Details</div>
							<div class="panel-body">
								<table id="zctb" class="table table-bordered " cellspacing="0" width="100%">
									
									
									<tbody>
<?php	
$aid=$_SESSION['login'];
	$ret="select * from registration where email=?";
$stmt= $mysqli->prepare($ret) ;
$stmt->bind_param('s',$aid);
$stmt->execute() ;
$res=$stmt->get_result();
$cnt=1;
while($row=$res->fetch_object())
	  {
	  	?>

<tr>
<td colspan="4"><h4>Room Realted Info</h4></td>
</tr>
<tr>
<td colspan="6"><b>Reg no. : <?php echo $row->id;?></b></td>
</tr>



<tr>
<td><b>Room no :</b></td>
<td><?php echo $row->roomno;?></td>
<td><b>Seater :</b></td>
<td><?php echo $row->seater;?></td>
<td><b>Fees PY :</b></td>
<td><?php echo $fpy=$row->feespy;?></td>
</tr>

</td>
<td><b>booking date:</b></td>
<td colspan="6"><?php echo $row->booking_date;?></td>

</tr>

<tr>
<td ><b>Total Fee : </b></td>
<td colspan="6">
<?php
$email=$row->email;
$bd=$row->booking_date;
$food_status=$row->food_status;
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
		
		

$hall_dues=$dr*$fpy;

if ($food_status=='1')
{ 
$pm=25;
$food_bill=$mill*$pm;

$total_bill= $food_bill + $hall_dues-$u_paid;
echo $total_bill;
}
else
{
	$total_bill=$hall_dues-$u_paid;
	echo $total_bill;
}
?></td>
</tr>
<tr>
<td colspan="6"><h4>Personal Info </h4></td>
</tr>

<tr>
<td><b>Reg No. :</b></td>
<td><?php echo $row->id;?></td>
<td><b>Full Name :</b></td>
<td><?php echo $row->firstName;?> <?php echo $row->lastName;?></td>
<td><b>Email :</b></td>
<td><?php echo $row->email;?></td>
</tr>


<tr>
<td><b>Contact No. :</b></td>
<td colspan="6">0<?php echo $row->contactno;?></td>

</tr>


<tr>
<td><b>Emergency Contact No. :</b></td>
<td>0<?php echo $row->egycontactno;?></td>
<td><b>Guardian Name :</b></td>
<td><?php echo $row->guardianName;?></td>
<td><b>Guardian Relation :</b></td>
<td><?php echo $row->guardianRelation;?></td>
</tr>

<tr>
<td><b>Guardian Contact No. :</b></td>
<td colspan="6">0<?php echo $row->guardianContactno;?></td>
</tr>

<tr>
<td colspan="6"><h4>Addresses</h4></td>
</tr>
<tr>
<td><b>Correspondense Address</b></td>
<td colspan="2"><?php echo $row->corresAddress;?></td>


<td><b>Permanent Address</b></td>
<td colspan="2"><?php echo $row->pmntAddress;?></td>
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
