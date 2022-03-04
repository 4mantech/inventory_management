<?php 
require('connect.php');
$sql = "SELECT * FROM products p LEFT JOIN categories c ON p.categoryId = c.id";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>=1){
  while($r = mysqli_fetch_array($result,MYSQLI_ASSOC)){
    $rows['productsObj'][] =$r;
  }
}else{
  $rows['productsObj']= null;
}
print json_encode($rows,JSON_UNESCAPED_UNICODE);
mysqli_close($conn);
?>