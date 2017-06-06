<?php
    header("Content-type: text/plain; charset: UTF-16LE");
	$tos = file_get_contents('./eulacontent.txt', true);
	echo mb_convert_encoding($tos, "UTF-16LE");
?>