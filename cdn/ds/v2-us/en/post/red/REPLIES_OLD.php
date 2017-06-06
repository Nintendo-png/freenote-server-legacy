<html>
	<head>
		<title>Opinions</title>
		<meta name="uppertitle" content="Opinions">
		<meta name="uppersubtop" content="Whatd'ya Think?">
		<link rel="stylesheet" type="text/css" href="http://cdn.freenote.xyz/ds/v2-us/en/css/meta.css">
		<meta name="commentbutton" content="http://cdn.freenote.xyz/ds/v2-us/en/post/opinions/comment.reply">
		<meta name="favoritebutton" content="http://cdn.freenote.xyz/ds/v2-us/en/post/opinions/replies.htm">
	</head>
	<body>
		<div class="container">
			<?php
			
				$results = scandir('../opinions/');
				$results = array_reverse($results);

				foreach ($results as $result) {
					if(substr($result,-3)=="ppm"){
						echo '
			<br><div class="cmnt-gbox">
				'.exec('py C:\Gauched\projects\Websites\Freenote\cdn\ds\v2-us\en\post\opinions\namefetch.py '.$result).'<br><br>
				<a href="http://cdn.freenote.xyz/ds/v2-us/en/post/opinions/'.$result.'"><img src="http://cdn.freenote.xyz/ds/v2-us/en/post/opinions/'.substr($result,0,-3).'tmb" width="64" height="48"/></a>
			</div><br>';			
					}
				}
			?>
		</div>
	</body>
</html>