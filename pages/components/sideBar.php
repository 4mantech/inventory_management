    <!-- sidebar -->
    <input type="hidden" name="userRole" id="userRole" value="<?php echo $_SESSION['role']; ?>">
    <input type="hidden" name="loginId" id="loginId" value="<?php echo $_SESSION['loginId']; ?>">
    <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
      <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100 bg-">
        <a href="main.php" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
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
          <?php if($_SESSION['role'] == 0){ ?>
          <li>
            <a href="showCategories.php" class="nav-link px-0 align-middle text-white text-decoration-none">
              <i class="fa fa-table" aria-hidden="true"></i> <span class="ms-1 d-none d-sm-inline">จัดการประเภทสินค้า</span></a>
          </li>
          <li>
            <a href="manageStocks.php" class="nav-link px-0 align-middle text-white text-decoration-none">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="ms-1 d-none d-sm-inline "> จัดการสต็อค</span></a>
          </li>
          <li>
          <a href="showReports.php" class="nav-link px-0 align-middle text-white text-decoration-none">
            <i class="fa fa-file-text-o" aria-hidden="true"></i> <span class="ms-1 d-none d-sm-inline ">รายงานการสั่งซื้อ</span></a>
          </li>
          <li>
          <a href="manageUsers.php" class="nav-link px-0 align-middle text-white text-decoration-none">
            <i class="fa fa-user" aria-hidden="true"></i> <span class="ms-1 d-none d-sm-inline ">จัดการผู้ใช้งาน</span></a>
          </li>
          
          
          <?php } ?>
        </ul>
        <hr class="venice">
        <div class="dropdown pb-4">
          <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="d-none d-sm-inline mx-1"><?php echo $_SESSION['username']; ?></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="editUser.php?id=<?php echo $_SESSION['loginId']; ?>"><i class="fa fa-cog" aria-hidden="true"></i>จัดการบัญชี</a></li>
          <hr>
            <li><a class="dropdown-item" href="query/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> ออกจากระบบ</a></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- sidebar -->