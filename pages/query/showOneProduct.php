<?php
require('connect.php');
$id = $_GET['id'];
$sql = "SELECT p.*,c.categoryName FROM products p INNER JOIN categories c ON p.categoryId = c.id WHERE p.id = '$id'";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 1) {
  $r = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $row['productObj'] = $r;
} else {
  $row['productObj'] = null;
}
print json_encode($row, JSON_UNESCAPED_UNICODE);
