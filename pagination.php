<?php
session_start();
require_once __DIR__.'/facebook/src/Facebook/autoload.php';
$fb = new Facebook\Facebook([
	'app_id'=>'135572810141672',
	'app_secret'=>'4780932d14d2d74135964d8ab1afb0bc',
	'default_graph_version'=>'v2.5'
]);


try {
  // Requires the "read_stream" permission
  $response = $fb->get('/me/feed?fields=id,photos&amp;limit=5',$_SESSION['facebook_access_token']);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

// Page 1
$feedEdge = $response->getGraphEdge();
var_dump($feedEdge);
foreach ($feedEdge as $status) {
  var_dump($status->asArray());
}

// Page 2 (next 5 results)
$nextFeed = $fb->next($feedEdge);

if($nextFeed){
	foreach ($nextFeed as $status) {
		var_dump($status->asArray());
	}
}
