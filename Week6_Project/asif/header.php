<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- CSS File -->
    <link rel="stylesheet" href="css/style.css">
    <!-- JQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- JS File -->
    <script src="js/script.js"></script>
    <script type="text/javascript">
        if (!localStorage.getItem('user_data')) {
            window.location.replace("login.html");
        }
    </script>
    <link rel="shortcut icon" href="https://d20exy1ygbh3sg.cloudfront.net/fms/images/favicon.ico" type="image/x-icon">
    <title>Organization Database</title>
</head>
<body>
<div id="sidebar">
        <div id="brand-logo-div" class="mx-auto my-2 pb-2"><a href="#"><img src="assets/images/ifmis-logo.png " alt="ifmis-logo"></a></div>
        
        <ul class="sidebar-nav-list">
            <li class="sb-nav-list-item"><a href="index.php">Home</a></li>
            <li class="sb-nav-list-item"><a href="employeesData.php">Employee Details</a></li>
            <li class="sb-nav-list-item"><a href="employeesSalaries.php">Salary Details</a></li>
        </ul>
    <!-- end of sidebar -->
</div>
<header class="container-fluid g-0">
    <nav class="navbar navbar-expand navbar-dark bg-dark px-2 row-fluid" id="header">
        <div id="side-nav-button" class="col-1 w-auto mx-3 my-auto p-2 text-light rounded-1">
            <i class="fa fa-solid fa-bars"></i>
        </div>

        <ul class="navbar-nav col-auto ms-auto">

            <li class="nav-item mx-2 my-auto col-1 w-auto text-end" id="login-time">
                <a class="nav-link text-light" href="#">Last Login: <br> <span id="current-date"></span> <br> <span id="current-time"></span></a>
            </li>

            <li class="nav-item navbar-collapse mx-2 my-auto header-li rounded-1 col-2 w-auto">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown" id="user-dropdown">
                        <a class="nav-link text-light dropdown-toggle" role="button" data-bs-toggle="dropdown" href="#"><i class="fa-solid fa-user"></i><span class="d-none d-sm-none d-md-inline ms-2" id="username">Welcome to </span></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start bg-light">
                            <li><a href="#" class="dropdown-item text-dark"><i class="text-danger fa-solid fa-user me-2"></i>Profile</a></li>
                            <li><a href="#" class="dropdown-item text-dark"><i class="text-danger fa-solid fa-key me-2"></i>Change Password</a></li>
                            <li onclick="logout()"><a href="#" class="dropdown-item text-dark"><i class="text-danger fa-solid fa-right-from-bracket me-2"></i>Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li class="nav-item mx-2 my-auto col-1 w-auto header-li rounded-1" onclick="logout()">
                <a class="nav-link text-light" href="#"><i class="fa-solid fa-right-from-bracket"></i><span id="logout" class="d-none d-sm-none d-md-inline ms-2">Logout</span></a>
            </li>
        </ul>
    </nav>
</header>
<main class="rounded-3">