<?php
require('connect.php');
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) >= 1) {
  $rows['usersObj'] = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
  $rows['usersObj'] = null;
}
print json_encode($rows, JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
