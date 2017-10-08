<?php

$appid = 'wx143aea78f5194625';
$appsecret = '77f9ee8bebb6203a4320d6152abf8d8c';

$url = 'https://api.weixin.qq.com/sns/jscode2session?appid='.$appid.'&secret='.$appsecret.'&js_code='.$_GET['code'].'&grant_type=authorization_code';

$content = file_get_contents($url);
$content = json_decode($content);
echo $content->session_key;

?>