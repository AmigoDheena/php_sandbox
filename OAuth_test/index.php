<?php

    // Demo: https://php-login-system.herokuapp.com/

    // include your composer dependencies
    require_once 'vendor/autoload.php';

    /*
        Create your Api in here
        https://console.developers.google.com/
    */

    $clientid = '-----------'; //Enter your clientId
    $clientSecret = '------'; //Enter you client secret id
    $redirectUri = 'http://localhost/LoginAuth/index.php';


    $client = new Google_Client();
    $client->setClientId($clientid);
    $client->setClientSecret($clientSecret);
    $client->setRedirectUri($redirectUri);

    $client->addScope('email');
    $client->addScope('profile');

    if(isset($_GET['code'])){
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        $client->setAccessToken($token['access_token']);

        // echo "<pre>";
        // print_r($token);
        // echo "</pre>";

        // Get Profile info
        $G_oauth = new Google_Service_Oauth2($client);
        $G_aInfo = $G_oauth->userinfo->get();

        // echo "<pre>";
        // print_r($G_aInfo);
        // echo "</pre>";

        $G_email = $G_aInfo['email'];
        $G_name = $G_aInfo['name'];
        $G_picture = $G_aInfo['picture'];

        echo "<img src='$G_picture'><br>";
        echo "$G_email"."<br>";
        echo "$G_name"."<br>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoginOauth</title>
</head>
<body>
    <a href="<?=$client->createAuthUrl(); ?>">Auth Login</a>
</body>
</html>