<?php
	$fp = @fopen("db.txt", 'r'); 
	if ($fp) {
		$results = explode("^", fread($fp, filesize("db.txt")));
	}
	require($_SERVER['DOCUMENT_ROOT']."/ds/v2-us/variables.php");

	require($_SERVER['DOCUMENT_ROOT']."/ds/v2-us/sudomemo-utils/class.ugomenu.php");
	$mainMenu = new ugomenu;
	$mainMenu->setType("2");
	$mainMenu->setMeta("uppertitle", "Filth Channel");
	$mainMenu->setMeta("uppersubtop", "Upload suggestive stuff here.");

	$mainMenu->addButton([
		"label" => "Post Flipnote",
		"url"   => $cdnurl."ds/v2-us/en/channels/1/post.post"
	]);
	
	if(isset($_GET['page'])){
		$page=(int)$_GET['page'];
		}else{
			$page=1;
		}
	
		$ln = ($page-1)*6;
		$hn = 12;
		#echo "Page: ".$page."<br>LN: ".$ln."<br>HN: ".$hn;
		
		#print_r($results);
		
		#echo "<br><br>-------<br><br>";
		
		$results = array_slice($results, $ln, $hn);
		
		#print_r($results);
	
		foreach ($results as $result) {
			if(substr($result,-3)=="ppm"){
				#$name = exec('py '.$cdnpath.'ds\v2-us\en\channels\4\fsidfetch.py '.$result);
				#$name = file_get_contents('../../auth/'.$name.'.txt');
				#$name = str_replace('"', "™", $name);
				#$name = str_replace('*&#', "", $name);	
				$mainMenu->addItem([
					"url"   => $cdnurl."ds/v2-us/en/channels/1/".$result,
					"icon"  => "3",
					"counter"=>"0",
					"file"  => $result,
					"fuckoff" => "1"
				]);
			}
		}

	echo $mainMenu->getUGO();

?>