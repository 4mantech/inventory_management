$(document).ready(function () {
  showUser($("#id").val());
  $("#pageName").text("จัดการบัญชีผู้ใช้");
});
const showUser = (id) => {
  console.log(id);
  $.ajax({
    type: "GET",
    url: "query/showOneUser.php",
    data: {
      id,
    },
    success: function (response) {
      const data = JSON.parse(response);
      $("#username").val(data.username);
      $("#firstname").val(data.firstName);
      $("#lastname").val(data.lastName);
      $("#email").val(data.email);
      $("#tel").val(data.tel);
    },
  });
};

const editUser = (data) => {
  $.ajax({
    type: "POST",
    enctype: "multipart/form-data",
    url: "query/editUser.php",
    data,
    processData: false,
    contentType: false,
    cache: false,
    success: function (response) {
      const data = JSON.parse(response);
      if (data.status == "true") {
        SoloAlert.alert({
          title: "สำเร็จ!!",
          body: "แก้ไขข้อมูลผู้ใช้งานสำเร็จ",
          icon: "success",
          theme: "light",
          useTransparency: true,
          onOk: () => {
            location.reload();
          },
        });
      } else {
        SoloAlert.alert({
          title: "ผิดพลาด!!",
          body: data.message,
          icon: "success",
          theme: "light",
          useTransparency: true,
          onOk: () => {},
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
        editUser(data);
      }
      form.classList.add("was-validated");
    },
    false
  );
});
