<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
			
				<li class="ts-label">Menu</li>
				<?PHP if(isset($_SESSION['id']))
				{ ?>
					<li><a href="dashboard.php"><i class="fa fa-desktop"></i>Dashboard</a></li>
					<li><a href="my-profile.php"><i class="fa fa-user"></i>Profile</a></li>
					<li><a href="book-hostel.php"><i class="fa fa-hotel"></i>Booking Room</a></li>
					<li><a href="room-details.php"><i class="glyphicon glyphicon-list-alt"></i>Room Details</a></li>
					
					<li><a href="dining.php"><i class="glyphicon glyphicon-cutlery"></i>Dining</a></li>
					<li><a href="rent.php"><i class="fa fa-money"></i>Rent</a></li>
				<?php } else { ?>
				<li><a href="index1.php"><i class="glyphicon glyphicon-home"></i> Home</a></li>
				<li><a href="registration.php"><i class="	glyphicon glyphicon-registration-mark"></i> User Registration</a></li>
				<li><a href="index.php"><i class="fa fa-users"></i> User Login</a></li>
				<li><a href="admin"><i class="fa fa-user"></i> Admin Login</a></li>
				<li><a href="gallery.php"><i class="glyphicon glyphicon-picture"></i>Gallery</a></li>
				<li><a href="about.php"><i class="fa fa-files-o"></i>About</a></li>
				<li><a href="contact.php"><i class="glyphicon glyphicon-earphone"></i>Contacts</a></li>
				

				<?php } ?>

			</ul>
		</nav>