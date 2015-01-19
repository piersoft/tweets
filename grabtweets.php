<?php

//We use already made Twitter OAuth library
//https://github.com/mynetx/codebird-php
require_once ('codebird.php');

//Twitter OAuth Settings, enter your settings here:
$CONSUMER_KEY = 'GZagyKzc5Egish2gNZaiYGUHm';
$CONSUMER_SECRET = 'E1RgQ7PCaenW1ruBgqVNQs8eEa7IojWGgqufPA3MDQWm6L0SXg';
$ACCESS_TOKEN = '137337075-IFT7toy8DG3sn4inKN6yHoPOiBzRsxoMSjTEaFQo';
$ACCESS_TOKEN_SECRET = 'ummKxqf9y0qzNhFbdx6Bjmhbmv8LTzouQI7HYvHWcXD97';

//Get authenticated
Codebird::setConsumerKey($CONSUMER_KEY, $CONSUMER_SECRET);
$cb = Codebird::getInstance();
$cb->setToken($ACCESS_TOKEN, $ACCESS_TOKEN_SECRET);


//retrieve posts
$q = $_POST['q'];
$count = $_POST['count'];
$api = $_POST['api'];

//https://dev.twitter.com/docs/api/1.1/get/statuses/user_timeline
//https://dev.twitter.com/docs/api/1.1/get/search/tweets
$params = array(
	'screen_name' => $q,
	'q' => $q,
	'count' => $count
);

//Make the REST call
$data = (array) $cb->$api($params);

//Output result in JSON, getting it ready for jQuery to process
echo json_encode($data);

?>