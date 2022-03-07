<?php
require_once('connect.php');
$username = $_POST['username'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$tel = $_POST['tel'];

$key = "inventory";
$hash_login_password = hash_hmac('sha256',$password,$key);
$sql = "INSERT INTO `users`
  (`username`,
  `password`,
    `role`,
    `firstName`,
    `lastName`,
    `email`,
    `tel`) 
VALUES 
  ('$username',
  '$hash_login_password',
    1,
  '$firstname',
  '$lastname',
  '$email',
  '$tel')";
  
  if(mysqli_query($conn,$sql)){
    echo json_encode(array("status"=>"true"),JSON_UNESCAPED_UNICODE);
  }else{
    echo json_encode(array("status"=>"false","message"=>mysqli_error($conn)),JSON_UNESCAPED_UNICODE);
  }
  
mysqli_close($conn);

?>