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
  <div class="container-fluid">
    <div class="row">
      <div class="modal fade" id="addProductsmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มสินค้า</h5>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-3">
                  เพิ่มสินต้า
                </div>
                <div class="col">
                  <input class="form-control" type="hidden" id="productsId" name="productsId">
                  <input class="form-control" type="text" id="productsName" name="productsName" placeholder="ประเภทสินค้า" required>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" id="closemodal" data-mdb-dismiss="modal" class="btn btn-danger">ยกเลิก</button>
              <button type="button" id="confirmAdd" class="btn btn-success">ยืนยัน</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="editProductsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">แก้ไขสินค้า</h5>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-3">
                  แก้ไขสินค้า
                </div>
                <div class="col">
                  <input class="form-control" type="text" id="productNameForEdit" name="productNameForEdit" placeholder="ประเภท" required>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" id="closeModalEdit" data-mdb-dismiss="modal" class="btn btn-danger">ยกเลิก</button>
              <button type="button" id="confirmEdit" class="btn btn-success">ยืนยัน</button>
            </div>
          </div>
        </div>
      </div>

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
                <button type="button" class="btn btn-success mb-3">เพิ่มสินค้า</button>
                  <table class="table border" id="showAllProd">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">ชื่อสินค้า</th>
                        <th scope="col">ประเภทสินค้า</th>
                        <th scope="col">รายละเอียด</th>
                        <th scope="col">ขนาด</th>
                        <th scope="col">สี</th>
                        <th scope="col">จำนวน</th>
                        <th scope="col">ดำเนินการ</th>
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