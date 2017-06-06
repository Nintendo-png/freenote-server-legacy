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
		#$rfn=exec('py C:\Gauched\projects\Websites\Freenote\cdn\ds\v2-us\en\post\blue\filenamer.py '.$file);
		$ppm = new ppmParser;
		$ppm->open($file);
		$rfn = $ppm->getMeta()["current"]["filename"];
		$inpt=file_get_contents("db.txt");
		$ninput=$rfn.".ppm^".$inpt;
		file_put_contents($rfn.".tmb",$ppm->getTMB());
		file_put_contents($rfn.".ppm",$cmt);
		file_put_contents("db.txt", $ninput);
		unset($ppm);
		unlink($file);
		echo '1696';
	}
?>