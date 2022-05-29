<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ผู้ใช้งาน</title>
  <?php
  require('../boostrap5css.php');
  require('../boostrap5JS.php');
  ?>
</head>

<body>
  <div class="container-fluid">
    <div class="row flex-nowrap">
      <div class="col p-0">
        <div class="container-fluid">
          <div class="row mt-2" id="mainContents">
            <div class="col-4"></div>
            <div class="col-4">
              <div class=" p-3 mt-4">
                <div class="card-body" style="background-color: #fff;">
                <div class="row">
                <div class="text-center mb-3">
                  <img src="../assets/images/logo.png" class="rounded-circle" alt="..." height="150px">
                </div>
                  <div class="text-center mb-4 mt-2">
                  <b style="font-size : 24px">เปลียนรหัสผ่าน Admin</b>
                  </div>
                </div>
                  <div class="row">
                    <div class="col-1">
                    </div>
                    <div class="col-10">
                      <div class="card p-3">
                        <div class="card-body mb-4">
                          <form enctype="multipart/form-data" class="needs-validation" id="changePassword" novalidate>
                            <div class="form-group row mt-2">
                              <div class="col-12">
                                <label>Email</label>
                                <div class="row">
                                  <div class="col">
                                    <input type="email" class="form-control" pattern="\S+" maxlength="255" id="email" name="email" placeholder="กรุณากรอกอีเมล" required>
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                      โปรดระบุ Email
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group row mt-2">
                              <div class="col-6">
                                <label>Password</label>
                                <div class="row">
                                  <div class="col">
                                    <input type="password" class="form-control" pattern="\S+" maxlength="255" id="password" name="password" placeholder="รหัสผ่าน" required>
                                    <div class="valid-feedback">
                                    </div>
                                    <div class="invalid-feedback">
                                      โปรดกรอกรหัสผ่าน
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-6">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" pattern="\S+" maxlength="255" id="confirmPassword" name="confirmPassword" placeholder="ยืนยันรหัสผ่าน" required>
                                <div class="valid-feedback">
                                </div>
                                <div class="invalid-feedback">
                                  โปรดยืนยันรหัสผ่าน
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="text-center mb-2">
                          <input type="submit" class="btn btn-success btn" value="บันทึก">
                        </div>
                      </div>
                    </div>
                    </form>
                  </div>
                  <div class="col-4">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
<script src="ajax/adminChangePassword.js"></script>

</html>