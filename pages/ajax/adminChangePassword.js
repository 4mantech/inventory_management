$(document).ready(() => {

  $("#changePassword").submit(function (e) {
    e.preventDefault();
    if (
      e.target.password.value == "" ||
      e.target.confirmPassword.value == "" ||
      e.target.email.value == ""
      || (e.target.confirmPassword.value != e.target.password.value)
    )   {
      if (e.target.password.value.trim() == "") {
        $("#password").addClass("is-invalid");
      } else {
        $("#password").removeClass("is-invalid");
      }

      if (e.target.confirmPassword.value.trim() == "") {
        $("#confirmPassword").addClass("is-invalid");
      } else {
        $("#confirmPassword").removeClass("is-invalid");
      }

      if (e.target.password.value != e.target.confirmPassword.value) {
        $("#password").addClass("is-invalid");
        $("#confirmPassword").addClass("is-invalid");
      } else {
        $("#password").removeClass("is-invalid");
        $("#confirmPassword").removeClass("is-invalid");
      }
      if (e.target.email.value.trim() == "") {
        $("#email").addClass("is-invalid");
      } else {
        $("#email").removeClass("is-invalid");
      }
    }else{
      let data = new FormData(e.target)
      changePassword(data)
    }
  });
});

const changePassword = (data) => {
  $.ajax({
    type: "POST",
    enctype: "multipart/form-data",
    url: "query/adminChangePassword.php",
    data,
    processData: false,
    contentType: false,
    cache: false,
    success: function (res) {
      const { status, message } = JSON.parse(res);
      if (status == "true") {
        SoloAlert.alert({
          title: message,
          icon: "success",
          theme: "light",
          useTransparency: true,
          onOk: () => {
            window.location.href = "index.php";
          },
        });
      } else {
        SoloAlert.alert({
          title: message,
          icon: "error",
          theme: "light",
          useTransparency: true,
        });
      }
    },
  });
};
