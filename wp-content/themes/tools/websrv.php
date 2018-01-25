<?php
// Silence is golden.

//$parastr=$_SERVER["QUERY_STRING"];
$flag = $_REQUEST['flag'];
//echo $flag;
//if($flag==2)
//{
//}
/* 关闭wsdl的缓存。webservice增加方法时，php不同步刷新，会无法调用新增的方法
待webservice稳定期，不再有变动时，将值改为"1"，提高效率
soap.wsdl_cache_ttl：86400 意思是WSDL描述文件在24小时(86400sec)内都在缓存设置的目录下 */
ini_set("soap.wsdl_cache_enabled", "1"); 
//ini_set("soap.wsdl_cache_ttl", "5"); //86400	5

/* Initialize webservice with your WSDL */
$client = new SoapClient("http://www.smartvast.cn/ApiEx.asmx?wsdl");

if($client)
{ 
  $client->soap_defencoding = 'utf-8';
  $client->decode_utf8 = false;
  $client->xml_encoding = 'utf-8';

  if($flag=='jsoncmd')
  {
    $params = array(
	"jsonstr" => $_REQUEST['jsonstr'],
    );
  }
  else if($flag=='api')
  {
    $params = array(
	"jsonstr" => $_REQUEST['jsonstr'],
    );
  }
  else
  {
     return;
  }

  try
  {
    $response = $client->__soapCall($flag, array($params));    
    //var_dump($response);
    //print_r($response);
    //$data = $p->GetAllDeerpensResult->Basdeerpen;
    print_r(json_encode($response));

  } catch (Exception $e) {
    //echo 'faild: ',  $e->getMessage(), "\n";
    return;
  }

}
?>
