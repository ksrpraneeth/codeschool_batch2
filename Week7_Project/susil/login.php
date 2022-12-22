<?php
// session_start();
// if(isset($_SESSION['userdetails'])){
//     header("Location:product.php");
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <title>shopping App</title>
    <style>
        body {
            background-image: url("img/loginbackground.png");
        }
    </style>
</head>

<body>
    <div class="container" style="margin-top:150px;"><br>
        <div class="row">
            <label class="col-sm-2" for="emailInput" style="color: white;"> Email</label>
            <input class="col-sm form-control" type="email" id="emailInput" placeholder="Enter email" />
        </div><br>
        <div class="row">
            <label class="col-sm-2" for="passwordInput" style="color: white;"> Password</label>
            <input class="col-sm form-control" type="password" id="passwordInput" placeholder="Enter Password" />
        </div><br>

        <div class="row">
            <p id="error" class="text-danger"></p>
        </div>
        <div class="row justify-content-end">
            <button style="display:inline-block;" type="button" class="btn btn-primary col-sm-2"
                id="submitButton">LOGIN</button>
        </div>
    </div>
    <script>
        // if(!'roleid' in localstorage){
        //     window.location.replace(login.php)
        // }
if("roleid" in localStorage)  {
    if(localStorage.getItem("roleid")==1){
    window.location.replace("product.php")
    }
    if(localStorage.getItem("roleid")==2){
        window.location.replace("adminpage.html")
    }
}





        $('#submitButton').click(function () {
            var formData = {
                email: $('#emailInput').val(),
                password: $('#passwordInput').val()
                
            } 
            $.ajax({
                type: "POST",
                url: "loginApi.php",
                data:formData,
                success: function (response) {
                    response = JSON.parse(response);
                
                    if (response.status == true) {
                         localStorage.setItem("user_data", JSON.stringify(response.data[0]))
                         localStorage.setItem("roleid", JSON.stringify(response.data[0].roleid))
                         
                         if(response.data[0].roleid==1){
                            window.alert(response.message);
                            window.location.assign('product.php');
                         }
                         if(response.data[0].roleid==2){
                            window.alert('Login Successful');
                            window.location.replace('adminpage.html')
                         }
                         
                     
                       
                    
                       // localStorage.setItem("user_data", JSON.stringify(response.data[0]))
                    } else {
                        $('#error').text(response.message);
                    }
                },
                error: function () {

                }
            })
        });
    </script>
</body>

</html>