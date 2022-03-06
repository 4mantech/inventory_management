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
                  <input class="form-control" type="text" id="categoryName" name="categoryName" placeholder="ประเภทสินค้า" required>
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
                  <input class="form-control" type="text" id="categoryNameForEdit" name="categoryNameForEdit" placeholder="ประเภทสินค้า" required>
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
              <li class="breadcrumb-item">จัดการประเภทสินค้า</li>
            </ol>
          </div>
        </div>
        <div class="card p-3" style="box-shadow: 0px 5px 5px -2px #888;">
          <div class="card-body" style="background-color: #fff;">
            <div class="row">
              <div class="col-2">
              </div>
              <div class="col-8">
                <button type="button" id="addCategory" class="btn btn-success mb-3">เพิ่มประเภทสินค้า</button>
                <table class="table table-hover border" id="showAllCate">
                  <thead>
                    <tr>
                      <th scope="col-2">#</th>
                      <th scope="col-6">ประเภทสินค้า</th>
                      <th scope="col">ดำเนินการ</th>
                    </tr>
                  </thead>
                  <tbody id="categoryTable">
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
<script src="ajax/showCategories.js"></script>

</html>