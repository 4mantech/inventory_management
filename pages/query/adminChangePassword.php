<?php
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
require('connect.php');

if ($password == $confirmPassword && !empty($password) && !empty($confirmPassword)) {
  $sqlCheck = "SELECT id, email,role FROM users WHERE email='$email'";
  $resultCheck = mysqli_query($conn, $sqlCheck);
  if (mysqli_num_rows($resultCheck) == 1) {
    $row = mysqli_fetch_array($resultCheck, MYSQLI_ASSOC);
    if ($row['role'] == 0) {
      $id = $row['id'];
      $key = "inventory";
      $hash_password = hash_hmac('sha256', $password, $key);
      $sql = "UPDATE users SET password = '$hash_password' WHERE id = '$id'";
      if (mysqli_query($conn, $sql)) {
        echo json_encode(array("status" => "true", "message" => "เปลี่ยนรหัสผ่านเรียบร้อยแล้ว"), JSON_UNESCAPED_UNICODE);
      } else {
        echo json_encode(array("status" => "false", "message" => mysqli_error($conn)), JSON_UNESCAPED_UNICODE);
      }
    }
  }
}
mysqli_close($conn);
