const showAllProducts = () => {
  $.ajax({
    type: "GET",
    url: "query/showProducts.php",
    data: {},
    success: function (data) {
      const { productsObj } = JSON.parse(data);
      console.log(productsObj);
      productsObj.forEach((element, index) => {
        $("#prodTable").append(`
        <tr>
          <td scope="col">${++index}</th>
          <td scope="col">${element.productName}</th>
          <td scope="col">${element.categoryName}</th>
          <td scope="col">${element.productDetail}</th>
          <td scope="col">${element.size}</th>
          <td scope="col">${element.color}</th>
          <td scope="col">${element.productQuantity}</th>
          <td scope="col">ดำเนินการ</th>
       </tr>
          `);
      });
      $("#showAllProd").dataTable({
        oLanguage: {
          sSearch: "ค้นหา",
        },
      });
    },
  });
};

$(document).ready(function () {
  showAllProducts();
});
