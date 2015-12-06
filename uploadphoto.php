<?php
session_start();
require_once __DIR__.'/facebook/src/Facebook/autoload.php';
$fb = new Facebook\Facebook([
	'app_id'=>'135572810141672',
	'app_secret'=>'4780932d14d2d74135964d8ab1afb0bc',
	'default_graph_version'=>'v2.5'
]);


$data = [
  'message' => 'I love going to the beach. Do you love it.',
  'source' => $fb->fileToUpload('E:\www2\merrychistmas\photos\girlxinh.jpg'),
];

try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->post('/me/photos', $data, $_SESSION['facebook_access_token']);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$graphNode = $response->getGraphNode();

echo 'Photo ID: ' . $graphNode['id'];