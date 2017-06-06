<?php
    header("Content-type: text/plain; charset: UTF-16LE");
	$tos = "Freenote Beta Server\nCrap by Gauched\nAuthentication Testing\nKill me.";
	echo mb_convert_encoding($tos, "UTF-16LE");
?>