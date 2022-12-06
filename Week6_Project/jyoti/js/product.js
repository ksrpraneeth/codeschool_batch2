

if(!('token' in localStorage) ){
    window.location.replace('login.php')
}

if(localStorage.getItem('role_id')==2){
  window.location.replace('admin.php')
}
  
  var formdata = {
    phonenumber: $("#mobileNumber").val(),
    password: $("#password").val(),
  };
  console.log(formdata);
  
  $.ajax({
    type: "POST",
    url: "api/productsapi.php",
    data: formdata,
    datatype: "JSON",
    success: function (data) {
      data = JSON.parse(data);
      if (data.status) {
        for (let i = 0; i < data.output.length; i++) {
          $("#itemdetails").append(`
  <div class="col-lg-4 sm-12" style="padding-top:10%;" onclick="getitem(${data.output[i].id})">
  <div class="image"><img src="${data.output[i].imagelink}" style="width:250px;height:250px;"></div>
  <div>Product Name :${data.output[i].productname}</div>
  <div>Brand :${data.output[i].brand}</div>
  <div>Rating :${data.output[i].rating}</div>
  <div>Price : INR ${data.output[i].productprice}</div>
  <div>Offer Price : INR ${data.output[i].offerprice}</div>
  
  </div>
  `);
        }
  
        
      }
    },
  });
  
  
  
  
  
   
  
  
  
  //Time
  
  const d=new Date();
  const day=d.getDate();
  const month=d.getMonth();
  const year=d.getFullYear();
  const m=['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
  const date=day+'-'+m[month]+'-'+year;
  document.getElementById('date').innerHTML=date;
  let hour=d.getHours();
  let min=d.getMinutes();
  let sec=d.getSeconds();
  if(hour>12){
      h2=hour-12;
      let time=h2+':'+min+':'+sec+' '+'PM'
      document.getElementById('time').innerHTML=time;
  }
  else{
      let time=hour+':'+min+':'+sec+' '+'AM';
      document.getElementById('time').innerHTML=time;
  }

  
  function getitem(id){
   localStorage.setItem('productid',id.toString())
   window.location.replace("productdetails.php");
  }
  

  $('#logout').click(function(){
    localStorage.clear()
    window.location.replace('login.php')
  })
  
  
  
// Add to cart


  $('#cart').click(function(){
    var formdata={userid:localStorage.getItem('token')}
    $.ajax({
      type:"POST",
      url:"api/cartapi.php",
      datatype:"JSON",
      data:formdata,
      success:function(data){
       data=JSON.parse(data)
       if(data.status){
        let totalprice=0;
        for(let i=0;i<data.output.length;i++){
          $('#myCart').append(`
          <img src="${data.output[i].imagelink}"></div>
          <div>Name: ${data.output[i].productname}</div>
          <div>Effective Price: INR ${data.output[i].offerprice}</div>
          <div class="row justify-content-end"><button onclick="deleteitem(${data.output[i].orderid})"type="button" class="btn btn-danger col-3 mb-2  ">Remove</button></div>
          <hr>
          
          `)
          
          totalprice=totalprice+Number(data.output[i].offerprice);
        }
        $('#totalprice').text(totalprice);
       }
      },
      error:function(){

      }
      
    })
  })

// Remove item from cart

  function deleteitem(orderid){
    var formdata={
      orderId:orderid
    }

    $.ajax({
      type:"POST",
      url:"api/deletecartapi.php",
      datatype:"JSON",
      data:formdata,
      success:function(data){
       data=JSON.parse(data)
       if(data.status){
        window.alert(data.output)
        window.location.replace("product.php")
       }
       else{
        window.alert(data.output)
       }
      },
      error:function(){

      }
    })
  }



//Place Order



  $('#placeOrder').click(function(){
    var formdata={userid:localStorage.getItem('token')}
$.ajax({
  type:"POST",
  url:"api/placeorderapi.php",
  datatype:"JSON",
  data:formdata,
  success:function(data){
    data=JSON.parse(data)
    if (data.status){
      window.alert("Order Placed Successfully 😃.")
      window.location.reload()
    }
    else{
      window.alert(data.message)
      window.location.reload()
     }
  },
  error:function(){

  }
})

  })