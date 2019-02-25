<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'vendor/autoload.php';

$th = new DateTime('2019-01-27');

$s = new \ckuran\PolishSundayProvider();
$d = $s->isNonTradeable($th);

var_dump($d);
