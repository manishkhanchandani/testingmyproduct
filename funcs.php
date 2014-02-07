<?php

if (!function_exists('regexp')) {
	function regexp($input, $regexp, $casesensitive=false)
	{
		if ($casesensitive === true) {
			if (preg_match_all("/$regexp/sU", $input, $matches, PREG_SET_ORDER)) {
				return $matches;
			}
		} else {
			if (preg_match_all("/$regexp/siU", $input, $matches, PREG_SET_ORDER)) {
				return $matches;
			}
		}

		return false;
	}
}

function pr($d) { echo '<pre>'; print_r($d); echo '</pre>'; }


if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

if (!function_exists('citydetails')) {
	function citydetails($url)
	{
		global $connAdodb;
		//$connAdodb->cacheSecs = 15;
		$sqlCities = "select * from c_cities where url = '".$url."'";
		$rs = $connAdodb->CacheExecute((_FUNC_TIME_MONTH), $sqlCities); # cache 1 hour
		if ($rs->RecordCount() === 0) {
			return false;
		}

		return $rs->fields;
	}
}

if (!function_exists('getlocationcityid')) {
function getlocationcityid($city_id) {
	global $connAdodb;
	$sql = "select * from c_cities where city_id = ".GetSQLValueString($city_id, 'int');
	$rs = $connAdodb->CacheExecute(_FUNC_TIME_DAY, $sql);
	if ($rs->recordCount() === 0) {
		return false;
	}

	return $rs->fields;
}
}


if (!function_exists('getlocationcity')) {
function getlocationcity($city) {
	global $connAdodb;
	$sql = "select * from c_cities where city LIKE ".GetSQLValueString('%'.$city.'%', 'text')." order by city";
	$rs = $connAdodb->CacheExecute(_FUNC_TIME_DAY, $sql);
	if ($rs->recordCount() === 0) {
		return false;
	}

	$rec = array();
	while (!$rs->EOF) {
		$rec[$rs->fields['city_id']] = $rs->fields;
		$rs->MoveNext();
	}

	return $rec;
}
}


if (!function_exists('getstate')) {
function getstate($country='US') {
	global $connAdodb;
	$sql = "select DISTINCT (state), country from c_cities where country = ".GetSQLValueString($country, 'text');
	$rs = $connAdodb->CacheExecute(_FUNC_TIME_DAY, $sql);
	$rec = array();
	$i=0;
	while (!$rs->EOF) {
		$rec[$i]['state'] = $rs->fields['state'];
		$rec[$i]['country'] = $rs->fields['country'];
		$i++;
		$rs->MoveNext();
	}

	return $rec;
}
}


function _get($string='')
{
	if (empty($string)) {
		return '';
	}

	if (empty($_GET[$string])) {
		return '';
	}

	return $_GET[$string];
}

function _post($string='')
{
	if (empty($string)) {
		return '';
	}

	if (empty($_POST[$string])) {
		return '';
	}

	return $_POST[$string];
}


if (!function_exists('getlocation')) {
function getlocation($state, $country='US') {
	global $connAdodb;
	$sql = "select * from c_cities where state = ".GetSQLValueString($state, 'text')." and country = ".GetSQLValueString($country, 'text')." order by city";
	$rs = $connAdodb->CacheExecute(_FUNC_TIME_DAY, $sql);
	if ($rs->recordCount() === 0) {
		return false;
	}

	$rec = array();
	while (!$rs->EOF) {
		$rec[$rs->fields['city_id']] = $rs->fields;
		$rs->MoveNext();
	}

	return $rec;
}
}


function get_nearby_cities($lat, $lon, $radius=30, $order='distance', $limit=30)
{
	global $connAdodb;
	$sql = sprintf("select city_id, url, city, state, country, lat, lon, (ROUND(
DEGREES(ACOS(SIN(RADIANS(".GetSQLValueString($lat, 'double').")) * SIN(RADIANS(c.lat)) + COS(RADIANS(".GetSQLValueString($lat, 'double').")) * COS(RADIANS(c.lat)) * COS(RADIANS(".GetSQLValueString($lon, 'double')." -(c.lon)))))*60*1.1515,2)) as distance from c_cities as c WHERE (ROUND(
DEGREES(ACOS(SIN(RADIANS(".GetSQLValueString($lat, 'double').")) * SIN(RADIANS(c.lat)) + COS(RADIANS(".GetSQLValueString($lat, 'double').")) * COS(RADIANS(c.lat)) * COS(RADIANS(".GetSQLValueString($lon, 'double')." -(c.lon)))))*60*1.1515,2)) <= ".GetSQLValueString($radius, 'int')." ORDER BY ".$order." LIMIT ".$limit);
	$recordSet = $connAdodb->CacheExecute(_FUNC_TIME_DAY, $sql);
	$return = array();
	while (!$recordSet->EOF) {
		$return[$recordSet->fields['city_id']] = $recordSet->fields;
		$recordSet->MoveNext();
	}

	return $return;
}

function get_categories_cnt()
{
	global $connAdodb;
	global $site_id;
	$sql = sprintf("select count(b.category_id) as cnt, c.category, b.category_id from z_business as b left join z_category as c ON b.category_id = c.category_id WHERE b.site_id = %s group by b.category_id", GetSQLValueString($site_id, "int"));
	$recordSet = $connAdodb->CacheExecute(300, $sql);
	$return = array();
	while (!$recordSet->EOF) {
		$return[$recordSet->fields['category_id']] = $recordSet->fields['cnt'];
		$recordSet->MoveNext();
	}

	return $return;
}

