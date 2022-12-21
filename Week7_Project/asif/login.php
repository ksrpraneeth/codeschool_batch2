<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://d20exy1ygbh3sg.cloudfront.net/fms/images/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Database - Login</title>
    <style>
        body {
            background-color: #e2e2e2;
        }
        .errorMsgs {
            color: red;
            font-size: 0.8em;
            margin: 0.5em;
        }
    </style>
</head>
<body>
    <main class="my-5">
        <h4 class="col-12 text-center mb-3">Account Login</h4>
        <div class="row">
            <div class="col-12 col-sm-3 col-md-4"></div>
            <div class="col-10 col-sm-6 col-md-4 m-auto bg-light p-3 rounded" id="form-div">
                <form>
                    <div class="mb-3 text-center"><p class="errorMsgs" id="error"></p></div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email">
                        <p class="errorMsgs" id="emailError"></p>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password">
                        <p class="errorMsgs" id="passwordError"></p>
                    </div>
                    <div class="mb-3 text-center">
                        <button type="button" onclick="login()" class="btn btn-primary" id="login-btn">Login</button>
                    </div>
                </form>
            </div>
            <div class="col-12 col-sm-3 col-md-4"></div>
        </div>
    </main>
    <script src="js/script.js"></script>
    <script type="text/javascript">
        if(localStorage.getItem('user_data')){
            window.location.replace("index.php");
        }
    </script>
</body>
</html>