<?php
	require($_SERVER['DOCUMENT_ROOT']."/ds/v2-us/variables.php");
	require($_SERVER['DOCUMENT_ROOT']."/ds/v2-us/sudomemo-utils/class.ugomenu.php");
	$mainMenu = new ugomenu;
	$mainMenu->setType("34");

	$mainMenu->setMeta("uppertitle", "Channels");
	$mainMenu->setMeta("uppersubtop", "Pick a channel, any channel!");
	
	$mailpath = 'en/mail/';
	$results = scandir($mailpath);
	foreach ($results as $result) {
		if(is_file($mailpath.$result)==1){
			$latest=$cdnurl."ds/v2-us/en/mail/".substr($result,0,-3)."htm";
		}
	}
	
	$mainMenu->addItem([
		"label" => "General",
		"url"   => $cdnurl."ds/v2-us/en/channels/1/list.uls"
	]);

	$mainMenu->addItem([
		"label" => "Audio",
		"url"   => $cdnurl."ds/v2-us/en/channels/2/list.uls"
	]);

	$mainMenu->addItem([
		"label" => "Re-uploads",
		"url"   => $cdnurl."ds/v2-us/en/channels/3/list.uls"
	]);

	$mainMenu->addItem([
		"label" => "Filth",
		"url"   => $cdnurl."ds/v2-us/en/channels/4/list.uls"
	]);

	$mainMenu->addItem([
		"label" => "Historic",
		"url"   => $cdnurl."ds/v2-us/en/channels/5/list.uls"
	]);

	$mainMenu->addItem([
		"label" => "Sprites",
		"url"   => $cdnurl."ds/v2-us/en/channels/6/list.uls"
	]);

	$mainMenu->addItem([
		"label" => "Stickfights",
		"url"   => $cdnurl."ds/v2-us/en/channels/7/list.uls"
	]);

	$mainMenu->addItem([
		"label" => "Monthly Topics",
		"url"   => $cdnurl."ds/v2-us/en/channels/8.uls"
	]);
	
	echo $mainMenu->getUGO();

?>