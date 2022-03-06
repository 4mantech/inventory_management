<!DOCTYPE html>
<html lang="en">

<head>
  <title>หน้าหลัก</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <div class="row">

      <div class="col-2">
        <?php
        require('../pages/components/sideBar.php');
        ?>
      </div>
      <div class="col-10">
        <?php
        require('../pages/components/nav.php');
        ?>
        <div class="p-4">
          <div aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">จัดการรายการสินค้า</li>
            </ol>
          </div>
        </div>

        <div class="card p-3" style="box-shadow: 0px 5px 5px -2px #888;">
          <div class="card-body" style="background-color: #fff;">
            <div class="row">
              <div class="col-1">
              </div>
              <div class="col-10">
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
</body>
<script src="ajax/showProducts.js"></script>

</html>