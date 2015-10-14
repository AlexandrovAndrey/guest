<?php
function var_dump_($var){echo '<pre>'; var_dump($var); die('</pre>');}
include './GuestClass.php';

$actions = array('read', 'create', 'update');
if (!isset($_GET['action'])) {die('Не передан необходимый набор параметров!');}
if (!in_array($_GET['action'], $actions)){
	die('Некорректные параметры!');
}