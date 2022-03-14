<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>เพิ่มสินค้า</title>
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
        <?php require_once('components/nav.php') ?>
        <div class="container-fluid">
          <div class="row mt-2" id="mainContents">
            <div class="col-1"></div>
            <div class="col-10">
              <div class="card p-3" style="box-shadow: 0px 5px 5px -2px #888;">
                <div class="card-body mb-4" style="background-color: #fff;">
                  <a type="button" href="javascript:history.back()" class="btn btn-danger mb-3">ย้อนกลับ</a>
                  <div class="card">
                    <div class="card-body">
                      <form enctype="multipart/form-data" class="needs-validation" id="addProductForm" novalidate>
                        <div class="form-group row mt-2">
                          <div class="col-6">
                            <label for="previewcategory">ชื่อสินค้า</label>
                            <div class="row">
                              <div class="col">
                                <input type="text" class="form-control" id="productName" name="productName" required>
                                <div class="valid-feedback">
                                </div>
                                <div class="invalid-feedback">
                                  โปรดกรอกชื่อสินค้า
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-6">
                            <label for="previewtypeproduct">ประเภทสินค้า</label>
                            <div class="row">
                              <div class="col">
                                <select class="form-select js-example-basic-single" id="categoryId" name="categoryId" required>
                                  <option selected disabled value="">Choose...</option>
                                </select>
                                <div class="valid-feedback">
                                </div>
                                <div class="invalid-feedback">
                                  โปรดระบุประเภทของสินค้า
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row mt-2">
                          <div class="col-4">
                            <label for="previewmodel">ขนาด</label>
                            <input type="text" class="form-control" id="size" name="size" placeholder="กว้างxยาวxสูง" required>
                            <div class="valid-feedback">
                            </div>
                            <div class="invalid-feedback">
                              โปรดระบุขนาดของสินค้า
                            </div>
                          </div>
                          <div class="col-4">
                            <label for="previewmodel">สี</label>
                            <input type="text" class="form-control" id="color" name="color" required>
                            <div class="valid-feedback">
                            </div>
                            <div class="invalid-feedback">
                              โปรดระบุสีของสินค้า
                            </div>
                          </div>
                          <div class="col-4">
                            <label for="previewmodel">จำนวน</label>
                            <input type="number" class="form-control" id="productQuantity" min="0" name="productQuantity" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
                            <div class="valid-feedback">
                            </div>
                            <div class="invalid-feedback">
                              โปรดระบุจำนวนของสินค้า
                            </div>
                          </div>

                        </div>
                        <div class="form-group row mt-2">
                          <div class="col">
                            <label for="productdetail" class="form-label">รายละเอียดสินค้า (เพิ่มเติม)</label>
                            <textarea class="form-control" id="productDetail" name="productDetail" required></textarea>
                            <div class="valid-feedback">
                            </div>
                            <div class="invalid-feedback">
                              โปรดระบุรายละเอียดของสินค้า
                            </div>
                          </div>
                        </div>
                        <div class="form-group row mt-2">
                          <div class="col">
                            <label for="add-picture" class="form-label">เพิ่มรูปสินค้า
                            </label>
                            <div class="row">
                              <div class="form-group add-pic">
                                <div class="row m-8">
                                  <div class="col">
                                    <input class="form-control mb-3" type="file" name="productImage" id="productImage" accept=".png, .jpg, .jpeg">
                                    <div class="valid-feedback">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="text-end">
                          <input type="submit" class="btn btn-success btn-lg" value="บันทึก">
                        </div>
                      </form>
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
<script src="ajax/addProduct.js"></script>

</html>