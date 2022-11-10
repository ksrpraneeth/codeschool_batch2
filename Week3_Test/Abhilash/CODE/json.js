


$(document).ready(function () {

        $.ajax({
            url: 'https://dummyjson.com/products/category/smartphones',
            dataType: 'json',
            success: function(data) {
        console.log('')
                for (let index = 0; index < data.products.length; index++) {
                    $('#title').text(data.products[index].title+'('+data.products[index].description+')') 
                    $('#description').text(data.products[index].description)
                    $('#price').text(data.products[index].price)
                }

                
            },
            error: function(){

            }
        });
    });