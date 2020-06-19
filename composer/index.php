<?php

// include composer autoload
require 'vendor/autoload.php';

// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

$extention = 'jpg';
$a = 130;
$b = 245;

// open an image file
$img = Image::make('../assets/img/Aquaman (2018).'.$extention);

// now you are able to resize the instance
$img->resize($a, $b);

// and insert a watermark for example
// $img->insert('public/watermark.png');

// finally we save the image as a new file
$img->save('../assets/img/resize/Aquaman (2018)'.$a.'-'.$b.'.'.$extention);
echo "<img src='../assets/img/resize/Aquaman (2018)$a-$b.$extention'>";