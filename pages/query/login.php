<?php 
require_once('connect.php');
if(!empty($_POST)){
  $username = mysqli_real_escape_string($conn,trim($_POST['username']));
  $password = mysqli_real_escape_string($conn,$_POST['password']);
  $key = "inventory";
  $hash_login_password = hash_hmac('sha256',$password,$key);  
  $sql = "SELECT * FROM users WHERE username=? AND password=?";
  $stmt = mysqli_prepare($conn,$sql);
  mysqli_stmt_bind_param($stmt,"ss",$username, $hash_login_password);
  mysqli_stmt_execute($stmt);
  $result_user = mysqli_stmt_get_result($stmt);

  if($result_user->num_rows == 1 ){
    session_start();

    $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
    setcookie("loginId", $row_user['id'], time() +(60*60*24*7), '/');
    $_SESSION['loginId'] = $row_user['id'];
    if($row_user['role']== 0){
      setcookie("role", $row_user['role'], time() +(60*60*24*7), '/');
      $_SESSION["role"] = 0;
     $resultLogin['loginObj'][] = array("status"=>"true","role"=>$row_user['role']);
     print json_encode($resultLogin,JSON_UNESCAPED_UNICODE);
    }
    if($row_user['role']== 1){
      setcookie("role", $row_user['role'], time() +(60*60*24*7), '/');
      $_SESSION["role"] = 1;
      $resultLogin['loginObj'][] = array("status"=>"true","role"=>$row_user['role']);
      print json_encode($resultLogin,JSON_UNESCAPED_UNICODE);    
    }
  }else{
     $resultLogin['loginObj'][] = array("status"=>"false");
     print json_encode($resultLogin,JSON_UNESCAPED_UNICODE);
  }
}
mysqli_close($conn);
?>