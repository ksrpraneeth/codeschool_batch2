<?php

include_once "header.php";
?>

<div class="col-10" id="rigtSide" style="background-color: rgb(255, 255, 255);">

    <div class="container" style="margin-top: 2%;">
        <div class="row-justify-content-left">
            <div class="col-12" style="background-color: rgb(227, 226, 225);font-weight:600;padding:0.75%;">Add Technical Sanctioned Value.</div>
        </div>
    </div>
    <div class="container" style="padding-top:3%;">
        <div class="row">
            <div class="col-1" style="font-size: 18px;">HOA :</div>
            <div class="col-2"></div>
            <div class="col-lg-7 sm-12 md-12"><input class="form-control" type="number" placeholder="Enter Number"  id="hoa"></div>
            <div class="col-lg-1 sm-6 md-6"><button style="background-color:  rgb(24, 28, 51);color:white;" id="addHoa">Add</button></div>
            <div class="col-lg-1 sm-6 md-6"><button style="background-color:rgb(235, 187, 33);color:white;" id="clear">Clear</button></div>
            <p class="text-danger" id="hoaError"></p>
        </div>
    </div>
    <div class="container" style="padding-top:3% ;">
        <div class="row">
            <div class="col-3">Admin Sanction Number :</div>
            <div class="col-7" ><select type="text" id="asNumber" value=""><option selected disabled>Select an Option</option></select></div>
        </div>
    </div>
    <div class="container" style="padding-top:3%;">
        <div class="row">
            <div class="col-lg-4 sm-12 md-12">
                <div class="col-lg-12 sm-6 md-6">Admin Sanction Date :</div>
                <div class="col-lg-12 sm-6 md-6" id="asDate"></div>
            </div>
            <div class="col-lg-4 sm-12 md-12">
                <div class="col-lg-12 sm-6 md-6">Admin Sanction Amount :</div>
                <div class="col-lg-12 sm-6 md-6" id="asAmount"></div>
            </div>
            <div class="col-lg-4 sm-12 md-12">
                <div class="col-lg-12 sm-6 md-6">Admin Sanction Balance Amount :</div>
                <div class="col-lg-12 sm-6 md-6">---</div>
            </div>
        </div>
    </div>
    <hr style="border:1px dashed;">

    <div class="container" style="padding-top:3%;">
        <div class="row">
            <div class="col-lg-4 sm-12 md-12">
                <div class="col-12">Technical Sanction Number :</div>
                <div class="col-12"><input type="text" placeholder="Enter TS Number" id="tsNumber"></div>
                <p class="text-danger" id="tsNumberError"></p>
            </div>
            <div class="col-lg-4 sm-12 md-12">
                <div class="col-12">Amount (Rs.):</div>
                <div class="col-12"><input type="text" placeholder="Enter TS Value" id="amount"></div>
                <p class="text-danger" id="amountError"></p>
            </div>
            <div class="col-lg-4 sm-12 md-12">
                <div class="col-12">Date :</div>
                <div class="col-12"><input type="date" id="dateMax" max=""></div>
            </div>
        </div>
        <hr style="border:1px dashed;">
        <div class="container" style="margin-top: 3%;">
            <div class="row">
                <div class="col-12">Sanction Authority :</div>
                <div class="col-12"><select name="" id="sanctionAuthority" >
                    <option selected disabled value="">Select an Option</option>
                       
                        <option value="ENC">ENC</option>
                        <option value="CE">CE</option>
                        <option value="SE">SE</option>
                        <option value="EE">EE</option>
                        <option value="DEE">DEE</option>
                        <option value="Others">Others</option>
                    </select></div>
                    <p class="text-danger" id="sanctionAuthorityError"></p>
            </div>
        </div>
        <hr style="border:1px dashed;">

        <div class="container" style="margin-top: 6%;margin-bottom: 6%;">
            <div class="row-justify-content:end offset-4"><button type="button" class="btn btn-success" id="addAdminSanction"> + Add Technical Sanction</button></div>
        </div>
    </div>

</div>
<script src="js\addTechnicalSanction.js"></script>
<?php
include_once "footer.php";
?>