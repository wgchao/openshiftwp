<?php
// Silence is golden.

$parastr=$_SERVER["QUERY_STRING"];
$flag = $_REQUEST['flag'];
//echo $flag;
if($flag==2)
{
  $urlhttps = "http://www.glimmer.cn/wp-json/wp/v2/posts/".$_REQUEST['id'];
}
else
{
  $urlhttps = "http://www.glimmer.cn/wp-json/wp/v2/posts?".$parastr;
}
//echo $urlhttps;
//$handle = fopen($urlhttps, "rb");
//echo $handle;
//$contents = stream_get_contents($handle);
//fclose($handle);
//echo $contents;
$fh= file_get_contents($urlhttps);
if($fh=='')
  echo '';//"{\"code\":\"rest_post_invalid_page_number\",\"message\":\"\",\"data\":{\"status\":400}}";
else
  echo $fh;
?>