<?php
    header("Content-type: text/plain; charset: UTF-16LE");
	$tos = "download text";
	echo mb_convert_encoding($tos, "UTF-16LE");
?>