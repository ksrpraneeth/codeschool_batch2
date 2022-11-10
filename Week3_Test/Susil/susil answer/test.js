$(document).ready(function () {
    
    $.ajax({
        url: 'https://dummyjson.com/products/category/smartphones',
        dataType: 'json',
        success: function (data) {
            let index=Math.floor(Math.random() * data.products.length);
            
               let image=data.products[index].thumbnail;
               $('#mobile').attr('src',image)
               //phone name
               $('#phone_name').text(data.products[index].brand)
               $('#price').text(data.products[index].price)
               
            
        },
        error: function(){

        }
    });
});