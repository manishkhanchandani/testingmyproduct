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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = '/users/login';
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['email'])) {
  $loginUsername=$_POST['email'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "accesstype";
  $MM_redirectLoginSuccess = "/";
  $MM_redirectLoginFailed = "/users/loginFailed";
  $MM_redirecttoReferrer = true;
  mysql_select_db($database_conn, $conn);
  	
  $LoginRS__query=sprintf("SELECT email, password, accesstype, user_id, username FROM z_users WHERE email=%s AND password=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $conn) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'accesstype');
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = mysql_result($LoginRS,0,'username');;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;
    $_SESSION['MM_UserID'] = mysql_result($LoginRS,0,'user_id');
    $_SESSION['MM_Email'] = mysql_result($LoginRS,0,'email');	      

    if (isset($_SESSION['PrevUrl']) && true) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<script src="/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="/SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<link href="/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="/SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css">

		<header>
			<h2>Login!</h2>
			<span><a href="/users/register">Register</a> | <a href="/users/forgot">Forgot Password</a></span>
		</header>
		<div class="container">
			<div class="row">
				<div class="12u">
	<form name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
		<p><strong>Email:</strong><br>
		<span id="sprytextfield1">
		<label for="email"></label>
		<input type="text" name="email" id="email" />
		<span class="textfieldRequiredMsg"><br />
A value is required.</span><span class="textfieldInvalidFormatMsg"><br />Invalid format.</span></span>
		</p>
		<p><strong>Password:</strong><br>
			<span id="sprypassword1">
			<label for="password"></label>
			<input type="password" name="password" id="password">
			<span class="passwordRequiredMsg"><br />A value is required.</span></span></p>
		<p><input type="submit" name="submit" id="submit" value="Login">
		</p>
	</form>
				</div>
			</div>
		</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "email", {validateOn:["blur"], hint:"Enter Email"});
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1", {validateOn:["blur"]});
</script>
