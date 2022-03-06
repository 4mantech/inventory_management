var id = $("#categoryId");
var categoryName = $("#categoryNameForEdit");

const showAllCategories = () => {
  $.ajax({
    type: "GET",
    url: "query/showCategories.php",
    data: {},
    success: function (data) {
      const { cateObj } = JSON.parse(data);
      cateObj.forEach((element, index) => {
        $("#categoryTable").append(`
        <tr>
          <td scope="col">${++index}</th>
          <td scope="col">${element.categoryName}</th>
          <td scope="col">
            <button type="button" class="btn btn-warning"  onclick="showModalEditCategory(${
              element.id
            })">แก้ไข</button>
            <button type="button" class="btn btn-danger" onclick="deleteCategory(${
              element.id
            })">ลบ</button>          
            </td>
        </tr>
        `);
      });
      $("#showAllCate").dataTable({
        oLanguage: {
          sSearch: "ค้นหา",
        },
      });
    },
  });
};

const deleteCategory = (id) => {
  SoloAlert.confirm({
    title: "ยืนยัน",
    body: "คุณต้องการที่จะลบประเภทสินค้านี้ใช่หรือไม่?",
    useTransparency: true,
    onOk: () => {
      $.ajax({
        type: "POST",
        url: "query/deleteCategory.php",
        data: {
          id: id,
        },
        success: function (data) {
          const { status } = JSON.parse(data);
          if (status == "true") {
            SoloAlert.alert({
              title: "สำเร็จ",
              body: "ลบประเภทสินค้าสำเร็จ",
              icon: "success",
              useTransparency: true,
              onOk: () => {
                $("#showAllCate").DataTable().destroy();
                $("#categoryTable").children().remove();
                showAllCategories();
              },
            });
          } else {
            SoloAlert.alert({
              title: "ผิดพลาด",
              body: "ไม่สามารถลบประเภทสินค้าได้",
              icon: "error",
              useTransparency: true,
            });
          }
        },
      });
    },
  });
};

const addCategory = (categoryName) => {
  $.ajax({
    type: "POST",
    url: "query/addCategory.php",
    data: {
      categoryName: categoryName,
    },
    success: function (data) {
      $("#addCategoryModal").modal("hide");
      let new_data = JSON.parse(data);
      if (new_data.status == "true") {
        SoloAlert.alert({
          title: "สำเร็จ",
          body: "เพิ่มประเภทสินค้าสำเร็จแล้ว",
          icon: "success",
          useTransparency: true,
          onOk: () => {
            $("#categoryName").val("");
          },
        });
        $("#showAllCate").DataTable().destroy();
        $("#categoryTable").children().remove();
        showAllCategories();
      } else {
        SoloAlert.alert({
          title: "ผิดพลาด",
          body: new_data.message,
          icon: "error",
          useTransparency: true,
          onOk: () => {
            location.reload();
          },
        });
      }
    },
  });
};

const editCategory = (id, categoryName) => {
  $.ajax({
    type: "POST",
    url: "query/editCategory.php",
    data: {
      id,
      categoryNameForEdit: categoryName,
    },
    success: function (response) {
      let data = JSON.parse(response);
      if (data.status == "true") {
        $("#editCategoryModal").modal("hide");
        SoloAlert.alert({
          title: "สำเร็จ",
          body: "แก้ไขประเภทสินค้าเรียบร้อยแล้ว",
          icon: "success",
          useTransparency: true,
          onOk: () => {
            $("#showAllCate").DataTable().destroy();
            $("#categoryTable").children().remove();
            showAllCategories();
          },
        });
      } else {
        SoloAlert.alert({
          title: "ผิดพลาด",
          body: data.message,
          icon: "error",
          useTransparency: true,
        });
      }
    },
  });
};

const showModalEditCategory = (id) => {
  $.ajax({
    type: "GET",
    url: "query/showOneCategory.php",
    data: {
      id: id,
    },
    success: function (data) {
      let categoryForEdit = JSON.parse(data).categoryObj;
      categoryId = categoryForEdit[0].id;
      categoryName = categoryForEdit[0].categoryName;
      $("#categoryNameForEdit").val(categoryName);
      $("#categoryId").val(categoryId);
      $("#editCategoryModal").modal("show");
    },
  });
};

$(document).on("click", "#addCategory", function () {
  $("#addCategoryModal").modal("show");
});

$(document).on("click", "#closemodal", function () {
  $("#addCategoryModal").modal("hide");
  $("#categoryName").val("");
});

$(document).on("click", "#confirmAdd", function () {
  let categoryName = $("#categoryName").val();
  addCategory(categoryName);
});

$(document).on("click", "#confirmEdit", function () {
  let categoryNewName = $("#categoryNameForEdit").val();
  let id = $("#categoryId").val();
  editCategory(id, categoryNewName);
});
$(document).on("click", "#closeModalEdit", function () {
  $("#editCategoryModal").modal("hide");
});

$(document).ready(function () {
  showAllCategories();
});
