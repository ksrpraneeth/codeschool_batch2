

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">


</head>

<body>
    <div class="container-xxl" style="background-image: url('image/shopping-4538982_1280.jpg');">
        <div class="row justify-content-center" style=" padding-top:4%;">
            <div col-3>
                <image style="max-width: 10%; "></image><span style="text-align:center;font-size:46px;   font-family: 'Sofia', sans-serif;color:black">IN MY CART</span>
            </div>
        </div>
        <div class="row justify-content-center" style="padding-bottom: 11%;">
            <div class="row mt-2" style="padding-top:2%;">
                <div class="col-2  name">Mobile Number<span class="text-danger">*</span></div>
                <div class="col-10"><input class="form-control" placeholder="Mobile Number" id="mobileNumber" value=""></div>
            </div>
            <div class="row mt-4">
                <div class="col-2 name">Password<span class="text-danger">*</span></div>
                <div class="col-10"><input class="form-control" type="Password" placeholder="Enter Password" id="password" value=""></div>
            </div>
            <div class="row text-danger" id="error"></div>
            <div class="row justify-content-center" style=" padding-top:2%;padding-bottom: 6%;">
                <button type="button" class=" col-3 btn btn-primary" id="login">Log In</button>

            </div>
        </div>
    </div>
</body>
<script src="js/login.js"></script>

</html>
