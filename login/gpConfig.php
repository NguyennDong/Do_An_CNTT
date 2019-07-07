<?php
session_start();

//Include Google client library
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '690270835549-u920vap2l3rrb5q87pq11fpk01eivqk9.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'JKjU8pBKjIA4s18ZhpgpgE2M'; //Google client secret
$redirectURL = 'http://localhost/IT-1/login/'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>