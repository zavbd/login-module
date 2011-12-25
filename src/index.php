<?php
require_once 'config.php';
//connect to the database here
$dbhost = 'localhost'; 
$dbname = 'db_login'; 
$dbuser = 'root'; 
$dbpass = ''; 
//not really
$conn = mysql_connect($dbhost, $dbuser, $dbpass); 
mysql_select_db($dbname, $conn);
// Is the user already logged in? Redirect him/her to the private page
//echo $_COOKIE['token'].':end token value:inside index.php';
function logout() {
    $_SESSION = array();
    //destroy all of the session variables
    session_destroy();
    
}
if(($_SESSION['username']) && !isSet($_COOKIE['token']))
{
    logout();
} else {
    
}

if(isSet($_POST['submit']))
{
    $do_login = true;

    include_once 'do_login.php';
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE>TableLess Login Form</TITLE>

  <META name="Author" Content="Bit Repository">
  <META name="Keywords" Content="form, divs">
  <META name="Description" Content="A CSS Tableless Form Design">

<STYLE TYPE="text/css">
<!--
HTML, BODY
{
padding: 0;border: 0px none;
}

/* Stylish FieldSet */
fieldset
{
-moz-border-radius: 7px; border: 1px #dddddd solid; padding: 10px; width: 330px; margin-top: 10px;
}

fieldset legend
{
border: 1px #1a6f93 solid; color: black; font: 13px Verdana; padding: 2 5 2 5; -moz-border-radius: 3px;
}

/* Label */
label
{
width: 100px; padding-left: 20px; margin: 5px; float: left; text-align: left;
}

/* Input text */
input { margin: 5px; padding: 0px; float: left; }

/* 'Login' Button */
#submit { margin: 5px; padding: 0px; float: left; width: 50px; background-color: white; }

#error_notification
{
border: 1px #A25965 solid;
height: auto;
padding: 4px;
background: #F8F0F1;
text-align: center;
-moz-border-radius: 5px;
}

/* BR */

br { clear: left; }
-->
</STYLE>

</HEAD>

 <BODY>

<center>

<div align="left" style="width: 330px;">
<form name="login" method="post" action="index.php">

<fieldset><legend>Authentication</legend>

<?php
if($login_error)
{
echo '<div id="error_notification">The submitted login info is incorrect.</div>';
}
?>

<label>Username</label><input id="name" type="text" name="username"><br />

<label>Password</label><input type="password" name="password"><br />

<label>&nbsp;</label><input type="checkbox" name="autologin" value="1">Remember Me<br />

<label>&nbsp;</label><input id="submit" type="submit" name="submit" value="Login"><br />

</fieldset>

</form>
</div>

</center>

 </BODY>
</HTML>

