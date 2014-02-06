<?php
$string = file_get_contents('2a.txt');
$arr = json_decode($string, 1);

foreach ($arr as $k => $v) {
	if (empty($v)) continue;
	if (empty($v['parents'][0])) continue;
	if ($v['parents'][0] == 1) $v['parents'][0] = 0;
	$data = array();
	$data['category_id'] = $k;
	$data['category'] = $v['labels']['en'];
	$data['parent'] = $v['parents'][0];
	echo "INSERT INTO `z_category` (`category_id`, `category`, `parent`) VALUES (".$data['category_id'].", '".addslashes(stripslashes($data['category']))."', '".$data['parent']."');<br>";
}
?>