<!-- <!DOCTYPE html>
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
            <li class="breadcrumb-item">Home / Test</li>
          </ol>
        </div>
      </div>
      <div class="card p-3" style="box-shadow: 0 5px 4px -3px black;">
        <div class="card-body" style="background-color: #fff;">
          <table class="table" id="showAllCate">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">username</th>
                <th scope="col">password</th>
              </tr>
            </thead>
            <tbody id="categoryTable">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
<script>
  $(document).ready(function(){
    $("#showAllCate").dataTable({
      "oLanguage": {
      "sSearch": "ค้นหา",
      }
    });
  })
</script>
<script src="ajax/showCategories.js"></script>
</html> -->