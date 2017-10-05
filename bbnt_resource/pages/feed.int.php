<?php

// URL location of your feed   -    ?format=xml
$feedUrl = "http://feeds.feedburner.com/babanta"; $feedContent = "";

// Fetch feed from URL
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $feedUrl);
curl_setopt($curl, CURLOPT_TIMEOUT, 3);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);

// FeedBurner requires a proper USER-AGENT...
curl_setopt($curl, CURL_HTTP_VERSION_1_1, true);
curl_setopt($curl, CURLOPT_ENCODING, "gzip, deflate");
curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.3) Gecko/2008092417 Firefox/3.0.3");

$feedContent = curl_exec($curl);
curl_close($curl);
preg_match_all('~/<a href="(.*|(?R))">(.*|(?R))<\/a>/i',
    $feedContent,
    $salida, PREG_PATTERN_ORDER);
var_dump($salida);

$feedXml = @simplexml_load_string($feedContent);
echo '<h1>'.$feedXml['id'].'</h1>';
//print_r($feedXml);
?>
