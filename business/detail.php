<?php
if (empty($_GET['id'])) {
	header("Location: ".$site->path.'businesslist');
	exit;
}
$business = get_businesses_detail($_GET['id']);
$site->pageTitle = $business['name'].' - '.$site->pageTitle;
?>
<script src="/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />


<div class="container" id="top">
	<div class="row">
		<div class="4u">
			<span class="image image-full"><div id="mapCanvas" style="width:100%; height:100%; min-width:300px; min-height:300px"></div>
			<div style="font-size:12px;">
				<form name="frmQuestion" id="frmQuestion" method="post" action="">
				<p><strong>Ask A Question From Business?</strong><br />
					<span id="sprytextfield1">
					<label for="question"></label>
					<input name="question" type="text" id="question" size="50" />
					<span class="textfieldRequiredMsg"><br />A value is required.</span></span> </p>
				<p><input type="submit" name="submit" id="submit" value="Ask" />
				<input type="hidden" name="business_id" id="business_id" value="<?php echo $business['business_id']; ?>" />
				</p>
				</form>
			</div>
<script type="text/javascript">
// BeginOAWidget_Instance_2187524: #mapCanvas

// initialize the google Maps
var latitude = '<?php echo $business['lat']; ?>';
var longitude = '<?php echo $business['lon']; ?>';
initializeGoogleMap('mapCanvas');
// EndOAWidget_Instance_2187524
</script>
			<!--<img src="images/me.jpg" alt="" /> --></span>
		</div>
		<div class="4u">
			<header>
				<strong style="font-size:18px;"><?php echo $business['name']; ?></strong>
			</header>
			<div style="font-size:11px;">
				<p><strong>Address: </strong> <?php echo $business['address']; ?><?php if (!empty($business['address2'])) { ?><br /><?php echo $business['address2']; ?><?php } ?><br /><?php echo $business['city']; ?>, <?php echo $business['state']; ?>, <?php echo $business['country']; ?>, <?php echo $business['zipcode']; ?></p>
				<?php if (!empty($business['phone'])) { ?><p><strong>Phone: </strong> <?php echo $business['phone']; ?></p><?php } ?>
				<?php if (!empty($business['email'])) { ?><p><strong>Email: </strong> <?php echo $business['email']; ?></p><?php } ?>
				<?php if (!empty($business['description'])) { ?><p><strong>Description: </strong><br /><?php echo $business['description']; ?></p><?php } ?>
				<?php if (!empty($business['website'])) { ?><p><strong>Website: </strong> <a href="<?php echo $business['website']; ?>" target="_blank">Visit</a></p><?php } ?>
			</div>
		</div>
		<div class="4u">
			<h3><strong>Reviews</strong></h3>
			<!--<ul style="list-style:inside;">
				<li>Review 1</li>
			</ul>
			<hr /> -->
			<form id="form1" name="form1" method="post" action="">
				<p><strong>Add Review:</strong><br />
					<span id="sprytextfield2">
					<label for="review"></label>
					<input type="text" name="review" id="review" />
				<span class="textfieldRequiredMsg"><br />A value is required.</span></span> </p>
				<p>
				<input type="submit" name="submit" id="submit" value="Submit" /></p>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur"], hint:"Enter a question"});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur"], hint:"Add a review"});
</script>
