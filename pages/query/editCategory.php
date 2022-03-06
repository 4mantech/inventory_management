<?php
require_once('connect.php');

$categoryId = $_POST['id'];
$categoryName = $_POST['categoryNameForEdit'];

$sql = "UPDATE categories SET `categoryName`= '$categoryName' WHERE `id` = '$categoryId'";
if (mysqli_query($conn, $sql)) {
  echo json_encode(array("status"=>"true"),JSON_UNESCAPED_UNICODE);
} else {
  echo json_encode(array("status"=>"false","message"=>mysqli_error($conn)),JSON_UNESCAPED_UNICODE);
}

mysqli_close($conn);
