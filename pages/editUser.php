<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>แก้ไขผู้ใช้งาน</title>
  <?php
  require('../boostrap5css.php');
  require('../boostrap5JS.php');
  ?>
</head>

<body>

  <!-- Modal -->
<div class="modal fade" id="changePasswordModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">เปลียนรหัสผ่าน</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="row">
            <div class="col-3">
            เปลียนรหัสผ่าน
            </div>
            <div class="col">
            <form enctype="multipart/form-data"  id="changePasswordForm">
            <input type="hidden" name="userId" id="userId" value="<?php echo $_GET['id']; ?>">
              <input class="form-control mb-3" type="text" id="newPassword" minlength="8" name="newPassword" placeholder="รหัสผ่านใหม่" required>
              <input class="form-control" type="text" id="confirmPassword" minlength="8"  name="confirmPassword" placeholder="ยืนยันรหัสผ่าน" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="closemodal" data-bs-dismiss="modal" class="btn btn-danger">ยกเลิก</button>
          <button type="submit" id="confirmChange" class="btn btn-success">ยืนยัน</button>
        </div>
      </form>
    </div>
  </div>
</div>

  <div class="container-fluid">
    <div class="row flex-nowrap">
      <?php require_once('components/sidebar.php') ?>
      <div class="col p-0">
        <?php require_once('components/nav.php') ?>
        <div class="container-fluid">
          <div class="row mt-2" id="mainContents">
            <div class="col-1">
            </div>
            <div class="col-10" id="found">
              <div class="card p-3 mt-4" style="box-shadow: 0px 5px 5px -2px #888;">
                <div class="card-body" style="background-color: #fff;">
                  <div class="row">
                    <div class="col-3">
                    </div>
                    <div class="col-6">
                      <div class="text-center mb-2">
                        <b style="font-size : 20px">จัดการผู้ใช้งาน</b>
                      </div>
                      <a type="button" href="manageUsers.php" class="btn btn-danger mb-3">ย้อนกลับ</a>
                      <div class="card p-3">
                        <div class="card-body mb-4">
                          <form enctype="multipart/form-data" class="needs-validation" id="editUserForm" novalidate>
                            <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>">
                            <div class="col-12">
                              <label>Username</label>
                              <div class="row">
                                <div class="col">
                                  <input type="text" class="form-control" id="username" name="username" placeholder="กรอกชื่อผู้ใช้" readonly>
                                  <div class="valid-feedback">
                                  </div>
                                  <div class="invalid-feedback">
                                    โปรดระบุ Username
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <label>ชื่อจริง</label>
                              <div class="row">
                                <div class="col">
                                  <input type="text" class="form-control" id="firstname" name="firstname" placeholder="กรอกชื่อจริง" required>
                                  <div class="valid-feedback">
                                  </div>
                                  <div class="invalid-feedback">
                                    โปรดระบุชื่อจริง
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <label>นามสกุล</label>
                              <input type="text" class="form-control" id="lastname" name="lastname" placeholder="กรอกนามสกุล" required>
                              <div class="valid-feedback">
                              </div>
                              <div class="invalid-feedback">
                                โปรดระบุนามสกุล
                              </div>
                            </div>
                            <div class="col-12">
                              <label>อีเมล</label>
                              <div class="row">
                                <div class="col">
                                  <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com" required>
                                  <div class="valid-feedback">
                                  </div>
                                  <div class="invalid-feedback">
                                    โปรดระบุอีเมล
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <label>เบอร์โทรศัพท์</label>
                              <input type="text" class="form-control" id="tel" name="tel" placeholder="กรอกหมายเลขโทรศัพท์" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
                              <div class="valid-feedback">
                                </div>
                                <div class="invalid-feedback">
                                  โปรดระบุเบอร์โทรศัพท์
                                </div>
                              </div>
                            </div>
                            <div class="text-end">
                              
                            <button type="button" class="btn btn-warning mb-3" data-bs-toggle="modal" data-bs-target="#changePasswordModal">เปลียนรหัสผ่าน</button>
                            </div>
                      </div>
                      <div class="text-end mt-4 mb-2">
                        <input type="submit" class="btn btn-success btn-lg" value="บันทึก">
                      </div>
                    </div>
                    </form>
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
</body>
<script src="ajax/editUser.js"></script>

</html>