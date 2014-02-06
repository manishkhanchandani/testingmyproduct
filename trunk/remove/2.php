<?php
$string = file_get_contents('2.txt');

$arr = explode("\n", $string);
foreach ($arr as $k => $v) {
	if (empty($v)) continue;
	$tmp = explode("\t", $v);
	echo "INSERT INTO `z_category` (`category`, `factual_id`) VALUES ('".addslashes(str_replace('"','',$tmp[1]))."', '".$tmp[0]."');<br>";
}
?>