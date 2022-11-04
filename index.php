<?php
require_once __DIR__ . '/vendor/autoload.php';
use \Eugene\SimpleRabbit\OneWay;

$a = new OneWay();
$a->setQueue('new queue');

$a->send('some random massage22223333333333333');


var_dump( $a->receive());

//print($a);