<?php

require_once ('test.php');

$person = new test('小名','男',50);
$person->age = "1";
echo "姓名:".$person->name;
echo "<br>";
echo "年龄:".$person->age;
echo "<hr>";
