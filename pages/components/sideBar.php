
<style>
  .sidebar-container {
  position: fixed;
  width: 325px;
  height: 100%;
  left: 0;
  overflow-x: hidden;
  overflow-y: auto;
  background: #1a1a1a;
  color: white;
  box-shadow: 5px 0 5px -2px #888;
}

.content-container {
  padding-top: 20px;
}

.sidebar-logo {
  padding: 10px 15px 10px 30px;
  font-size: 25px;
  background-color: #FFA500;
}

.sidebar-navigation {
  padding: 0;
  margin: 0;
  list-style-type: none;
  position: relative;
}

.sidebar-navigation li {
  background-color: transparent;
  position: relative;
  display: inline-block;
  width: 100%;
  line-height: 20px;
}

.sidebar-navigation li a {
  padding: 10px 15px 10px 30px;
  display: block;
  color: white;
}

.sidebar-navigation li .fa {
  margin-right: 10px;
}

.sidebar-navigation li a:active,
.sidebar-navigation li a:hover,
.sidebar-navigation li a:focus {
  text-decoration: none;
  outline: none;
}

.sidebar-navigation li::before {
  background-color: #FFCC66;
  position: absolute;
  content: '';
  height: 100%;
  left: 0;
  top: 0;
  -webkit-transition: width 0.2s ease-in;
  transition: width 0.2s ease-in;
  width: 3px;
  z-index: -1;
}

.sidebar-navigation li:hover::before {
  width: 100%;
}

.sidebar-navigation .header {
  font-size: 12px;
  text-transform: uppercase;
  background-color: #151515;
  padding: 10px 15px 10px 30px;
}

.sidebar-navigation .header::before {
  background-color: transparent;
}

.content-container {
  padding-left: 220px;
}

a {
  text-decoration: none;
}
</style>


<div class="sidebar-container">
  <div class="sidebar-logo">
    ขายเรือ
  </div>
  <ul class="sidebar-navigation">
    <li>
      <a href="main.php">
        <i class="fa fa-home" aria-hidden="true"></i> หน้าหลัก
      </a>
    </li>
    <li>
      <a href="showCategories.php">
        <i class="fa fa-tachometer" aria-hidden="true"></i> จัดการประเภทสินค้า
      </a>
    </li>
    <li>
      <a href="showProducts.php">
        <i class="fa fa-users" aria-hidden="true"></i> จัดการสินค้า
      </a>
    </li>
    <li>
      <a href="manageUsers.php">
        <i class="fa fa-cog" aria-hidden="true"></i> จัดการผู้ใช้งาน
      </a>
    </li>
    <li>
      <a href="query/logout.php">
        <i class="fa fa-info-circle" aria-hidden="true"></i> ออกจากระบบ
      </a>
    </li>
  </ul>
</div>