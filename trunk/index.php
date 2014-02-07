<?php
if (!isset($_SESSION)) {
	session_start();
}
require_once('Connections/conn.php');
define('_FUNC_TIME_ZERO', 0);
define('_FUNC_TIME_FIVEMINUTE', 300);
define('_FUNC_TIME_TENMINUTE', 600);
define('_FUNC_TIME_FIFTEENMINUTE', (60*15));
define('_FUNC_TIME_THIRTYMINUTE', (60*30));
define('_FUNC_TIME_HOUR', 3600);
define('_FUNC_TIME_FOUR_HOUR', (_FUNC_TIME_HOUR*4));
define('_FUNC_TIME_DAY', (_FUNC_TIME_HOUR*24));
define('_FUNC_TIME_WEEK', (_FUNC_TIME_HOUR*24*7));
define('_FUNC_TIME_MONTH', (_FUNC_TIME_HOUR*24*31));
define('_FUNC_TIME_TRHEE_MONTH', (_FUNC_TIME_HOUR*24*90));
define('_FUNC_TIME_SIX_MONTH', (_FUNC_TIME_HOUR*24*90*2));
define('_FUNC_TIME_NINE_MONTH', (_FUNC_TIME_HOUR*24*90*3));
define('_FUNC_TIME_YEAR', (_FUNC_TIME_HOUR*24*365));
$host = $_SERVER['HTTP_HOST'];
define('HOST', $host);
define('_base_domain', 'mkgalaxy.com');
define('SITE_NAME', 'MKGALAXY.COM');
define('_protocol', 'http');
define('_base_url', _protocol.'://'.HOST);
define('_admin_email', 'admin@'._base_domain);
define('FROM_EMAIL', 'From: System <system@'._base_domain.'>');
define('_doc_url', '/mounted-storage/home135/sub004/sc29722-KLXJ/wc5.org/city'); 
define('_zend_cache', _doc_url.'/tmp/zendcache');
define('_pear_cache', _doc_url.'/tmp/pearcache/');
define('COOKIE_FILE_PATH', _doc_url.'/tmp/cookiefilepath');
define('CACHE_PATH', _doc_url.'/tmp/cache');
include_once('funcs.php');

$host = str_replace('www.', '', $host);
$tmpHost = str_replace('.'._base_domain, '', $host);
$pattern = '^(.*)\-([a-zA-Z]{2,3})\-([a-zA-Z]{2})$';
$matches = regexp($tmpHost, $pattern, true);
if (!empty($matches)) {
	define('URL', strtolower($matches[0][0]));
} else {
	define('URL', '');
}
/*
$sites = array('city-sj.wc5.org' => 
				array('ref' => 'san-jose-ca-us', 'site_id' => 1),
			'unr.wc5.org' => 
				array('ref' => 'fremont-ca-us', 'site_id' => 2),
			);
$siteDetails = isset($sites[$host]) ? $sites[$host] : array();
if (empty($siteDetails)) {
	echo 'unknown site'; exit;
}
$site_id = $siteDetails['site_id'];
$ref = $siteDetails['ref'];*/



//echo dirname(realpath(__FILE__));exit;

class City
{
	public function __construct($config=array())
	{
		if (!empty($config)) {
			foreach ($config as $k => $v) {
				$this->$k = $v;
			}
		}
	}
}

//$pattern = '^(.*)\-([a-zA-Z]{2,3})\-([a-zA-Z]{2})$';
//$matches = regexp($ref, $pattern, true);

$pageStyle = 'wrapper-style1"';

$site_id = 0;
$details = array();
if (URL != "") {
	$details = citydetails(URL);
	$site_id = $details['city_id'];
}
$config = array(
			'ref' => URL,
			'cityCode' => $matches[0][1],
			'stateCode' => $matches[0][2],
			'countryCode' => $matches[0][3],
			'details' => $details,
			'path' => '/',
			'pageTitle' => $details['city'].', '.$details['state'].', '.$details['country'],
			'site_id' => $site_id
		);

$site = new City($config);
if (stristr($_SERVER['REQUEST_URI'], 'index.php')) {
	if (basename($_SERVER['PHP_SELF']) == 'index.php' && isset($_GET['p'])) {
		if (isset($_GET['accesscheck'])) {
			$_SESSION['PrevUrl'] = $_GET['accesscheck'];
		}
		$redirect = '/'.$_GET['p'];
		header("Location: $redirect");
		exit;
	}
}
if (URL != "") {
	setcookie('subdomain', URL, time() + (60*60*24*365), '/', '.'._base_domain);
	$_COOKIE['subdomain'] = URL;
	$page = 'city';
	if (!empty($_GET['p'])) {
		$page = $_GET['p'];
	}
	ob_start();
	if (!file_exists($page.'.php')) $page = 'news';
	include_once($page.'.php');
	$content_for_layout = ob_get_clean();
	include_once('home.php');
} else {
	$page = 'browse';
	if (!empty($_GET['p'])) {
		$page = $_GET['p'];
	}
	$arrayPages = array('browse', 'search');
	if (!in_array($page, $arrayPages)) {
		$page = 'browse';
	}
	if (!empty($_COOKIE['subdomain']) && empty($_GET['home'])) {
		header("Location: http://".$_COOKIE['subdomain']."."._base_domain);
		exit;
	}
	ob_start();
	include_once($page.'.php');
	$content_for_layout = ob_get_clean();
	include_once('welcome.php');
}
?>