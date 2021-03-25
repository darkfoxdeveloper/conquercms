<?php
$get_data = explode("&", $_SERVER['QUERY_STRING']);
header("HTTP/1.1 301 Moved Permanently");
$username = explode("=", $get_data[0])[1];
$ip = explode("=", $get_data[1])[1];
header("Location: /vote-reward/".$username."/".$ip);
?>
