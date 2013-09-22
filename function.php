<?php

include("converter.class.php");

// 輸入 UTF-8 編碼的繁體中文
// 輸出 UTF-8 編碼且 URL Encode 的簡體中文
echo nexmo_conv('這是繁體中文');

function nexmo_conv( $string )
{
	$conv = new converter;
	$string = $conv->convert('UTF','BIG', $string);
	$string = $conv->convert('BIG','GB', $string);
	$string = iconv('GBK', 'UTF-8//IGNORE', $string);
	$string = urlencode($string);
	return $string;
}