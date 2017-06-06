<?php
	$fp = @fopen("db.txt", 'r'); 
	if ($fp) {
		$results = explode("^", fread($fp, filesize("db.txt")));
	}
	require($_SERVER['DOCUMENT_ROOT']."/ds/v2-us/variables.php");
	require($_SERVER['DOCUMENT_ROOT']."/ds/v2-us/sudomemo-utils/class.ppmParser.php");
?>
<html>
	<head>
		<title>red Chat</title>
		<meta name="uppertitle" content="red Chat">
		<meta name="uppersubtop" content="<?php echo sizeof($results); ?> Messages">
		<meta name="upperlink" content="<?php echo $cdnurl; ?>ds/v2-us/en/images/pages/chat/redchatbg.nbf">
		<link rel="stylesheet" type="text/css" href="<?php echo $cdnurl; ?>ds/v2-us/en/css/meta.css">
		<meta name="commentbutton" content="<?php echo $cdnurl; ?>ds/v2-us/en/post/red/comment.reply">
		<meta name="favoritebutton" content="<?php echo $cdnurl; ?>ds/v2-us/en/post/red/replies.htm">
	</head>
	<body>
		<div class="container">
			<br><?php echo $chatmessage; ?><br><br><?php
				if(isset($_GET['page'])){
					echo '<a href="'.$cdnurl.'ds/v2-us/en/post/red/replies.htm?page='.((int)$_GET["page"]+1).'">Previous Page</a>';
				} else{
					echo '<a href="'.$cdnurl.'ds/v2-us/en/post/red/replies.htm?page=2">Previous Page</a>';
				}
				if(isset($_GET['page'])){
					if($_GET['page']!="1"){
						echo ' | <a href="'.$cdnurl.'ds/v2-us/en/post/red/replies.htm?page='.((int)$_GET["page"]-1).'">Next Page</a>';
					}
				}
			?>
			<?php
				if(isset($_GET['page'])){
					$page=(int)$_GET['page'];
				}else{
					$page=1;
				}
				
				$ln = ($page-1)*5;
				$hn = 5;
				#echo "Page: ".$page."<br>LN: ".$ln."<br>HN: ".$hn;
				
				#print_r($results);
				
				#echo "<br><br>-------<br><br>";
				
				$results = array_slice($results, $ln, $hn);
				
				#print_r($results);

				foreach ($results as $result) {
					if(substr($result,-3)=="ppm"){
						#$name = exec('py '.$cdnpath.'ds\v2-us\en\post\red\namefetch.py '.$result);
						#$name = str_replace('"', "™", $name);
						#$name = str_replace('*&#', "", $name);
						$ppm = new ppmParser;
						$ppm->open($result);
						$name = $ppm->getMeta()["current"]["author_name"]." (".$ppm->getMeta()["current"]["author_ID"].")";
						if(in_array($name, $admins)){
							$box = "cmnt-obox";
						}elseif(in_array($name, $mods)){
							$box = "cmnt-bbox";
						}elseif(in_array($name, $dumbmods)){
							$box = "cmnt-pbox";
						}else{
							$box = "cmnt-gbox";
						}
						echo '
			<br><div class="'.$box.'">
				'.$name.'<br>
				<a href="'.$cdnurl.'ds/v2-us/en/post/red/'.$result.'"><img src="'.$cdnurl.'ds/v2-us/en/post/red/'.substr($result,0,-3).'tmb" width="64" height="48"/></a>
			</div>';
						unset($comment);
					}
				}
			?>
			<?php
				if(isset($_GET['page'])){
					echo '<a href="'.$cdnurl.'ds/v2-us/en/post/red/replies.htm?page='.((int)$_GET["page"]+1).'">Previous Page</a>';
				} else{
					echo '<a href="'.$cdnurl.'ds/v2-us/en/post/red/replies.htm?page=2">Previous Page</a>';
				}
				if(isset($_GET['page'])){
					if($_GET['page']!="1"){
						echo ' | <a href="'.$cdnurl.'ds/v2-us/en/post/red/replies.htm?page='.((int)$_GET["page"]-1).'">Next Page</a>';
					}
				}
			?><br>
		</div>
	</body>
</html>