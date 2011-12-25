<?php
session_start();
//connect to the database here
$dbhost = 'localhost'; 
$dbname = 'db_login'; 
$dbuser = 'root'; 
$dbpass = ''; 
//not really
$conn = mysql_connect($dbhost, $dbuser, $dbpass); 
mysql_select_db($dbname, $conn);

logout();
function logout() {
     $_SESSION = array();
     //destroy all of the session variables
     session_destroy();
     if(isset($_COOKIE['token'])) {
        $token = $_COOKIE['token'];
         $query = "UPDATE log_login SET del_flg = 1 WHERE token = '".$token."'";
         mysql_query($query);
         setcookie ("token", "", time() - 3600);// set the time to minus to remove the cookie.
     }
}
header('Location: index.php');
die();
?>