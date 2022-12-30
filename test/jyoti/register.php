<?php

?>


<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<style>
    .main{
        background-image:linear-gradient(rgb(24, 7, 57),rgb(28, 16, 57),rgb(11, 5, 26));
    }
</style>

</head>
<body>
    <div class="container-fluid main">
        <div class="row">
            <div class="container"  style="margin-top:10%;padding-left: 16%;padding-right: 6%;margin-bottom:39px;color: aliceblue; font-family: 'Asar'">
                <div class="row">
                    <div style="font-size: 36px;">Register</div>
                </div>
                <div class="row mt-5">
                    <div class="col-6">User Name</div>
                    <div class="col-6"><input id="userName" placeholder="Enter User Name" value=""></div>
                    <div class="text-danger" id="nameError"></div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">Enter Email</div>
                    <div class="col-6"><input id="mail" placeholder="Enter Email"></div>
                    <div class="text-danger" id="mailError"></div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">Enter Password</div>
                    <div class="col-6"><input id="password" type="password" placeholder="Enter Password"></div>
                    <div class="text-danger" id="passwordError"></div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">D.O.B.</div>
                    <div class="col-6"><input id="dob" type="date" placeholder="Enter DOB"></div>
                    <div class="text-danger" id="dobError"></div>
                </div>
                <div class="row justify-content-center mt-5">
                    <div class="col-3"><button class="btn btn-primary" id="signup">Sign Up</button></div>
                    
                </div>
                <div class="row justify-content-center mt-5">
                    <div class="col">Already Have an Account <a href="login.php">Sign In</a></div>
                    
                </div>
            </div>
        </div>
    </div>
</body>
<script src="register.js"></script>
</html>