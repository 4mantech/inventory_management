$(document).ready(function () {
  showAllCategories();
});

const showAllCategories = () => {
  $.ajax({
    type: "GET",
    url: "query/showCategories.php",
    success: function (response) {
      const { cateObj } = JSON.parse(response);
      if (cateObj == "null") {
        $("#categoryId").prop("disabled", true);
        $("#categoryId").append(`
        <option value="0">ไม่พบประเภทสินค้า</option>
        `);
      } else {
        cateObj.forEach((element) => {
          $("#categoryId").append(`
          <option value='${element.id}'>${element.categoryName}</option>
          `);
        });
      }
    },
  });
};

const addProduct = (data) => {
  $.ajax({
    type: "POST",
    enctype: "multipart/form-data",
    url: "query/addProduct.php",
    data,
    processData: false,
    contentType: false,
    cache: false,
    success: function (response) {
      const data = JSON.parse(response);
      if (data.status == "true") {
        SoloAlert.alert({
          title: "สำเร็จ",
          body: "เพิ่มสินค้าเรียบร้อยแล้ว",
          icon: "success",
          theme: "light",
          useTransparency: true,
          onOk: function () {
            window.location.href = "showProducts.php";
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
        addProduct(data);
      }
      form.classList.add("was-validated");
    },
    false
  );
});
