<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venice</title>
    <?php require('../boostrap5css.php') ?>
    <?php require('../boostrap5JS.php') ?>
</head>
<body>
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
      <td>เวนิส</td>
      <td>สังขพัน</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>ตู่</td>
      <td>กัญญารัต</td>
      <td>@fat</td>
    </tr>
  </tbody>
</table>
</body>
<script>
    $(document).ready(function(){
        $("#test").dataTable();
        SoloAlert.alert({
            icon: "error",
            title:"Venice",
            body:"โสดแล้ว.",
            useTransparency: true,
        });
    })
</script>
</html>