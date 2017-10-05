<?php
if(!defined('UNTARGETED')) die('No se permite el acceso directo al este archivo');
$mysql['secure_code'] = substr(md5('SF3_S3CUR3_W0RT1T_50'.rand(0, 9)) ,0, 6);
$mysql['server'.$mysql['secure_code']] = 'localhost';
$mysql['user'.$mysql['secure_code']] = 'babanta_database';
$mysql['db'.$mysql['secure_code']] = 'babanta_cpmservices';
$mysql['password'.$mysql['secure_code']] = 'askfwQ1FEq';
$mysqli = new mysqli($mysql['server'.$mysql['secure_code']], $mysql['user'.$mysql['secure_code']], $mysql['password'.$mysql['secure_code']], $mysql['db'.$mysql['secure_code']]);
$mysqli->query("set names 'utf8'");
$mysql = '';
date_default_timezone_set('America/Guatemala');
?>