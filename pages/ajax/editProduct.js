$(document).ready(function () {
  $("#pageName").text("แก้ไขสินค้า");
  const id = $("#productId").val();
  showOneProduct(id);
});

$("#productImage").change(function (e) {
  e.preventDefault();
  const [file] = productImage.files;
  if (file) {
    img.src = URL.createObjectURL(file);
  } else {
    img.src = "../assets/images/products/noProductImage.jpg";
  }
});

const showCategories = (id) => {
  $.ajax({
    type: "get",
    url: "query/showCategories.php",
    success: function (response) {
      const { cateObj } = JSON.parse(response);
      let html = "";
      cateObj.forEach((element) => {
        html += `<option value="${element.id}"`;
        html += id == element.id ? "selected" : "";
        html += `>${element.categoryName}</option>`;
      });
      $("#categoryId").html(html);
    },
  });
};

const showOneProduct = (id) => {
  $.ajax({
    type: "GET",
    url: "query/showOneProduct.php",
    data: {
      id,
    },
    success: function (response) {
      const data = JSON.parse(response);
      if (data != null) {
        $("#productName").val(data.productName);
        $("#size").val(data.size);
        $("#color").val(data.color);
        $("#productQuantity").val(data.productQuantity);
        // $("#productDetail").val(data.productDetail);
        $("#pimage").html(`
          <img 
            id="img"
            src="../assets/images/products/${data.productImage}"
            height="300px"
            class="rounded"
          ></img>
          `);
        showCategories(data.categoryId);
      } else {
        $("#found div").remove();
        $(".col-10 a").remove();
        $.get("components/404.php", function (data) {
          $("#found").append(data);
        });
      }
    },
  });
};

const editProduct = (data) => {
  $.ajax({
    type: "POST",
    enctype: "multipart/form-data",
    url: "query/editProduct.php",
    data: data,
    processData: false,
    contentType: false,
    cache: false,
    success: (response) => {
      const data = JSON.parse(response);
      if (data.status == "true") {
        SoloAlert.alert({
          title: "สำเร็จ!!",
          body: "แก้ไขสินค้าสำเร็จ",
          icon: "success",
          theme: "light",
          useTransparency: true,
          onOk: () => {
            window.location.href = 'showProducts.php';
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
        editProduct(data);
      }
      form.classList.add("was-validated");
    },
    false
  );
});
