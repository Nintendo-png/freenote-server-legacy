<?php
	$discordlink = "discord.gg/7ApPHvb";
	$GLOBALS['discordlink'] = $discordlink;
	$facebooklink = "facebook.com/groups/freenoteserver/";
	$GLOBALS['facebooklink'] = $facebooklink;
	$chatmessage = "Join the Freenote Discord!<br>".$discordlink;
	$GLOBALS['chatmessage'] = $chatmessage;
	$cdnurl = "http://cdn.freenote.xyz/";
	$GLOBALS['cdnurl'] = $cdnurl;
	$internalurl = "http://192.168.1.139/";
	$GLOBALS['internalurl'] = $internalurl;
	$cdnpath = 'C:\\Gauched\\projects\\Websites\\Freenote\\cdn\\';
	$GLOBALS['cdnpath'] = $cdnpath;
	$admins = ["Gauched (5D61CC806EE17DEF)", "5D61CC806EE17DEF", "Tyler (5BCA04206511F31D)", "5BCA04206511F31D", "Gauched (5AE98BF01E18F02E)", "5AE98BF01E18F02E", "Devil~ (57D504F0A0BEED0E)", "57D504F0A0BEED0E", "Cubetrap (546FDA1051760C78)", "546FDA1051760C78"];
	$GLOBALS['admins'] = $admins;
	$mods = ["Keita (50F13960005309EF)", "50F13960005309EF"];
	$GLOBALS['mods'] = $mods;
	$dumbmods = ["camichu8 (5D6A9640C58FA63B)", "5D6A9640C58FA63B", "Thomas (5CEA05E0A0BE5FF6)", "5CEA05E0A0BE5FF6"];
	$GLOBALS['dumbmods'] = $dumbmods;
	$banned = [];
	$GLOBALS['banned'] = $banned;
	
	
	
	function genNews($title, $date, $author, $content){
		echo '<html>
			<head>
				<title>'.$date.'</title>
				<meta name="uppertitle" content="Announcement">
				<meta name="uppersubtop" content="'.$title.'">
				<meta name="uppersubleft" content="'.$author.'">
				<meta name="uppersubright" content="'.$date.'">
				<link rel="stylesheet" type="text/css" href="'.$GLOBALS['cdnurl'].'ds/v2-us/en/css/meta.css">
			</head>
			<body>
				<div class="container">
					<div class="news-title" align="center">'.$title.'</div>
					<div class="news-body">
						<p>'.$content.'
						<br><br>
						- '.$author.'</p>
					</div>
				</div>
			</body>
		</html>';
	}
	
	function creatorsRoom($uinfo){
		$unexpectedbr = "";
		if($themedir=="devil"){$unexpectedbr="<br/>";}
		echo '
		<div class="head" align="center">
			<img src="http://flipnote.hatena.com/ds/v2-us/en/themes/'.$themedir.'/head.ntft" width="218" height="12">
			<div class="prof_out">
				<table width="216" border="0" cellspacing="0" cellpadding="0" class="profbox">
					<!-- alignment table -->
					<tr>
						<td width="6"></td>
						<td width="50"></td>
						<td width="116"></td>
						<td width="32"></td>
					</tr>
					<tr>
						<td rowspan="4"></td>
						<!-- profile icon -->
						<td rowspan="4">
							<div class="icon" width="50">
								<img src="http://flipnote.hatena.com/ds/v2-us/en/themes/'.$themedir.'/item.ntft" width="48" height="48">
							</div>
						</td>
						<td></td>
						<!-- badge -->
						<td rowspan="2" align="right">
						</td>
					</tr>
					<tr>
						<!-- username -->
						<td class="username">
							<img src="http://flipnote.hatena.com/ds/v2-us/en/css/spacer.npf" width="3" height="1">
							'.$themename.'
						</td>
					</tr>
					<tr>
						<!-- fan count -->
						<td>
							<img src="http://flipnote.hatena.com/ds/v2-us/en/css/spacer.npf" width="3" height="1">
							<img src="http://flipnote.hatena.com/ds/v2-us/en/css/fans.ntft" width="12" height="12">
							<a href="#"><span class="more-f">Fans: &gt;240</span></a>
						</td>
					</tr>
					<tr>
						<!-- star count -->
						<td colspan="2">
							<div>
								<img src="http://flipnote.hatena.com/ds/v2-us/en/css/spacer.npf" width="3" height="1">
								<span class="star0c">★ 10</span>
								<span class="star1c">★ 10</span>
								<span class="star2c">★ 10</span>
								<span class="star3c">★ 10</span>
								<span class="star4c">★ 10</span>
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="4"></td>
					</tr>
				</table>
			</div>
			<img src="http://flipnote.hatena.com/ds/v2-us/en/themes/'.$themedir.'/foot.ntft" width="218" height="5">

			<div class="send" align="center">
				<a href="#">
					<img src="http://flipnote.hatena.com/ds/v2-us/en/themes/'.$themedir.'/send.ntft" width="218" height="32">
				</a>
				<table align="center" class="send">
					<tr>
						<td width="66" align="center">
							<div class="icon">
								<a href="http://flipnote.hatena.com/ds/v2-us/en/flips/Y8F02E_0FF70D6F3D969_000.ppm">
									<img height="48" src="http://flipnote.hatena.com/ds/v2-us/en/flips/Y8F02E_0FF70D6F3D969_000.tmb" width="64">
								</a>
							</div>
						</td>
						<td width="6"></td> 	
						<td width="66" align="center">
							<div class="icon">
								<a href="http://flipnote.hatena.com/ds/v2-us/en/flips/Y8F02E_0FF70D6F3D969_000.ppm">
									<img height="48" src="http://flipnote.hatena.com/ds/v2-us/en/flips/Y8F02E_0FF70D6F3D969_000.tmb" width="64">
								</a>
							</div>
						</td>
						<td width="6"></td> 	
						<td width="66" align="center">
							<div class="icon">
								<a href="http://flipnote.hatena.com/ds/v2-us/en/flips/Y8F02E_0FF70D6F3D969_000.ppm">
									<img height="48" src="http://flipnote.hatena.com/ds/v2-us/en/flips/Y8F02E_0FF70D6F3D969_000.tmb" width="64">
								</a>
							</div>
						</td>
						<td width="7"></td> 
					</tr>
				</table>
			</div>
			
			<!-- details table -->
			<table width="226" border="0" cellspacing="0" cellpadding="0" class="detail">
				<tr>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td colspan="2">
						<div class="hr"></div>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<div class="item-term" align="left">Theme</div>
						<table width="216" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="4"></td>
								<td>
									<div class="item-term" align="left">
										<a>'.$themename.'</a>
									</div>
									<div class="item-term" align="left"></div>
								</td>
								<td width="50">
									<div class="icon" width="50">
										<img src="http://flipnote.hatena.com/ds/v2-us/en/themes/'.$themedir.'/item.ntft" width="48" height="48">		
									</div>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<div class="hr"></div>
					</td>
				</tr>
				<tr>
					<th>
						<div class="item-term" align="left">Theme name</div>
					</th>
					<td>
						<div class="item-value" align="right">'.$themename.'</div>
					</td>
				</tr>
				<tr><td colspan="2"><div class="hr"></div></td></tr>
				<tr>
					<th>
						<div class="item-term" align="left">Theme creator</div>
					</th>
					<td>
						<div class="item-value" align="right">'.$themecreator.'</div>
					</td>
				</tr>
				<tr><td colspan="2"><div class="hr"></div></td></tr>
				<tr>
					<th>
						<div class="item-term" align="left">Theme price</div>
					</th>
					<td>
						<div class="item-value" align="right">
							<span class="star1c">★ '.(string)$themecost[0].'</span>
							<span class="star2c">★ '.(string)$themecost[1].'</span>'.$unexpectedbr.'
							<span class="star3c">★ '.(string)$themecost[2].'</span>
							<span class="star4c">★ '.(string)$themecost[3].'</span>
						</div>
					</td>
				</tr>
				<tr><td colspan="2"><div class="hr"></div></td></tr>
			</table>
			<div class="error-message" align="center">
				Error:<br/>
				Not enough color stars.<br/>
				(You have <span class="star1c">★ 0</span><span class="star2c">★ 0</span><span class="star3c">★ 0</span><span class="star4c">★ 0</span>)
			</div>
			<div class="pad5t"></div>
		</div>';
	}
?>