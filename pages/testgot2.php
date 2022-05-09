const deleteReport = (id) => {
  SoloAlert.confirm({
    title: "ยืนยัน",
    body: "คุณต้องการที่จะลบผู้ใช้งาน ใช่หรือไม่?",
    useTransparency: true,
    onOk: () => {
      $.ajax({
        type: "POST",
        url: "query/deleteReport.php",
        data: {
          id: id,
        },
        success: function (data) {
          const { status } = JSON.parse(data);
          if (status == "true") {
            SoloAlert.alert({
              title: "สำเร็จ",
              body: "ลบผู้ใช้งานสำเร็จสำเร็จ",
              icon: "success",
              useTransparency: true,
              onOk: () => {
                $("#showAllReports").DataTable().destroy();
                $("#reportTable").children().remove();
                showAllReports();
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