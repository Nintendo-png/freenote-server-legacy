<?php
	require($_SERVER['DOCUMENT_ROOT']."/ds/v2-us/variables.php");
	require($_SERVER['DOCUMENT_ROOT']."/ds/v2-us/sudomemo-utils/class.ugomenu.php");
	$mainMenu = new ugomenu;
	$mainMenu->setType("1");
	$mainMenu->setMeta("uppertitle", "Monthly Topics");
	$mainMenu->setMeta("uppersubtop", "Not implemented yet.");

	$mainMenu->addItem([
		"label" => "Not",
		"url"   => $cdnurl."ds/v2-us/en/unused.htm"
	]);
	
	$mainMenu->addItem([
		"label" => "implemented",
		"url"   => $cdnurl."ds/v2-us/en/unused.htm"
	]);

	$mainMenu->addItem([
		"label" => "yet.",
		"url"   => $cdnurl."ds/v2-us/en/unused.htm"
	]);
	
	$mainMenu->addWeird([
		"odd"   => ""
	]);
	
	echo $mainMenu->getUGO();

?>