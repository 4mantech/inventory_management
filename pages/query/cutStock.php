<?php
$dataStock = $_POST['jsonDataStock'];
$data = json_decode(json_encode($dataStock),true);

require_once('connect.php');

foreach ($data["dataStock"] as $key => $value) {
  $id = $value["id"];
  $total = $value["total"];
  $amount = $value["amount"];
  $calculateAmount = $total - $amount;
  $sqlCheck = "SELECT id FROM products WHERE id = '$id'";
  $resultCheck = mysqli_query($conn,$sqlCheck);
  if(mysqli_num_rows($resultCheck)==1){
    $sql = "UPDATE `products` SET `productQuantity`='$calculateAmount' WHERE id ='$id'";
    if(mysqli_query($conn,$sql)){
      echo json_encode(array("status"=>"true","message"=>"ตัดสต็อคสำเร็จ"),JSON_UNESCAPED_UNICODE);
    }else{
      echo json_encode(array("status"=>"false","message"=>mysqli_errno($conn)),JSON_UNESCAPED_UNICODE);
    }
  }
}

mysqli_close($conn);
?>
