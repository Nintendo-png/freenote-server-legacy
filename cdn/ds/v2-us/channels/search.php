<?php
	require($_SERVER['DOCUMENT_ROOT']."/ds/v2-us/variables.php");
	require($_SERVER['DOCUMENT_ROOT']."/ds/v2-us/sudomemo-utils/class.ugomenu.php");
	$mainMenu = new ugomenu;
	$mainMenu->setType("3");

	$mainMenu->addItem([
		"label" => "no more channels",
		"url"   => $cdnurl."ds/v2-us/en/unused.htm"
	]);
	
	$mainMenu->addItem([
		"label" => "oh well...",
		"url"   => $cdnurl."ds/v2-us/en/unused.htm"
	]);
	
	echo $mainMenu->getUGO();

?>