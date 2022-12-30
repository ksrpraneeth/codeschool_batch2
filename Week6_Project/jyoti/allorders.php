<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
</head>

<body>
    <div class="container-fluid">
        <div class="row col-12" style="padding-top:2%;background-color: rgb(106, 186, 35);position:fixed;">
            <div class="col-3" style="font-family: 'Sofia', sans-serif;color:black;font-size:20px;">In My Cart</div>
            <div class="col-2" style="color: white;" id="name"><b>Welcome Admin</b></div>
            <div class="col-4">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" aria-label="SEARCH"
                        aria-describedby="button-addon2" id="SEARCH" value="">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2"><svg
                            xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="" class="bi bi-search"
                            viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg></button>
                </div>
            </div>
            
            
            <div class="col-3 justify-content-right"><a class="btn btn-primary" id="logOut">Log Out</a>
                <div id="date" style=" font-size: 10px; color: white; font-weight:bold;"></div>
                <div id="time" style=" font-size: 10px; color: white; font-weight:bold;"></div>
            </div>
        </div>
        
    </div>

    <!--Order Details-->
    <div class="container-fluid" style="padding-top: 16%;">
        <div class="row" id="allorders">

        </div>
    </div>
    <footer class="text-center text-lg-start bg-white text-muted">
        <!-- Section: Social media -->
       
        <!-- Section: Social media -->
      
        <!-- Section: Links  -->
        <section class="">
          <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
              <!-- Grid column -->
              <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                <!-- Content -->
                <h6 class="text-uppercase fw-bold mb-4">
                  <i class="fas fa-gem me-3 text-secondary"></i>IN MY CART
                </h6>
                <p>
                  Here you can order whatever you need in your day to day life.
                </p>
              </div>
              <!-- Grid column -->
      
              <!-- Grid column -->
              <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4">
                  Category
                </h6>
                <p>
                  <a href="#!" class="text-reset">Electronic</a>
                </p>
                <p>
                  <a href="#!" class="text-reset">Assesories</a>
                </p>
                <p>
                  <a href="#!" class="text-reset">Grocery</a>
                </p>
                <p>
                  <a href="#!" class="text-reset">Tickets</a>
                </p>
              </div>
              <!-- Grid column -->
      
              <!-- Grid column -->
        
              <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                <p><i class="fas fa-home me-3 text-secondary"></i>HYDERABAD , INDIA</p>
                <p>
                  <i class="fas fa-envelope me-3 text-secondary"></i>
                  inmycart@gmail.com
                </p>
                <p><i class="fas fa-phone me-3 text-secondary"></i> + 91 234 567 76</p>
                <p><i class="fas fa-print me-3 text-secondary"></i> + 91 234 567 77</p>
              </div>
              <!-- Grid column -->
            </div>
            <!-- Grid row -->
          </div>
        </section>
        <!-- Section: Links  -->
      
        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
          © 2022 Copyright:
          <a class="text-reset fw-bold" href="https://mdbootstrap.com/">inmycart.com</a>
        </div>
        <!-- Copyright -->
      </footer>
</body>
<script>
   if(!('token' in localStorage) ){
    window.location.replace('login.php')
}

var token={usertoken:localStorage.getItem('token')}
$('#allorders').empty();
$.ajax({
    type:"POST",
    url:"api/allordersapi.php",
    data:token,
    datatype:"JSON",
    success:function(data){
        data=JSON.parse(data);
        if(data.status){


   $('#allorders').append(`<div col-2><button type="button" class="btn btn-danger" onclick="back()">back</button></div>`)



   for (var i in data.output){
        
    $('#allorders').append(`<div class="text-center" style="border 1px solid black">ORDER ID:${data.output[i][0]['orderid']}</div> <div>STATUS: 
    <button type="button" class="btn btn-danger" onclick="cancelOrder(${data.output[i][0]['orderid']})">Reject</button>
     <button type="button" class="btn btn-success" onclick="approveOrder(${data.output[i][0]['orderid']})">Approve</ button>
     </div> `);
        

        
         $('#allorders').append(`
         <table class="table">
 <thead>
   <tr>
     <th scope="col">IMAGE</th>
     <th scope="col">NAME</th>
     <th scope="col">BRAND</th>
     <th scope="col">QUANTITY</th>
     <th scope="col">PRICE</th>
     <th scope="col">User Id</th>
     <th scope="col">ADDRESS</th>
     
   </tr>
 </thead>
 
 <tbody ID="${data.output[i][0]['orderid']}"  >

 </tbody>
 </table>
         `)


         for (let j=0;j<data.output[i].length;j++){
          $('#'+ data.output[i][0]['orderid']).append(`<tr><td><img src="${data.output[i][j]['imagelink']}" style="max-width:50%;"></td>
          <td>${data.output[i][j]['productname']}</td>
          <td>${data.output[i][j]['brand']}</td>
          <td>${data.output[i][j]['quantity']}</td>
          <td>${data.output[i][j]['quantity'] * data.output[i][j]['offerprice']}</td>
          <td>${data.output[i][j]['user_id']}</td>
          <td>${data.output[i][j]['village']},${data.output[i][j]['stateorut']},${data.output[i][j]['pin']}</td>
          
          </tr>`)
         }

       }
      }
    }
  }
)

// function getButtonsData(status = 0) {
//     var data = 'test';
//     if (status == 0 || status == null) {
//         data = `<button type="button" class="btn btn-info " style="margin-top:5px;" id="rejected" value="">Reject</button>
//         <button type="button" class="btn btn-info " style="margin-top:5px;" id="placed" value="Order Placed">Aprove</button>`;
//     } else if (status == 1) {
//         data = `<button type="button" class="btn btn-info " style="margin-top:5px;" id="rejected" value="">Update to Shipping</button>
//         <button type="button" class="btn btn-info " style="margin-top:5px;" id="rejected" value="">Order Delivered</button>`;
//     }

//     return data;
// }







//Back 
    function back(){
  window.location.replace("admin.php");
}

  

//Log Out
    $('#logOut').click(function(){
    localStorage.clear()
    window.location.replace('login.php')
  })



//Order Reject

function cancelOrder(orderid){
  var formdata={orderId:orderid,
  status:false}
  $.ajax({
  type:"POST",
  url:"api/orderdeleteapi.php",
  data:formdata,
  datatype:"JSON",
  success:function(data){
    
    data=JSON.parse(data)
    if(data.status){
      window.alert(data.message)
      window.location.reload()
    }
    else{
      window.alert(data.message)
    }
  },error:function(data){

  }
 })
 
}




////Order Approve


function aproveOrder(orderid){
  var formdata={orderId:orderid,
  status:true}
 $.ajax({
  type:"POST",
  url:"api/orderapproveapi.php",
  data:formdata,
  datatype:"JSON",
  success:function(data){
    data=JSON.parse(data)
    if(data.status){
      window.alert(data.message)
      window.location.reload()
    }
    else{
      window.alert(data.message)
    }

  },error:function(data){

  }
 })


}
</script>
</html>