<?php 
  require_once('connect.php');

  $categoryName = $_POST['categoryName'];

  $categoryCheck = "SELECT * FROM categories WHERE categoryName = '$categoryName'";
  $queryCheck = mysqli_query($conn,$categoryCheck);

  if(mysqli_num_rows($queryCheck)>0){
    echo json_encode(array("status"=>"false","message"=>"มีประเภทสินค้านี้แล้ว"),JSON_UNESCAPED_UNICODE);
  }else{
    $addCategory = "INSERT INTO `categories`(`categoryName`) VALUES ('$categoryName')";
    if(mysqli_query($conn,$addCategory)){
      echo json_encode(array("status"=>"true"),JSON_UNESCAPED_UNICODE);
    }else{
      echo json_encode(array("status"=>"false","message"=>mysqli_error($conn)),JSON_UNESCAPED_UNICODE);
    }
  }
  mysqli_close($conn);
?>