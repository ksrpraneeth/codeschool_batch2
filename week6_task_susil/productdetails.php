<?php
session_start();
if(!isset($_SESSION['userdetails'])){
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <style>
        .header1 {
            color: white;
            background: rgb(62, 131, 62);
            font-size: 13px;
            padding: 5px;
        }

        .header2 {
            background: wheat;
            font-size: 13px;
            padding: 5px;
        }

        #logoimg {
            height: 100%;
        }

        img {
            max-width: 100%;

        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row header1">
            <div class="offset-md-1 col-md-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                    fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                    <path
                        d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                </svg>+65 8845 5454</div>
            <div class="col-md-5"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-envelope" viewBox="0 0 16 16">
                    <path
                        d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                </svg>
                ORDERS.818pixelvide@GMAIL.COM</div>
            <div class="col-md-3" style="text-align:center ;">FAST DELIVERY</div>
        </div>
        <div class="row header2">
            <div class=" col-md-2"><img src="shoplogo-removebg-preview.png" id="logoimg"></div>
            <div class=" offset-md-3 col-md-1" style="margin-top:50px"><a href="product.php">HOME</a></div>
            <div class="col-md-1" style="margin-top:50px">SHOP</div>
            <div class="col-md-1" style="margin-top:50px">CATEGORY</div>
            <div class="col-md-1" style="margin-top:50px">ABOUT</div>
            <div class="col-md-1" style="margin-top:50px">CONTACT</div>
            <div class="col-md-1" style="margin-top:50px" id="logout"><a href="logout.php">LOGOUT</a></div>
            <div class="col-md-1 cart1" id="cart" style="margin-top:50px">
                <a href="cart.php">
                    <ion-icon name="basket"></ion-icon>CART
                </a><span id="count"></span>

            </div>
        </div>
        <div class="container">
            <div class="row" id="productdetails">
                <!-- <div class="col-md-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div><img src="img/poco.png"></div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="offset-md-2 col-md-6"><button type="button" class="btn btn-primary">ADD TO
                                    CART</button></div>

                        </div>
                    </div>
                </div>
                <div class="col-md-8" style="margin-top:25px ;">
                    <div>Urban Terrain BOLT UT5000S27.5 Steel MTB-Disc Brakes,Free Installation & OneFitPlus App
                        Tracking 27.5 T Mountain Cycle (Single Speed, White)</div>
                    <div><span style="color:green;">4.1<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                <path
                                    d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                            </svg></span>(1,456)</div>
                    <div>PRICE:50000</div>
                    <h4>Avaialable offers</h4>
                    <diV>Special PriceGet extra ₹900 off (price inclusive of cashback/coupon)<span
                            class="text-primary">T&C</span></diV>
                    <div>Bank Offer5% Cashback on Flipkart Axis Bank Card <span class="text-primary">T&C</span></div>
                    <div>Partner OfferSign up for Flipkart Pay Later and get Flipkart Gift Card worth up to<span
                            class="text-primary">know more</span></div>
                    <div class="container" style="margin-top:50px; border: 1px solid wheat;">

                        <div class="row">
                            <div class="col-md-4">Details</div>
                        </div>
                        <div class="row" style="margin-top:20px ;">
                            <div class="col-md-4">
                                <p>Price</p>
                            </div>
                            <div class="col-md-3">10000</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">in stock</div>
                            <div class="col-md-3">YES</div>


                        </div>
                    </div> -->
                </div>
            </div>



        </div>
    </div>

    <script>

        var product;
        var cartArray=[]
    

        const urlSearchParams = new URLSearchParams(window.location.search);
        const params = Object.fromEntries(urlSearchParams.entries());
        const productId = params.id;
        $.ajax({
            type: 'get',
            url: `getProductDetailsApi.php?id=${productId}`,
            datatype: 'JSON',

            success: function (response) {
                response = JSON.parse(response);
                console.log(response);
                product = response.output[0];
                if (response.status == true) {

                        $('#productdetails').append(`
                        <div class="col-md-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div><img src="${product.productimg}"></div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="offset-md-2 col-md-6"><button type="button" class="btn btn-primary" onclick="addToCart()">ADD TO
                                    CART</button></div>

                        </div>
                    </div>
                </div>
                <div class="col-md-8" style="margin-top:25px ;">
                    <div>${product.description}</</div>
                    <div><span style="color:green;">4.1<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                <path
                                    d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                            </svg></span>(1,456)</div>
                            <div>PRICE:${product.price}</div>
                            <h4>Available offers</h4>
                            <diV>Special PriceGet extra ₹900 off (price inclusive of cashback/coupon)<span class="text-primary">T&C</span></diV>
                            <div>Bank Offer5% Cashback on Flipkart Axis Bank Card <span class="text-primary">T&C</span></div>
                            <div>Partner OfferSign up for Flipkart Pay Later and get Flipkart Gift Card worth up to<span class="text-primary">know more</span></div>
                            <div class="container" style="margin-top:50px; border: 1px solid wheat;">

                        <div class="row">
                            <div class="col-md-4">Details</div>
                        </div>
                        <div class="row" style="margin-top:20px ;">
                            <div class="col-md-4">
                                <p>Price</p>
                            </div>
                            <div class="col-md-3">${product.price}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">in stock</div>
                            <div class="col-md-3"><span class="text-primary">YES</span></div>


                        </div>
                    </div>
                </div>
                                 
                             
                                `);
                    
                }

            }

        })

        function addToCart(){
           var cartArray = localStorage.getItem('cart');
           if(!cartArray){
            cartArray = [];
           }else{
            cartArray = JSON.parse(cartArray);
           }
          //  console.log(product);
            // if(product ){
            //     quantity++;
            // }else{
            //     cartArray.push(product);
            // }
        //    localStorage.setItem('cart',cartArray);
        
            const findProduct = cartArray.find(x => x.productid == product.productid);
            if(findProduct){
                findProduct.quantity = findProduct.quantity + 1;
            }else{
                product.quantity = 1;
                cartArray.push(product);
            }
            $('#count').text(cartArray.length);

            localStorage.setItem('cart',JSON.stringify(cartArray));   
            alert('Added to Cart Successfully');
            $('#logout').click(function(){
        localStorage.clear();
    })

        }

    </script>
</body>

</html>