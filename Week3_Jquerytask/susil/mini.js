const itemDetails = [{ name: "Laptop", price: 5551, image: 'hp_laptop.jpg' }, { name: 'Mobile', price: '77999', image: 'poco.png' }]
 var shopingCart = []
$('#button1').click(function () {
    shopingCart.push(itemDetails[0]);
    $('#count').text(shopingCart.length)
    console.log(shopingCart)
})
$('#button2').click(function () {
    shopingCart.push(itemDetails[1]);
    $('#count').text(shopingCart.length)
    console.log(shopingCart)
})
// let len=shopingCart.length
// $('#cart').click(function () {
   
//    if(shopingCart.length!=0){
//     $('#cartdetails').removeClass('d-none');
    
//     $('#itemcontainer').addClass('d-none')

    
//     for (let i = 0; i < shopingCart.length; i++) {
//         $('#cartdetails').append(`
//     <div class="col-md-4"  style="text-align: center">
//         <img src="${shopingCart[i].image}" style="width:400px;">
//         <div style="font-size:20px;">${shopingCart[i].name}</div>

//         <div>$${shopingCart[i].price}</div>
//         <button type="button" class="btn btn-success" onclick="show()">Place Order</button>
// </div>
//    ` );
//     }
//     for(let j=0;j<len;j++){
//         shopingCart.pop()
//     }
    
//    }
   
// })
// $('#placeOrder').removeclass('d-none')
// $('#itemcontainer').addClass('d-none')
// $('#placeOrder').click(function () {
//     alert('order placed suceesfully')
// })
// function show(){
//     alert('order placed suceesfully')
// }
// $('#home').click(function () {
//     $('#cartdetails').addClass('d-none');
//     $('#itemcontainer').removeClass('d-none')
   
    
// })
$('#cart').click(function(){

    const temp = JSON.stringify(shopingCart);
    localStorage.setItem('cart_items',temp);
    
    for(let i=0;i<shopingCart.length;i++){
    $('#output').append(`
    <img src="${shopingCart[i].image}"margin-left:70px;">
    <div style=" text-align: center;">${shopingCart[i].price}</div>
    <div  style=" text-align: center;">${shopingCart[i].name}</div>
    `);
    
    }
    });


