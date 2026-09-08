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