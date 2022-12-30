<?php

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
     <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<style>
    .main{
        background-image:linear-gradient(rgb(25, 7, 62),rgb(28, 16, 57),rgb(11, 5, 26));
    }
</style>

</head>
<body>
    <div class="container-fluid main">
        <div class="row">
            <div class="container"  style="margin-top:4%;padding-left: 16%;padding-right: 6%;margin-bottom:113px;color: aliceblue; font-family: 'Asar'">
            <div class="row justify-content-end">
                    <div class="col-2"><button class="btn btn-primary" id="logout">Log Out</button></div>
                    <div class="col-2"><button type="button" class="btn btn-primary" data-toggle="modal" id="view">View Employee</button></div>
                </div>
                <div class="row">
                    <div style="font-size: 36px;">Add Employee</div>
                    <div class="col-2">
                </div>
                <div class="row mt-5">
                    <div class="col-6">Employee Name</div>
                    <div class="col-6"><input id="employeeName" placeholder="Enter Employee Name" value=""></div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">Employee Id</div>
                    <div class="col-6"><input id="employeeId" type="password" placeholder="Enter Employee Id"></div>
                </div>
                <div class="row justify-content-center mt-5">
                    <div class="col">Add Address</div>
                    <textarea id="address" value=""></textarea>
                    <div class="mt-1"><button class="btn btn-secondary" id="add">Add More</button></div>
                    
                </div>
                <div class="row justify-content-center mt-5">
                    <div class="col-3"><button class="btn btn-primary" id="save">Add</button></div>
                    
                    
                    
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
   
</body>
<script src="employee.js"></script>
</html>