<?php

$ascii = 'PHP Cookbook';
$chars = unpack('C*', $ascii);

var_dump($chars);

$student = "Student";

echo $student[3];

$unpacked = unpack('S*', 'Hi');

$packed = pack('S*', 72, 101, 108, 108, 111, 44, 32, 119, 111, 114, 108, 100, 33);

echo PHP_EOL . $unpacked;
echo PHP_EOL . $packed;

