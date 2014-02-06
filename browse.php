<?php

define(
	'STATES',
	serialize(
		array('US' => array(
			'Alabama' => 'AL',
			'Alaska' => 'AK',
			'Arizona' => 'AZ',
			'Arkansas' => 'AR',
			'California' => 'CA',
			'Colorado' => 'CO',
			'Connecticut' => 'CT',
			'Delaware' => 'DE',
			'District of Columbia' => 'DC',
			'Florida' => 'FL',
			'Georgia' => 'GA',
			'Hawaii' => 'HI',
			'Idaho' => 'ID',
			'Illinois' => 'IL',
			'Indiana' => 'IN',
			'Iowa' => 'IA',
			'Kansas' => 'KS',
			'Kentucky' => 'KY',
			'Louisiana' => 'LA',
			'Maine' => 'ME',
			'Maryland' => 'MD',
			'Massachusetts' => 'MA',
			'Michigan' => 'MI',
			'Minnesota' => 'MN',
			'Mississippi' => 'MS',
			'Missouri' => 'MO',
			'Montana' => 'MT',
			'Nebraska' => 'NE',
			'Nevada' => 'NV',
			'New Hampshire' => 'NH',
			'New Jersey' => 'NJ',
			'New Mexico' => 'NM',
			'New York' => 'NY',
			'North Carolina' => 'NC',
			'North Dakota' => 'ND',
			'Ohio' => 'OH',
			'Oklahoma' => 'OK',
			'Oregon' => 'OR',
			'Pennsylvania' => 'PA',
			'Rhode Island' => 'RI',
			'South Carolina' => 'SC',
			'South Dakota' => 'SD',
			'Tennessee' => 'TN',
			'Texas' => 'TX',
			'Utah' => 'UT',
			'Vermont' => 'VT',
			'Virginia' => 'VA',
			'Washington' => 'WA',
			'West Virginia' => 'WV',
			'Wisconsin' => 'WI',
			'Wyoming' => 'WY',
			'Puerto Rico' => 'PR'
			),
			'IN' => array(
				'Andaman and Nicobar Islands' => 'AN',
				'Andhra Pradesh' => 'AP',
				'Arunachal Pradesh' => 'AR',
				'Assam' => 'AS',
				'Bangla' => 'WB',
				'Bihar' => 'BR',
				'Chandigarh' => 'CH',
				'Chhattisgarh' => 'CG',
				'Dadra and Nagar Haveli' => 'DN',
				'Daman and Diu' => 'DD',
				'Delhi' => 'DL',
				'Goa' => 'GA',
				'Gujarat' => 'GJ',
				'Haryana' => 'HR',
				'Himachal Pradesh' => 'HP',
				'Jammu and Kashmir' => 'JK',
				'Jharkhand' => 'JH',
				'Karnataka' => 'KA',
				'Kerala' => 'KL',
				'Lakshadweep' => 'LD',
				'Madhya Pradesh' => 'MP',
				'Maharashtra' => 'MH',
				'Manipur' => 'MN',
				'Meghalaya' => 'ML',
				'Mizoram' => 'MZ',
				'Nagaland' => 'NL',
				'Orissa' => 'OR',
				'Pondicherry' => 'PY',
				'Punjab' => 'PB',
				'Rajasthan' => 'RJ',
				'Sikkim' => 'SK',
				'Tamil Nadu' => 'TN',
				'Tripura' => 'TR',
				'Uttar Pradesh' => 'UP',
				'Uttaranchal' => 'UK'
			),
			'CA' => array(
				'Alberta' => 'AB',
				'British Columbia' => 'BC',
				'Manitoba' => 'MB',
				'New Brunswick' => 'NB',
				'Newfoundland' => 'NF',
				'Northwest Territories' => 'NT',
				'Nova Scotia' => 'NS',
				'Ontario' => 'ON',
				'Prince Edward Island' => 'PE',
				'Quebec' => 'PQ',
				'Saskatchewan' => 'SK',
				'Yukon Territory' => 'YT'
			),
			'AU' => array(
				'Australian Capital Territory' => 'ACT',
				'New South Wales' => 'NSW',
				'Northern Territory' => 'NT',
				'Queensland' => 'QLD',
				'South Australia' => 'SA',
				'Tasmania' => 'TAS',
				'Victoria' => 'VIC',
				'Western Australia' => 'WA'
			),
			'NZ' => array
			(
				'Auckland' => 'AU',
				'Bay of Plenty' => 'BP',
				'Canterbury' => 'CA',
				'Chatham Islands' => 'CI',
				'Gisborne' => 'GI',
				'Hawkeʿs Bay' => 'HB',
				'Manawatu-Wanganui' => 'MW',
				'Marlborough' => 'MA',
				'Nelson' => 'NE',
				'Northland' => 'NO',
				'Otago' => 'OT',
				'Southland' => 'SO',
				'Taranaki' => 'TK',
				'Tasman' => 'TS',
				'Waikato' => 'WK',
				'Wellington' => 'WG',
				'West Coast' => 'WC',
			),
			'UK' => array(
				'Antrim' => 'AN',
				'Armagh' => 'AR',
				'Avon' => 'AV',
				'Bedfordshire' => 'BF',
				'Berkshire' => 'BS',
				'Borders' => 'BO',
				'Buckinghamshire' => 'BU',
				'Cambridgeshire' => 'CA',
				'Central' => 'CE',
				'Cheshire' => 'CH',
				'Cleveland' => 'CL',
				'Clwyd' => 'CY',
				'Cornwall' => 'CO',
				'Cumbria' => 'CU',
				'Derbyshire' => 'DS',
				'Devon' => 'DE',
				'Dorset' => 'DO',
				'Down' => 'DN',
				'Dumfries & Galloway' => 'DG',
				'Durham' => 'DU',
				'Dyfed' => 'DY',
				'East Sussex' => 'ES',
				'Essex' => 'EX',
				'Fermanagh' => 'FE',
				'Fife' => 'FI',
				'Gloucestershire' => 'GL',
				'Grampian' => 'GR',
				'Greater Manchester' => 'GM',
				'Gwent' => 'GW',
				'Gwynedd' => 'GY',
				'Hampshire' => 'HM',
				'Hapshire' => 'HP',
				'Hereford & Worcester' => 'HW',
				'Hertfordshire' => 'HE',
				'Highland' => 'HI',
				'Humberside' => 'HU',
				'Isle Of Bute' => 'IB',
				'Isle Of White' => 'IW',
				'Kent' => 'KE',
				'Lancashire' => 'LA',
				'Leicestershire' => 'LE',
				'Lincolnshire' => 'LI',
				'London' => 'LN',
				'Londonderry' => 'LD',
				'Lothian' => 'LO',
				'Merseyside' => 'ME',
				'Mid Glamorgan' => 'MG',
				'Middlesex' => 'MS',
				'Norfolk' => 'NF',
				'North Yorkshire' => 'NY',
				'Northamptonshire' => 'NA',
				'Northumberland' => 'NU',
				'Nottinghamshire' => 'NO',
				'Oxfordshire' => 'OX',
				'Powys' => 'PO',
				'Shetlands' => 'SL',
				'Shropshire' => 'SH',
				'Somerset' => 'SO',
				'South Glamorgan' => 'SG',
				'South Yorkshire' => 'SY',
				'Staffordshire' => 'ST',
				'Strathclyde' => 'SC',
				'Suffolk' => 'SF',
				'Surrey' => 'SU',
				'Sussex' => 'SS',
				'Tayside' => 'TA',
				'Tyne & Wear' => 'TW',
				'Tyrone' => 'TY',
				'Warwickshire' => 'WA',
				'West Glamorgan' => 'WG',
				'West Lothian' => 'WL',
				'West Midlands' => 'WM',
				'West Sussex' => 'WS',
				'West Yorkshire' => 'WY',
				'Western Isles' => 'WI',
				'Wiltshire' => 'WT',
			),
			'CN' => array(
				'Anhui' => 'AH',
				'Aomen' => 'AN',
				'Beijing' => 'BJ',
				'Chongqing' => 'CQ',
				'Fujian' => 'FJ',
				'Gansu' => 'GS',
				'Guangdong' => 'GD',
				'Guangxi' => 'GX',
				'Guizhou' => 'GZ',
				'Hainan' => 'HI',
				'Hebei' => 'HE',
				'Heilongjiang' => 'HL',
				'Henan' => 'HA',
				'Hongkong' => 'HK',
				'Hubei' => 'HB',
				'Hunan' => 'HN',
				'Jiangsu' => 'JS',
				'Jiangxi' => 'JX',
				'Jilin' => 'JL',
				'Liaoning' => 'LN',
				'Neimenggu' => 'NM',
				'Ningxia' => 'NX',
				'Qinghai' => 'QH',
				'Schanghai' => 'SH',
				'Shaanxi' => 'SN',
				'Shandong' => 'SD',
				'Shanxi' => 'SX',
				'Sichuan' => 'SC',
				'Tianjin' => 'TJ',
				'Xinjiang' => 'XJ',
				'Xizang' => 'XZ',
				'Yunnan' => 'YN',
				'Zhejiang' => 'ZJ'
			),
			'SN' => array(
				'Singapore' => 'SN'
			),
			'MY' => array(
				'Johor' => 'JHR',
				'Kedah' => 'KDH',
				'Kelantan' => 'KTN',
				'Kuala Lumpur' => 'KUL',
				'Labuan' => 'LBN',
				'Melaka' => 'MLK',
				'Negeri Sembilan' => 'NSN',
				'Pahang' => 'PHG',
				'Perak' => 'PRK',
				'Perlis' => 'PLS',
				'Pulau Pinang' => 'PNG',
				'Sabah' => 'SBH',
				'Sarawak' => 'SWK',
				'Selangor' => 'SGR',
				'Terengganu' => 'TRG',
			),
		)
	)
);
if (empty($_GET['country'])) $_GET['country'] = 'US';
if (!empty($_GET['country'])) {
	$co = strtoupper($_GET['country']);
	$long_states = unserialize(STATES);
	$short_states = array_flip($long_states[$co]);
	$state = getstate($_GET['country']);
}

