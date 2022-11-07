$(document).ready(function () {
    $('#').click(function () {
        $.ajax({
            url: 'https://dummyjson.com/products/category/smartphones',
            dataType: 'json',
            success: function (data) {
               console.log(data)
            },
            error: function(){

            }
        });
    });
});
