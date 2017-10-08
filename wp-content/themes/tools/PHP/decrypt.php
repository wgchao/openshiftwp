<?php

include_once "wxBizDataCrypt.php";

$appid = 'wx143aea78f5194625';
$appsecret = '77f9ee8bebb6203a4320d6152abf8d8c';

$sessionKey = $_GET['session'];
$encryptedData = $_GET['encryptedData'];
$iv = $_GET['iv'];


$pc = new WXBizDataCrypt($appid, $sessionKey);
$errCode = $pc->decryptData($encryptedData, $iv, $data );

if ($errCode == 0) {
  print($data . "\n");
} else {
  print($errCode . "\n");
}

?>