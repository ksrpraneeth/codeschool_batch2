 <?php
session_start();
if(!isset($_SESSION['userdetails'])){
    header("location:login.php");
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
            height: 60%;
            width: 90%;
        }

        p {
            font-weight: bold;
            margin-left: 30%;
        }

        #product {
            margin-left: 120px;
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
            <div class=" offset-md-3 col-md-1" style="margin-top:50px">HOME</div>
            <div class="col-md-1" style="margin-top:50px">SHOP</div>
            <div class="col-md-1" style="margin-top:50px">CATEGORY</div>
            <div class="col-md-1" style="margin-top:50px">ABOUT</div>
            <div class="col-md-1" style="margin-top:50px">CONTACT</div>
            <div class="col-md-1" style="margin-top:50px"><a href="logout.php">LOGOUT</a></div>
            <div class="col-md-1 cart1" id="cart" style="margin-top:50px">
                <a href="cart.php">
                    <ion-icon name="basket"></ion-icon>CART
                </a><span id="count"></span>

            </div>
            <main>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="text-align:center ;">
                    <h3>OUR PRODUCTS</h3>
                </div>
                <div class="col-mds-12" style="text-align:center ;">
                    <h4>Directly From Our Pixelvide Platform</h4>
                </div>

                <div class="row" id="products">

                </div>


            </div>
        </div>
    </div>

    <!-- </a> -->
    <script>
        $.ajax({
            type: 'post',
            url: 'productApi.php',
            datatype: 'JSON',
            success: function (response) {
                response = JSON.parse(response);

                console.log(response)
                if (response.status == true) {
                    for (let i = 0; i < response.output.length; i++) {
                        $('#products').append(`
                                 <div class="col-md-4">
                                    <a href="productdetails.php?id=${response.output[i].productid}"><img src="${response.output[i].productimg}"></a>
                                    <p>"${response.output[i].productname}"</p>
                                    <p>"${response.output[i].price}"</p>
                                </div>
                             
                                `);
                    }
                }

            }




        })

    </script>
</body>

</html>