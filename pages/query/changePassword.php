<?php 
require('connect.php');
$id = $_POST['userId'];
$password = $_POST['newPassword'];
$confirmPassword = $_POST['confirmPassword'];

$key = "inventory";
$hash_login_password = hash_hmac('sha256',$password,$key);  

$sqlCheck = "SELECT * FROM users WHERE id = '$id'";
$result = mysqli_query($conn,$sqlCheck);
if(mysqli_num_rows($result)==1){
  if($password == $confirmPassword){
    $sql = "UPDATE users SET `password`='$hash_login_password' WHERE id = '$id'";
    if(mysqli_query($conn,$sql)){
      echo json_encode(array("status"=>"true"),JSON_UNESCAPED_UNICODE);
    }else{
      echo json_encode(array("status"=>"false","message"=>mysqli_error($conn)),JSON_UNESCAPED_UNICODE);
    }
  }else{
    echo json_encode(array("status"=>"false","message"=>"รหัสผ่านไม่ถูกต้อง"),JSON_UNESCAPED_UNICODE);
  }
}else{
  echo json_encode(array("status"=>"false","message"=>"ไม่มีผู้ใช้นี้ในระบบ"),JSON_UNESCAPED_UNICODE);
}
mysqli_close($conn);
?>