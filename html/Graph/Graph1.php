<?php
header ('Content-Type: image/png');
$graph = imagecreatetruecolor(1000,1000);

return imageline($graph, 1, 1, 999, 999, $red);

imagepng($graph);
imagedestroy($graph);



?>