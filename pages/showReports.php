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
  <title>รายงานสรุปการสั่งซื้อสินค้า</title>
  <?php
  require('../boostrap5css.php');
  require('../boostrap5JS.php');
  ?>
</head>

<body>
<div class="modal fade" id="addReportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มใบคำสั่งซื้อ</h5>
        </div>
        <div class="modal-body">
        <form method="POST" enctype="multipart/form-data" id="formAddReport">
          <div class="row">
            <div class="col-3">
              <label class="mb-5">เลขที่คำสั่งซื้อ</label>
              <label class="mb-4">เพิ่มใบคำสั่งซื้อ</label>
              <label class="mt-2">วันที่สั่งซื้อ</label>
            </div>
            <div class="col">
            <input class="form-control mb-4" type="text" pattern="\S+" maxlength="255" id="reportNumber"  name="reportNumber" placeholder="เลขที่คำสั่งซื้อ" required>
            <input class="form-control mb-4" type="file" id="file" name="file" accept="image/png, image/jpeg, image/jpg, .pdf" required>
            <input class="form-control" type="datetime-local" id="datetime" name="datetime" required>                    
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="closemodal" data-bs-dismiss="modal" class="btn btn-danger">ยกเลิก</button>
          <button type="submit" class="btn btn-success">ยืนยัน</button>
        </div>
      </div>
    </form>
    </div>
  </div>

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
                        <b style="font-size : 20px">รายงานสรุปการสั่งซื้อสินค้า</b>
                      </div>
                      <a type="button" id="addReport" class="btn btn-success mb-3"><i class="fa fa-envelope-open-o" aria-hidden="true"></i> เพิ่มใบคำสั่งซื้อ</a>
                      <table class="table table-hover border " id="showAllReports">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">รหัสคำสั่งซื้อ</th>
                            <th scope="col">รูปภาพคำสั่งซื้อ</th>
                            <th scope="col">วันที่ - เวลา</th>
                            <th scope="col">ดำเนินการ</th>
                          </tr>
                        </thead>
                        <tbody id="reportTable">
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
  <style>
    .modal-dialog {
    position: relative;
    display: table;
    overflow-y: auto;    
    overflow-x: auto;
    width: auto;
    min-width: 1000px;
    }
</style>

  <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imageModalLabel">รูปภาพคำสั่งซื้อ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <img class="img-fluid" id="img">
      
      </div>
    </div>
  </div>
</div>

</body>
<script src="ajax/manageReports.js"></script>
</html>