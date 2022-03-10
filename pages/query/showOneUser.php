<?php 
require('connect.php');
$id = $_GET['id'];
$sql = "SELECT id,username,firstName,lastName,email,tel FROM users WHERE id = '$id'";
$result = mysqli_query($conn,$sql);
mysqli_num_rows($result)==1? $row=mysqli_fetch_array($result,MYSQLI_ASSOC):$row=null;
print json_encode($row,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
?>