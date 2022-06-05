$(document).ready(function () {
  let id = $("#productId").val();
  showAllProducts("all");
  showAllCategories();
  $("#pageName").text("จัดการสินค้า");
  const userRole = $("#userRole");
});

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
        let html = "";
        productsObj.forEach((element, index) => {
          html += `
          <tr>
            <td scope="col">${++index}</td>
            <td scope="col">${element.productName}</td>
            <td scope="col">${element.categoryName}</td>
            <td scope="col" class="text-center">${element.productQuantity}</td>
            <td class="text-center" scope="col">
              <button type="button" class="btn btn-info" onclick="showOneProduct(${
                element.id
              })"><i class="fa fa-search" aria-hidden="true"></i> รายละเอียด</button>
            `;
          if (userRole.value == 0) {
            html += `<a href="editProduct.php?id=${element.id}" type="button" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>แก้ไข</a>
              <button type="button" class="btn btn-danger" onclick="deleteProduct(${element.id})"><i class="fa fa-trash-o" aria-hidden="true"></i>ลบ</button>`;
          }
          html += `</td>
          </tr>`;
        });
        $("#prodTable").append(html);
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
    theme: "light",
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
                showAllProducts("all");
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
    success: function (response) {
      const data = JSON.parse(response);
      $("#ProductDetailModal").modal("show");
      $("#detail").append(`
      <div class="col-6">
              <img src="../assets/images/products/${data.productImage}" id="productImg" style="height:500;width:100%;border-radius:5px;">
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-4">
                  <p>ชื่อสินค้า:</p>
                </div>
                <div class="col-8">
                  <p>${data.productName}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <p>ประเภทของสินค้า:</p>
                </div>
                <div class="col-8">
                  <p>${data.categoryName}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <p>สี:</p>
                </div>
                <div class="col-8">
                  <p>${data.color}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <p>ขนาด:</p>
                </div>
                <div class="col-8">
                  <p>${data.size}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <p>จำนวน:</p>
                </div>
                <div class="col-8">
                  <p>${data.productQuantity}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <p>หมายเหตุ:</p>
                </div>
                <div class="col-8">
                  <p>ราคาสินค้าอาจมีการเปลียนแปลงทุกเดือน</p>
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
