<?php
header ('Content-Type: image/png');
$im = @imagecreatetruecolor(1000, 1000);
$linecolor = imagecolorallocate($im, 233, 14, 91);
for($x = 1;$x <= 999;$x++){
   $y = pow($x, 0.5);
   $py = $y;
   $px = $x;
   imageline($im, $px, $py, $x, $y, $linecolor);
}
imagepng($im);
imagedestroy($im);
?>

