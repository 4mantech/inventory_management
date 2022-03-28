<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>testPrest</title>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
  <input type="text" name="test" id="test">
  <button type="button" id="submit">บันทึก</button>

  <script>
  $(document).ready(function() {
    const Perth = () => {
      let test = $("#test").val()
      $.ajax({
        type: "POST"
        url: "testgot2.php"
        data: {
          test: test
        },
        success: function(data) {
          Swal.fire({
            icon: 'success',
            title: 'สำเร็จ',
            text: data,
          })
        },
      });
    };
    $("#submit").click(function() {
      Perth()
    });
  });
  </script>

</body>

</html>