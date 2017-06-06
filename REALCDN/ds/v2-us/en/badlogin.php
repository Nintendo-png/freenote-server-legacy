<?php
	if (isset($_SERVER['HTTP_X_EMAIL_ADDR'])){
		$authtoken = $_SERVER['HTTP_X_EMAIL_ADDR'];
	}else{
		$authtoken = "LOGGED OUT";
	}
?>
<html>
	<head>
		<title>Bad Login</title>
		<link rel="stylesheet" type="text/css" href="http://cdn.freenote.xyz/ds/v2-us/en/css/meta.css">
		<meta name="uppertitle" content="Bad Login">
		<meta name="uppersubbottom" content="Admin: username@password">
		<meta name="bgm" content="1">
		<meta name="commentbutton" content="ugomemo://keyboard/en/badlogin.htm">
		<meta name="favoritebutton" content="http://cdn.freenote.xyz/ds/v2-us/en/badlogin.htm">
	</head>
	<body>
		<div class="container">
			<br/>Logged as:
			<?php
				echo $authtoken;
			?>
		</div>
	</body>
 </html>
