<?php 
$id = $_POST['id'];
require('connect.php');
$sqlCheck = "SELECT id FROM users WHERE id = '$id' AND role != 0";
$resultCheck = mysqli_query($conn,$sqlCheck);
if(mysqli_num_rows($resultCheck)== 1){
  $sql = "DELETE FROM users WHERE id = '$id' AND role != 0";
  if($result = mysqli_query($conn,$sql)){
   echo json_encode(array("status"=>"true"),JSON_UNESCAPED_UNICODE);
  }
}else {
  echo json_encode(array("status"=>"false"),JSON_UNESCAPED_UNICODE);
}
