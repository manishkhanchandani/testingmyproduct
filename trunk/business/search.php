<?php
$category = get_categories();
$categoryCnt = get_categories_cnt();
$currentPage = '/business/search';
if (empty($_GET['search'])) {
	$maxRows_rs = 50;
	$pageNum_rs = 0;
	if (isset($_GET['pageNum_rs'])) {
	  $pageNum_rs = $_GET['pageNum_rs'];
	}
	$startRow_rs = $pageNum_rs * $maxRows_rs;
	$return = array();
	$return = getBusinessesByCityId($site_id, $maxRows_rs, $startRow_rs);
	$data['total'] = getBusinessesTotalByCityId($site_id);
	$totalRows_rs = $data['total'];
	$totalPages_rs = ceil($totalRows_rs/$maxRows_rs)-1;
}
if (isset($_GET['search'])) {
	$maxRows_rs = 50;
	$pageNum_rs = 0;
	if (isset($_GET['pageNum_rs'])) {
	  $pageNum_rs = $_GET['pageNum_rs'];
	}
	$startRow_rs = $pageNum_rs * $maxRows_rs;
	if ($startRow_rs >= 500) $startRow_rs = 0;
	$totalRows_rs = 0;
	//{"category_ids":{"$includes":45}}
	$url = 'http://api.v3.factual.com/t/places?';
	if (empty($_GET['category_id']))
		$url .= '&q='.urlencode($_GET['search']);
	$url .= '&filters={"$and":[{"country":"'.$site->details['country'].'"},{"region":"'.$site->details['state'].'"},{"locality":"'.urlencode($site->details['city']).'"}';
	if (!empty($_GET['category_id']))
		$url .= ',{"category_ids":{"$includes":'.$_GET['category_id'].'}}';
	$url .= ']}&include_count=true&offset='.$startRow_rs.'&limit=50&KEY=dLA5fEV5Ib3S5PbCIVaL7lKDbVKrkd2cMFRlzDax';
	
	$string = '';
	if (!empty($_GET['category_id'])) {
		$string = '-'.$_GET['category_id'].'-'.$startRow_rs;
	} else {
		$s = preg_replace('/[^a-zA-Z0-9]+/', '_', strtolower($_GET['search']));
		$string = '-'.$s.'-'.$startRow_rs;
	}
	$urlKey = md5($url).$string;
	$dir = substr($urlKey, 0, 2);
	$urlTxtFile = CACHE_PATH.'/'.$dir.'/'.$urlKey.'.txt';
	if (file_exists($urlTxtFile)) {
		$cache = 'Cached Content';
		$result = file_get_contents($urlTxtFile);
	} else {
		$cache = 'No Cached Content';
		$result = curlget($url);
		if (!is_dir(CACHE_PATH.'/'.$dir)) {
			mkdir(CACHE_PATH.'/'.$dir);
			chmod(CACHE_PATH.'/'.$dir, 0777);
		}
		file_put_contents($urlTxtFile, $result);
	}
	$results = json_decode($result, 1);
	if ($results['status'] != 'ok') {
		$error = 'Problem fetching contents. Please try again after some time.';
	} else if (empty($results['response']['total_row_count'])) {
		$error = 'No Results Found.';
	} else {
		$data['total'] = $results['response']['total_row_count'];
		$totalRows_rs = $data['total'];
		$totalPages_rs = ceil($totalRows_rs/$maxRows_rs)-1;
		$data['rows'] = $results['response']['data'];
		$return = array();
		if (!empty($data['rows'])) {
			foreach ($data['rows'] as $k => $v) {
				if (empty($v['category_ids'][0])) $v['category_ids'][0] = 1;
				$res = array();
				$res['name'] = !empty($v['name']) ? $v['name'] : NULL;
				$res['factual_id'] = !empty($v['factual_id']) ? $v['factual_id'] : NULL;
				$details = get_businesses_factual_id($res['factual_id']);
				if (!empty($details)) {
					$return[] = array('id' => $details['business_id'], 'res' => $details);
					continue;
				}
				$res['address'] = !empty($v['address']) ? $v['address'] : NULL;
				$res['address2'] = !empty($v['address_extended']) ? $v['address_extended'] : NULL;
				$res['country'] = !empty($v['country']) ? strtoupper($v['country']) : NULL;
				$res['state'] = !empty($v['region']) ? strtoupper($v['region']) : NULL;
				$res['city'] = !empty($v['locality']) ? strtoupper($v['locality']) : NULL;
				$res['category_id'] = !empty($v['category_ids'][0]) ? $v['category_ids'][0] : NULL;
				$res['lat'] = !empty($v['latitude']) ? $v['latitude'] : NULL;
				$res['lon'] = !empty($v['longitude']) ? $v['longitude'] : NULL;
				$res['zipcode'] = !empty($v['postcode']) ? $v['postcode'] : NULL;
				$res['phone'] = !empty($v['tel']) ? $v['tel'] : NULL;
				$res['website'] = !empty($v['website']) ? $v['website'] : NULL;
				$res['url'] = preg_replace('/[^a-zA-Z0-9]+/', '_', strtolower($res['name']));
				$res['owner_id'] = NULL;
				$res['user_id'] = !empty($_SESSION['MM_UserID']) ? $_SESSION['MM_UserID'] : 0;
				$res['site_id'] = $site_id;
				$res['extra'] = NULL;
				$res['description'] = NULL;
				$res['skype'] = NULL;
				$res['email'] = !empty($v['email']) ? $v['email'] : NULL;
				$insertSQL = sprintf("INSERT INTO z_business (user_id, owner_id, name, url, website, category_id, `description`, address, address2, city, `state`, country, zipcode, lat, lon, phone, email, skype, site_id, extras, factual_id) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($res['user_id'], "int"),
                       GetSQLValueString($res['owner_id'], "int"),
                       GetSQLValueString($res['name'], "text"),
                       GetSQLValueString($res['url'], "text"),
                       GetSQLValueString($res['website'], "text"),
                       GetSQLValueString($res['category_id'], "int"),
                       GetSQLValueString($res['description'], "text"),
                       GetSQLValueString($res['address'], "text"),
                       GetSQLValueString($res['address2'], "text"),
                       GetSQLValueString($res['city'], "text"),
                       GetSQLValueString($res['state'], "text"),
                       GetSQLValueString($res['country'], "text"),
                       GetSQLValueString($res['zipcode'], "text"),
                       GetSQLValueString($res['lat'], "double"),
                       GetSQLValueString($res['lon'], "double"),
                       GetSQLValueString($res['phone'], "text"),
                       GetSQLValueString($res['email'], "text"),
                       GetSQLValueString($res['skype'], "text"),
                       GetSQLValueString($res['site_id'], "int"),
                       GetSQLValueString($res['extras'], "text"),
                       GetSQLValueString($res['factual_id'], "text"));

				  mysql_select_db($database_conn, $conn);
				  $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());
				$return[] = array('id' => mysql_insert_id(), 'res' => $res);
			}
		}//end if empty data rows
	}//end if results status

