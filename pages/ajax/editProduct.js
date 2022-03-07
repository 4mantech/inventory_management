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
        $("#productDetail").val(data.productDetail);
        $("#pimage").html(`
          <img 
            id="img"
            src="../assets/images/products/${data.productImage}"
            height="300px"
            class="rounded"
          ></img>
          `);
      } else {
        console.log("nulllll");
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
