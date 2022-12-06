
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">


    <style>
    
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row col-12" style="padding-top:2%;background-color: rgb(170, 216, 140);position:fixed;">
        <div class="col-1" style="font-family: 'Sofia', sans-serif;color:black;font-size:20px;">In My Cart</div>
            <div class="col-2" style="color: white;" id="userName" value="">Welcome<p>Have a Good Day 😎</p></div>
            <div class="col-4">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" aria-label="SEARCH" aria-describedby="button-addon2" id="SEARCH" value="">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg></button>
                </div>
            </div>
            <div class="col-1"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="cart">Cart <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg></button></div>
                    <div class="col-2 justify-content-right"><a class="btn btn-primary" id="myOrders" href="myorders.php">Orders</a>
                
            </div>
            <div class="col-2 justify-content-right"><a class="btn btn-primary" id="logout" >Log Out</a>
                <div id="date" style=" font-size: 10px; color: white; font-weight:bold;"></div>
                <div id="time" style=" font-size: 10px; color: white; font-weight:bold;"></div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row pt-3" id="itemdetails" style="background-color:rgb(209, 243, 195);font-size: 16px; font-weight:bold; padding-bottom:4%;">

            </div>
            <div class="container-xxl"style="background-color:rgb(0, 0, 0)">

            <!-- Footer -->
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
<!-- Footer -->
        </div>
            
        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">My Cart <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="container">
                            <div class="row" id="myCart">

                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <div id="Error" class="text-danger"></div>
                            <div style="font-size: 20px; font-weight:bold;">Total price: INR <span id="totalprice"></span></div>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="placeOrder">Place Order</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>

     

<!-- Modal -->


        
    </div>

</body>
<script src="js/product.js"></script>

</html>