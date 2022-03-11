$(document).ready(function () {
  $("#pageName").text("จัดการข้อมูลผู้ใช้");
  showAllUsers();
});

const showAllUsers = () => {
  $.ajax({
    type: "GET",
    url: "query/showUsers.php",
    data: {},
    success: function (data) {
      const { usersObj } = JSON.parse(data);
      usersObj.forEach((element, index) => {
        $("#empTable").append(`
         <tr>
          <td>${++index}</td>
          <td>${element.firstName} ${element.lastName}</td>
          <td>${element.email}</td>
          <td>${element.tel}</td>
          <td>
          <a href="editUser.php?id=${
            element.id
          }" type="button" class="btn btn-warning">แก้ไข</a>
          <button class="btn btn-danger" onclick="deleteUser(${
            element.id
          })">ลบผู้ใช้งาน</button></td>
         </tr>
        `);
        table = $("#showAllEmployees").dataTable();
      });
    },
  });
};

const deleteUser = (id) => {
  SoloAlert.confirm({
    title: "ยืนยัน",
    body: "คุณต้องการที่จะลบผู้ใช้งาน ใช่หรือไม่?",
    useTransparency: true,
    onOk: () => {
      $.ajax({
        type: "POST",
        url: "query/deleteUser.php",
        data: {
          id: id,
        },
        success: function (data) {
          const { status } = JSON.perse(data);
          if (status == "true") {
            SoloAlert.alert({
              title: "สำเร็จ",
              body: "ลบผู้ใช้งานสำเร็จสำเร็จ",
              icon: "success",
              useTransparency: true,
              onOk: () => {
                $("#showAllUser").DataTable().destroy();
                $("#UserTable").children().remove();
                showAllCategories();
              },
            });
          } else {
            SoloAlert.alert({
              title: "ผิดพลาด",
              body: "ไม่สามารถลบชื่อผู้ใช้ได้",
              icon: "error",
              useTransparency: true,
              onOk: () => {
                location.reload();
              },
            });
          }
        },
      });
    },
  });
};
