<?php
require('connect.php');
if ($_GET['categoryId'] != "all") {
  $categoryId = $_GET['categoryId'];
  $sql = "SELECT p.*,c.categoryName FROM products p LEFT JOIN categories c ON p.categoryId = c.id WHERE categoryId = '$categoryId' ORDER BY p.productName ASC";
} else {
  $sql = "SELECT p.*,c.categoryName FROM products p LEFT JOIN categories c ON p.categoryId = c.id ORDER BY p.productName ASC";
}

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) >= 1) {
  $rows['productsObj'] = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
  $rows['productsObj'] = null;
}
print json_encode($rows, JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
