<?php
 if(!isset($_SESSION)){
session_start();
 }
session_destroy();
echo 'You have been logged out.';
header("Refresh:2; url=index.php", true, 303);
?>