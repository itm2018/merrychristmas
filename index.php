<?php
session_start();
if(empty($_SESSION['facebook_access_token'])){
 header('Location: login.php');
 die;
}
echo $_SESSION['facebook_access_token'];
