<?php
	require($_SERVER['DOCUMENT_ROOT']."/ds/v2-us/variables.php");
	require($_SERVER['DOCUMENT_ROOT']."/ds/v2-us/sudomemo-utils/class.ppmParser.php");
	$cmt = file_get_contents('php://input');
	$file = (string)rand(1,200);
	file_put_contents($file, $cmt);
	#$rdt=exec('py C:\Gauched\projects\Websites\Freenote\cdn\ds\v2-us\en\auth\fsid-nameinit.py '.$file);
	#$rdt = str_replace('"', "™", $rdt);
	#$dta = explode('^', $rdt);
	$ppm = new ppmParser;
	$ppm->open($file);
	$initnme = $ppm->getMeta()["current"]["author_name"];
	$initfsid = $ppm->getMeta()["current"]["author_ID"];
	$ppm->close();
	unlink($file);
	if(!in_array($initfsid, $banned)){
		$hdr = $_SERVER['HTTP_X_DSI_SID'];
		if (!file_exists($initfsid.".txt")) {
			$initfile = fopen($initfsid.".txt", "w") or die("ARE YOU SHITTING MY DICK?!");
			fwrite($initfile, $initnme);
			fclose($initfile);
		}
		if($hdr != ""){
			$um = fopen($hdr.".sess", "w") or die("FUCKING FILE FUCKED UP!");
			fwrite($um, $initfsid);
			fclose($um);
		}
	}
	echo '1696';
?>