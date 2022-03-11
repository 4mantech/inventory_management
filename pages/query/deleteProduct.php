<?php 
$id = $_POST['id'];
require('connect.php');
$sqlCheck = "SELECT * FROM products WHERE id = '$id'";
$resultCheck = mysqli_query($conn,$sqlCheck);
$row = mysqli_fetch_array($resultCheck,MYSQLI_ASSOC);

if(mysqli_num_rows($resultCheck)== 1){
  $sql = "DELETE FROM products WHERE id = '$id'";
  if(mysqli_query($conn,$sql)){
    if($row['productImage'] != "noProductImage.jpg"){
      unlink('../../assets/images/products/'.$row['productImage']);
    }
   echo json_encode(array("status"=>"true"),JSON_UNESCAPED_UNICODE);
  }
}else {
  echo json_encode(array("status"=>"false"),JSON_UNESCAPED_UNICODE);
}
