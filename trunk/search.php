<?php
if (!empty($_GET['city_id'])) {
	$cities = getlocationcityid($_GET['city_id']);
}
if (!empty($_GET['city'])) { 
	$city = getlocationcity($_GET['city']);
}
?>

<script type='text/javascript' src='/js/jquery.autocomplete.js'></script>
<link href="/js/jquery.autocomplete.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
$().ready(function() {
 	$("#city").autocomplete("autocomplete_city.php", {
		minChars: 3,
		width: 320,
		selectFirst: false,
		formatItem: function(data, i, total) {
			return data[1];
		},
		formatResult: function(data, value) {
			return data[1];
		}
	});

	$("#city").result(function(event, data, formatted) {
		if (data) {
			$('#city_id').val(formatted);
		}
	});
});
</script>
<div class="container" id="top">
	<div class="row">
		<div class="12u">
			<header>
				<h2>Search Cities</h2>
			</header>
			<form id="form1" name="form1" method="get" action="/search">
				<input type="text" name="city" id="city" value="" />
				<input type="hidden" name="city_id" id="city_id" value="" /><br /><br /><br />
				<input type="submit" name="Search" id="Search" value="Search" class="button button-big" />
			</form>
			<?php if (!empty($cities)) { ?>
					<ol>
						<li><a href="http://<?php echo $cities['url'].'.'._base_domain; ?>"><?php echo $cities['city'].', '.$cities['state'].', '.$cities['country']; ?></a></li>
					</ol>
					<meta http-equiv="refresh" content="0;URL=http://<?php echo $cities['url'].'.'._base_domain; ?>" />
			<?php } ?>
			<?php if (!empty($city)) { ?>
					<ol>
						<?php foreach ($city as $v) { ?>
						<li><a href="http://<?php echo $v['url'].'.'._base_domain; ?>"><?php echo $v['city'].', '.$v['state'].', '.$v['country']; ?></a></li>
						<?php } ?>
					</ol>
			<?php } ?>
		</div>
	</div>
</div>
			