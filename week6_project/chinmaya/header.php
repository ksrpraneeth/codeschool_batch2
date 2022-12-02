<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="css/ifms.css" rel="stylesheet">
    <link rel="shortcut icon" href="image/fav.png">
    <title>IFMIS</title>
 <style>
    header{
      background-image: url(image/bg.jpeg);
  }

  .fr {
    background-image: url(image/bg.jpeg);

}
 </style>

</head>

<body>
    <header class="container-fluid f d-none d-lg-block">
        <div class="row fr ">
            <div class="col-md-3  logo"><img src="image/logo.png" style="max-width: 100%;"></div>
            <div class="col-md-3   bt  d-none" id="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                    fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
                <!--module-->
                
            </div>
            <!--after module section-->
            <div class="col-md-5 contaianer bt offset-1">
                <div class="row ">
                    <div class="col-md-2 d-none" id="timing">
                        <div>lastlogin</div>
                        <div style="font-weight: bold;" id="date"></div>
                        <div style="font-weight: bold;" id="time"></div>
                    </div>
                    <div class="col-md-5 contaianer d-none" id="userDetail"
                        style="margin-top: 2%; height:80%;background-color:#4d6274; border-radius: 3px;">
                        <div class="row">
                            <div class="col-md-2" style="padding-top: 3%;"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="28" height="28" fill="currentColor" class="bi bi-person-circle"
                                    viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd"
                                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg></div>
                            <div class="col-md-8" style="font-size: 12px;">
                                <div id="username"></div>
                                
                            </div>
                            <div class="col-md-1" style="padding-top: 3%;"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-chevron-compact-down"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1.553 6.776a.5.5 0 0 1 .67-.223L8 9.44l5.776-2.888a.5.5 0 1 1 .448.894l-6 3a.5.5 0 0 1-.448 0l-6-3a.5.5 0 0 1-.223-.67z" />
                                </svg></div>
                        </div>
                    </div>
                    <div class="col-md-4 d-none" style="padding-top: 2%;" id="logout">
                        <button type="button" class="btn btn-secondary" id="logoutbutton"><svg xmlns="http://www.w3.org/2000/svg"
                                width="20" height="20" fill="currentColor" class="bi bi-box-arrow-in-right"
                                viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
                                <path fill-rule="evenodd"
                                    d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                            </svg>&nbsp;LOGOUT</button>
                    </div>

                </div>
            </div>




    </header>
    <header class="container-fluid d-lg-none  ">
        <!--small header starts here-->
        <div class="r1 ">
            <div class="b1"><img src="image/gv.png"></div>
            <div class="b2">IFMIS</div>
            <div class=" b3" style="color: white;" id="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="40"
                    fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg></div>
            <div class="b4"></div>
            <div class="b5">
                <div class="dropdown">
                    <button type="button" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                        </svg></button>
                    <div class="dropdown-content " style="right: 0;">
                        <a href="#">Welcome M.USHASHRE</a>
                        <a href="#">(6370681595)</a>

                    </div>
                </div>
                
            </div>

        </div>

    </header>
    <!--small header end here-->

    <?php 
    include_once "navbar.php"
    ?>