$(document).ready(function () {
  $("#showStocks").hide();
  showProducts();
  $("#addStock").click(function () {
    $("#addStockModal").modal("show");
  });
  $(".js-example-basic-multiple").select2({
    dropdownParent: $("#addStockModal"),
  });
  $("#pageName").text("จัดการสต็อค");
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
      console.log(response);
      const { selectObj } = JSON.parse(response);
      if (selectObj == null) {
        $("#stockBody").append(`
        <tr>
        <td colspan="4" class="text-center">กรุณาเพิ่มสินค้า</td>
        </tr>  `);
      } else {
        selectObj.forEach((element, index) => {
          $("#stockBody").append(`
          <tr>
            <td scope="col">${++index}</td>
            <td scope="col">${element.productName}</td>
            <td scope="col">${element.productQuantity}</td>
            <td class="text-center" scope="col"> 
              <button type="button" class="btn btn-warning" onclick="cutStock(${
                element.id
              })"><i class="fa fa-scissors" aria-hidden="true"></i> ตัดสต็อค</button>
            </td>
          </tr>   
          `);
        });
        $("#showStocks").dataTable(config);
        $("#showStocks").show();
      }
    },
  });
};
