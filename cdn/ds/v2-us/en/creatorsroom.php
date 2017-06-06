<?php require($_SERVER['DOCUMENT_ROOT']."/ds/v2-us/variables.php"); ?>
<?php
	$logged = "";
	$sid = $_SERVER['HTTP_X_DSI_SID'];

	$results = scandir('auth/');

	foreach ($results as $result) {
		if(substr($result,0, -5)==$sid){
			$logged = file_get_contents('auth/'.$result);
			$name = file_get_contents('auth/'.$logged.'.txt');
			$name = str_replace('"', "™", $name);
			$name = str_replace('*&#', "", $name);
		}
	}
?>
<html>
	<head>
		<title>Login</title>
		<meta name="uppertitle" content="Login">
		<meta name="uppersubtop" content="Creators Room">
		<?php if($logged==""){echo '<meta name="commentbutton" content="'.$cdnurl.'ds/v2-us/en/auth/login.reply">';}?>
		<link rel="stylesheet" type="text/css" href="<?php echo $cdnurl; ?>ds/v2-us/en/css/meta.css">
	</head>
	<body>
		<div class="container">
			<?php
				if($logged==""){
					echo '<div class="cmnt-rbox" align="center">
						<br><br><br><br><br>
						You aren\'t logged in yet.<br>
						Please write a comment to log in!<br>
						Log in to gain Creators Room access.
						<br><br><br><br><br><br>
					</div>';
				}else{
					echo '<div class="cmnt-gbox" align="center">
						<br><br><br><br><br>
						Hello '.$name.'!<br>
						<a href="">[Creators Room]</a><br>
						FSID: '.$logged.'
						<br><br><br><br><br><br>
					</div>';
				}
			?>
		</div>
	</body>
</html>