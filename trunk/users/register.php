<?php require_once('../../Connections/conn.php'); ?>
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

// *** Redirect if username exists
$MM_flag="MM_insert";
if (isset($_POST[$MM_flag])) {
  $MM_dupKeyRedirect="/users/registerFail?type=";
  $LoginRS__query = sprintf("SELECT username, email FROM z_users WHERE username=%s or email=%s", GetSQLValueString($_POST['username'], "text"), GetSQLValueString($_POST['email'], "text"));
  mysql_select_db($database_conn, $conn);
  $LoginRS=mysql_query($LoginRS__query, $conn) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);

  //if there is a row in the database, the username was found - can not add the requested username
  if($loginFoundUser){
	  $rec = mysql_fetch_array($LoginRS);
	  if ($rec['email'] == $_POST['email']) {
		  $type = 'email';
	  } else if ($rec['username'] == $_POST['username']) {
		  $type = 'username';
	  }
	  unset($_POST["MM_insert"]);
  }
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO z_users (username, password, email, created) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['created'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertGoTo = "/users/registerConfirm";
  header(sprintf("Location: %s", $insertGoTo));
  exit;
}
?>
<script src="/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="/SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<script src="/SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
<link href="/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="/SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css">
<link href="/SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css">

		<header>
			<h2>Register!</h2>
			<span><a href="/users/login">Login</a> | <a href="/users/forgot">Forgot Password</a></span>
		</header>
		<div class="container">
			<div class="row">
				<div class="12u">
				<?php if (!empty($type)) { ?>
				<div class="error"><?php echo ucwords($type); ?> already exists.</div>
				<?php } ?>
	<form name="form1" method="POST" action="">
		Username:<br>
		<span id="sprytextfield1">
		<label for="username"></label>
		<input type="text" name="username" id="username" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" />
		<span class="textfieldRequiredMsg"><br />
A value is required.</span></span>
		<p>Email:<br>
			<span id="sprytextfield2">
			<label for="email"></label>
			<input type="text" name="email" id="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" />
			<span class="textfieldRequiredMsg"><br />A value is required.</span><span class="textfieldInvalidFormatMsg"><br />Invalid format.</span></span>
		</p>
		<p>Password:<br>
			<span id="sprypassword1">
			<label for="password"></label>
			<input type="password" name="password" id="password" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>" />
			<span class="passwordRequiredMsg"><br />A value is required.</span></span>		</p>
		<p>Confirm Password:<br>
			<span id="spryconfirm1">
			<label for="confirmpassword"></label>
			<input type="password" name="confirmpassword" id="confirmpassword" value="<?php if (isset($_POST['confirmpassword'])) echo $_POST['confirmpassword']; ?>" />
			<span class="confirmRequiredMsg"><br />A value is required.</span><span class="confirmInvalidMsg">The values don't match.</span></span>		</p>
		<p>
			<input type="submit" name="submit" id="submit" value="Register">
		</p>
		<input type="hidden" name="MM_insert" value="form1" />
		<input name="created" type="hidden" id="created" value="<?php echo time(); ?>" />
	</form>
				</div>
			</div>
		</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur"], hint:"Enter Username"});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "email", {validateOn:["blur"], hint:"Enter Email Address"});
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1", {validateOn:["blur"]});
var spryconfirm1 = new Spry.Widget.ValidationConfirm("spryconfirm1", "password", {validateOn:["blur"]});
</script>
