<?php
$memcached = new Memcache();

$memcached->connect('127.0.0.1', 11211) or die("Not connect");
$var = $memcached->get('Key');
if (!empty($var)) {
    echo $var;
} else {
    $memcached->set('Key', date('G:i:s'), false, 5);
    echo $memcached->get('Key');
}
$memcached->close();

/**
 * 21:47:31
 * каждые 5 секунд время меняется
 */