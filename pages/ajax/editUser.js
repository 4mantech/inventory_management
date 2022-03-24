$(document).ready(function () {
  showUser($("#id").val());
  $("#pageName").text("จัดการบัญชีผู้ใช้");
});
$("#changePasswordForm").submit(function (e) {
  e.preventDefault();
  let data = new FormData(e.target);
  if (e.target.newPassword.value != e.target.confirmPassword.value) {
    $("#newPassword").addClass("is-invalid");
    $("#confirmPassword").addClass("is-invalid");
  } else {
    $("#newPassword").removeClass("is-invalid");
    $("#confirmPassword").removeClass("is-invalid");
    changePassword(data);
  }
});

$("#newPassword").keyup(function () {
  $("#newPassword").removeClass("is-invalid");
});

$("#confirmPassword").keyup(function () {
  $("#confirmPassword").removeClass("is-invalid");
});

const showUser = (id) => {
  $.ajax({
    type: "GET",
    url: "query/showOneUser.php",
    data: {
      id,
    },
    success: function (response) {
      if (response == "null") {
        $("#found div").remove();
        $.get("components/404.php", function (data) {
          $("#found").append(data);
        });
      } else {
        const data = JSON.parse(response);
        if ($("#loginId").val() != $("#userId").val()) {
          if ($("#userRole").val() == 0) {
            $("#username").val(data.username);
            $("#firstname").val(data.firstName);
            $("#lastname").val(data.lastName);
            $("#email").val(data.email);
            $("#tel").val(data.tel);
          } else {
            $("#found div").remove();
            $.get("components/403.php", function (data) {
              $("#found").append(data);
            });
          }
        } else {
          $("#username").val(data.username);
          $("#firstname").val(data.firstName);
          $("#lastname").val(data.lastName);
          $("#email").val(data.email);
          $("#tel").val(data.tel);
        }
      }
    },
  });
};

const changePassword = (data) => {
  SoloAlert.confirm({
    title: "ยืนยัน",
    body: "คุณต้องการเปลียนรหัสผ่านผู้ใช้นี้ ใช่หรือไม่?",
    theme: "light",
    useTransparency: true,
    onOk: () => {
      $.ajax({
        type: "POST",
        enctype: "multipart/form-data",
        url: "query/changePassword.php",
        data,
        processData: false,
        contentType: false,
        cache: false,
        success: function (response) {
          const data = JSON.parse(response);
          if (data.status == "true") {
            SoloAlert.alert({
              title: "สำเร็จ",
              body: "เปลียนรหัสผ่านสำเร็จ",
              icon: "success",
              useTransparency: true,
              theme: "light",
              onOk: () => {
                $("#changePasswordForm")[0].reset();
                $("#changePasswordModal").modal("hide");
              },
            });
          } else {
            SoloAlert.alert({
              title: "ผิดพลาด",
              body: "ไม่สามารถเปลียนรหัสผ่านได้",
              icon: "error",
              theme: "light",
              useTransparency: true,
            });
          }
        },
      });
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
