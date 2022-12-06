<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 2px solid #dddddd;
            text-align: left;
            padding: 16px;
        }
        th{
            background-color: rgb(108, 173, 38);
        }
        tr:nth-child(odd){
            background-color: rgb(195, 242, 145);
        }
        tr:nth-child(even) {
            background-color:rgb(162, 217, 104);
        }
    </style>
</head>

<body>
    <div class="container-fluid">
    <div class="row col-12" style="padding-top:2%;background-color: rgb(170, 216, 140);position:fixed;">
    <div class="col-1" style="font-family: 'Sofia', sans-serif;color:black;font-size:20px;">In My Cart</div>
            <div class="col-3" style="color: white;" id="userName" value="">Welcome<p>Have a Good Day 😎</p></div>
            <div class="col-5">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" aria-label="SEARCH" aria-describedby="button-addon2" id="SEARCH" value="">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg></button>
                </div>
            </div>
           
            
        </div>
        <div class="row col-12" style="padding-top:20%;" id="area" style="background-color: rgb(170, 216, 140);">
            <h2 class="pt-4 mb-2">My Orders</h2>

            <table>
                <tr>
                    <th>ORDER ID</th>
                    <th>PRODUCT</th>
                    <th>NAME</th>
                    <th>BRAND</th>
                    <th>QUANTITY</th>
                    <th>ADDRESS</th>
                    <th>PRICE</th>
                </tr>
                <tbody id="orders">
                    
                </tbody>

            </table>
            <!-- <div style="font-weight:bold; font-size:20px;">Total Price : INR <span id="totalprice"></span></div> -->
        </div>
        <div class="row col-12">
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
        </div>
    </div>
</body>

<script>



var token={usertoken:localStorage.getItem('token')}
$('#orders').empty();
//$('#totalprice').text('');

  $.ajax({
    type:"POST",
    url:"api/myordersapi.php",
    data:token,
    datatype:"JSON",
    success:function(data){
        data=JSON.parse(data);
        if (data.status){

            let totalprice=0;
for(let i=0;i<data.output.length;i++){
    
    $('#orders').append(`
<tr>                     <td>${data.output[i].orderid}</td>
                        <td><img src="${data.output[i].imagelink}" style="max-width:20%;max-height:20%;"></td>
                        <td>${data.output[i].productname}</td>
                        
                        <td>${data.output[i].brand}</td>
                        <td>${data.output[i].quantity }</td>
                        <td >${data.output[i].stateorut},${data.output[i].village},${data.output[i].pin}</td>
                        <td>${data.output[i].offerprice *data.output[i].quantity}</td>
                        
                    </tr>


`)
//totalprice=totalprice+Number(data.output[i].offerprice)

}
//$('#totalprice').text(totalprice);
$('#area').append(`<a href="product.php"><button type="button" class="btn btn-danger col-3 mb-2  mt-2" id="backButton" >Back</button></a>`)



        }
    }

})



</script>
</html>