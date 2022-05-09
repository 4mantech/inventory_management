<?php 
$id = $_POST['id'];
require('connect.php');

$sqlCheck = "SELECT * FROM reports WHERE id = '$id'";
$resultCheck = mysqli_query($conn,$sqlCheck);
$row = mysqli_fetch_array($resultCheck,MYSQLI_ASSOC);

if(mysqli_num_rows($resultCheck)== 1){
  $sql = "DELETE FROM reports WHERE id = '$id'";
  if(mysqli_query($conn,$sql)){
    if($row['imageName'] != "noImage.jpg"){
      unlink('../../assets/images/reports/'.$row['imageName']);
    }
  echo json_encode(array("status"=>"true"),JSON_UNESCAPED_UNICODE);
  }
}else {
  echo json_encode(array("status"=>"false"),JSON_UNESCAPED_UNICODE);
}
mysqli_close($conn);
?>
