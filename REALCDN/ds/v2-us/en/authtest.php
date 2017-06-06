<?php
	if (isset($_SERVER['HTTP_X_AUTHTOKEN'])){
		$authtoken = $_SERVER['HTTP_X_AUTHTOKEN'];
	}else{
		$authtoken = "LOGGED OUT";
	}
?>

<html>
	<head>
		<title>FreeNote AuthTest</title>
		<link rel="stylesheet" type="text/css" href="http://cdn.freenote.xyz/ds/v2-us/en/css/meta.css">
		<meta name="uppertitle" content="FreeNote AuthTest">
		<meta name="uppersubbottom" content="Written by Gauched">
		<meta name="bgm" content="1">
	</head>
	<body>
		<div class="container">
			<div class="news-head" style="text-align: center">
				Login Test:
			</div>
			<div class="cmnt-gbox" align="center">
				You are logged in as <a href="#">[<?php echo $authtoken ?>]</a>
			</div>	
		</div>
	</body>
 </html>
