<?php
$url = "translate.google.com/translate_a/t?client=t&sl=en&tl=zh-TW&hl=zh-TW&sc=2&ie=UTF-8&oe=UTF-8&oc=1&otf=2&ssel=0&tsel=0&q=";
$q = htmlspecialchars($_GET['q']);
$url .= $q;

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$output = curl_exec($ch);
curl_close($ch);

$callback = htmlspecialchars($_GET['callback']);
if ($callback == '?') {
	$callback = "";
} 

echo "$callback(" . $output . ")";