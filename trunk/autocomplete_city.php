<?php require_once('../Connections/conn.php'); ?>
<?php
if (empty($_GET['q'])) {
	exit;
}
?>
<?php
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
/*
$colname_rsView = "-1";
if (isset($_GET['q'])) {
  $colname_rsView = $_GET['q'];
}
mysql_select_db($database_conn, $conn);
$query_rsView = sprintf("select city_id, city, state, country FROM c_cities WHERE city LIKE %s ORDER BY country ASC, state ASC, city ASC", GetSQLValueString("%" . $colname_rsView . "%", "text"));
$rsView = mysql_query($query_rsView, $conn) or die(mysql_error());
$row_rsView = mysql_fetch_assoc($rsView);
$totalRows_rsView = mysql_num_rows($rsView);
if ($totalRows_rsView > 0) { // Show if recordset not empty 
	do {
		$city = $row_rsView['city'].', '.$row_rsView['state'].', '.$row_rsView['country'];
		echo $row_rsView['city_id']."|".$city."\n";
	} while ($row_rsView = mysql_fetch_assoc($rsView)); 
} // Show if recordset not empty 
*/
function callcities($q) {
	global $connAdodb;
	$time = 60*60*24*365;
	$colname_rsView = "-1";
	if (isset($q)) {
	  $colname_rsView = $q;
	}
	$sql = sprintf("select city_id, city, state, country FROM c_cities WHERE city LIKE %s AND country = 'US' ORDER BY country ASC, state ASC, city ASC", GetSQLValueString("%" . $colname_rsView . "%", "text"));
	$rs = $connAdodb->CacheExecute(($time), $sql);
	if ($rs->recordCount() === 0) {
		return false;
	}
	$rec = array();
	while (!$rs->EOF) {
		$rec[$rs->fields['city_id']] = $rs->fields;
		$city = $rs->fields['city'].', '.$rs->fields['state'].', '.$rs->fields['country'];
		echo $rs->fields['city_id']."|".$city."\n";
		$rs->MoveNext();
	}
	return $rs->fields;
}
callcities($_GET['q']);
?>