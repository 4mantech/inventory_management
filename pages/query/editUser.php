<?php 
require('connect.php');
$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$key = "inventory";
$hash_login_password = hash_hmac('sha256',$password,$key); 

$sqlCheck = "SELECT id,username,firstName,lastName,email,tel FROM users WHERE id = '$id' AND username = '$username'";
$resultCheck = mysqli_query($conn,$sqlCheck);
if(mysqli_num_rows($resultCheck)==1){
  if($password){
    $sql = "UPDATE
        `users`
    SET
        `password` = '$hash_login_password',
        `firstName` = '$firstName',
        `lastName` = '$lastName',
        `email` = '$email',
        `tel` = '$tel'
    WHERE
        id = '$id'";
  }else{
      $sql = "UPDATE
        `users`
    SET
        `firstName` = '$firstName',
        `lastName` = '$lastName',
        `email` = '$email',
        `tel` = '$tel'
    WHERE
        id = '$id'";
  }
  echo mysqli_query($conn,$sql)? 
  json_encode(array("status"=>"true"),JSON_UNESCAPED_UNICODE):
  json_encode(array("status"=>"false","message"=>mysqli_error($conn)),JSON_UNESCAPED_UNICODE);

}else{
  echo json_encode(array("status"=>"false","message"=>"ไม่มีผู้ใช้นี้ในระบบ"),JSON_UNESCAPED_UNICODE);
}

mysqli_close($conn);
?>