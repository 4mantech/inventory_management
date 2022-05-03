<?php
require('connect.php');
$stock = $_POST['select'];
if(!empty($stock)){
  $implode = implode(",",$stock);
  $showSelect = "SELECT * FROM products WHERE id IN ($implode)";
  $result = mysqli_query($conn,$showSelect);
  mysqli_num_rows($result)>0 ? $rows['selectObj'] = mysqli_fetch_all($result,MYSQLI_ASSOC) :  $rows['selectObj'] = null;
}else{
  $rows['selectObj'] = null;
}
print json_encode($rows,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
?>