<?php

$curlInit = curl_init("https://yandex.ru/");
$file = fopen("yandex.txt", "w");

curl_setopt($curlInit, CURLOPT_FILE, $file);
curl_setopt($curlInit, CURLOPT_HEADER, 0);
curl_copy_handle($curlInit);
curl_exec($curlInit);
curl_close($curlInit);
fclose($file);
