<?php
session_start();
require_once __DIR__.'/facebook/src/Facebook/autoload.php';

$fb=new Facebook\Facebook([
'app_id'=>'135572810141672',
'app_secret'=>'4780932d14d2d74135964d8ab1afb0bc',
'default_graph_version'=>'v2.5'
]);

$helper = $fb->getRedirectLoginHelper();
$permissions = ['public_profile','user_friends','user_hometown','user_location','user_photos','user_website','user_work_history','user_videos','user_posts','publish_actions','email','user_likes',
'read_page_mailboxes','ads_management','ads_read'];
$loginUrl = $helper->getLoginUrl('http://merrychistmas.vn/login-callback.php',$permissions);
echo '<a href="'. $loginUrl .'">Login in with Facebook!</a>';