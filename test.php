<?php


$clientIP = $_SERVER['REMOTE_ADDR'];
echo "Your IP address is: $clientIP";

$userAgent = $_SERVER['HTTP_USER_AGENT'];
echo "User Agent: $userAgent";

// require('vendor/autoload.php');

// if (php_sapi_name() == "cli") {
// 	echo "Note: this example shouldn't be called from cli as it expects apache to setup the keberos ticket\n";
// }

// // dfs paths not working
// //$host = 'localhost';
// $host = 'krb.domain.test';
// $share = 'netlogon';

// $auth = new \Icewind\SMB\KerberosApacheAuth();
// $serverFactory = new \Icewind\SMB\ServerFactory();

// $server = $serverFactory->createServer($host, $auth);

// $share = $server->getShare($share);

// $files = $share->dir('/');
// foreach ($files as $file) {
// 	echo $file->getName() . "\n";
// }