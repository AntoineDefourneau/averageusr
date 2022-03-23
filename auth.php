<?php

    error_reporting(E_ALL);
    ini_set('display_errors', TRUE);
    ini_set('display_startup_errors', TRUE);
    set_time_limit(0);

    include 'keys.php';

    require "../libs/cabundle/src/CaBundle.php";
    require "../libs/twitteroauth/autoload.php";

    use Abraham\TwitterOAuth\TwitterOAuth;

    $mediaString = "";


    $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token, $access_token_secret);
    $content = $connection->get("account/verify_credentials");



?>