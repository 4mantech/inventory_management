$(document).ready(() => {
  showReports();
  $("#pageName").text("รายงานสรุปการสั่งซื้อสินค้า");

  $("#formAddReport").submit((e)=>{
    e.preventDefault();
    let data = new FormData(e.target);
    $.ajax({
      type: "POST",
      enctype: "multipart/form-data",
      url: "query/addReport.php",
      data: data,
      processData:false,
      contentType:false,
      cache:false,
      success: function (response){
        const { status , message } = JSON.parse(response);
        if (status == "true"){
          SoloAlert.alert({
            title: "สำเร็จ",
            body: "เพิ่มใบคำสั่งซื้อสำเร็จ",
            icon: "success",
            useTransparency: true,
            onOk: () => {
              $("#addReportModal").modal('hide');
              $("#showAllReports").DataTable().destroy();
              $("#reportTable").children().remove();
              showReports();
            },
          });
        }else{
          SoloAlert.alert({
            title: "ผิดพลาด",
            body: message,
            icon: "error",
            useTransparency: true,
            onOk: () => {
            },
          });
        }
      }
    })
  })

  $("#addReport").click(()=>{
    $("#addReportModal").modal('show');
    $("#formAddReport").trigger("reset");
  })

});

const showReports = () => {
  $.ajax({
    type: "GET",
    url:"query/showReports.php",
    data:{},
    processData:false,
    contentType:false,
    cache:false,
    success: function (data) {
      const {reportsObj} = JSON.parse(data);
      console.log(reportsObj);
      if(reportsObj != null){
        reportsObj.forEach((element, index) => {
          $("#reportTable").append(`
            <tr>
              <td>${++index}</td>
              <td>${element.orderNumber}</td>
              <td><img src="../assets/images/reports/${element.imageName}" style="height:120px;width:100px;cursor:pointer;" onclick="showImage('${element.imageName}')"></td>
              <td>${element.dateTime}</td>
              <td>
                <button class="btn btn-danger" onclick="deleteReport(${
                  element.id
                })"><i class="fa fa-trash-o" aria-hidden="true">&nbsp;</i>ลบ</button>
              </td>
            </tr>
          `);
        });
      }else{
      };
      $("#showAllReports").dataTable();
    }
  })
};

const showImage = (imageName) =>{
  console.log(imageName);
  $("#img").attr("src",`../assets/images/reports/${imageName}`);
  $("#imageModal").modal("show");
}


const deleteReport = (id) => {
  SoloAlert.confirm({
    title: "ยืนยัน",
    body: "คุณต้องการที่จะลบใบคำสั่งซื้อนี้ใช่หรือไม่?",
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
              body: "ลบใบคำสั่งซื้อสำเร็จ",
              icon: "success",
              useTransparency: true,
              onOk: () => {
                $("#showAllReports").DataTable().destroy();
                $("#reportTable").children().remove();
                showReports();
              },
            });
          } else {
            SoloAlert.alert({
              title: "ผิดพลาด",
              body: "ไม่สามารถลบใบคำสั่งซื้อได้",
              icon: "error",
              useTransparency: true,
              onOk: () => {
              },
            });
          }
        },
      });
    },
  });
};