$get = $_GET;
if (isset($get['p'])) unset($get['p']);
if (isset($get['pageNum_rs'])) unset($get['pageNum_rs']);
if (isset($get['totalRows_rs'])) unset($get['totalRows_rs']);
if (isset($get['ref'])) unset($get['ref']);
$queryString_rs = '&'.http_build_query($get);
$queryString_rs = sprintf("&totalRows_rs=%d%s", $totalRows_rs, $queryString_rs);
}//end get search
?>
<script src="/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">


<header>
	<h1><strong>Search Business</strong></h1>
<form action="" method="get" name="form1" id="form1">
	<span id="sprytextfield1">
		<label for="search"></label>
		<input name="search" type="text" id="search" size="50" value="<?php if (isset($_GET['search'])) echo $_GET['search']; ?>">
		<br>
		<span class="textfieldRequiredMsg">A value is required.</span></span>
		<input type="submit" name="submit" id="submit" value="Search">
	</form>
</header>
<div class="container" id="top">
	<div class="row">
		<?php if (!empty($error)) { ?>
			<div class="12u">
			<?php echo $error; ?>
			</div>
		<?php } else if (!empty($return)) { ?>
			<div class="12u">
				<?php if (!empty($data['total'])) { ?>
				<?php echo $data['total']; ?> Results Found.
				<br />
				<?php } ?>
				<p>Records <?php echo ($startRow_rs + 1) ?> to <?php echo min($startRow_rs + $maxRows_rs, $totalRows_rs) ?> of <?php echo $totalRows_rs ?></p>
				<br />
				<table border="0" cellpadding="5" cellspacing="0">
					<tr>
						<td><?php if ($pageNum_rs > 0) { // Show if not first page ?>
								<a href="<?php printf("%s?pageNum_rs=%d%s", $currentPage, 0, $queryString_rs); ?>">First</a>  &nbsp;&nbsp;&nbsp;&nbsp;
								<?php } // Show if not first page ?></td>
						<td><?php if ($pageNum_rs > 0) { // Show if not first page ?>
								<a href="<?php printf("%s?pageNum_rs=%d%s", $currentPage, max(0, $pageNum_rs - 1), $queryString_rs); ?>">Previous</a>  &nbsp;&nbsp;&nbsp;&nbsp;
								<?php } // Show if not first page ?></td>
						<td><?php if ($pageNum_rs < $totalPages_rs) { // Show if not last page ?>
								<a href="<?php printf("%s?pageNum_rs=%d%s", $currentPage, min($totalPages_rs, $pageNum_rs + 1), $queryString_rs); ?>">Next</a> &nbsp;&nbsp;&nbsp;&nbsp;
								<?php } // Show if not last page ?></td>
						<td><?php if ($pageNum_rs < $totalPages_rs) { // Show if not last page ?>
								<a href="<?php printf("%s?pageNum_rs=%d%s", $currentPage, $totalPages_rs, $queryString_rs); ?>">Last</a>
								<?php } // Show if not last page ?></td>
					</tr>
				</table>
			</div>
			<div class="8u">
				<ul style="list-style:inside;">
					<?php foreach ($return as $k => $v) { ?>
						<li style="font-size:12px;"><a href="<?php echo $site->path; ?>business/detail/<?php echo $v['res']['url']; ?>-<?php echo $v['id']; ?>"><strong><?php echo $v['res']['name']; ?></strong></a> (<?php echo $v['res']['address']; if (!empty($v['res']['address2'])) echo ', '.$v['res']['address']; echo ', '.$v['res']['city']; echo ', '.$v['res']['state']; echo ', '.$v['res']['country']; echo ', '.$v['res']['zipcode']; echo ', Phone: '.$v['res']['phone']; echo ', Email: '.$v['res']['email']; echo ', Website: <a href="'.$v['res']['website'].'" target="_blank">Visit</a>'; ?>)</li>
					<?php } ?>
				</ul>
			</div>
		<?php } ?>
		<div class="4u">
			<h3>Category</h3>
			<ul style="list-style:inside;">
			<?php foreach ($category as $k => $v) { ?>
			<li style="font-size:11px;"><a href="<?php echo $site->path; ?>business/search?search=<?php echo urlencode($v); ?>&category_id=<?php echo $k; ?>"><?php echo $v; ?></a> <?php if (isset($categoryCnt[$k])) echo '('.$categoryCnt[$k].')'; ?></li>
			<?php } ?>
			</ul>
		</div>
	</div>
</div>
<footer>
<?php echo $cache; ?>
</footer>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur"], hint:"Enter Keyword"});
</script>
<?php if (!empty($url)) { ?>
<!-- url is: <?php echo $url; ?> -->
<?php } ?>