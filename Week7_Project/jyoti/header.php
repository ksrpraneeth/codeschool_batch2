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
    .head{
        padding:1%;
        font-size:2px;
        
    }
    #logo{
    background-image:url('images/ifmis-logo.png');
    background-repeat: no-repeat;
   
    
   
    background-size: 80%;
    }
    .anchor {
        text-decoration: none;
        color: white;
        font-size: 14px;
        border:20%;
       
    }
    .anchor:hover {
           
            border-left: 4px solid rgb(251, 195, 227);
            color: white;

        }
        .left{
            padding-top: 7%;
            border-bottom:0.5px solid rgb(131, 127, 127);
            
        } 
</style>
</head>
<body>
    <header class="container-fluid" style="background-image:url('images/img.jpeg')">
        <div class="row">
            
<div class="col-2 head " id="logo"></div>
<div class="col-1 head" id="menu"><button type="button"  class="btn btn-secondary" style="border-radius: 0%;font-size: small;"><svg xmlns="http://www.w3.org/2000/svg" width="20s" height="20" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
  </svg></button></div>
<div class="col-2 head"><button type="button" class="btn btn-secondary" style="border-radius: 0%;font-size: small;"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z"/>
  </svg>  <span>Modules</span></button></div>
<div class="col-1 head"><button type="button" class="btn btn-secondary" style="border-radius: 0%;font-size: small;">Profile</button></div>
<div class="col-1 head"><button type="button" class="btn btn-secondary" style="border-radius: 0%;font-size: small;">Logout</button></div>
<div class="col-2  head">
    <div style="color: white; font-size: 14px;">Last Login :</div>
                <div id="date" style=" font-size: 10px; color: white; font-weight:bold;"></div>
                <div id="time"style=" font-size: 10px; color: white; font-weight:bold;"></div>
    
    <!-- <button type="button" class="btn btn-secondary" style="border-radius: 0%;font-size: small;">Last Login</button> --></div>
<div class="col-1 head"></div>
<div class="col-2 head " style="justify-content: flex-end;"><button type="button" class="btn btn-secondary" style="border-radius: 0%;font-size: small;">Welcome</button></div>
            
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">          
                <div class=" col-2 sm-12 xs-12 " id="leftNavBar" style="background-color:rgb(28,55,83);">
                    <div class="left"><a href="index.php" style="text-decoration: none;color: white;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                        <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z"/>
                      </svg>    Home</a></div>
                    <div class="left"><a class="anchor" href="addAgency.php">Add Agency</a></div>
                    <!-- <div class="left"><a class="anchor" href="#">Add LALR Beneficieries</a></div> -->
                    <div class="left"><a class="anchor" href="addWorkId.php">Add Work/Award Id</a></div>
                    <div class="left"><a class="anchor" href="billentry.php">Bill Entry</a></div>
                    <!-- <div class="left"><a class="anchor" href="#">Covid Reliefs (Works)</a></div> -->
                    <!-- <div class="left"><a class="anchor" href="#">Add LARR Benificiery Bank Account</a></div>
                    <div class="left"><a class="anchor" href="#">LA/RR Bill Data Entry</a></div> -->
                    <div class="left"><a class="anchor" href="addAdmin.php">Add Admin Sanction</a></div>
                    <div class="left"><a class="anchor" href="addTechnical.php">Add Technical Sanction</a></div>
                    <!-- <div class="left"><a class="anchor" href="#">Add LA,R&R Proceeding</a></div>
                    <div class="left"><a class="anchor" href="#">Map Work ID</a></div>
                    <div class="left"><a class="anchor" href="#">Work/Award ID Search</a></div>       -->
                </div>
           
            