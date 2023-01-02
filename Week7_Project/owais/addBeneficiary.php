<?php include'sidebarNavbar.php'?>

<style>
        table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  
  td,th {
    background: white;
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }
  </style>
<div class="container" style="background-color: white;">
        <div class="row">
            <h3>Adding Beneficiary</h3>
            <form  class="form-horizontal" action="" method="post" name="Beneficiary Form">
                 <div class="form-group row">
                    <label for="Beneficiary Name" class="col-form-label required col-sm-2">Beneficiary Name</label>

                    <div class="form-group col-sm-1 w20">:</div>
                    
                    <div class="form-group col-sm-7">
                        <input type="text" class="form-control" id="beneficiary-name" name="beneficiaryname" placeholder="Enter Name of Beneficiary">
                        <b><span id="beneficiaryName" class="text-danger"></span></b>
                    </div>
                </div> 

                <br><br>

                <div class="form-group row">
                    <label for="ifsc code" class="col-form-label required col-sm-2">IFSC Code</label>

                    <div class="form-group col-sm-1 w20">:</div>
                    
                    <div class="form-group col-sm-7">
                        <input type="text" class="form-control" id="ifsc-code" name="ifsccode" placeholder="Enter IFSC Code">
                        <b><span id="ifscCode" class="text-danger"></span></b>
                    </div>
                </div> 

                <br><br>

                <div class="form-group row">
                    <label for="beneficiary account number" class="col-form-label required col-sm-2">Beneficiary Account Number</label>

                    <div class="form-group col-sm-1 w20">:</div>
                    
                    <div class="form-group col-sm-7">
                        <input type="text" class="form-control" id="beneficiary-account-number" name="beneficiary account number" placeholder="Enter beneficiary Account Number">
                        <b><span id="beneficiaryAccountNumber" class="text-danger"></span></b>
                    </div>
                </div> 

                <br><br>

                <div class="form-group row">
                    <label for="confirm account number" class="col-form-label required col-sm-2">Confirm Account Number</label>

                    <div class="form-group col-sm-1 w20">:</div>
                    
                    <div class="form-group col-sm-7">
                        <input type="text" class="form-control" id="confirm-account-number" name="confirm account number" placeholder="Confirm Account Number of Beneficiary">
                        <b><span id="confirmAccountNumber" class="text-danger"></span></b>
                    </div>
                </div> 

                <br><br>


                <div class="form-group row justify-content-center">
                    <button class='btn btn-primary col-sm-4' id='add' style="margin: 3px;">Add Beneficiary</button>
                </div>

                <br><br>

                <div class="row" id="beneficiaries"> 
                <h3><p>Beneficiary Details</p></h3>
                        <table>
                                <tr>
                                <th>S.NO</th>
                                <th>NAMES</th>
                                <th>Account No</th>
                                </tr>

                                <tr>
                                <td>1</td>
                                <td>Owais</td>
                                <td>1234567890</td>
                                </tr>

                </div>
        </form>  
    </div>         

</div>

<script>

$('#add').click(function(){
    var benData ={
        beneficiaryName : $('#beneficiary-name').val(),
        ifscCode : $('#ifsc-code').val(),
        beneficiaryAccountNumber : $('#beneficiary-account-number').val(),
        confirmAccountNumber : $('#confirm-account-number').val(),
        id : localStorage.getItem("user_id")
    }
    $.ajax({
        type:"POST",
        url:"api/saveBeneficiary.php",
        data:benData,
        success:function(result,status,xhr){
            let res = JSON.parse(result);
            console.log(res);
            if(res.status){
                window.alert(res.message);

            }
            else{
                $('#beneficiaryName').text(res.errors.beneficiaryName);
                $('#ifscCode').text(res.errors.ifscCode)
                $('#beneficiaryAccountNumber').text(res.errors.beneficiaryAccountNumber);
                $('#confirmAccountNumber').text(res.errors.confirmAccountNumber);  
            }
        }
    })
})

</script>

<?php include'fotterBar.php'?>