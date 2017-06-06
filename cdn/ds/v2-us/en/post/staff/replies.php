<?php
	$fp = @fopen("db.txt", 'r'); 
	if ($fp) {
		$results = explode("^", fread($fp, filesize("db.txt")));
	}
	require($_SERVER['DOCUMENT_ROOT']."/ds/v2-us/variables.php");
	require($_SERVER['DOCUMENT_ROOT']."/ds/v2-us/sudomemo-utils/class.ppmParser.php");
	$logged = "";
	$staff = 0;
	$sid = $_SERVER['HTTP_X_DSI_SID'];
	if($sid!=""){
		foreach ($results as $result) {
			if(substr($result,0, -5)==$sid){
			$logged = file_get_contents('../../auth/'.$result);
				if(in_array($logged, array_merge($admins, $mods))){
					$staff = 1;
					break;
				}
			}
		}
	}else{
		$staff = 0;
		break;
	}
?>
<html>
	<head>
		<title>Staff Chat</title>
		<meta name="uppertitle" content="Staff Chat">
		<meta name="uppersubtop" content="<?php echo sizeof($results); ?> Messages">
		<link rel="stylesheet" type="text/css" href="<?php echo $cdnurl; ?>ds/v2-us/en/css/meta.css">
		<meta name="commentbutton" content="<?php echo $cdnurl; ?>ds/v2-us/en/post/staff/comment.reply">
		<meta name="favoritebutton" content="<?php echo $cdnurl; ?>ds/v2-us/en/post/staff/replies.htm">
	</head>
	<body>
		<div class="container">
			<br><?php echo $chatmessage; ?><br><br><?php
				if(isset($_GET['page'])){
					echo '<a href="'.$cdnurl.'ds/v2-us/en/post/staff/replies.htm?page='.((int)$_GET["page"]+1).'">Previous Page</a>';
				} else{
					echo '<a href="'.$cdnurl.'ds/v2-us/en/post/staff/replies.htm?page=2">Previous Page</a>';
				}
				if(isset($_GET['page'])){
					if($_GET['page']!="1"){
						echo ' | <a href="'.$cdnurl.'ds/v2-us/en/post/staff/replies.htm?page='.((int)$_GET["page"]-1).'">Next Page</a>';
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
						#$name = exec('py '.$cdnpath.'ds\v2-us\en\post\staff\namefetch.py '.$result);
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
				<a href="'.$cdnurl.'ds/v2-us/en/post/staff/'.$result.'"><img src="'.$cdnurl.'ds/v2-us/en/post/staff/'.substr($result,0,-3).'tmb" width="64" height="48"/></a>
			</div>';
						unset($comment);
					}
				}
			?>
			<?php
				if(isset($_GET['page'])){
					echo '<a href="'.$cdnurl.'ds/v2-us/en/post/staff/replies.htm?page='.((int)$_GET["page"]+1).'">Previous Page</a>';
				} else{
					echo '<a href="'.$cdnurl.'ds/v2-us/en/post/staff/replies.htm?page=2">Previous Page</a>';
				}
				if(isset($_GET['page'])){
					if($_GET['page']!="1"){
						echo ' | <a href="'.$cdnurl.'ds/v2-us/en/post/staff/replies.htm?page='.((int)$_GET["page"]-1).'">Next Page</a>';
					}
				}
			?><br>
		</div>
	</body>
</html>