<?php
/**
 * 
 */
function _code(){
	$_rnd_num = 4;
for($i = 0; $i < $_rnd_num; $i ++) {
	$_nmsg .= dechex ( mt_rand ( 0, 15 ) );
}
$_SESSION ['code'] = $_nmsg;

$_width = 75;
$_height = 25;
$_img = imagecreatetruecolor ( $_width, $_height );
$_white = imagecolorallocate ( $_img, 255, 255, 255 );
imagefill ( $_img, 0, 0, $_white );
$_black = imagecolorallocate ( $_img, mt_rand ( 0, 255 ), mt_rand ( 0, 255 ), mt_rand ( 0, 255 ) );
imagerectangle ( $_img, 0, 0, $_width - 1, $_height - 1, $_black );
for($i = 0; $i < 6; $i ++) {
	$_rnd_color = imagecolorallocate ( $_img, mt_rand ( 0, 255 ), mt_rand ( 0, 255 ), mt_rand ( 0, 255 ) );
	imageline ( $_img, mt_rand ( 0, $_width ), mt_rand ( 0, $_height ), mt_rand ( 0, $_width ), mt_rand ( 0, $_height ), $_rnd_color );
}
for($i = 0; $i < 20; $i ++) {
	$_rnd_color = imagecolorallocate ( $_img, mt_rand ( 150, 255 ), mt_rand ( 150, 255 ), mt_rand ( 150, 255 ) );
	imagestring ( $_img, 1, mt_rand ( 1, $_width ), mt_rand ( 1, $_height ), '*', $_rnd_color );
}
for($i = 0; $i < strlen ( $_SESSION ['code'] ); $i ++) {
	$_rnd_color = imagecolorallocate ( $_img, mt_rand ( 0, 160 ), mt_rand ( 0, 150 ), mt_rand ( 0, 160 ) );
	imagestring ( $_img, 5, $i * $_width / $_rnd_num + mt_rand ( 1, 10 ), mt_rand ( 1, $_height / 2 ), $_SESSION ['code'] [$i], $_rnd_color );
}
header ( 'Content-Type:image/png' );
imagepng ( $_img );
imagedestroy ( $_img );
	
	
}

?>