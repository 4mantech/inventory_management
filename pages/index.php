<?php
session_start();
if (isset($_COOKIE['loginId']) && isset($_COOKIE['role'])) {
  $_SESSION['loginId'] = $_COOKIE['loginId'];
  $_SESSION['role'] = $_COOKIE['role'];
  header("Location:main.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Venice</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../assets/css/util.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
  <link rel="stylesheet" type="text/css" href="../assets/font-awesome-4.7.0/css/font-awesome.min.css">
  <?php
  require('../boostrap5css.php');
  require('../boostrap5JS.php');
  ?>
</head>

<body style="background-color: #666666;">

  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <form class="login100-form validate-form" id="loginForm" method="POST" enctype="multipart/form-data">
          <span class="login100-form-title p-b-43">
            เข้าสู่ระบบ
          </span>
          <div class="wrap-input100 validate-input" data-validate="กรุณากรอกชื่อผู้ใช้">
            <input class="input100" type="text" id="username" name="username">
            <span class="focus-input100"></span>
            <span class="label-input100">ชื่อผู้ใช้</span>
          </div>
          <div class="wrap-input100 validate-input" data-validate="กรุณากรอกรหัสผ่าน">
            <input class="input100" type="password" id="password" name="password">
            <span class="focus-input100"></span>
            <span class="label-input100">รหัสผ่าน</span>
          </div>

          <div class="flex-sb-m w-full p-t-3 p-b-32">
            <div class="contact100-form-checkbox">
              <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember">
              <label class="label-checkbox100" for="ckb1">
                จดจำฉัน
              </label>
            </div>
          </div>
          <div class="container-login100-form-btn">
            <button class="login100-form-btn">
              เข้าสู่ระบบ
            </button>
          </div>
        </form>

        <div class="login100-more" style="background-image: url('../assets/images/vvv.jpg');">
          <h1 style="
        color: white;
        border-radius: 1em;
        padding: 1em;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%) 
        ">F R E E S T Y L E</h1>
          <h2 style="
        color: white;
        border-radius: 1em;
        padding: 1em;
        position: absolute;
        top: 54%;
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%) 
        ">K I M I N O T O </h2>
        </div>
      </div>
    </div>
  </div>
  <script src="ajax/index.js"></script>

</body>

</html>