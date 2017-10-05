<?php
include ('../../babanta_header.php');
date_default_timezone_set('America/Argentina/Buenos_Aires');
		$time_now=time();
		$time_now=date('m-d-Y', $time_now);
		echo "SELECT p_id, p_dia, p_total FROM plata_diaria WHERE p_dia='$time_now'";
		$today_cash = mysql_fetch_assoc(mysql_query("SELECT p_id, p_dia, p_total FROM plata_diaria WHERE p_dia='$time_now'"));
		print_r($today_cash);
		$cash_today=str_replace(',', '.', $today_cash['p_total']);
		$seconds_elapsed=time() - strtotime("today");
		echo $cash_by_second=$cash_today/$seconds_elapsed;

?>