if(!('token' in localStorage) ){
    window.location.replace('login.php')
}

function myFunction() {
    

    if (confirm("Are sure to Log out") == true) {
      window.location.replace("login.php")
    } 
  }

  var formdata = {
    
    
}


  $.ajax({
    type:"POST",
    url:"api/adminapi.php",
    data:formdata,
    datatype:"JSON",
    success:function(data){
        data=JSON.parse(data);
        if (data.status){



            
for(let i=0;i<data.output.length;i++){
    
    $('#itemdetails').append(`
<div class="col-4 sm-12" style="padding-top:10%;">
<div class="image"><img src="${data.output[i].imagelink}" style="width:250px;height:250px;"></div>
<div>Product Name :${data.output[i].productname}</div>
<div>Category :${data.output[i].category}</div>
<div>Brand :${data.output[i].brand}</div>
<div>Rating :${data.output[i].rating}</div>
<div>Price : INR ${data.output[i].productprice}</div>
<div>Offer Price : INR ${data.output[i].offerprice}</div>
<div class="description">Description :${data.output[i].productdescription}</div>
<div>
`)
}



        }
    }

})


$('#logout').click(function(){
    localStorage.clear()
    window.location.replace('login.php')
  })