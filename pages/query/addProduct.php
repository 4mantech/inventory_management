<?php
require_once('connect.php');
$categoryId = $_POST['categoryId'];
$productName = $_POST['productName'];
$productDetail = $_POST['productDetail'];
$size = $_POST['size'];
$color = $_POST['color'];
$productQuantity = $_POST['productQuantity'];

$sqlCheck = "SELECT 
  *
FROM
  products
WHERE
  productName = '$productName' AND
  categoryId = '$categoryId' AND
  size = '$size' AND
  color = '$color'";
$resultCheck = mysqli_query($conn, $sqlCheck);

if (mysqli_num_rows($resultCheck) <= 0) {
  if (isset($_FILES['productImage']['name']) && $_FILES['productImage']['name'] != "") {
    $filename = $_FILES['productImage']['name'];
    $location = "../../assets/images/products/" . $filename;
    $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
    $imageFileType = strtolower($imageFileType);

    $newname = $productName . "." . $imageFileType;
    $location = "../../assets/images/products/" . $newname;

    $valid_extensions = array("jpg", "jpeg", "png");

    if (in_array(strtolower($imageFileType), $valid_extensions)) {
      move_uploaded_file($_FILES['productImage']['tmp_name'], $location);
    }
  } else {
    $newname = "noProductImage.jpg";
  }

  $sql = "INSERT INTO
  products (
      categoryId,
      productName,
      productDetail,
      size,
      color,
      productImage,
      productQuantity
  )
VALUES (
      '$categoryId',
      '$productName',
      '$productDetail',
      '$size',
      '$color',
      '$newname',
      '$productQuantity'
  )";
  if (mysqli_query($conn, $sql)) {
    echo json_encode(array("status" => "true"), JSON_UNESCAPED_UNICODE);
  }
} else {
  echo json_encode(array("status" => "false", "message" => "มีสินค้านี้แล้ว"), JSON_UNESCAPED_UNICODE);
}
mysqli_close($conn);