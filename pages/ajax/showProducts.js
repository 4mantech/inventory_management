const showAllProducts = (categoryId) => {
  $.ajax({
    type: "GET",
    url: "query/showProducts.php",
    data: {
      categoryId,
    },
    success: function (data) {
      const { productsObj } = JSON.parse(data);
      if (productsObj == null) {
      } else {
        productsObj.forEach((element, index) => {
          $("#prodTable").append(`
          <tr>
            <td scope="col">${++index}</td>
            <td scope="col">${element.productName}</td>
            <td scope="col">${element.categoryName}</td>
            <td scope="col">${element.productQuantity}</td>
            <td class="text-center" scope="col">
              <button type="button" class="btn btn-info" onclick="showOneProduct(${
                element.id
              })">รายละเอียด</button>
              <a href="editProduct.php?id=${
                element.id
              }" type="button" class="btn btn-warning">แก้ไข</a>
              <button type="button" class="btn btn-danger" onclick="deleteProduct(${
                element.id
              })">ลบ</button></td>
         </tr>
            `);
        });
      }
      $("#showAllProd").dataTable({
        language: {
          emptyTable: "ไม่มีข้อมูลสินค้า",
          search: "ค้นหา",
        },
      });
    },
  });
};

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

const deleteProduct = (id) => {
  SoloAlert.confirm({
    title: "ยืนยัน",
    body: "คุณต้องการที่จะลบประเภทสินค้านี้ใช่หรือไม่?",
    useTransparency: true,
    onOk: () => {
      $.ajax({
        type: "POST",
        url: "query/deleteProduct.php",
        data: {
          id: id,
        },
        success: function (data) {
          const { status } = JSON.parse(data);
          if (status == "true") {
            SoloAlert.alert({
              title: "สำเร็จ",
              body: "ลบสินค้าสำเร็จ",
              icon: "success",
              theme: "light",
              useTransparency: true,
              onOk: () => {
                $("#showAllProd").DataTable().destroy();
                $("#prodTable").children().remove();
                showAllProducts();
              },
            });
          } else {
            SoloAlert.alert({
              title: "ผิดพลาด",
              body: "ไม่สามารถลบสินค้าได้",
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

const showOneProduct = (id) => {
  $.ajax({
    type: "GET",
    url: "query/showOneProduct.php",
    data: { id },
    success: function (data) {
      const { productObj } = JSON.parse(data);
      $("#ProductDetailModal").modal("show");
      $("#detail").append(`
      <div class="col-6">
              <img src="../assets/images/products/${productObj.productImage}" id="productImg" style="height:500;width:100%;border-radius:5px;">
            </div>
            <div class="col-3">
              <div class="row">
                <div class="col-6">
                  <p>ชื่อสินค้า:</p>
                </div>
                <div class="col-6">
                  <p>${productObj.productName}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <p>รายละเอียดสินค้า:</p>
                </div>
                <div class="col-6">
                  <p>${productObj.productDetail}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <p>ประเภทของสินค้า:</p>
                </div>
                <div class="col-6">
                  <p>${productObj.categoryName}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <p>สี:</p>
                </div>
                <div class="col-6">
                  <p>${productObj.color}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <p>ขนาด:</p>
                </div>
                <div class="col-6">
                  <p>${productObj.size}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <p>จำนวน:</p>
                </div>
                <div class="col-6">
                  <p>${productObj.productQuantity}</p>
                </div>
              </div>
            </div>
      `);
    },
  });
};

$("#categoryId").change(function (e) {
  e.preventDefault();
  $("#showAllProd").DataTable().destroy();
  $("#prodTable").children().remove();
  showAllProducts(e.target.value);
});
$("#close1").click(function (e) {
  e.preventDefault();
  setTimeout(() => {
    $("#detail").children().remove();
  }, 400);
});
$("#close2").click(function (e) {
  e.preventDefault();
  setTimeout(() => {
    $("#detail").children().remove();
  }, 400);
});
$(document).ready(function () {
  let id = $("#productId").val();
  showAllProducts("all");
  showAllCategories();
});
