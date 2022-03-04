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
            <button type="button" class="btn btn-warning">แก้ไข</button>
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

$(document).ready(function () {
  showAllCategories();
});
