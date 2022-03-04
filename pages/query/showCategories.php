<?php 
require('connect.php');
$sql = "SELECT * FROM categories";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>=1){
  $rows['cateObj'] = mysqli_fetch_all($result,MYSQLI_ASSOC);
}else{
  $rows['cateObj']= null;
}
print json_encode($rows,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
?>