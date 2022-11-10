console.log('heeloo')
$(document).ready(function () {
    
        $.ajax({
            url: 'https://dummyjson.com/products/category/smartphones',
            dataType: 'json',
            success: function (data) {
                let index=Math.floor(Math.random() * data.products.length);
                
                   let image=data.products[index].thumbnail;
                   $('#phoneImage').attr('src',image)
                   //phone name
                   $('#phoneName').text(data.products[index].brand)
                   $('#phoneid').text(data.products[index].id)
                   $('#price').text(data.products[index].price)
                   
                
            },
            error: function(){

            }
        });
    });
