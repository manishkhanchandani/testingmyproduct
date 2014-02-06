<?php
$nearby = get_nearby_cities($details['lat'], $details['lon'], 30);
$site->nearby = $nearby;
?>
<div class="container" id="top">
	<div class="row">
		<div class="4u">
			<span class="image image-full"><div id="mapCanvas" style="width:100%; height:100%; min-width:300px; min-height:300px"></div>
<script type="text/javascript">
// BeginOAWidget_Instance_2187524: #mapCanvas

// initialize the google Maps
var latitude = '<?php echo $site->details['lat']; ?>';
var longitude = '<?php echo $site->details['lon']; ?>';
initializeGoogleMap('mapCanvas');
// EndOAWidget_Instance_2187524
</script>
			<!--<img src="images/me.jpg" alt="" /> --></span>
		</div>
		<div class="8u">
			<header>
				<h1><strong><?php echo $site->details['city']; ?></strong>, <?php echo $site->details['state']; ?>, <?php echo $site->details['country']; ?></h1>
			</header>
			<p><strong>City:</strong> <?php echo $site->details['city']; ?></p>
			<p><strong>State:</strong> <?php echo $site->details['state']; ?></p>
			<p><strong>Country:</strong> <?php echo $site->details['country']; ?></p>
			<p><strong>Latitude:</strong> <?php echo $site->details['lat']; ?></p>
			<p><strong>Longitude:</strong> <?php echo $site->details['lon']; ?></p>
			<p><strong>Site ID:</strong> <?php echo $site_id; ?></p>
			<?php if (!empty($site->details['timezone'])) { ?><p><strong>Timezone:</strong> <?php echo $site->details['timezone']; ?></p><?php } ?>
			<?php if (!empty($site->details['north'])) { ?><p><strong>Boundary:</strong> <?php echo $site->details['north']; ?>, <?php echo $site->details['south']; ?>, <?php echo $site->details['west']; ?>, <?php echo $site->details['east']; ?></p><?php } ?>
			<?php if (!empty($site->nearby)) { ?>
				<p><strong>Nearby Cities:</strong> 
					<?php foreach ($site->nearby as $v) { ?>
					<a href="<?php echo 'http://'.$v['url'].'.'._base_domain; ?>"><?php echo $v['city']; ?></a> (<?php echo $v['distance']; ?> mi)&nbsp;&nbsp;<?php } ?>
				</p>
			<?php } ?>
		</div>
	</div>
</div>