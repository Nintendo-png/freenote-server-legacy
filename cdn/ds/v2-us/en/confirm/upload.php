<?php
    header("Content-type: text/plain; charset: UTF-16LE");
	$tos = "Uploadin' to Freenote, huh?\n\nAlright, if you're in the right channel, 'yer good.\n\nRemember to follow the rules!\n\n(Also make sure you're logged in.)\n\nAll I have to say! *drops mic*\n\n-Gauched";
	echo mb_convert_encoding($tos, "UTF-16LE");
?>