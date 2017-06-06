<?php
	$cmt = file_get_contents('php://input');
	$file = 'bunghole.ppm';
	file_put_contents($file, $cmt);
	echo '1696'
?>