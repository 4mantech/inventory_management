<?php
require('connect.php');

$id = $_POST['productId'];
$productName = $_POST['productName'];
$categoryId =  $_POST['categoryId'];
$size = $_POST['size'];
$color = $_POST['color'];
$productQuantity = $_POST['productQuantity'];
$productDetail=  $_POST['productDetail'];

$checkProduct = "SELECT * FROM products WHERE id =  '$id'";
$resultCheck = mysqli_query($conn,$checkProduct);

$row = mysqli_fetch_array($resultCheck,MYSQLI_ASSOC);
$oldfile = "../../assets/images/products/".$row['productImage'];

if (isset($_FILES['productImage']['name']) && $_FILES['productImage']['name'] != "") {
  $filename = $_FILES['productImage']['name'];
  $location = "../../assets/images/products/" . $filename;
  $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
  $imageFileType = strtolower($imageFileType);

  $newname = $productName . "." . $imageFileType;
  $location = "../../assets/images/products/" . $newname;

  $valid_extensions = array("jpg", "jpeg", "png");

  if (in_array(strtolower($imageFileType), $valid_extensions)) {
    unlink($oldfile);
    move_uploaded_file($_FILES['productImage']['tmp_name'], $location);

    $sql = "UPDATE
  `products`
SET
  `categoryId` = '$categoryId',
  `productName` = '$productName',
  `productDetail` = '$productDetail',
  `size` = '$size',
  `color` = '$color',
  `productImage` = '$newname',
  `productQuantity` = '$productQuantity'
WHERE
id = '$id'";
  }
} else {
  $sql = "UPDATE
  `products`
SET
  `categoryId` = '$categoryId',
  `productName` = '$productName',
  `productDetail` = '$productDetail',
  `size` = '$size',
  `color` = '$color',
  `productQuantity` = '$productQuantity'
WHERE
id = '$id'";
}
if (mysqli_query($conn,$sql)){
  echo json_encode(array("status"=>"true"),JSON_UNESCAPED_UNICODE);
}else{
  echo json_encode(array("status"=>"false","message"=>mysqli_error($conn)),JSON_UNESCAPED_UNICODE);
}
mysqli_close($conn);
?>