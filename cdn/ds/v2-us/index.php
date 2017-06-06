<?php
	require($_SERVER['DOCUMENT_ROOT']."/ds/v2-us/variables.php");
	require($_SERVER['DOCUMENT_ROOT']."/ds/v2-us/sudomemo-utils/class.ugomenu.php");
	$mainMenu = new ugomenu;
	$mainMenu->setType("0");

	$mailpath = 'en/mail/';
	$results = scandir($mailpath);
	foreach ($results as $result) {
		if(is_file($mailpath.$result)==1){
			$latest=$cdnurl."ds/v2-us/en/mail/".substr($result,0,-3)."htm";
		}
	}
	
	$mainMenu->addItem([
		"label" => "Browse Flipnotes",
		"url"   => $cdnurl."ds/v2-us/en/browse.uls",
		"icon"  => "100"
	]);

	$mainMenu->addItem([
		"label" => "Channels",
		"url"   => $cdnurl."ds/v2-us/channels.uls",
		"icon"  => "105",
		"file"  => "en/images/icons/index/Channels.ntft"
	]);

	$mainMenu->addItem([
		"label" => "Announcement",
		"url"   => $latest,
		"icon"  => "106",
		"file"  => "en/images/icons/index/Announcement.ntft"
	]);

	$mainMenu->addItem([
		"label" => "Creator's Room",
		"url"   => $cdnurl."ds/v2-us/en/creatorsroom.htm",
		"icon"  => "106",
		"file"  => "en/images/icons/index/CreatorsRoom.ntft"
	]);

	$mainMenu->addItem([
		"label" => "Chat",
		"url"   => $cdnurl."ds/v2-us/en/chat.uls",
		"icon"  => "107",
		"file"  => "en/images/icons/index/Chat.ntft"
	]);

	$mainMenu->addItem([
		"label" => "FAQ",
		"url"   => $cdnurl."ds/v2-us/en/pages/faq.htm",
		"icon"  => "108",
		"file"  => "en/images/icons/index/FAQ.ntft"
	]);

	$mainMenu->addItem([
		"label" => "Staff",
		"url"   => $cdnurl."ds/v2-us/en/pages/staff.htm",
		"icon"  => "109",
		"file"  => "en/images/icons/index/Staff.ntft"
	]);
	
	echo $mainMenu->getUGO();

?>