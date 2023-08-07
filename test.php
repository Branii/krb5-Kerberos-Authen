<?php


$randomNumbers = array_map(
    function() { return random_int(1, 9); },
    array_fill(0, 6, null)
);
echo implode("",$randomNumbers);
//print_r($randomNumbers);

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