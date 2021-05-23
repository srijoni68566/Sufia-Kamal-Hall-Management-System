<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for registration
if(isset($_POST['submit']))
{
$roomno=$_POST['room'];

$email=$_POST["email"];


	$sql="SELECT count(id) as total FROM `booking_room` WHERE room_no='$roomno';";
	$total_fil = $mysqli->query($sql);
	$sql="SELECT  `seater` FROM `rooms` WHERE room_no='$roomno'";
	$set=$mysqli->query($sql);
	foreach($total_fil as $t)
		$a=$t['total'];
	foreach($set as $t)
		$b=$t['seater'];
	$a=$b-$a;
	
	 $sql5="SELECT * FROM registration WHERE email='$email';";
	    $set4=$mysqli->query($sql5);
	    $data1 = $set4->fetch_assoc();
		$email_id=$data1['email'];
		
		$sql6="SELECT * FROM userregistration WHERE email='$email';";
	    $set6=$mysqli->query($sql6);
	    
      if(mysqli_num_rows($set6)<1){
		  
		  echo "<script>alert('Sorry this is unregistered email account');</script>";
	  }
	  else if( $email_id == $email)
		{
					echo "<script>alert('You have already booked by this email');</script>";
		}
	
	else if($a>=1 )
	{
		$sql="insert into  booking_room(room_no,user_email) values('$roomno','$email')";
		$stmt = $mysqli->query($sql);
		
		$sql="insert into  rent(total_bill_paid,email,ultimate_paid) values('0','$email','0')";
		$stmt = $mysqli->query($sql);
		
		$sql1="insert into  registration(roomno,email) values('$roomno','$email') ";
        $stmt = $mysqli->query($sql1);
		
	    $sql2="SELECT * FROM userregistration WHERE email='$email';";
		
		$set2=$mysqli->query($sql2);
	    $data = $set2->fetch_assoc();
		
		$firstName=$data['firstName'];
        $lastName=$data['lastName'];
        $contactno=$data['contactNo'];
        $email=$data['email'];
        $egycontactno=$data['egycontactno'];
        $guardianName=$data['guardianName'];
        $guardianRelation=$data['guardianRelation'];
        $guardianContactno=$data['guardianContactno'];
        $corresAddress=$data['corresAddress'];
        $pmntAddress=$data['pmntAddress'];
		
		$sql3="update registration set firstName='$firstName',alert='green',lastName='$lastName',contactno='$contactno',egycontactno='$egycontactno',guardianName='$guardianName',guardianRelation='$guardianRelation',guardianContactno='$guardianContactno',corresAddress='$corresAddress',pmntAddress='$pmntAddress' where email='$email';";
        $stmt = $mysqli->query($sql3);
		
		$sqllast="SELECT  * FROM `rooms` WHERE room_no='$roomno'";
		$set10=$mysqli->query($sqllast);
	    $data10 = $set10->fetch_assoc();
		
		$seater=$data10['seater'];
		$fees=$data10['fees'];
		$feespy=1000;
		$sql11="update registration set seater='$seater',feespy='$feespy' where email='$email';";
        $stmt = $mysqli->query($sql11);
		
		$sqllst="SELECT  booking_date FROM `booking_room` where user_email='$email';";
		$set11=$mysqli->query($sqllst);
	    $data11 = $set11->fetch_assoc();
		
		$booking_date=$data11['booking_date'];
		$sql11l="update registration set booking_date='$booking_date' where email='$email';";
        $stmt = $mysqli->query($sql11l);
		
		
		echo"<script>alert('Student Succssfully register');</script>";
	}
	else
		echo "<script>alert('Have not seat in this room');</script>";


}
?>

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<title>Users Hostel Registration</title>
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
<script>
function getSeater(val) {
$.ajax({
type: "POST",
url: "get_seater.php",
data:'roomid='+val,
success: function(data){
//alert(data);
$('#seater').val(data);
}
});

$.ajax({
type: "POST",
url: "get_seater.php",
data:'rid='+val,
success: function(data){
//alert(data);
$('#fpm').val(data);
}
});
}
</script>

</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Book Room</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Fill all Info</div>
								<div class="panel-body">
									<form method="post" action="" class="form-horizontal">
						<?php
$uid=$_SESSION['login'];
							 $stmt=$mysqli->prepare("SELECT email FROM registration WHERE email=? ");
				$stmt->bind_param('s',$uid);
				$stmt->execute();
				$stmt -> bind_result($email);
				$rs=$stmt->fetch();
				$stmt->close();
				if($rs)
				{ ?>
			<h3 style="color: red" align="left">Hostel already booked by you</h3>
				<?php }
				else{
							echo "";
							}			
							?>	 	
<div class="form-group">
<label class="col-sm-4 control-label"><h4 style="color: green" align="left">Room Related info </h4> </label>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Room no. </label>
<div class="col-sm-8">
<select name="room" id="room"class="form-control"  onChange="getSeater(this.value);" onBlur="checkAvailability()" required> 
<option value="">Select Room</option>
<?php $query ="SELECT * FROM rooms";
$stmt2 = $mysqli->prepare($query);
$stmt2->execute();
$res=$stmt2->get_result();
while($row=$res->fetch_object())
{
?>
<option value="<?php echo $row->room_no;?>"> <?php echo $row->room_no;?></option>
<?php } ?>
</select> 


</div>
</div>
											

<div class="form-group">
<label class="col-sm-2 control-label">Email</label>
<div class="col-sm-8">
<input type="text" name="email" id="email"  class="form-control"  >
</div>
</div>



<?php	
$aid=$_SESSION['id'];
	$ret="select * from userregistration where id=?";
		$stmt= $mysqli->prepare($ret) ;
	 $stmt->bind_param('i',$aid);
	 $stmt->execute() ;//ok
	 $res=$stmt->get_result();
	 //$cnt=1;
	   while($row=$res->fetch_object())
	  {
	  	?>


<?php } ?>


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
<script type="text/javascript">
	$(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                $('#paddress').val( $('#address').val() );
                $('#pcity').val( $('#city').val() );
                $('#pstate').val( $('#state').val() );
                $('#ppincode').val( $('#pincode').val() );
            } 
            
        });
    });
</script>
	<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'roomno='+$("#room").val(),
type: "POST",
success:function(data){
$("#room-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>


<script type="text/javascript">

$(document).ready(function() {
	$('#duration').keyup(function(){
		var fetch_dbid = $(this).val();
		$.ajax({
		type:'POST',
		url :"ins-amt.php?action=userid",
		data :{userinfo:fetch_dbid},
		success:function(data){
	    $('.result').val(data);
		}
		});
		

})});
</script>

</html>