<?php
$g = array('vasya', 'petya');
list($a,$b) = $g;
echo $a;
/**
 * vasya
 */

$arr = array(1, 2, 4);
print_r($arr);

/**
 * Array
(
[0] => 1
[1] => 2
[2] => 4
)
 */

$arr[] = 5;
$arr[] = 6;
print_r($arr);
/**
 * Array
(
[0] => 1
[1] => 2
[2] => 4
[3] => 5
[4] => 6
)
 */

$arr[2] = 'h';
print_r($arr);
/**
 * Array
(
[0] => 1
[1] => 2
[2] => h
[3] => 5
[4] => 6
)
 */

print_r(each($arr));
/**
 * Array
(
[1] => 1
[value] => 1
[0] => 0
[key] => 0
)

 */