if (!empty($_GET['country']) && !empty($_GET['state'])) {
$cities = getlocation(_get('state'), _get('country'));
}

if (!empty($_GET['city_id'])) {
	$cities_search = getlocationcityid($_GET['city_id']);
}
if (!empty($_GET['city'])) { 
	$city_search = getlocationcity($_GET['city']);
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
		<div class="4u">
		<header>
			<h2>Browse States</h2>
		</header>
			<ul>
				<?php foreach ($state as $v) {
					if (empty($v['state'])) continue; ?>
				<li><a href="http://<?php echo _base_domain; ?>/browse?home=1&state=<?php echo $v['state']; ?>&country=<?php echo $v['country']; ?>#cities"><?php echo $short_states[$v['state']]; ?></a></li>
				<?php } ?>
			</ul>
		</div>
			<?php if (!empty($cities)) { ?>
		<div class="4u">
				<header>
					<h2>Browse Cities in <?php echo $short_states[$_GET['state']]; ?></h2>
				</header>
				<ul>
					<?php foreach ($cities as $v) { ?>
					<li><a href="http://<?php echo $v['url']; ?>.<?php echo _base_domain; ?>"><?php echo $v['city']; ?></a></li>
					<?php } ?>
				</ul>
		</div>
			<?php } ?>
		<div class="4u">
			<header>
				<h2>Search Cities</h2>
			</header>
			<div>
				<form id="form1" name="form1" method="get" action="/browse">
					<input type="text" name="city" id="city" value="" />
					<input type="hidden" name="city_id" id="city_id" value="" /><br /><br /><br />
					<input type="hidden" name="home" id="home" value="1" />
					<input type="submit" name="Search" id="Search" value="Search" class="button button-big" />
				</form>
				<?php if (!empty($cities_search)) { ?>
						<ol>
							<li><a href="http://<?php echo $cities_search['url'].'.'._base_domain; ?>"><?php echo $cities_search['city'].', '.$cities_search['state'].', '.$cities_search['country']; ?></a></li>
						</ol>
						<meta http-equiv="refresh" content="0;URL=http://<?php echo $cities_search['url'].'.'._base_domain; ?>" />
				<?php } ?>
				<?php if (!empty($city_search)) { ?>
						<ol>
							<?php foreach ($city_search as $v) { ?>
							<li><a href="http://<?php echo $v['url'].'.'._base_domain; ?>"><?php echo $v['city'].', '.$v['state'].', '.$v['country']; ?></a></li>
							<?php } ?>
						</ol>
				<?php } ?>
			</div>
		</div>
	</div>
</div>