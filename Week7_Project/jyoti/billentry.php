<?php

include_once "header.php";
?>
<div class="col-10" id="rigtSide">
    <div class="container">
        <div class="row mt-2" style="background-color:gray;">
            <div class="col" style="font-size: 18px;font-weight:600;">Bill Entry</div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-3 md-12 sm-12" style="font-weight:500;font-size:18px;">Select WorkBill Id:</div>
            <div class="col-lg-6 md-12 sm-12"><select class="form-control">
                    <option selected disabled>Select WorkId</option>
                </select></div>
        </div>
        <div class="container  mt-3 pb-3">
            <div class="row mt-2" style="border: 1px dashed gray;border-radius:3px; background-color:rgb(227, 226, 225);">
                <div class="row mt-1">
                    <div class="col-6">TS Number :</div>
                    <div class="col-6"></div>
                </div>
                <div class="row mt-1">
                    <div class="col-6">TS Amount :</div>
                    <div class="col-6"></div>
                </div>
                <div class="row mt-1">
                    <div class="col-6">Expenditure Till Date :</div>
                    <div class="col-6"></div>
                </div>
                <div class="row mt-1">
                    <div class="col-6">Used Amount :</div>
                    <div class="col-6"></div>
                </div>
                <div class="row mt-1">
                    <div class="col-6">PP-Form Amount :</div>
                    <div class="col-6"></div>
                </div>
            </div>
        </div>
        <div class="container mt-3 pb-3" style="border: dashed 1px gray;border-radius:3px">
            <div class="row">
                <div class="col-12 mb-3" style="text-align: center;font-weight:600;font-size:16px;">Agency Details</div>
            </div>

            <div class="row mt-1">
                <div class="col-lg-4 sm-12 md-12">Select Agency:</div>
                <div class="col-lg-8 sm-12 md-12"><select>
                        <option selected disabled>Select An Option</option>
                    </select></div>
            </div>
            <div class="row mt-1">
                <div class="col-lg-4 sm-12 md-12">Agency Name:</div>
                <div class="col-lg-8 sm-12 md-12"></div>
            </div>
            <div class="row mt-1">
                <div class="col-lg-4 sm-12 md-12">Agency PAN No.:</div>
                <div class="col-lg-8 sm-12 md-12"></div>
            </div>
            <div class="row mt-1">
                <div class="col-lg-4 sm-12 md-12">GSTIN:</div>
                <div class="col-lg-8 sm-12 md-12">
                    <select>
                        <option selected disabled>Select An Option</option>
                    </select>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-lg-4 sm-12 md-12">Select Bank Account Number:</div>
                <div class="col-lg-8 sm-12 md-12"><select>
                        <option selected disabled>Select An Option</option>
                    </select></div>
            </div>
            <div class="row mt-1">
                <div class="col-lg-4 sm-12 md-12">Bank Nme:</div>
                <div class="col-lg-8 sm-12 md-12"></div>
            </div>
            <div class="row mt-1">
                <div class="col-lg-4 sm-12 md-12">Branch Name:</div>
                <div class="col-lg-8 sm-12 md-12"></div>
            </div>
            <div class="row mt-1">
                <div class="col-lg-4 sm-12 md-12">IFSC Code:</div>
                <div class="col-lg-8 sm-12 md-12"></div>
            </div>

        </div>
        <div class="container mt-3 pb-3" style="border: dashed 1px gray;border-radius:3px">
            <div class="row" style="text-align: center;">
                <div>WORK ID Details</div>
            </div>
            <div class="row mt-1">
                <div class="col-4">Agreement Number:</div>
                <div class="col-8"></div>
            </div>
            <div class="row mt-1">
                <div class="col-4">Head Of Account:</div>
                <div class="col-8"></div>
            </div>
            <div class="row mt-1">
                <div class="col-lg-4 sm-12 md-12">Select Department:</div>
                <div class="col-lg-8 sm-12 md-12"><select ><option selected disabled>Select An Option</option></select></div>
            </div>
            <div class="row mt-1">
                <div class="col-4">Estimate Amount:</div>
                <div class="col-8"></div>
            </div>
            <div class="row mt-1">
                <div class="col-4">Agreement Amount:
                </div>
                <div class="col-8"></div>
            </div>
                <div class="row mt-1">
                    <div class="col-lg-4 sm-12 md-12">Running A/c Bill No.:</div>
                    <div class="col-lg-8 sm-12 md-12"><input></div>
                </div>
                <div class="row mt-1">
                    <div class="col-lg-4 sm-12 md-12">Abstract M.Book No.:</div>
                    <div class="col-lg-8 sm-12 md-12"><input></div>
                </div>
                <div class="row mt-1">
                    <div class="col-lg-4 sm-12 md-12">Total No. Of MBs:</div>
                    <div class="col-lg-8 sm-12 md-12"><input></div>
                </div>
                <div class="row mt-1">
                    <div class="col-lg-4 sm-12 md-12">No. Of LF Books:</div>
                    <div class="col-lg-8 sm-12 md-12"><input></div>
                </div>
                <div class="row mt-1">
                    <div class="col-lg-4 sm-12 md-12">Division Bill No.:</div>
                    <div class="col-lg-8 sm-12 md-12"><input></div>
                </div>
                <div class="row mt-1">
                    <div class="col-lg-4 sm-12 md-12">Category Type (CC Charges/PD):</div>
                    <div class="col-lg-8 sm-12 md-12"><select>
                        <option selected disabled>Select An Option</option>
                    </select></div>
                </div>
                <div class="row mt-1">
                    <div class="col-lg-4 sm-12 md-12">Covered under HR?:</div>
                    <div class="col-lg-8 sm-12 md-12"><select>
                            <option selected disabled>Select An Option</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select></div>
                </div>

            </div>
            <div class="container container mt-3 pb-3" style="border: dashed 1px gray;border-radius:3px">
                <div class="row justify-content-center" style="text-align: center;">
                    <div class="col-2">
                        GST Deductions
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4">Gross Amount:</div>
                    <div class="col-8"><input></div>
                </div>
                <div class="row mt-1">
                    <div class="col-4">Mobilisation Advance:</div>
                    <div class="col-8"><input></div>
                </div>
                <div class="row mt-1">
                    <div class="col-4">Remarks:</div>
                    <div class="col-8"><input type="text"></div>
                </div>
            </div>
            <div class="container mt-3 mb-3">
                <div class="row justify-content-center">
                    <div class="col-2">
                        <button class=" btn btn-success">Submit Bill</button>
                    </div>
                </div>
            </div>

        </div>


        <script src="js/billentry.JS"></script>
        <?php
        include_once "footer.php";
        ?>