<?php
//define('CURLOPT_SSL_VERIFYPEER', 0);
require 'autoload.php';
use Parse\ParseQuery;
use Parse\ParsePush;
use Parse\ParseInstallation;
use Parse\ParseClient;
use Parse\ParseObject;



//$app_id='7u1DSFl77TQj9xpMuZDLOOvWmMVyYZ4YJUSaHKCR'; //app-id-here
//$rest_key='StWYkOuR0U38Tl2d502Zrx3GMB2lWlaq9ax7wQ8N'; //rest-api-key-here
//$master_key='t4ycQncgu2S7RuWIkk0FTLpkXy6aD1DytlunzY0M'; //master-key-here

$app_id='w8djNACRhf3r7tT0jAFlOHh4vOhXU63MoB7fkpek'; //app-id-here
$rest_key='ielzug7I6w8xnKQQsaSXtrc7J4Wq7Iwja71nZ3jn'; //rest-api-key-here
$master_key='bunsAi2eXd3dXjrQUx2ztPMcWkUttHGUfURTJBEn'; //master-key-here

ParseClient::initialize($app_id, $rest_key, $master_key);
/* $data = array("alert" => "Hi!");

// Push to Channels
ParsePush::send(array(
"channels" => ['all'],
"data" => $data
)); */
if ((isset($_GET['alert'])) && (isset($_GET['key'])) && (isset($_GET['value']))){
$alert=$_GET['alert'];
$key=$_GET['key'];
$value=$_GET['value'];
//$value= new DateTime($value);
testPushToQuery($key,$value,$alert);
 echo "Push Notification <b>\"".$alert."</b>\" sent";
}else {
	echo "Push Notification did not sent";
}
 function testPushToQuery($key,$value,$alert)
{
	$query = ParseInstallation::query();
	$query->equalTo($key, $value);
	ParsePush::send(array(
	'data' => array('alert' => $alert),
	'where' => $query
	));
}