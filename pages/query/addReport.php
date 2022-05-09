<?php
require_once('connect.php');

$reportNumber = trim($_POST['reportNumber']);
$datetime = $_POST['datetime'];

if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != "") {
  $filename = $_FILES['file']['name'];
  $location = "../../assets/images/reports/" . $filename;
  $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
  $imageFileType = strtolower($imageFileType);

  $newname = $reportNumber . "." . $imageFileType;
  $location = "../../assets/images/reports/" . $newname;

  $valid_extensions = array("jpg", "jpeg", "png");

}else{
  $newname = "noImage.jpg";
}

$sql = "INSERT INTO `reports`
(`orderNumber`,
 `imageName`,
  `dateTime`) 
VALUES
 ('$reportNumber',
 '$newname',
 '$datetime')";

if (mysqli_query($conn, $sql)) {
  echo json_encode(array("status" => "true"),JSON_UNESCAPED_UNICODE);
  // try{
    if (in_array(strtolower($imageFileType), $valid_extensions)) {
      move_uploaded_file($_FILES['file']['tmp_name'], $location);
    }
  // }
} else {
  echo json_encode(array("status" => "false", "message" => "ไม่สามารถเพิ่มได้"), JSON_UNESCAPED_UNICODE);
}
mysqli_close($conn);
?>