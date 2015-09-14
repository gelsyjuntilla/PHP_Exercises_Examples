<?php

	putenv("GDFONTPATH=" . realpath('.'));

	$font = "courier";
	$size = isset($_GET['size']) ? $_GET['size'] : 20;
	$text = isset($_GET['text']) ? $_GET['text'] : '';
	$image = imagecreatefromjpeg("fig02.jpg");
	$black = imagecolorallocate($image, 0, 0, 0);

	if ($text) {
		// calculate position of text
		$tsize = imagettfbbox($size, 0, $font, $text);
		$dx = abs($tsize[2] - $tsize[0]);
		$dy = abs($tsize[5] - $tsize[3]);
		$x = (imagesx($image) - $dx ) / 2;
		$y = (imagesy($image) - $dy ) / 2 + $dy;
	}

	// draw text
	imagettftext($image, $size, 0, $x, $y, $black, $font, $text);
	header("Content-Type: image/jpeg");
	imagejpeg($image);
?>