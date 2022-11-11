

var cartItems = localStorage.getItem('cart_items')

cartItems = JSON.parse(cartItems);

console.log(cartItems);
for(let i=0;i<cartItems.length;i++){
$('#output').append(`
<div class="display">
     <img src="${cartItems[i].Image}"style="width:100%;">
      <div>${cartItems[i].price}</div>
      <div>${cartItems[i].name}</div>
      </div>
      `);
}

function order(){

   
        
    alert("Order placed Successfully!");
    localStorage.removeItem('cart_items');
    window.location.href="indextask.html";
}










