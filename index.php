<!DOCTYPE html>
<HTML lang="pl">
<HEAD>

	<META charset="UTF-8">
    
	<SCRIPT src='lib/jquery/jquery.js'></SCRIPT>
	<SCRIPT src='lib/jquery-ui/jquery-ui.js'></SCRIPT>
	<SCRIPT src='lib/jquery-mask/jquery-mask.js'></SCRIPT>
	<SCRIPT src='modules/common/my.js'></SCRIPT>
	<SCRIPT src='lib/monthpicker/monthpicker.js'></SCRIPT>
	
	<link rel="stylesheet" type="text/css" href="lib/jquery-ui/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="lib/monthpicker/monthpicker.css">
		
	<link rel="stylesheet" type="text/css" href="modules/common/my.css">
	<link rel="stylesheet" type="text/css" href="modules/wyjscia/wyjscia.css">   	   		
	<link rel="stylesheet" type="text/css" href="modules/harmonogram/harmonogram.css">   		
	<link rel="stylesheet" type="text/css" href="modules/zdarzenia/zdarzenia.css">   		
	<link rel="stylesheet" type="text/css" href="modules/kartapracy/kartapracy.css">
	<link rel="stylesheet" type="text/css" href="modules/projekt/projekt.css">
	<link rel="stylesheet" type="text/css" href="modules/edycja/edycja.css">   	   		
	<link rel="stylesheet" type="text/css" href="modules/raporty/raporty.css">   	   		
		
	<SCRIPT src='modules/harmonogram/harmonogram.js'></SCRIPT>
	<SCRIPT src='modules/zdarzenia/zdarzenia.js'></SCRIPT>
	<SCRIPT src='modules/projekt/projekt.js'></SCRIPT>
	<SCRIPT src='modules/kartapracy/kartapracy.js'></SCRIPT>
	<SCRIPT src='modules/wyjscia/wyjscia.js'></SCRIPT>
	<SCRIPT src='modules/edycja/edycja.js'></SCRIPT>
	<SCRIPT src='modules/raporty/raporty.js'></SCRIPT>

</HEAD>

<?php

function get_client_ip(): string {
	$keys = ['HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'REMOTE_ADDR'];
	foreach ($keys as $key) {
		if (!empty($_SERVER[$key])) {
			$ipList = $_SERVER[$key];
			if ($key === 'HTTP_X_FORWARDED_FOR') {
				$parts = explode(',', $ipList);
				$ip = trim($parts[0]);
			} else {
				$ip = $ipList;
			}
			if (filter_var($ip, FILTER_VALIDATE_IP)) {
				return $ip;
			}
		}
	}
	return 'unknown';
}

phpinfo();

echo '<p>Client IP: ' . htmlspecialchars(get_client_ip(), ENT_QUOTES, 'UTF-8') . '</p>';

?>