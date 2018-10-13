<?php
/***************************************************************************
 * 
 * @subpackage 		maintenance_mode
 * @description 	Display site under maintenance via html with SEO
 * @author			Francisco Abayon
 * @url				https://aftabmuni.wordpress.com/2016/07/06/setup-maintenance-mode-using-hooks-in-codeigniter/
 * @url				http://www.roytuts.com/display-site-maintenence-message-using-codeigniter/
 * @version  		0.1.0
 * 
 ***************************************************************************/

header('HTTP/1.1 503 Service Temporarily Unavailable', true, 503);
header('Status: 503 Service Temporarily Unavailable');
header('Retry-After: 7200');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<title>Site Down For Maintenance</title>
	<!--link href="http://<?php echo $public_root; ?>/css/style.css" media="screen" rel="stylesheet" /-->
</head>
	<body>
		
		<div id="alert-bar">&nbsp;</div>
		<div class="wrapper">
			<div id="indicator">&nbsp;</div>
			<div class="width-limiter">
				<div id="logo">
					<!--a href="http://<?php echo $public_root; ?>"><img src="http://<?php echo $public_root; ?>/img/logo.jpg" alt="Community Auth"/></a-->
					<a href="xxx"><img src="xxxx" alt="Community Auth"/></a>
				</div>
				<div id="two-left" class="content">
					<h1><?php echo $heading; ?></h1>
					<p>
						<?php echo $message; ?>
						
					</p>
				</div>
				<div id="two-right">
					&nbsp;
				</div>
				<div class="push">&nbsp;</div>
			</div>
		</div>
		<div class="footer">
			<p>Copyright (c) 2011 - <?php echo date('Y'); ?> &bull; Francisco S. Abayon &bull; <a href="https://www.scarfonictech.com">Cocoy's Web Design - Cebu, PH</a></p>
		</div>
	</body>
</html>
<?php

/* End of file error_maintenance.php */
/* Location: ./application/views/errors/html/error_maintenance.php */