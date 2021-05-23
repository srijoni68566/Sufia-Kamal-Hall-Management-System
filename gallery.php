<?php
// INIT
$dir = __DIR__ . DIRECTORY_SEPARATOR . "gallery" . DIRECTORY_SEPARATOR;
$tdir = __DIR__ . DIRECTORY_SEPARATOR . "thumbnail" . DIRECTORY_SEPARATOR;
$maxLong = 600; // maximum width or height, whichever is longer
$quality = 40;
$images = [];

// READ FILES FROM GALLERY FOLDER
$files = glob($dir . "*.{jpg,jpeg,gif,png}", GLOB_BRACE);

// CHECK AND GENERATE THUMBNAILS
foreach ($files as $f) {
  $img = basename($f);
  $images[] = $img;
  if (!file_exists($tdir . $img)) {
    list ($width, $height) = getimagesize($dir . $img);
    $ratio = $width > $height ? $maxLong / $width : $maxLong / $height ;
    $newWidth = ceil($width * $ratio);
    $newHeight = ceil($height * $ratio);
    $source = imagecreatefromjpeg($dir . $img);
    $destination = imagecreatetruecolor($newWidth, $newHeight);
    imagecopyresampled($destination, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
    imagejpeg($destination, $tdir . $img, $quality);
  }
}

// DRAW HTML ?>

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
	    <link href="2-box.css" rel="stylesheet">
    <script src="3-thumbnail.js"></script>
	<link rel="stylesheet" href="css/bootstrap.css">
	<title>User Hostel Registration</title>
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
   <style>


	 
   .container2 {
   padding-right: 30px;
   padding-left: 15px;
   margin-right: auto;
   margin-left: auto;
   max-width: 50000px;
   overflow:hidden;
   min-height:80px !important;
   background-color: #008B8B;
   padding: 55px;
   
   }
   .admintitle2{
		boder:0px solid #fff;padding:0px 40px;margin-top:3vh;
	margin-right:100px;
	margin-left:100px;
    margin-down:0px;
	
}

   }
   </style>
   
</head>

<body>
	

<div class="brand clearfix">
		<a href="#" class="logo" style="font-size:16px;">Sufia Kamal Hall</a>
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		
	</div>
	
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
			<div class="row">
  <div class="col-md-12">

         <!-- [LIGHTBOX] -->
    <div id="lfront"></div>
    <div id="lback"></div>

    <!-- [THE GALLERY] -->
    <div id="gallery"><?php
    foreach ($images as $i) {
      printf("<img src='thumbnail/%s' onclick='gallery.show(this)'/>", basename($i));
    }
    ?></div>
 
 
 
 

  </div>
</div>
							</div></div>
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