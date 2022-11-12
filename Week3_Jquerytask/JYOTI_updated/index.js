
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
                    <div class="col-lg-3 sm-12" onclick="getData(${data.products[i].id})">
                    <div class="figure-img img-fluid id="1" value=""><img src="${data.products[i]["images"][0]}" style="width:250px;height:250px; " id="image" value=""></div>
                    <div class="description" id="title1" value="">${data.products[i].title}</div>
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






function getData(id){
  console.log(id)
  let k=id;
  console.log(k)
  $.ajax({
    url:'https://dummyjson.com/products',
    dataType:'json',
    success:function(data){
       
      for(let i=0;i<data.products.length;i++){
        if(data.products[i].id==k){
          $('#row1').addClass('d-none')
          $('#footer1').addClass('d-none')
        
          $('.row2').removeClass('d-none')
          
          $('.row2').append(`
          <img src="${data.products[i].images[0]}"style="width:250px;height:250px; " class="mt-4">
          <p> Product Name: ${data.products[i].title}</p>
          <p> Price: $${data.products[i].price}</p>
          <p>Discount Percentage: ${data.products[i].discountPercentage}</p>
          <p> Rating:${data.products[i].rating}</p>
          <p> Stock:${data.products[i].stock}</p>
          <p>Brand: ${data.products[i].brand}</p>
          <p>Category: ${data.products[i].category}</p>
          
          <button onclick='closepage()'>back</button>
        
          `)
        }
      }
    },
    error: function(){},

  })
 
    


}

 


function closepage(){
  $('#row1').removeClass('d-none')
  $('.row2').addClass('d-none')
  $('#footer1').removeClass('d-none')
  $('.row2').empty();
}
