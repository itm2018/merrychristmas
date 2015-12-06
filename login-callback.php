<?php
session_start();
require_once __DIR__.'/facebook/src/Facebook/autoload.php';

$fb = new Facebook\Facebook([
	'app_id'=>'135572810141672',
	'app_secret'=>'4780932d14d2d74135964d8ab1afb0bc',
	'default_graph_version'=>'v2.5'
]);
$helper = $fb->getRedirectLoginHelper();
try{
	$accessToken = $helper->getAccessToken();
}catch(Faceboo\Exceptions\FacebookResponseException $e){
	//when Graph return an error_get_last
	echo 'Graph return an error: '.$e->getMessage();
	exit;
}catch(Facebook\Exceptions\FacebookSDKException $e){
	echo 'Facebook SDK returned an error: '.$e->getMessage();
	exit;
}
if(isset($accessToken)){
	echo $accessToken;
	$_SESSION['facebook_access_token']=(string) $accessToken;
	header('Location: index.php');
	die();
	// now you can redirect to another page and use the acess tohken 
}