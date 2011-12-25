<?php
//connect to the database here
$dbhost = 'localhost'; 
$dbname = 'db_login'; 
$dbuser = 'root'; 
$dbpass = ''; 
//not really
$conn = mysql_connect($dbhost, $dbuser, $dbpass); 
mysql_select_db($dbname, $conn);
// Check if the cookie exists
if(isSet($_COOKIE['token']))
{
	echo 'inside auto login.php cookie is setted';
    
	$token = mysql_real_escape_string($_COOKIE['token']);
    $query = "SELECT id, create_date, token
             FROM log_login
                      WHERE token = '{$token}' AND del_flg = 0";
    $result = mysql_query($query);
    $tokenInfo = array();
    if(mysql_num_rows($result) > 0)
    //no such user exists
    {
        $tokenInfo = mysql_fetch_array($result, MYSQL_ASSOC);
    }

	//parse_str($_COOKIE[$cookie_name]);

	// Make a verification
    $interval = 0;
    if(isset($tokenInfo['create_date'])) {
        $interval = strtotime(date('Y-m-d H:i:s')) - strtotime($tokenInfo['create_date']);
    }
    //print_r($tokenInfo);
    //echo $interval;
    
    if(isset($tokenInfo['id']) && $interval <= (24 * 60 * 60)) {
        $_SESSION['username'] = 'ali';
        header("Location: membersonly.php");
        exit;
    }
}

?>
