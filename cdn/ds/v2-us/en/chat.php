<?php
	require($_SERVER['DOCUMENT_ROOT']."/ds/v2-us/variables.php");
	$logged = "";
	$staff = 0;
	$sid = $_SERVER['HTTP_X_DSI_SID'];

	$results = scandir('auth/');

	foreach ($results as $result) {
		if(substr($result,0, -5)==$sid){
			$logged = file_get_contents('auth/'.$result);
			if(in_array($logged, array_merge($admins, $mods))){
				$staff = 1;
			}
		}
	}
	require($_SERVER['DOCUMENT_ROOT']."/ds/v2-us/sudomemo-utils/class.ugomenu.php");
	$mainMenu = new ugomenu;
	$mainMenu->setType("0");
	
	$mainMenu->setMeta("uppertitle", "Chatrooms");
	$mainMenu->setMeta("uppersubtop", "Talk to people!");
	
	$mainMenu->addItem([
		"label" => "Red Room",
		"url"   => $cdnurl."ds/v2-us/en/post/red/replies.htm",
		"icon"  => "105",
		"file"  => "images/icons/index/Chat.ntft"
	]);

	$mainMenu->addItem([
		"label" => "Green Room",
		"url"   => $cdnurl."ds/v2-us/en/post/green/replies.htm",
		"icon"  => "106",
		"file"  => "images/icons/index/Chat.ntft"
	]);

	$mainMenu->addItem([
		"label" => "Blue Room",
		"url"   => $cdnurl."ds/v2-us/en/post/blue/replies.htm",
		"icon"  => "107",
		"file"  => "images/icons/index/Chat.ntft"
	]);

	$mainMenu->addItem([
		"label" => "Opinions Room",
		"url"   => $cdnurl."ds/v2-us/en/post/opinions/replies.htm",
		"icon"  => "108",
		"file"  => "images/icons/index/Chat.ntft"
	]);

	if($staff==1){
		$mainMenu->addItem([
			"label" => "Staff Room",
			"url"   => $cdnurl."ds/v2-us/en/post/staff/replies.htm",
			"icon"  => "109",
			"file"  => "images/icons/index/Chat.ntft"
		]);
	}
	
	echo $mainMenu->getUGO();

?>