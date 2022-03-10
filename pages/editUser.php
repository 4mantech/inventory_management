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
              <div class="card p-3 mt-4" style="box-shadow: 0px 5px 5px -2px #888;">
                <div class="card-body" style="background-color: #fff;">
                  <div class="row">
                    <div class="col-1">
                    </div>
                    <div class="col-10">
                    <div class="text-center mb-2">
                        <b style="font-size : 20px">จัดการผู้ใช้งาน</b>
                      </div>
                      <a type="button" href="manageUsers.php" class="btn btn-danger mb-3">ย้อนกลับ</a>
                      <div class="card p-3">
                        <div class="card-body mb-4">
                          <form enctype="multipart/form-data" class="needs-validation" id="editUserForm" novalidate>
                            <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>">
                            <!-- ข้อมูลทั่วไป -->
                            <div class="form-group row mt-2">
                              <!-- Category -->
                              <div class="col-6">
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
                              <!-- Product Type -->
                              <div class="col-6">
                                <label>Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="กรอก Password">
                                <div class="valid-feedback">
                                </div>
                                <div class="invalid-feedback">
                                  โปรดระบุ Password
                                </div>
                              </div>
                            </div>
                            <div class="form-group row mt-2">
                              <!-- Brand/Model -->
                              <div class="col-6">
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
                              <!-- Product Type -->
                              <div class="col-6">
                                <label>นามสกุล</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="กรอกนามสกุล" required>
                                <div class="valid-feedback">
                                </div>
                                <div class="invalid-feedback">
                                  โปรดระบุนามสกุล
                                </div>
                              </div>
                            </div>
                            <div class="form-group row mt-2">
                              <!-- Brand/Model -->
                              <div class="col-6">
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
                              <!-- Product Type -->
                              <div class="col-6">
                                <label>เบอร์โทรศัพท์</label>
                                <input type="text" class="form-control" id="tel" name="tel" placeholder="กรอกหมายเลขโทรศัพท์" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
                                <div class="valid-feedback">
                                </div>
                                <div class="invalid-feedback">
                                  โปรดระบุเบอร์โทรศัพท์
                                </div>
                              </div>
                            </div>
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