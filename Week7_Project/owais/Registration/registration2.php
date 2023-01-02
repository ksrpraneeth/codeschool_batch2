<?php
if(isset(($_FILES['applicant image']))){

    $file_name = $_FILES['applicant image']['name'];
    $file_size= $_FILES['applicant image']['size'];
    $file_tmp= $_FILES['applicant image']['tmp_name'];
    $file_type= $_FILES['applicant image']['type'];

    if(move_uploaded_file($file_tmp, "upload-documents/" . $file_name)){
        echo "Documents Uploaded";
    }
    else{
        echo "Could not upload docunemts";
    }
    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account Pixel Bank</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link href="style.css" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>
    <img src="../OnlineBankingWebIMG4 .jpeg" width=100% height="200">

    <div class="container" id="main">    
        
            <div class="row">
                <div class="col-sm-1">
                     <img src="../pix_logo.jfif" width="30">
                </div>

                <div class="col-sm-3" id="pix"> 
                    <h2>PIXEL BANK</h2>
                </div>
            </div>

            <div class="row">
    
                <div class="row" id="details">
                   <h3> DOCUMENTS UPLOAD</h3>
                </div>
    
                <form  class="form-horizontal" action="upload.php" method="post" enctype="multipart/form-data" name="myForm">
                        <div class="form-group row">
                            <label for="applicant image" class="col-form-label required col-sm-4">Passport Size Photo</label>
    
                            <div class="form-group col-sm-1 w20">:</div>
    
                            <div class="form-group col-sm-7">
                                <input  id="applicant-photo" type="file" id="documents" name="applicant image" placeholder="No file chosen"  class=" col-5 outline"  >
                            </div>
                        </div>
                        <br>
    
                        <div class="form-group row">
                            <label for="aadhar card" class="col-form-label required col-sm-4">Aadhar Card</label>
    
                            <div class="form-group col-sm-1 w20">:</div>
    
                            <div class="form-group col-sm-7">
                                <input  id="outline" type="file" id="documents" name="Aadhar Card" placeholder="No file chosen"  class=" col-5 outline"  >
                            </div>
                        </div>
                        <br>
    
                        <div class="form-group row">
                            <label for="applicant image" class="col-form-label required col-sm-4">PAN Card</label>
    
                            <div class="form-group col-sm-1 w20">:</div>
    
                            <div class="form-group col-sm-7">
                                <input  id="outline" type="file" id="documents" name="PAN Card" placeholder="No file chosen"  class=" col-5 outline"  >
                            </div>
                        </div>
                        <br>
                        <div class="row justify-content-center">
                            <button type="button" id="nextButton" class="col-1 btn btn-primary" onclick="window.location.href ='registration3.html';">NEXT</button>
                        </div>
        
                </form> 
                </div>
            </div>     
                          
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>
    
        <!-- <script src="script.js"></script>             -->

</body>
<script>
    
</script>
</html>