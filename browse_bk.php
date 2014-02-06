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
if (!empty($_GET['country'])) {
	$co = strtoupper($_GET['country']);
	$long_states = unserialize(STATES);
	$short_states = array_flip($long_states[$co]);
	$state = getstate($_GET['country']);
}

if (!empty($_GET['country']) && !empty($_GET['state'])) {
$cities = getlocation(_get('state'), _get('country'));
}
?>

					<header>
						<h2>Browse Countries</h2>
					</header>
<div class="container" id="top">
	<div class="row">
		<div class="4u">
			<section class="box box-style1">
				<h3>North America</h3>
				<ul>
					<li><a href="http://<?php echo $site->ref.'.'._base_domain; ?>/browse?country=US#state">United States</a></li>
					<li><a href="http://<?php echo $site->ref.'.'._base_domain; ?>/browse?country=CA#state">Canada</a></li>
				</ul>
			</section>
		</div>
		<div class="4u">
			<section class="box box-style1">
				<h3>Asia</h3>
					<ul>
						<li><a href="http://<?php echo $site->ref.'.'._base_domain; ?>/browse?country=IN#state">India</a></li>
						<li><a href="http://<?php echo $site->ref.'.'._base_domain; ?>/browse?country=CN#state">China</a></li>
					</ul>
			</section>
		</div>
		<div class="4u">
			<section class="box box-style1">
				<h3>Asia</h3>
					<ul>
						<li><a href="http://<?php echo $site->ref.'.'._base_domain; ?>/browse?country=MY#state">Malaysia</a></li>
						<li><a href="http://<?php echo $site->ref.'.'._base_domain; ?>/browse?country=SN#state">Singapore</a></li>
					</ul>
			</section>
		</div>
		<div class="4u">
			<section class="box box-style1">
				<h3>Oceania</h3>
				<ul>
					<li><a href="http://<?php echo $site->ref.'.'._base_domain; ?>/browse?country=AU#state">Australia</a></li>
					<li><a href="?ref=<?php echo $site->ref; ?>&p=browse&country=NZ#state">New Zealand</a></li>
				</ul>
			</section>
		</div>
		<div class="4u">
			<section class="box box-style1">
				<h3>Europe</h3>
				<ul>
					<li><a href="?ref=<?php echo $site->ref; ?>&p=browse&country=UK#state">United Kingdom</a></li>
				</ul>
			</section>
		</div>
	</div>
</div>
			
			<?php if (!empty($state)) { ?>
		<!-- Search -->
			<div class="wrapper wrapper-style2">
				<article id="state">
					<header>
						<h2>Browse All States</h2>
					</header>
					<ul>
						<?php foreach ($state as $v) {
							if (empty($v['state'])) continue; ?>
						<li><a href="?ref=<?php echo $site->ref; ?>&p=browse&state=<?php echo $v['state']; ?>&country=<?php echo $v['country']; ?>#cities"><?php echo $short_states[$v['state']]; ?></a></li>
						<?php } ?>
					</ul>
				</article>
			</div>
			<?php } ?>
			
			<?php if (!empty($cities)) { ?>
		<!-- Search -->
			<div class="wrapper wrapper-style2">
				<article id="cities">
					<header>
						<h2>Browse All Cities</h2>
					</header>
					<ul>
						<?php foreach ($cities as $v) { ?>
						<li><a href="?ref=<?php echo $v['url']; ?>"><?php echo $v['city']; ?></a></li>
						<?php } ?>
					</ul>
				</article>
			</div>
			<?php } ?>