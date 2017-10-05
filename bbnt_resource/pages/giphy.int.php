<?php
$giphy = file_get_contents('http://api.giphy.com/v1/gifs/search?q=sexy+chica&api_key=dc6zaTOxFJmzC');
$get_giphy = json_decode($giphy,true);
foreach($get_giphy['data'] as $ro => $row){
echo $row['images']['original']['url'].'<br>';
}
?>