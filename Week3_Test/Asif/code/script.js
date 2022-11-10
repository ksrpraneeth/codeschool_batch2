// $(document).ready(function() {
//     var apiData = function () {
//         var tmp = null;
//         $.ajax({
//             'async': false,
//             'type': "GET",
//             'contentType': "application/json",
//             'dataType': 'json',
//             'url': "https://dummyjson.com/products/category/smartphones",
//             'success': function (data) {
//                 tmp = data.products[0];
//             }
//         });
//         return tmp;
//     }();


//     $('#product-name').text(apiData.title);
//     $('#product-rating').text(apiData.rating);
//     $('#product-images').append(`<img src="${apiData.images[4]}">`);


// });
