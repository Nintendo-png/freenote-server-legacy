<?php
	require($_SERVER['DOCUMENT_ROOT']."/ds/v2-us/variables.php");
	require($_SERVER['DOCUMENT_ROOT']."/ds/v2-us/sudomemo-utils/class.ppmParser.php");
	
	$logged = "";
	$sid = $_SERVER['HTTP_X_DSI_SID'];

	$results = scandir('../../auth/');

	foreach ($results as $result) {
		if(substr($result,0, -5)==$sid){
			$logged = file_get_contents('../../auth/'.$result);
		}
	}
	
	if($logged!=""){
		$cmt = file_get_contents('php://input');
		$file = (string)rand(1,200);
		file_put_contents($file, $cmt);
		#$rfn=exec('py C:\Gauched\projects\Websites\Freenote\cdn\ds\v2-us\en\channels\1\filenamer.py '.$file);
		$ppm = new ppmParser;
		$ppm->open($file);
		$filename = $ppm->getMeta()["current"]["filename"];
		$info = file_get_contents("default.info");
		file_put_contents($filename.".info", $info);
		file_put_contents($filename.".ppm", $cmt);
		$rfn = $filename.".ppm";
		$ppm->close();
		unlink($file);
		$inpt=file_get_contents("db.txt");
		$ninput=$rfn."^".$inpt;
		file_put_contents("db.txt", $ninput);
		$inpt2=file_get_contents("../masterdb.txt");
		$ninput2="1:".$rfn."^".$inpt2;
		file_put_contents("../masterdb.txt", $ninput2);
		echo '1696';
	}
?>