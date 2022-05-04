const dataStock = [];

$(document).ready(function () {
  $("#showStocks").DataTable();
  showProducts();
  $("#addStock").click(function () {
    $("#addStockModal").modal("show");
  });
  $(".js-example-basic-multiple").select2({
    dropdownParent: $("#addStockModal"),
  });
  $("#pageName").text("จัดการสต็อค");

  $("#cutStockButton").click(function (e) {
    e.preventDefault();

    $("#showStocks tr")
      .not(":first")
      .each(function () {
        let data2 = {
          id: $(this).find("td:eq(0)").text(),
          total: $(this).find("td:eq(2)").text(),
          amount: $(this).find("td:eq(3) :input").val(),
        };
        dataStock.push(data2);
      });
    let jsonDataStock = { dataStock: dataStock };
    SoloAlert.confirm({
      title: "ยืนยันการตัดสต็อค",
      // body: "ฮัลโหลเวิน",
      useTransparency: true,
      onOk: () => {
        $.ajax({
          type: "POST",
          url: "query/cutStock.php",
          data: {
            jsonDataStock,
          },
          success: function (response) {
            const { status, message } = JSON.parse(response);
            if (status == "true") {
              alert(message);
            } else {
              alert(message);
            }
            dataStock.length = 0;
          },
        });
      },
    });
  });
});

const showProducts = () => {
  $.ajax({
    type: "GET",
    data: {
      categoryId: "all",
    },
    url: "query/showProducts.php",
    success: function (response) {
      const { productsObj } = JSON.parse(response);
      if (productsObj == null) {
      } else {
        productsObj.forEach((element) => {
          $("#select").append(`
          <option value="${element.id}">${element.productName}</option>
          `);
        });
      }
    },
  });
};

// $("#formSelect").submit(function (e) {
//   e.preventDefault();
//   let form = e.target[0];
//   let data = new FormData(form);
//   showSelect(data);
// });

$("#confirmAdd").click(function (e) {
  e.preventDefault();
  let form = $("#formSelect")[0];
  let data = new FormData(form);
  showSelect(data);
});

const showSelect = (data) => {
  $.ajax({
    type: "POST",
    enctype: "multipart/form-data",
    url: "query/showSelectStock.php",
    data,
    processData: false,
    contentType: false,
    cache: false,
    success: function (response) {
      $("#showStocks").DataTable().destroy();
      $("#stockBody").children().remove();
      const { selectObj } = JSON.parse(response);
      dataStock.length = 0;
      if (selectObj != null) {
        selectObj.forEach((element) => {
          $("#stockBody").append(`
          <tr>
            <td scope="col">${element.id}</td>
            <td scope="col">${element.productName}</td>
            <td scope="col">${element.productQuantity}</td>
            <td class="text-center" scope="col"> 
              <input type="number" class="form-control" min="1" value="1" max="${element.productQuantity}"></input>
            </td>
          </tr>   
          `);
        });
      }
      $("#showStocks").DataTable();
      // let test = [];

      console.log(dataStock);
    },
  });
};
