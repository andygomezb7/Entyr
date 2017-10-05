<?php  if ( ! defined('TS_HEADER')) exit('No se permite el acceso directo ala web');
/**
 * Modelo para el control de los usuarios
 *
 * @name    c.user.php
 * @author  Wortit Developers
 */
class Googl {
var $path;
function Googl() {
$this->path = "https://www.googleapis.com/urlshortener/v1";
}
function shorten($url) {
$ch = curl_init($this->path."/url?key=AIzaSyCxdg_sCdqfqTpYRz-a7qezb5aWE9qxAYI");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array("longUrl" => $url)));
$rpta = curl_exec($ch);
$data = json_decode($rpta, true);
curl_close($ch);
return $data["id"];
}
function expand($url) {
$ch = curl_init($this->path."/url?shortUrl=".$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$rpta = curl_exec($ch);
$data = json_decode($rpta, true);
curl_close($ch);
return $data["longUrl"];
}
}