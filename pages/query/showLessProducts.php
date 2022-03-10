<?php
require_once('connect.php');
if ($_GET['categoryId'] != "all") {
  $categoryId = $_GET['categoryId'];
  $sql = "SELECT p.*,c.categoryName FROM products p LEFT JOIN categories c ON p.categoryId = c.id WHERE categoryId = '$categoryId' AND p.productQuantity <= 30 ORDER BY p.productName ASC";
} else {
  $sql = "SELECT p.*,c.categoryName FROM products p LEFT JOIN categories c ON p.categoryId = c.id WHERE p.productQuantity <= 30 ORDER BY p.productName ASC";
}
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>=1){
  $row['lessProdObj'] = mysqli_fetch_all($result,MYSQLI_ASSOC);
}else{
  $row['lessProdObj'] =null;
}
print json_encode($row,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
?>