<?php 
require('query/checkLogin.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>จัดการสต็อค</title>
  <?php
  require('../boostrap5css.php');
  require('../boostrap5JS.php');
  ?>
</head>

<body>

<div class="modal fade" id="addStockModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มรายการสินค้า</h5>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-4">
            เพิ่มรายการสินค้า
            </div>
            <div class="col">
          <form method="post" enctype="multipart/form-data" id="formSelect">
            <select class="js-example-basic-multiple" name="select[]" multiple="multiple" style="width:100%" id="select">
      
            </select>      
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="closemodal" data-bs-dismiss="modal" class="btn btn-danger">ยกเลิก</button>
          <button type="submit" id="confirmAdd" class="btn btn-success" data-bs-dismiss="modal">ยืนยัน</button>
        </div>
        </form>
      </div>
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
                        <b style="font-size : 20px">แสดงสต็อค</b>
                    
                      </div>
                      <a type="button" class="btn btn-success mb-3" id="addStock"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>&nbsp;  เพิ่มรายการสินค้า</a>
                      <table class="table border" id="showStocks">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">ชื่อสินค้า</th>
                            <th scope="col">จำนวน</th>
                            <th class="text-center" scope="col">ดำเนินการ</th>
                          </tr>
                        </thead>
                        <tbody id="stockBody">
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
<script src="ajax/configDatatable.js"></script>
<script src="ajax/manageStocks.js"></script>


</html>