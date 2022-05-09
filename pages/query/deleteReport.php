<?php 
$id = $_POST['id'];
require('connect.php');

$sqlCheck = "SELECT * FROM reports WHERE id = '$id'";
$resultCheck = mysqli_query($conn,$sqlCheck);
$rows = mysqli_fetch_array($resultCheck,MYSQLI_ASSOC);

if(mysqli_num_rows($resultCheck)== 1){
  $sql = "DELETE FROM reports WHERE id = '$id'";
  if($result = mysqli_query($conn,$sql)){
    echo json_encode(array("status"=>"true"),JSON_UNESCAPED_UNICODE);
    unlink('../../assets/images/reports/'.$rows['imageName']);
  }
}else {
  echo json_encode(array("status"=>"false"),JSON_UNESCAPED_UNICODE);
}
?>
