<?php
//O GET pega da URL depois de ?
$data = $_GET['dtinicial'];
$record = $_GET['record'];

$today = time();
$today = date("Y-m-d", $today);

$datediff = strtotime($data) - strtotime($today);
$datediff = floor($datediff / (60 * 60 * 24));
$datediff = ($datediff * -1);

$text = $datediff . "\n" . $record;
//create .txt file 
$fp = fopen("data.txt", "w");
fwrite($fp, $text);
fclose($fp);
