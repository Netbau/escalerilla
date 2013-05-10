<?php
include(dirname(__FILE__).'/cropImage.php');
include(dirname(__FILE__).'/transformarDesafios.php');
$src = '../img/usuarios/DSC05344.jpg';
//echo "<img src='$src'>";
$image = new cropImage;
$image->setImage($src);
$image->createThumb();
$image->renderImage();

echo "<img src='$image'>";
?>
