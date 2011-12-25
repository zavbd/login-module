<?php
if(!$do_login) exit;

$post_username = trim($_POST['username']);
$post_password = trim($_POST['password']);

$post_autologin = $_POST['autologin'];

$post_username = mysql_real_escape_string($post_username);
$query = "SELECT password, salt
         FROM users
         WHERE username = '{$post_username}';";
$result = mysql_query($query);
if(mysql_num_rows($result) < 1)
//no such user exists
{
     header('Location: index.php');
     die();
}
$userData = mysql_fetch_array($result, MYSQL_ASSOC);
$hash = hash('sha256', $userData['salt'] . hash('sha256', $post_password) );
if($userData['password'] == $hash)
{
    $login_ok = true;

    $_SESSION['username'] = $post_username;

    // Autologin Requested?

    if($post_autologin == 1)
    {
        $token = sha1(md5( mt_rand(), true ));
        setcookie ('token', $token, time() + $cookie_time);
        $query = "INSERT INTO log_login(create_date, update_date, token)
                    VALUES('".date('Y-m-d H:i:s')."','".date('Y-m-d H:i:s')."','".$token."')";
        mysql_query($query);
        
    }

    header("Location: membersonly.php");
    exit;
} else {
    $login_error = true;
}
?>
