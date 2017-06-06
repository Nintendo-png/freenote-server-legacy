<?php
	
	require($_SERVER['DOCUMENT_ROOT']."/ds/v2-us/sudomemo-utils/class.ugomenu.php");
	$mainMenu = new ugomenu;
	$mainMenu->setType("0");

	$mainMenu->addItem([
		"label" => "BadLogin",
		"url"   => "http://cdn.freenote.xyz/ds/v2-us/en/badlogin.htm",
		"icon"  => "104"
	]);
	
	$mainMenu->addItem([
		"label" => "AuthTest",
		"url"   => "http://cdn.freenote.xyz/ds/v2-us/en/authtest.htm",
		"icon"  => "105"
	]);

	$mainMenu->addItem([
		"label" => "Chat",
		"url"   => "http://cdn.freenote.xyz/ds/v2-us/en/chat.htm",
		"icon"  => "106"
	]);
	
	echo $mainMenu->getUGO();

?>