<?php require('query/checkLogin.php'); ?>
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
          <table class="table" id="test">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
              </tr>
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
    $("#test").dataTable({
      "oLanguage": {
      "sSearch": "ค้นหา",
      }
    });
  })
</script>
</html>