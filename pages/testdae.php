<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../assets/font-awesome-4.7.0/css/font-awesome.min.css">
  <title>Venice</title>
  <?php
  require('../boostrap5css.php');
  require('../boostrap5JS.php');
  ?>

</head>

<body>
  <div class="container-fluid">
    <div class="row flex-nowrap">
      <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100 bg-">
          <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-5 d-none d-sm-inline mt-2">ระบบเช็คสต็อกสินค้า</span>
          </a>
          <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li class="nav-item">
              <a href="main.php" class="nav-link align-middle px-0 text-white text-decoration-none">
                <i class="fa fa-home" aria-hidden="true"></i> <span class="ms-1 d-none d-sm-inline">หน้าหลัก</span>
              </a>
            </li>
            <li>
              <a href="showProducts.php" class="nav-link px-0 align-middle text-white text-decoration-none">
                <i class="fa fa-table" aria-hidden="true"></i> <span class="ms-1 d-none d-sm-inline">จัดการสินค้า</span></a>
            </li>
            <li>
              <a href="showCategories.php" class="nav-link px-0 align-middle text-white text-decoration-none">
                <i class="fa fa-table" aria-hidden="true"></i> <span class="ms-1 d-none d-sm-inline">จัดการประเภทสินค้า</span></a>
            </li>
            <li>
              <a href="manaeUser.php" class="nav-link px-0 align-middle text-white text-decoration-none">
                <i class="fa fa-user" aria-hidden="true"></i> <span class="ms-1 d-none d-sm-inline">จัดการผู้ใช้งาน</span></a>
            </li>
            <!-- <li>
                <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                  <i class="fa fa-product-hunt" aria-hidden="true"></i> <span class="ms-1 d-none d-sm-inline">Products</span> </a>
                <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                  <li class="w-100">
                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 1</a>
                  </li>
                  <li>
                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 2</a>
                  </li>
                  <li>
                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 3</a>
                  </li>
                  <li>
                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 4</a>
                  </li>
                </ul>
              </li> -->

          </ul>
          <hr>
          <div class="dropdown pb-4">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">

              <span class="d-none d-sm-inline mx-1">Username</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
              <!-- <li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li> -->


              <li><a class="dropdown-item" href="query/logout.php">ออกจากระบบ</a></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col p-0">
        <!-- As a heading -->
        <nav class="navbar navbar-dark bg-dark">
          <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">ระบบเช็คสต็อกสินค้า</span>
          </div>
        </nav>
        <div class="container-fluid">
          <div class="row p-1">
            <h3>Left Sidebar with Submenus</h3>
            <p class="lead">
              An example 2-level sidebar with collasible menu items. The menu functions like an "accordion" where only a single
              menu is be open at a time. While the sidebar itself is not toggle-able, it does responsively shrink in width on smaller screens.</p>
            <ul class="list-unstyled">
              <li>
                <h5>Responsive</h5> shrinks in width, hides text labels and collapses to icons only on mobile
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>