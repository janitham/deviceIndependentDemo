<?php
$first_name = 'David';
setcookie('first_name',$first_name,time() + (86400 * 7)); // 86400 = 1 day


echo 'Hello '.($_COOKIE['first_name']!='' ? $_COOKIE['first_name'] : 'Guest'); // Hello David!

if (isset($_COOKIE['first_name'])) {
    unset($_COOKIE['first_name']);
    
} 


?>