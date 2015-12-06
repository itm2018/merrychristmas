<?php
session_start();
require_once __DIR__.'/facebook/src/Facebook/autoload.php';
$fb = new Facebook\Facebook([
	'app_id'=>'135572810141672',
	'app_secret'=>'4780932d14d2d74135964d8ab1afb0bc',
	'default_graph_version'=>'v2.5'
]);

try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('/me?fields=id,name,picture,email,location,hometown,photos,friends,website,work,posts', $_SESSION['facebook_access_token']);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$user = $response->getGraphUser();

//echo 'Name: ' . $user['name'];
// OR
echo 'Name: ' . $user->getName();echo '<br>';
echo '<img src="'.$user->getPicture()->getUrl().'"/>';echo '<br>';
echo 'Location: ' . $user->getLocation()->getName();echo '<br>';
echo 'Hometown: ' . $user->getHometown()->getName();echo '<br>';
var_dump($user['friends']);
var_dump($user['work']);
var_dump($user);