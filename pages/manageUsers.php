<?php 
require('query/checkLogin.php'); 
if($_SESSION['role'] !=0){
  header("Location:main.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>จัดการผู้ใช้งาน</title>
  <?php
  require('../boostrap5css.php');
  require('../boostrap5JS.php');
  ?>
</head>

<body>
  <div class="container-fluid">
    <div class="row flex-nowrap">
      <?php require_once('components/sidebar.php') ?>
      <div class="col p-0">
        <!-- As a heading -->
        <?php require_once('components/nav.php') ?>
        <div class="container-fluid">
          <div class="row mt-2" id="mainContents">
            <div class="col-1"></div>
            <div class="col-10">
              <div class="card p-3">
                <div class="card-body" style="background-color: #fff;">
                  <div class="row">
                    <div class="col-1">
                    </div>
                    <div class="col-10">
                      <div class="text-center mb-2">
                        <b style="font-size : 20px">แสดงผู้ใช้งาน</b>
                      </div>
                      <a type="button" href="addUser.php" class="btn btn-success mb-3"><i class="fa fa-user-plus" aria-hidden="true"></i> เพิ่มผู้ใช้งาน</a>
                      <table class="table border" id="showAllEmployees">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">ชื่อจริง - นามสกุล</th>
                            <th scope="col">อีเมล</th>
                            <th scope="col">เบอร์โทรศัพท์</th>
                            <th class="text-center" scope="col">ดำเนินการ</th>
                          </tr>
                        </thead>
                        <tbody id="empTable">
                        </tbody>
                      </table>
                    </div>
                    <div class="col-1">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="ajax/manageUsers.js"></script>

</html>