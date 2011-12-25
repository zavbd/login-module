<?php
session_start();
//if the user has not logged in
if(!isLoggedIn()) {
     header('Location: login.php');
     die();
}
//page content follows 
echo 'this is the members only page';
echo '<a href="logout.php">logout</a>';
function isLoggedIn() {
    if(isset($_SESSION['username']))
        return true;
    return false;
}
?>