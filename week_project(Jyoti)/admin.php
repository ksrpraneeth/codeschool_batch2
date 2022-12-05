
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body style="background-image: url('shopping-cart-304843_1280.webp');">
    <div class="container-xxl">
        <div class="row col-12" style="padding-top:2%;background-color: rgb(106, 186, 35);position:fixed;">
            <div class="col-2" style="color: white;" id="name"><b>Welcome Admin</b></div>
            <div class="col-4"> <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search" aria-label="SEARCH"
                    aria-describedby="button-addon2" id="SEARCH" value="">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2"
                    ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        fill="" class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg></button>
            </div></div>
            <div class="col-2"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add Product &nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-add" viewBox="0 0 16 16">
  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Z"/>
  <path d="M12.096 6.223A4.92 4.92 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.493 4.493 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.525 4.525 0 0 1-.813-.927C8.5 14.992 8.252 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.552 4.552 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10c.262 0 .52-.008.774-.024a4.525 4.525 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777ZM3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4Z"/>
</svg></button></div>

<div class="col-2 justify-content-right"><a class="btn btn-primary" id="logout" >Log Out</a>
<div id="date" style=" font-size: 10px; color: white; font-weight:bold;"></div>
                <div id="time" style=" font-size: 10px; color: white; font-weight:bold;"></div>
            </div>
        </div>
        <div class="row pt-3" id="itemdetails" style="background-color:rgb(147, 230, 73);font-size: 16px; font-weight:bold;"></div>
        <div class="row"></div>
        <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Enter Product Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- product name, category , brand , rating,product price , offer price, imagelink,description -->
       <div class="container">
        <div class="row ">
<div class=" col-6 productName mt-2">Enter Product Name : <input type="text" id="productname" placeholder="Product Name" value=""></div>
<div class=" col-6 category mt-2">Enter Product Category : <input type="text" id="category" placeholder="Product Category" value=""></div>
<div class=" col-6 brand mt-2">Enter Product Brand : <input type="text" id="brand" placeholder="Product Brand" value=""></div>
<div class="col-6 rating mt-2">Enter Product Rating : <input type="number" id="rating" placeholder="Product Rating" value=""></div>
<div class="col-6 productPrice mt-2">Enter Product Price : <input type="number" id="productPrice" placeholder="Product Price" value=""></div>
<div class="col-6 offerPrice mt-2">Enter Offer Price : <input type="number" id="offerPrice" placeholder="Product Price" value=""></div>
<div class="col-6 imageLink mt-2">Enter Image Link : <input type="text" id="imageLink" placeholder="Image LInk" value=""></div>
<div class="col-6 description mt-2 mb-3">Enter Product Description : <input type="text" id="description" placeholder="Product Description" value=""></div>
      </div>
       </div>
      <div class="modal-footer">
        <div id="Error" class="text-danger"></div>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" >Cancel</button>
        <button type="button" class="btn btn-primary" id="add">Add</button>
        
      </div>
    </div>
  </div>
</div>
    </div>
    
</body>
<script src="js/admin.js"></script>


<script>
   if(!('token' in localStorage) ){
    window.location.replace('login.php')
}
   $("#add").click(function () {
     $('#Error').text("")
   var formdata = {
     productName: $("#productname").val(),
     category: $("#category").val(),
     brand: $("#brand").val(),
     rating: $("#rating").val(),
     productPrice: $("#productPrice").val(),
     offerPrice: $("#offerPrice").val(),
     imageLink: $("#imageLink").val(),
     description: $("#description").val(),
   };

   $.ajax({
     type: "POST",
     url: "api/addproductapi.php",
     data: formdata,
     datatype: "JSON",
     success: function (data) {
       data=JSON.parse(data)
       if(data.status){

       }
       else{
 $('#Error').text(data.output)
 
       }
     },

     error: function () {},
   });
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

</script>
</html>