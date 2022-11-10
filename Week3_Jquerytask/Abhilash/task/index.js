



    

    let  products=[
        
        {   
            name:"maroon shirt",
            price: 1000,
            Image:'shirt1.jpg'
        },

        {
            name:" ashshirt",
            price: 1000,
            Image:'ash.jpeg'
        },
        
        {
            name:"white hoodie",
            price: 1010,
            Image:'hoodie2.jpeg'
        },

        {
            name:"ash hoodie",
            price: 1010,
            Image:'hoodie3.jpg'
        },
    ];
    


let cartArray = [];
$('#item1').click(function(){
    cartArray.push(products[0]);
    $('#cartvalue').text(cartArray.length)
    console.log(cartArray);
})

$('#item2').click(function(){
    cartArray.push(products[1]);
    $('#cartvalue').text(cartArray.length)
    console.log(cartArray);
})

$('#item3').click(function(){
    cartArray.push(products[2]);
    $('#cartvalue').text(cartArray.length)
    console.log(cartArray);
})

$('#item').click(function(){
    cartArray.push(products[3]);
    $('#cartvalue').text(cartArray.length)
    console.log(cartArray);
})

$('#cart1').click(function(){

const temp = JSON.stringify(cartArray);
localStorage.setItem('cart_items',temp);

for(let i=0;i<cartArray.length;i++){
 $('#output').append(`
 <img src="${cartArray[i].Image}"
 <div>${cartArray[i].price}</div>
 <div>${cartArray[i].name}</div>
 `);

}
});







































// let count=0
// $('.multiple').click(function(){
//     count+=1;
//     $('#cartvalue ').text(count)
  
// });




// function cart() {

//     cartArray = []
//     itemsIncart()

    
// }
// var cart = ""

// function itemsIncart(){

// let  maroon = document.getElementById('Item1')

// if(maroon)
// }