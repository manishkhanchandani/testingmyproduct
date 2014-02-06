<?php
$business = get_businesses();
$return = array();
if (!empty($business)) {
	foreach ($business as $k => $v) {
		$return[$v['category']][] = $v;
	}
}
?>
<header>
	<h1><strong>Business List</strong></h1>
	<div><a href="<?php echo $site->path; ?>business/add">Add a business</a> | <a href="<?php echo $site->path; ?>business/search">Search</a></div>
</header>

<div class="container" id="top">
	<div class="row">
		<?php foreach ($return as $k => $v) { ?>
		<div class="12u">
			<h4><strong><?php echo $k; ?></strong></h4>
			<ul style="list-style:inside;">
				<?php foreach ($v as $k1 => $v1) { ?>
					<li style="font-size:12px;"><a href="<?php echo $site->path; ?>business/detail/<?php echo $v1['url']; ?>-<?php echo $v1['business_id']; ?>"><strong><?php echo $v1['name']; ?></strong></a> (<?php echo $v1['address']; if (!empty($v1['address2'])) echo ', '.$v1['address']; echo ', '.$v1['city']; echo ', '.$v1['state']; echo ', '.$v1['country']; echo ', '.$v1['zipcode']; echo ', Phone: '.$v1['phone']; ?>)
					</li>
				<?php } ?>
			</ul>
		</div>
		<?php } ?>
	</div>
</div>