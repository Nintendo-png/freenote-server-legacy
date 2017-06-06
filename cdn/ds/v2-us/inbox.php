<?php
	require($_SERVER['DOCUMENT_ROOT']."/ds/v2-us/variables.php");
	require($_SERVER['DOCUMENT_ROOT']."/ds/v2-us/sudomemo-utils/class.ugomenu.php");
	$mainMenu = new ugomenu;
	$mainMenu->setType("2");
	$mainMenu->setMeta("uppertitle", "News & Mail");
	$mainMenu->setMeta("uppersubtop", "Updates & Stuff");
	$mainMenu->setMeta("uppersubbottom", "(Yes, I know it says \"Mail\")");

	$mailpath = 'en/mail/';
	$results = scandir($mailpath);
	$results = array_reverse($results);

	foreach ($results as $result) {
		if(is_file($mailpath.$result)==1){
			$truename = substr($result,0,-3)."htm";
			$mailcontent2parse=file_get_contents($internalurl."ds/v2-us/en/mail/".$truename);
			$truetitle=explode("</title>",$mailcontent2parse);
			$truetitle=explode("<title>",$truetitle[0]);
			$truetitle=$truetitle[1];
			
			$mainMenu->addItem([
				"label" => $truetitle,
				"icon" => "2",
				"url"   => $cdnurl."ds/v2-us/en/mail/".$truename
			]);
		}
	}
	
	echo $mainMenu->getUGO();

?>