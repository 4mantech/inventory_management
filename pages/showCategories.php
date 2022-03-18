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
  <title>จัดการประเภทสินค้า</title>
  <?php
  require('../boostrap5css.php');
  require('../boostrap5JS.php');
  ?>
</head>

<body>
  <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มประเภท</h5>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-3">
              เพิ่มประเภท
            </div>
            <div class="col">
              <input class="form-control" type="text" maxlength="255" id="categoryName"  name="categoryName" placeholder="ประเภทสินค้า" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="closemodal" data-bs-dismiss="modal" class="btn btn-danger">ยกเลิก</button>
          <button type="button" id="confirmAdd" class="btn btn-success">ยืนยัน</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">แก้ไขประเภทสินค้า</h5>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-4">
              แก้ไขประเภทสินค้า
            </div>
            <div class="col">
              <input class="form-control" type="hidden" id="categoryId" name="categoryId">
              <input class="form-control" type="text" id="categoryNameForEdit" name="categoryNameForEdit" maxlength="255" placeholder="ประเภทสินค้า" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="closeModalEdit" data-bs-dismiss="modal" class="btn btn-danger">ยกเลิก</button>
          <button type="button" id="confirmEdit" class="btn btn-success">ยืนยัน</button>
        </div>
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
          <div class="col-1">
          </div>
          <div class="col-10">
            <div class="card p-3">
              <div class="card-body" style="background-color: #fff;">
                <div class="row">
                  <div class="col-2">
                  </div>
                  <div class="col-8">
                    <div class="text-center mb-2">
                      <b style="font-size : 20px">แสดงประเภทสินค้า</b>
                    </div>
                    <button type="button" id="addCategory" class="btn btn-success mb-3"><i class="fa fa-shopping-bag" aria-hidden="true"></i> เพิ่มประเภทสินค้า</button>
                    <table class="table table-hover border" id="showAllCate">
                      <thead>
                        <tr>
                          <th scope="col-2">#</th>
                          <th scope="col-8">ประเภทสินค้า</th>
                          <th scope="col" class="text-center">ดำเนินการ</th>
                        </tr>
                      </thead>
                      <tbody id="categoryTable">
                      </tbody>
                    </table>
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
<script src="ajax/showCategories.js"></script>

</html>