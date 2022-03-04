<?php 
setcookie ("loginId", "", time() - (60*60*24*7), '/');
setcookie ("role", "", time() - (60*60*24*7), '/');
session_start();
if (session_destroy()) {
    header("Location:../index.php");
}
?>