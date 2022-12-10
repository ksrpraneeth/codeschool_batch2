<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>productdetails</title>
</head>
<body>
    <div class="container" style="background-color: rgb(21, 128, 147);">
        <div class="row" style=></div>
        <div class="row" id="product" style="padding-bottom: 8%;background-color: white;"></div>
    </div>

</body>

<script>
//   if(!('token' in localStorage) ){
//     window.location.replace('login.php')
// }

 //if(localStorage.getItem('role_id')==2){
  //   window.location.reload();
//}
var formdat={productid:localStorage.getItem('productid')}
// console.log(localStorage.getItem('productid'))
// console.log('testing console')

$.ajax({
    type:"POST",
    url:"api/adminproductdetailsapi.php",
    data:formdat,
    datatype:"JSON",
    success:function(data){
        data=JSON.parse(data);
            if(data.status){
                $("#product").append(`
                <div class="container">
                <div class ="row col-1 mt-4  mb-3"><button onclick="back()"class ="btn btn-primary">Back</button ></div>
                
                <div class="row">
                <div class="col md-12 sm-12">
                
                <div class="image"><img src="${data.output[0].imagelink}" style="width:400px;height:400px;"></div>
              </div>
                <div class="col-6 sm-12 xs-12" style="padding-top:4%;">  
                <div>Product Name :${data.output[0].productname}</div>
                <div>Category :${data.output[0].category}</div>
                <div>Brand :${data.output[0].brand}</div>
                <div>Rating :${data.output[0].rating}</div>
                <div>Price : INR ${data.output[0].productprice}</div>
                <div>Offer Price : INR ${data.output[0].offerprice}</div>
                <div class="description">Description :${data.output[0].productdescription}</div>
            
                
                
                </div></div>
                </div>
                
                `);
            }
    },
    error:function(){

    }
})


//Back

function back(){
    
    window.location.replace('admin.php')

}
</script>

