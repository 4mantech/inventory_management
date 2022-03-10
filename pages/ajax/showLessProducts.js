const showLessProduct = (categoryId) => {
  console.log(categoryId);
  $.ajax({
    type: "GET",
    url: "query/showLessProducts.php",
    data: {
      categoryId,
    },
    success: function (data) {
      const { lessProdObj } = JSON.parse(data);
      if (lessProdObj == null) {
      } else {
        lessProdObj.forEach((element, index) => {
          $("#LessTable").append(`
        <tr>
          <td scope="col">${++index}</th>
          <td scope="col">${element.productName}</th>
          <td scope="col">${element.categoryName}</td>
          <td style="color:red;" class="text-center" scope="col">${
            element.productQuantity
          }</th>
          <td class="text-center" scope="col">
          <button type="button" class="btn btn-info" onclick="showOneProduct(${
            element.id
          })">รายละเอียด</button>
          <a href="editProduct.php?id=${
            element.id
          }&history=less" type="button" class="btn btn-warning">แก้ไข</a>
          <button type="button" class="btn btn-danger" onclick="deleteProduct(${
            element.id
          })">ลบ</button>
          </td>
        </tr>
        `);
        });
      }
      $("#showLessProduct").dataTable({
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
                $("#showLessProduct").DataTable().destroy();
                $("#LessTable").children().remove();
                showLessProduct();
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
            <div class="col-3">
              <div class="row">
                <div class="col-6">
                  <p>ชื่อสินค้า:</p>
                </div>
                <div class="col-6">
                  <p>${data.productName}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <p>รายละเอียดสินค้า:</p>
                </div>
                <div class="col-6">
                  <p>${data.productDetail}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <p>ประเภทของสินค้า:</p>
                </div>
                <div class="col-6">
                  <p>${data.categoryName}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <p>สี:</p>
                </div>
                <div class="col-6">
                  <p>${data.color}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <p>ขนาด:</p>
                </div>
                <div class="col-6">
                  <p>${data.size}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <p>จำนวน:</p>
                </div>
                <div class="col-6">
                  <p>${data.productQuantity}</p>
                </div>
              </div>
            </div>
      `);
    },
  });
};

$("#categoryId").change(function (e) {
  e.preventDefault();
  $("#showLessProduct").DataTable().destroy();
  $("#LessTable").children().remove();
  showLessProduct(e.target.value);
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
  showLessProduct("all");
  showAllCategories();
  $("#pageName").text("จัดการสินค้าที่เหลือน้อย");
});
