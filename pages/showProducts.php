<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>จัดการสินค้า</title>
  <?php
  require('../boostrap5css.php');
  require('../boostrap5JS.php');
  ?>
</head>

<body>
  <!-- Modal -->
  <div class="modal fade" id="ProductDetailModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ProductDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ProductDetailModalLabel">รายละเอียดสินค้า</h5>
          <button type="button" id="close1" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row" id="detail">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="close2" class="btn btn-danger" data-bs-dismiss="modal">ปิด</button>
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
            <div class="col-1"></div>
            <div class="col-10">

              <div class="card p-3">
                <div class="card-body" style="background-color: #fff;">
                  <div class="row">
                    <div class="col-1">
                    </div>
                    <div class="col-10">

                    <div class="text-center mb-2">
                        <b style="font-size : 20px">แสดงสินค้าทั้งหมด</b>
                      </div>
                      <a type="button" href="addProduct.php" class="btn btn-success mb-3">เพิ่มสินค้า</a>

                      <div class="row mb-4">
                        <div class="col-4 text-end">
                          <h5 for="categoryId">ประเภทสินค้า : </h5>
                        </div>
                        <div class="col-4">
                          <select class="form-select" name="categoryId" id="categoryId">
                            <option value="all" selected>ทั้งหมด</option>

                          </select>
                        </div>
                      </div>
                      <table class="table border" id="showAllProd">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">ชื่อสินค้า</th>
                            <th scope="col">ประเภทสินค้า</th>
                            <th scope="col">จำนวน</th>
                            <th class="text-center" scope="col">ดำเนินการ</th>
                          </tr>
                        </thead>
                        <tbody id="prodTable">
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
<script src="ajax/showProducts.js"></script>

</html>