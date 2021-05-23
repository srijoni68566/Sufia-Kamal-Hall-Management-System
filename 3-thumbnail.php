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
<!DOCTYPE html>
<html>
  <head>
    <title>Simple PHP gallery</title>
    <link href="2-box.css" rel="stylesheet">
    <script src="3-thumbnail.js"></script>
  </head>
  <body>
    <!-- [LIGHTBOX] -->
    <div id="lfront"></div>
    <div id="lback"></div>

    <!-- [THE GALLERY] -->
    <div id="gallery"><?php
    foreach ($images as $i) {
      printf("<img src='thumbnail/%s' onclick='gallery.show(this)'/>", basename($i));
    }
    ?></div>
  </body>
</html>