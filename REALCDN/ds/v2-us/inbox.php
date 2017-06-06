<?php
	
	require($_SERVER['DOCUMENT_ROOT']."/ds/v2-us/sudomemo-utils/class.ugomenu.php");
	$mainMenu = new ugomenu;
	$mainMenu->setType("2");
	
	$mainMenu->addItem([
		"label" => "Auth",
		"url"   => "http://cdn.freenote.xyz/ds/v2-us/en/authtest.htm"
	]);
	
	echo $mainMenu->getUGO();

?>