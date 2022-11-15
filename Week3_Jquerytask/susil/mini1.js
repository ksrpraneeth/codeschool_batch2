var cartItems = localStorage.getItem('cart_items')

cartItems = JSON.parse(cartItems);

console.log(cartItems);
for(let i=0;i<cartItems.length;i++){
$('#output').append(`
<div>
     <img src="${cartItems[i].image}" style="margin-left:70px;">
      <div style="text-align: center">${cartItems[i].price}</div>
      <div  style=" text-align: center;">${cartItems[i].name}</div>
      </div>
      `);
}
function show(){
        alert('order placed suceesfully')
}