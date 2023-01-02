<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pixel Bank</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- <link href="Registration/style.css" rel="stylesheet"> -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>

body{
    margin: 0;
background-color: #e2e2e2;  
}

.sidenav{
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #1b364d;
    overflow-x:hidden;
    transition: 0.5x; 
}

.sidenav ul li a{
    display: block;
    color: white;
    padding: 10px;
    text-decoration: none;
   
}
.sidenav ul li {
    list-style-type: none;
}

.sidenav ul{
    padding: 5px;
}

.sidenav ul li:hover{
    background-color: gray;
    border-left: 5px solid orangered;

}

.sidenav .closebtn{
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

#main{
    transition: margin-left .5s;
    width:auto;
    /* background:white; */
    margin: 20px 5px 20px 20px;
    border-radius: 10px;

}
.menu{
    padding:10px;
    color: white;
}
.login{

padding-top: 10px;
 color: white;
 font-size: small;
}
.user{
    padding-top: 10px;
}
#header{
    background: white;
}
    </style>

</head>
<body>
    <div id="mySidenav" class="sidenav">
        <ul>
            <li><a href="userDashBoard.html">Dash board</a></li>
            <li><a href="addBeneficiary.php">Add Beneficiary</a></li>
            <li><a href="transfer.php">Transfer</a></li>
            <li><a href="savings.php">Saving</a></li>
            <li><a href="transactionHistory.php">Transaction History</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="#">Insurance</a></li>
            <li><a href="#">Cards</a></li>
            <li><a href="#" id="logout">LOGOUT</a></li>
        </ul>
    </div>

    <header>
        <div class="container-fluid" id="header">
            <div class="row">

                <div class="my-auto col-xs-1 col-sm-1 text-dark menu">
                    <span style="font-size:30px;  cursor:pointer" onclick="openNav()">&#9776;</span>      
                </div>

                <div class="col-xs-1 col-sm-1">
                    <img src="pix_logo.jfif" width="30">
               </div>

               <div class="col-xs-3 col-sm-3" id="pix"> 
                   <h2>PIXEL BANK</h2>
               </div>

               <div class="col-xs-3 col-sm-3">

               </div>

               <div class="col-sm-2">
                IFSC Code is PXBK123456
               </div>

               <div class="col-xs-2 col-sm-2  justify-content-end user">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg>
                        User
                        </button>

                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"  color="#5EA662" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                          </svg> Profile</a></li>

                        <li><a class="dropdown-item" href="#" id="logout"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" color="#5EA662" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                        </svg> Logout</a></li>

                        </ul>
                    </div>
               </div>
            </div>
        </div>
    </header>

    
    <main id='main'>