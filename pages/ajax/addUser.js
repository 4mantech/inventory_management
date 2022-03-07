$(document).ready(function () {
  $("#pageName").text("เพิ่มผู้ใช้งาน");
});

const addUser = (data) => {
  $.ajax({
    type: "POST",
    enctype: "multipart/form-data",
    url: "query/addUser.php",
    data: data,
    processData: false,
    contentType: false,
    cache: false,
    success: function (response) {
      const data = JSON.parse(response);
      if (data.status == "true") {
        SoloAlert.alert({
          title: "สำเร็จ",
          body: "เพิ่มผู้ใช้งานเรียบร้อยแล้ว",
          icon: "success",
          theme: "light",
          useTransparency: true,
          onOk: function () {
            window.location.href = "manageUsers.php";
          },
        });
      } else {
        SoloAlert.alert({
          title: "ผิดพลาด",
          body: data.message,
          icon: "error",
          theme: "light",
          useTransparency: true,
          onOk: function () {},
        });
      }
    },
  });
};

var forms = document.querySelectorAll(".needs-validation");
Array.prototype.slice.call(forms).forEach(function (form) {
  form.addEventListener(
    "submit",
    function (event) {
      event.preventDefault();
      if (!form.checkValidity()) {
        event.stopPropagation();
      } else {
        let data = new FormData(forms[0]);
        addUser(data);
      }
      form.classList.add("was-validated");
    },
    false
  );
});
