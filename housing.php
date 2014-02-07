<?php
include_once('Connections/connHousing.php');

$nearby = get_nearby_cities($details['lat'], $details['lon'], 30);
$site->nearby = $nearby;
$nearbyCities = '';
if (!empty($site->nearby)) { 
	foreach ($site->nearby as $v) { 
		$nearbyCities .= $v['city'].' ('.$v['distance'].' mi), ';
	}
}
$pageStyle = 'wrapper-style3';
?>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css">
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
<header>
	<h2>Rental Apartments</h2>
	<p>Rentals | Sale | Rooms / Shared | Office / Commercials | sublets / temporary | Housing Wanted | Housing Swap | Vacation Rentals | Parking / Storage</p>
</header>
<div class="container" id="top">
	<div class="row">
		<div class="4u">
			<h3><strong>In <?php echo $site->details['city']; ?></strong></h3>
			<p>Coming soon..</p>
			<?php pr($site); ?>
		</div>
		<div class="4u">
			<h3><strong><a href="#">Nearby Cities</a></strong></h3>
			<p style="font-size:10px;"><?php echo $nearbyCities; ?></p>
		</div>
		<div class="4u">
			<h3><strong>Add New</strong></h3>
			<form name="form1" method="post" action="">
				<strong>Title:</strong> <span id="spryTitle">
				<input type="text" name="title" id="title">
				<span class="textfieldRequiredMsg">A value is required.</span></span>
				<p><strong>City:</strong> <input type="text" name="city" id="city" value="<?php echo $site->details['city']; ?>, <?php echo $site->details['state']; ?>, <?php echo $site->details['country']; ?>" />
					<input type="hidden" name="city_id" id="city_id" value="<?php echo $site->details['city_id']; ?>" /></p>
				<p><strong>Description:</strong><br>
					<span id="sprytextarea1">
						<label for="description"></label>
						<textarea name="description" id="description" cols="45" rows="5"></textarea>
						<br />
						<span id="countsprytextarea1">&nbsp;</span><span class="textareaRequiredMsg"><br />A value is required.</span><span class="textareaMinCharsMsg"><br />Minimum number of 200 characters not met.</span></span>
				</p>
				<p>Sqft: <span id="sprySqft">
				<label for="sqft"></label>
				<input type="text" name="sqft" id="sqft">
				<span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></p>
				<p>Bedrooms: <span id="spryBedrooms">
				<label for="bedrooms"></label>
				<input type="text" name="bedrooms" id="bedrooms">
				<span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></p>
				<p>Bathrooms: <span id="spryBathrooms">
					<label for="bathrooms"></label>
					<input type="text" name="bathrooms" id="bathrooms">
				<span class="textfieldRequiredMsg">A value is required.</span></span></p>
			</form>
			<p></p>
		</div>
	</div>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("spryTitle", "none", {validateOn:["blur"], hint:"Enter a title"});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {validateOn:["blur"], minChars:200, counterId:"countsprytextarea1", counterType:"chars_count", hint:"Enter a description"});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprySqft", "integer", {validateOn:["blur"], hint:"Enter Sq.Ft"});
var sprytextfield3 = new Spry.Widget.ValidationTextField("spryBedrooms", "integer", {validateOn:["blur"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("spryBathrooms", "none", {validateOn:["blur"]});
</script>
