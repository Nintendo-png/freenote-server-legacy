<?php require($_SERVER['DOCUMENT_ROOT']."/ds/v2-us/variables.php"); ?>
<html>
	<head>
		<meta name="uppertitle" content="Channels">
		<link rel="stylesheet" type="text/css" href="<?php echo $cdnurl; ?>ds/v2-us/en/css/meta.css">
	</head>
	<body>
		<table class="fullpage">
			<tr><td rowspan="2">
				<table width="256">
					<tr>
						<!-- 1ch -->
						<td>
							<a href="<?php echo $cdnurl; ?>ds/v2-us/en/channels/1.uls">
								<img src="<?php echo $cdnurl; ?>ds/v2-us/en/css/spacer.npf" width="82" height="52">
							</a>
						</td>
						<!-- 2ch -->
						<td>
							<a href="<?php echo $cdnurl; ?>ds/v2-us/en/channels/2.uls">
								<img src="<?php echo $cdnurl; ?>ds/v2-us/en/css/spacer.npf" width="82" height="52">
							</a>
						</td>
						<!-- 3ch -->
						<td>
							<a href="<?php echo $cdnurl; ?>ds/v2-us/en/channels/3.uls">
								<img src="<?php echo $cdnurl; ?>ds/v2-us/en/css/spacer.npf" width="82" height="52">
							</a>
						</td>
					</tr>
					<tr>
						<!-- 4ch -->
						<td>
							<a href="<?php echo $cdnurl; ?>ds/v2-us/en/channels/4/list.uls">
								<img src="<?php echo $cdnurl; ?>ds/v2-us/en/css/spacer.npf" width="82" height="52">
							</a>
						</td>
						<!-- 5ch -->
						<td>
							<a href="<?php echo $cdnurl; ?>ds/v2-us/en/channels/5.uls">
								<img src="<?php echo $cdnurl; ?>ds/v2-us/en/css/spacer.npf" width="82" height="52">
							</a>
						</td>
						<!-- 6ch -->
						<td>
							<a href="<?php echo $cdnurl; ?>ds/v2-us/en/channels/6.uls">
								<img src="<?php echo $cdnurl; ?>ds/v2-us/en/css/spacer.npf" width="82" height="52">
							</a>
						</td>
					</tr>
					<tr>
						<!-- 7ch -->
						<td>
							<a href="<?php echo $cdnurl; ?>ds/v2-us/en/channels/7.uls">
								<img src="<?php echo $cdnurl; ?>ds/v2-us/en/css/spacer.npf" width="82" height="52">
							</a>
						</td>
						<!-- 8ch -->
						<td colspan="2">
							<a href="<?php echo $cdnurl; ?>ds/v2-us/en/channels/8.uls">
								<img src="<?php echo $cdnurl; ?>ds/v2-us/en/css/spacer.npf" width="168" height="52">
							</a>
						</td>
					</tr>
				</table>
			</td></tr>
		</table>
		<table class="fullpage">
			<tr><td rowspan="2">
				<table width="256">
					<tr>
						<!-- 1ch -->
						<td>
							<div class="chnl-item" align="center">General</div>
						</td>
						<!-- 2ch -->
						<td>
							<div class="chnl-item" align="center">Audio</div>
						</td>
						<!-- 3ch -->
						<td> 
							<div class="chnl-item" align="center">Re-uploads</div>
						</td>
					</tr>
					<tr>
						<!-- 4ch -->
						<td>
							<div class="chnl-item" align="center">Filth</div>
						</td>
						<!-- 5ch -->
						<td>
							<div class="chnl-item" align="center">Historic</div>
						</td>
						<!-- 6ch -->
						<td>
							<div class="chnl-item" align="center">Sprites</div>
						</td>
					</tr>
					<tr>
						<!-- 7ch -->
						<td>
							<?php #if($staff==0){echo '<div class="badges"><img src="'.$cdnurl.'ds/v2-us/en/css/lock.npf" width="16" height="16"> </div>';}?>
							<div class="chnl-item" align="center">Stickfights</div>
						</td>
						<!-- 8ch -->
						<td colspan="2">
							<div class="chnl-item" align="center">Monthly Topics</div>
						</td>
					</tr>
				</table>
			</td></tr>
		</table>
		<div class="fullpage">
			<img align="center" src="<?php echo $cdnurl; ?>ds/v2-us/en/css/channel-bg.npf" width="256" height="166">
		</div>
	</body>
</html>
