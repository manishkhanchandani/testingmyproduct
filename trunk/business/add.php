<?php require_once('../Connections/conn.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "/users/login";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
	$_POST['url'] = preg_replace('/[^a-zA-Z0-9]+/', '_', strtolower($_POST['name']));
	if ($_POST['owner'] == 1) $_POST['owner_id'] = $_SESSION['MM_UserID'];
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO z_business (user_id, owner_id, name, url, website, category_id, `description`, address, address2, city, `state`, country, zipcode, lat, lon, phone, email, skype, site_id, extras, factual_id) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['user_id'], "int"),
                       GetSQLValueString($_POST['owner_id'], "int"),
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['url'], "text"),
                       GetSQLValueString($_POST['website'], "text"),
                       GetSQLValueString($_POST['category_id'], "int"),
                       GetSQLValueString($_POST['description'], "text"),
                       GetSQLValueString($_POST['address'], "text"),
                       GetSQLValueString($_POST['address2'], "text"),
                       GetSQLValueString($_POST['city'], "text"),
                       GetSQLValueString($_POST['state'], "text"),
                       GetSQLValueString($_POST['country'], "text"),
                       GetSQLValueString($_POST['zipcode'], "text"),
                       GetSQLValueString($_POST['lat'], "double"),
                       GetSQLValueString($_POST['lon'], "double"),
                       GetSQLValueString($_POST['phone'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['skype'], "text"),
                       GetSQLValueString($_POST['site_id'], "int"),
                       GetSQLValueString($_POST['extras'], "text"),
                       GetSQLValueString($_POST['factual_id'], "text"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertGoTo = "/business/list";
  header(sprintf("Location: %s", $insertGoTo));
  exit;
}


$category = get_categories();
$editFormAction = '/business/add';
?>
<script src="/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
			<script src="/SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link href="/SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<header>
<h1><strong>Add A Business</strong></h1>
</header>
<div class="container" id="top">
	<div class="row">
		<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
			<div class="4u">
							<h3><strong>Business Details</strong></h3>
							<p><strong>Business Name:</strong><br>
							 <span id="sprytextfield1">
							<input name="name" type="text" id="name" size="50" />
							<span class="textfieldRequiredMsg"><br>A value is required.</span></span>
							</p>
				<p><strong>Category:</strong><br />
					<span id="spryselect1">
								<label for="category_id"></label>
								<select name="category_id" id="category_id">
									<option value=""></option>
									<?php foreach ($category as $k => $v) { ?>
										<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
									<?php } ?>
								</select>
								<span class="selectRequiredMsg"><br />Please select an item.</span></span>
				</p>
				<p><strong>Description:</strong><br />
					<label for="description"></label>
					<textarea name="description" id="description" cols="45" rows="5"></textarea>
				</p>
							<p>Extras:<br />
								<label for="extras"></label>
								<textarea name="extras" id="extras" cols="45" rows="5"></textarea>
							</p>
				</div>
						<div class="4u">
							<h3><strong>Address Details</strong></h3>
							<p><strong>Address 1:</strong><br> 
								<span id="sprytextfield2">
								<input name="address" type="text" id="address" size="50" />
								<span class="textfieldRequiredMsg"><br>A value is required.</span></span></p>
							<p><strong>Address 2:</strong><br>
						<input name="address2" type="text" id="address2" size="50" />
							</p>
							<p><strong>City:<br>
							</strong>
						<input name="city" type="text" id="city" size="50" value="<?php echo $site->details['city']; ?>" readonly />
							</p>
							<p><strong>State:<br>
							</strong>
							<input name="state" type="text" id="state" size="50" value="<?php echo $site->details['state']; ?>" readonly />
							</p>
							<p><strong>Country:<br>
							</strong>
								<input name="country" type="text" id="country" size="50" value="<?php echo $site->details['country']; ?>" readonly />
							</p>
							<p><strong>Zipcode:<br>
							</strong>
						<input type="text" name="zipcode" id="zipcode" />
							</p>
							<p><strong>Latitude:</strong><span id="sprytextfield3"><br>
								<label for="lat"></label>
								<input type="text" name="lat" id="lat" value="<?php echo $site->details['lat']; ?>" />
							<span class="textfieldRequiredMsg"><br>A value is required.</span></span></p>
							<p><strong>Longitude:</strong><br> 
								<span id="sprytextfield4">
								<input type="text" name="lon" id="lon" value="<?php echo $site->details['lon']; ?>" />
							<span class="textfieldRequiredMsg"><br>A value is required.</span></span></p>
						</div>
						<div class="4u">
							<h3><strong>Contact Details</strong></h3>
							<p><strong>Phone:
								</strong><br>
								<label for="phone"></label>
								<input name="phone" type="text" id="phone" size="50">
							</p>
							<p><strong>Email: </strong><br>
								<span id="sprytextfield5">
								<label for="email"></label>
								<input name="email" type="text" id="email" size="50">
							<span class="textfieldRequiredMsg"><br />A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></p>
							<p><strong>Skype:</strong><br>
								<label for="skype"></label>
								<input name="skype" type="text" id="skype" size="50">
							</p>
							<p><strong>Website:</strong><br>
								<label for="website"></label>
								<input name="website" type="text" id="website" size="50">
							</p>
							<p>
								<input name="owner" type="checkbox" id="owner" value="1" />
								<label for="owner"></label>
							Are you owner of this business?</p>
							<p>Factual ID:<br />
								<label for="factual_id"></label>
								<input name="factual_id" type="text" id="factual_id" size="50" />
							</p>
							<br />
							<p>
								<input type="submit" name="submit" id="submit" value="Create" class="button">
							</p>
							<p>&nbsp;</p>
						</div>
						<input type="hidden" name="MM_insert" value="form1" />
			<input type="hidden" name="url" id="url" />
			<input name="site_id" type="hidden" id="site_id" value="<?php echo $site_id; ?>" />
			<input name="user_id" type="hidden" id="user_id" value="<?php echo $_SESSION['MM_UserID']; ?>" />
			<input name="owner_id" type="hidden" id="owner_id" />
		</form>
	</div>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur"], hint:"Add a business name"});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {validateOn:["blur"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {validateOn:["blur"]});
</script>
</div>
			<script type="text/javascript">
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "email", {validateOn:["blur"]});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {validateOn:["blur"]});
			</script>
			