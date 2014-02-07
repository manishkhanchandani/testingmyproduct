<!DOCTYPE HTML>
<html><head>
<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $site->pageTitle; ?></title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,600,700" rel="stylesheet" />
		<script src="/js/jquery.min.js"></script>
		<script src="/js/config.js"></script>
		<script src="/js/skel.min.js"></script>
		<link rel="stylesheet" href="/css/skel-noscript.css" />
			<link rel="stylesheet" href="/css/style.css" />
			<link rel="stylesheet" href="/css/style-desktop.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="/js/html5shiv.js"></script><link rel="stylesheet" href="/css/ie8.css" /><![endif]-->
		<!--[if lte IE 7]><link rel="stylesheet" href="/css/ie7.css" /><![endif]-->
<style type="text/css">
/*.4u {
	padding-top:10px;padding-bottom:10px;
}*/
</style>
<script language="javascript">
// JavaScript Document
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}


function initializeGoogleStreetMap(mapcanvas, latitude, longitude) {
	var latlng = new google.maps.LatLng(latitude, longitude);
	var panoramaOptions = {
    position:latlng,
    pov: {
      heading: 270,
      pitch:0,
      zoom:1
    },
    visible:true
  };
  var panorama = new google.maps.StreetViewPanorama(document.getElementById(mapcanvas), panoramaOptions);
}

function initializeGoogleMap(mapcanvas) {
	// set latitude and longitude to center the map around
	var latlng = new google.maps.LatLng(latitude, 
										longitude);
	
	// set up the default options
	var myOptions = {
	  zoom: 15,
	  center: latlng,
	  navigationControl: true,
	  navigationControlOptions: 
		{style: google.maps.NavigationControlStyle.DEFAULT,
		 position: google.maps.ControlPosition.TOP_LEFT },
	  mapTypeControl: true,
	  mapTypeControlOptions: 
		{style: google.maps.MapTypeControlStyle.DEFAULT,
		 position: google.maps.ControlPosition.TOP_RIGHT },
	
	  scaleControl: true,
	   scaleControlOptions: {
			position: google.maps.ControlPosition.BOTTOM_LEFT
	  }, 
	  mapTypeId: google.maps.MapTypeId.ROADMAP,
	  draggable: true,
	  disableDoubleClickZoom: false,
	  keyboardShortcuts: true
	};
	var map = new google.maps.Map(document.getElementById(mapcanvas), myOptions);
		addMarker(map,latitude,longitude,"We are here");
}

// Add a marker to the map at specified latitude and longitude with tooltip
function addMarker(map,lat,long,titleText) {
	var markerLatlng = new google.maps.LatLng(lat,long);
	var marker = new google.maps.Marker({
	position: markerLatlng, 
	map: map, 
	title:"We are here",
	icon: ""});
}

</script>
<script type="text/javascript" src="https://www.google.com/jsapi?key=ABQIAAAALUsWUxJrv3zXUNCu0Kas1RQFv3AXA4OcITNh-zHKPaxsGpzj0xQrVCwfLY_kBbxK-4-gSU4j3c7huQ"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="http://wc5.org/jm/js/jquery.ui.map.extensions.js"></script>

<script type='text/javascript' src='/js/jquery.autocomplete.js'></script>
<link href="/js/jquery.autocomplete.css" rel="stylesheet" type="text/css">
<script type="text/xml">
<!--
<oa:widgets>
  <oa:widget wid="2187524" binding="#mapCanvas" />
</oa:widgets>
-->
</script>
	</head>
	<body>

		<!-- Nav -->
	<nav id="nav">
				<ul>
					<li><a href="http://<?php echo _base_domain; ?>?home=1"><img src="/images/home1.png" width="24" height="24" alt="" /></a></li>
					<li><a href="<?php echo $site->path; ?>"><?php echo $site->details['city']; ?></a></li>
					<li><a href="<?php echo $site->path; ?>myaccount">My Account</a></li>
					<li><a href="<?php echo $site->path; ?>news">News</a></li>
					<li><a href="<?php echo $site->path; ?>buysell">Buy & Sell</a></li>
					<li><a href="<?php echo $site->path; ?>housing">Housing</a></li>
					<li><a href="<?php echo $site->path; ?>matrimony">Matrimony</a></li>
					<li><a href="<?php echo $site->path; ?>friends">Friends</a></li>
					<li><a href="<?php echo $site->path; ?>services">Services</a></li>
					<li><a href="<?php echo $site->path; ?>jobs">Jobs</a></li>
					<li><a href="<?php echo $site->path; ?>freelance">Freelance Work</a></li>
					<li><a href="<?php echo $site->path; ?>personals">Personals</a></li>
					<li><a href="<?php echo $site->path; ?>portfolios">Portfolio's</a></li>
					<li><a href="<?php echo $site->path; ?>search">Search</a></li>
				</ul>
	</nav>
<div class="wrapper <?php echo $pageStyle; ?>">
	<article id="portfolio">
		<?php if (!empty($_SESSION['MM_Username'])) { ?>
			<div style="float:right; padding-right:20px">Welcome <b><?php echo $_SESSION['MM_Username']; ?></b>!! <a href="/users/logout"><img src="/images/exit.png" width="16" height="16"  /></a></div>
			<br style="clear:right" />
		<?php } ?>
		<?php echo !empty($content_for_layout) ? $content_for_layout : ''; ?>
	</article>
</div>
	<div class="navbottom">
	Advertisements - Coming Soon!!
	</div>
</body>
</html>