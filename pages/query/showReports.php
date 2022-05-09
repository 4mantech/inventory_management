<?php
require("connect.php");

$sql = "SELECT * FROM reports ORDER BY dateTime DESC";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) >= 1){
  $rows['reportsObj'] = mysqli_fetch_all($result, MYSQLI_ASSOC);
}else{
  $rows['reportsObj'] = null;
}

print json_encode($rows,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
?>