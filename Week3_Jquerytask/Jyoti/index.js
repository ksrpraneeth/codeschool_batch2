
getProducts();
function getProducts() {
  let url = "https://dummyjson.com/products";

  let findElement = document.getElementById("SEARCH").value;
  if (findElement) {
    url = "https://dummyjson.com/products/search?q=" + findElement;
  }

  $("#row1").empty();
  $.ajax({
    url: url,
    dataType: "json",
    success: function (data) {
      if (data.products.length == 0) {
        alert("not found");
      }

      for (let i = 0; i < data.products.length; i++) {
        $("#row1").append(`
                    <div class="col-lg-3 sm-12" onclick="getData(${data.products[i]})">
                    <div class="figure-img img-fluid id="1" ><a href="#"><img src="${data.products[i]["images"][0]}" style="width:250px;height:250px; " id="image" value=""></a></div>
                    <div class="description" id="title1" value=""><a href="#">${data.products[i].title}</a></div>
                    <div class="price">Price:$<span id="price1"></span>${data.products[i].price}</div>
                    <div class="discount">Discount%:<span id="discount_percentage1"></span>${data.products[i].discountPercentage}</div>
                    <div class="rating">Rating:<span id="rating1"></span>${data.products[i].rating}</div>
                    <div class="stock">Stock:<span id="stock1"></span>${data.products[i].stock}</div>
                    <div class="brand">Brand:<span id="brand1"></span>${data.products[i].brand}</div>
                    <div class="brand">Category:<span id="category1"></span>${data.products[i].category}</div>
                </div>
                    `);
      }
      
    },

    error: function () {},
  });
}

/*function productSelect(){
    let selectItem=
}*/
