<?php

include_once "header.php";
?>
<style>
    .input {
        padding-top: 3%;
        border-radius: 0%;
    }

    .inputHead {
        font-weight: 600;
        text-align: center;
        background-color: grey;
        margin-top: 3%;
        /* border: 4px solid red; */
    }

    .star {
        color: red;
    }
</style>
<div class="col-10" id="rigtSide" style="padding-top: 20px;background-color: rgb(255, 255, 255);">

    <div class="container" >
        <div class="row">
            <div class="col-7" style="font-weight:400;font-size:28px;text-align:center;">Add Work Agency</div>
            <div class="col-5 " style="padding-top: 10px;text-align:right;"><button>View All Agencies</button></div>
        </div>
        
        <div class="row">
            <div class="col-8" style="background-color:rgb(225, 227, 225);">
                <div class="col-12 inputHead">Agency Details</div>
                <div class="row input">
                    <div class="col-3">Agency Name :<span class="star">*</span></div>
                    <div class="col-9"><input type="text" id="agencyName" value="" ></div>
                    <div class="nameError" style="color:red;" value=""></div>
                </div>
                <div class="row input">
                    <div class="col-3">Phone No. :<span class="star">*</span></div>
                    <div class="col-9"><input type="number" id="phoneNumber" maxlength="10" value="" ></div>
                    <div class="phoneNumberError" style="color:red;"></div>
                </div>
                <div class="row input">
                    <div class="col-3">PAN No. :<span class="star">*</span></div>
                    <div class="col-9"><input type="text" id="panNumber" value="" ></div>
                    <div class="panError" style="color:red;"></div>
                </div>
                <div class="row input">
                    <div class="col-3">GSTIN No. :<span class="star">*</span></div>
                    <div class="col-7"><input type="text" id="gstinNumber" value=""></div>
                    
                    <div class="col-2"><button style="background-color:  rgb(24, 28, 51);color:white;"id="addGstin">+ Add</button> </div>
                   
                    <div class="text-danger" id="gstError" style="color:red;"></div>
                </div>
                <div class="col-12 inputHead">
                    <div class="col" value="">GSTIN List</div>
                </div>
                <div class="row col-12" id="gstList"></div>
                <div class="col-12 inputHead">Add New Bank Account Details</div>
                <div class="row input">
                    <div class="col-3">IFSC Code :<span class="star">*</span></div>
                    <div class="col-7"><input type="text" id="ifscCode" value=""></div>
                    <div class="col-2 sm-6"><button id="ifscSearch" style="background-color:  rgb(24, 28, 51);color:white;">Search</button>
                    </div>
                    
                </div>
                <div class="ifscError"></div>
                <div class="row input">
                    <div class="col-3">Bank Name :<span class="star">*</span></div>
                    <div class="col-9" id="bankName" value=""></div>
                </div>
                <div class="row input">
                    <div class="col-3">State :<span class="star">*</span></div>
                    <div class="col-9" id="stateName" value=""></div>
                </div>
                <div class="row input">
                    <div class="col-3">Branch Name :<span class="star">*</span></div>
                    <div class="col-9" id="branchName" value=""></div>
                </div>
                <div class="row input">
                    <div class="col-3">Bank A/C No. :<span class="star">*</span></div>
                    <div class="col-9"><input type="number" id="accountNumber"  value=""></div>
                    <div class="accountNumberError" style="color:red;"></div>
                </div>
                <div class="row input">
                    <div class="col-3">Confirm Bank A/C No. :<span class="star">*</span></div>
                    <div class="col-9"><input type="number" id="confirmAccountNumber"  value=""></div>
                <div class ="confirmAccountNumberError" style="color:red;"></div>
                </div>
                <div class="col-3 offset-4"><button id="addBankDetails" style="background-color:  rgb(24, 28, 51);color:white;">+ Add Bank Account</button></div>
                <div class="col-12 inputHead">Added Bank Account List</div>
                <div class="col-12" id="addedbanks" vlaue="No Bank Accounts Added Yet"></div>

                <div class="row">
                <button id="sendForApproval"  class="col-3 offset-4 mb-4 mt-3 btn btn-success">Send For Approval</button>
                </div>

            </div>
        </div>
      
    </div>

    <!-- <script src="js/addAgency.js"></script> -->
    <script src="js/addAgency.JS"></script>
    <?php
    include_once "footer.php";

    ?>