function get_categories()
{
	global $connAdodb;
	//$sql = sprintf("select * from z_category order by category");
	//$sql = sprintf("SELECT CONCAT(b.category, ' => ', a.category) as category, a.category_id as category_id, a.category_id as cid1, a.category as c1, a.parent as p1, b.category_id as cid2, b.category as c2, b.parent as p2 FROM `z_category` as a left join `z_category` as b ON a.parent = b.category_id WHERE a.parent != 0 order by b.category, a.category");
	$sql = sprintf("select * from z_category order by category, parent, category_id");
	$recordSet = $connAdodb->CacheExecute(_FUNC_TIME_DAY, $sql);
	$return = array();
	while (!$recordSet->EOF) {
		$return[$recordSet->fields['parent']][$recordSet->fields['category_id']] = $recordSet->fields['category'];
		$recordSet->MoveNext();
	}
	$return2 = array();
	foreach ($return[0] as $k => $v) {
		if (isset($return[$k])) {
			foreach ($return[$k] as $k1 => $v1) {
				if (isset($return[$k1])) {
					$return2[$k][$k1] = array('name' => $v, 'arr' => $v1);
					foreach ($return[$k1] as $k2 => $v2) {
						$return2[$k][$k1][$k2] = array('name' => $v1, 'arr' => $v2);
					}
				} else {
					$return2[$k][$k1] = array('name' => $v, 'arr' => $v1);
				}
			}
		}
	}
	$return3 = array();
	foreach ($return[0] as $k => $v) {
		$return3[$k] = $v;
	}
	foreach ($return2 as $k => $v) {
		foreach ($v as $k1 => $v1) {
			if (count($v1) == 2) {
				$return3[$k1] = $v1['name'].' => '.$v1['arr'];
			} else {
				foreach ($v1 as $k2 => $v2) {
					if (!is_numeric($k2)) {
						$return3[$k1] = $v1['name'].' => '.$v1['arr'];
					} else
					$return3[$k2] = $v1['name'].' => '.$v1['arr'].' => '.$v2['arr'];
				}
			}
		}
	}
	asort($return3);

	return $return3;
}


function get_businesses_factual_id($factual_id)
{
	global $connAdodb;
	$sql = sprintf("select * from z_business where factual_id = %s", GetSQLValueString($factual_id, "text"));
	$recordSet = $connAdodb->CacheExecute(_FUNC_TIME_HOUR, $sql);
	if (empty($recordSet->fields)) $connAdodb->CacheFlush($sql);
	return $recordSet->fields;
}

function get_businesses()
{
	global $connAdodb;
	global $site_id;
	$sql = sprintf("select * from z_business as b LEFT JOIN z_category as c ON b.category_id = c.category_id WHERE b.site_id = %s order by c.category, b.name, b.address", GetSQLValueString($site_id, "int"));
	$recordSet = $connAdodb->CacheExecute(300, $sql);
	$return = array();
	while (!$recordSet->EOF) {
		$return[] = $recordSet->fields;
		$recordSet->MoveNext();
	}

	return $return;
}

if (!function_exists('curlget')) {
	function curlget($url, $post=0, $POSTFIELDS='') {
		$https = 0;
		if (substr($url, 0, 5) === 'https') {
			$https = 1;
		}

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);  
		if (!empty($post)) {
			curl_setopt($ch, CURLOPT_POST, 1); 
			curl_setopt($ch, CURLOPT_POSTFIELDS,$POSTFIELDS);
		}

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_COOKIEFILE, COOKIE_FILE_PATH);
		curl_setopt($ch, CURLOPT_COOKIEJAR,COOKIE_FILE_PATH);
		if (!empty($https)) {
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		}

		$result = curl_exec($ch); 
		curl_close($ch);
		return $result;
	}
}
function get_businesses_detail($id)
{
	global $connAdodb;
	$sql = sprintf("select * from z_business as b LEFT JOIN z_category as c ON b.category_id = c.category_id WHERE business_id = %s", GetSQLValueString($id, 'int'));
	$recordSet = $connAdodb->CacheExecute(_FUNC_TIME_FIVEMINUTE, $sql);
	return $recordSet->fields;
}

function getBusinessesByCityId($id, $limit=50, $offset=0)
{
	global $connAdodb;
	$sql = sprintf("select * from z_business as b WHERE site_id = %s", GetSQLValueString($id, 'int'));
	$recordSet = $connAdodb->CacheSelectLimit(_FUNC_TIME_FIFTEENMINUTE, $sql, $limit, $offset);
	$return = array();
	while (!$recordSet->EOF) {
		$return[] = array('id'=> $recordSet->fields['business_id'], 'res' => $recordSet->fields);
		$recordSet->MoveNext();
	}

	return $return;
}
function getBusinessesTotalByCityId($id)
{
	global $connAdodb;
	$sql = sprintf("select count(*) as cnt from z_business as b WHERE site_id = %s", GetSQLValueString($id, 'int'));
	$recordSet = $connAdodb->CacheExecute(_FUNC_TIME_FIFTEENMINUTE, $sql);
	return $recordSet->fields['cnt'];
}

function getNews($city)
{
	$news = array();
	include('rss.php');
	$myRss = new RSSParser("http://news.google.com/news?pz=1&cf=all&ned=us&hl=en&q=".urlencode($city)."&cf=all&output=rss"); 
	$itemNum = 0;
	$myRss_RSSmax = 0;
	if($myRss_RSSmax == 0 || $myRss_RSSmax > count($myRss->titles))
		$myRss_RSSmax = count($myRss->titles);
	for($itemNum=0; $itemNum<$myRss_RSSmax; $itemNum++){
		$news[] = $myRss;
	}
	return $news;
}//end getNews()

?>