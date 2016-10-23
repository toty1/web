<?php


require "twitteroauth/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

$ConsumerKey= "8hKRabVHqSwWHM2Ujkr9uiAzl";

$Consumersecret= "vZHHYM0GOrAnwGeYqOGRju2Sh4wsg32qpTPlISTwZSC9Gjtnmg";

$AccessToken= "789815664848449536-UWNptUnXQXF2uEc93Aoy48OqgABdPwY";

$AccessTokensecret="XbrleBWV0oyhpohz4WPIiHLn8YDqOzUwoRsswQDT7edif";


$connection = new TwitterOAuth($ConsumerKey, $Consumersecret,
                               
$AccessToken, $AccessTokensecret);

$content = $connection->get("account/verify_credentials");

$statues = $connection->post("statuses/update", ["status" => "hello world"]);


print_r($statues);

?>