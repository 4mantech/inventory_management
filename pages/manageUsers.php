<!DOCTYPE html>
<html lang="en">

<head>
  <title>จัดการผู้ใช้งาน</title>
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
              <li class="breadcrumb-item">จัดการผู้ใช้งาน</li>
            </ol>
          </div>
        </div>
        <div class="card p-3" style="box-shadow: 0px 5px 5px -2px #888;">
          <div class="card-body" style="background-color: #fff;">
            <div class="row">
              <div class="col-1">
              </div>
              <div class="col-10">
                <a type="button" href="addUser.php" class="btn btn-success mb-3">เพิ่มผู้ใช้งาน</a>
                <table class="table border" id="showAllEmployees">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">ชื่อผู้ใช้งาน</th>
                      <th scope="col">ชื่อจริง - นามสกุล</th>
                      <th scope="col">ดำเนินการ</th>
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
</body>
<script src="ajax/showProducts.js"></script>

</html>