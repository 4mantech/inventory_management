<?php
session_start();
if(!isset($_SESSION['loginId'])){
  header("Location:index.php");
}
?>