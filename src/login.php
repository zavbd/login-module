<?php
error_reporting(E_ALL);
ini_set('display_errors','On');
session_start();
//must call session_start before using any $_SESSION variables

$username = $_POST['username'];
$password = $_POST['password'];
//connect to the database here
$dbhost = 'localhost'; 
$dbname = 'db_login'; 
$dbuser = 'root'; 
$dbpass = ''; 
//not really
$conn = mysql_connect($dbhost, $dbuser, $dbpass); 
mysql_select_db($dbname, $conn);

$username = mysql_real_escape_string($username);
$query = "SELECT password, salt
         FROM users
                  WHERE username = '$username';";
$result = mysql_query($query);
if(mysql_num_rows($result) < 1)
//no such user exists
{
     header('Location: index.php');
     die();
}
$userData = mysql_fetch_array($result, MYSQL_ASSOC);
$hash = hash('sha256', $userData['salt'] . hash('sha256', $password) );
if($hash != $userData['password'])
//incorrect password
{
     header('Location: index.php');
     die();
} else{
     validateUser($username);
     //sets the session data for this user
} 
//redirect to another page or display "login success" message 
echo "successful login";
function validateUser($username) {
     session_regenerate_id ();
     //this is a security measure
     $_SESSION['valid'] = 1;
     $_SESSION['username'] = $username;
} 

?>