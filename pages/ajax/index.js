$(".input100").each(function () {
  $(this).on("blur", function () {
    if ($(this).val().trim() != "") {
      $(this).addClass("has-val");
    } else {
      $(this).removeClass("has-val");
    }
  });
});

$(".validate-form .input100").each(function () {
  $(this).focus(function () {
    hideValidate(this);
  });
});

var input = $(".validate-input .input100");

$(".validate-form").on("submit", function (e) {
  e.preventDefault();
  var check = null;

  for (i = 0; i < input.length; i++) {
    if (validate(input[i]) == false) {
      showValidate(input[i]);
      check = false;
    }
  }
  if (input[0].value != "" && input[1].value != "") {
    let form = $("#loginForm")[0];
    let data = new FormData(form);
    $.ajax({
      type: "POST",
      enctype: "multipart/form-data",
      url: "query/login.php",
      data,
      processData: false,
      contentType: false,
      cache: false,
      success: function (response) {
        const { loginObj } = JSON.parse(response);
        if (loginObj[0].status == "true") {
          if (loginObj[0].role == 0) {
            window.location.href = "main.php";
          } else if (loginObj[0].role == 1) {
            window.location.href = "main.php";
          } else {
            window.location.href = "query/logout.php";
          }
        } else {
          SoloAlert.alert({
            title: "ผิดพลาด",
            body: "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง",
            icon: "error",
            theme: "light",
            useTransparency: true,
            onOk: function () {},
          });
        }
      },
    });
  }
  return check;
});

$(".validate-form .input100").each(function () {
  $(this).focus(function () {
    hideValidate(this);
  });
});

function validate(input) {
  if ($(input).attr("type") == "text" || $(input).attr("name") == "username") {
    if (
      $(input)
        .val()
        .trim()
        .match(/^([a-zA-Z0-9_\-\.]+)$/) == null
    ) {
      return false;
    }
  } else {
    if ($(input).val().trim() == "") {
      return false;
    }
  }
}

const showValidate = (input) => {
  let thisAlert = $(input).parent();

  $(thisAlert).addClass("alert-validate");
};

const hideValidate = (input) => {
  let thisAlert = $(input).parent();

  $(thisAlert).removeClass("alert-validate");
};
