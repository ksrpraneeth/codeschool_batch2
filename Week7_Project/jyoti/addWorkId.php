<?php

include_once "header.php";
?>

<div class="col-10" id="rigtSide" style="background-color: rgb(255, 255, 255);">
    <div class="container" style="margin-top: 2%;">
        <div class="row-justify-content-left">
            <div class="col-12" style="background-color: rgb(227, 226, 225);font-weight:700;padding:0.75%;">Add Work/Award Id</div>
        </div>
        <hr style="border:1px dashed;">
        <div class="container" style="margin-top: 3%;">
            <div class="row">
                <div class="col-4" style="font-size: 18px;">HOA<span style="font-size: 13px;">(Enter HOA to get and TS Details):</span></div>

                <div class="col-lg-7 md-12 sm-12"><input class="form-control" type="number" placeholder="Enter HOA Number" id="hoa"></div>
                <div class="col-1"><button style="background-color:  rgb(24, 28, 51);color:white;" id="hoaSearch">Search</button></div>
                <p class="text-danger" id="hoaError"></p>
            </div>
        </div>
        <div class="container mt-3" style="border: 1px solid gray;
        border-radius:6px ;background-color:rgb(227, 226, 225);padding:1%;">
            <div class="row pt-1">
                <div class="col-12" style="font-weight:500;font: size 16px;">Administrative Sanction </div>
            </div>
            <div class="row pt-3">
                <div class="col-lg-6 md-12 sm-12">Administrative Sanctioned G.O. Number:</div>
                <div class="col-lg-6 md-12 sm-12"><select class="form-control" id="asNumber"></select></div>
            </div>
            <div class="row pt-3">
                <div class="col-lg-6 md-12 sm-12">G.O. Amount :</div>
                <div class="col-lg-6 md-12 sm-12" id="asAmount"></div>
            </div>
            <div class="row pt-3">
                <div class="col-lg-6 md-12 sm-12">G.O. Date :</div>
                <div class="col-lg-6 md-12 sm-12" id="asDate"></div>
            </div>
        </div>
        <div class="container mt-3" style="border: 1px solid gray;
        border-radius:6px ;background-color:rgb(227, 226, 225);padding:1%;">
            <div class="row pt-1">
                <div class="col-12" style="font-weight:500;font: size 16px;">Technical Sanction </div>
            </div>
            <div class="row pt-3">
                <div class="col-lg-6 md-12 sm-12">Technical Sanctioned No.(DR/CR):</div>
                <div class="col-lg-6 md-12 sm-12"><select class="form-control" id="tsNumber"></select></div>
            </div>
            <div class="row pt-3">
                <div class="col-lg-6 md-12 sm-12">T.S. Amount :</div>
                <div class="col-lg-6 md-12 sm-12" id="tsAmount"></div>
            </div>
            <div class="row pt-3">
                <div class="col-lg-6 md-12 sm-12">T.S. Date :</div>
                <div class="col-lg-6 md-12 sm-12" id="tsDate"></div>
            </div>
        </div>
        <div class="container mt-3">
            <div class="row mt-2">
                <div class="col-lg-6 md-12 sm-12">Agreement Number:</div>
                <div class="col-lg-6 md-12 sm-12"><input class="form-control" type="number" id="agrrementNumber" value=""></div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-6 md-12 sm-12">Work Name:</div>
                <div class="col-lg-6 md-12 sm-12"><input class="form-control" id="workName" value=""></div>
            </div>
            <div class="row mt-2 ">
                <div class="col-lg-6 md-12 sm-12">Sanction Authority:</div>
                <div class="col-lg-6 md-12 sm-12"><select class="form-control" id="sanctionAuthority">
                <option selected disabled>Select an Option</option>
                    <option value="SE">SE</option>
                    <option value="EE">EE</option>
                    <option value="DEE">DEE</option>
                </select></div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-6 md-12 sm-12">Estimate Contract Value:</div>
                <div class="col-lg-6 md-12 sm-12"><input class="form-control" type="number" id="estimateValue" value=""></div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-6 md-12 sm-12">Agreement Contract Value:</div>
                <div class="col-lg-6 md-12 sm-12"><input class="form-control" type="number" id="agreementValue" value=""></div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-6 md-12 sm-12">Expenditure Till Date:</div>
                <div class="col-lg-6 md-12 sm-12"><input class="form-control" type="number" id="expenditure" value=""></div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-6 md-12 sm-12">Pending Bilss amount in BMS:</div>
                <div class="col-lg-6 md-12 sm-12"><input class="form-control" type="number" id="pendingBill" value=""></div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-6 md-12 sm-12">Tender Percentage (%):</div>
                <div class="col-lg-6 md-12 sm-12"><input class="form-control" type="number" id="tenderPercentage" min="0" max="100"></div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-6 md-12 sm-12">SSR Year (Sandard Schedule Rate):</div>
                <div class="col-lg-6 md-12 sm-12"><select class="form-control" id="ssrYear">
                <option selected disabled value="">Select an Option</option>
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                            <option value="2011">2011</option>
                            <option value="2010">2010</option>
                            <option value="2009">2009</option>
                            <option value="2007">2007</option>
                            <option value="2006">2006</option>
                            <option value="2005">2005</option>
                            <option value="2003">2003</option>
                            <option value="2002">2002</option>
                            <option value="2001">2001</option>
                            <option value="2000">2000</option>
                </select></div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-6 md-12 sm-12">Date of Mark out (Start date):</div>
                <div class="col-lg-6 md-12 sm-12"><input class="form-control" type="date" id="startDate"></div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-4 md-12 sm-12">Work Period:</div>
                <div class="col-lg-4 md-12 sm-12"><input class="form-control" placeholder="ex:12" type="number" id="workMonth" min="0">(In Months)</div>
                <div class="col-lg-4 md-12 sm-12"><input class="form-control" placeholder="ex:31" type="number" id="workDay" min="0" max="31">(In Days)</div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-6 md-12 sm-12">Expected date of Completion:</div>
                <div class="col-lg-6 md-12 sm-12"><input class="form-control" id="expectedDate"></div>
            </div>
            <!-- <div class="row mt-3 justify-content-center">
<div class="col-2"><button style="background-color:  rgb(24, 28, 51);color:white;">Save WorkId</button></div> 
            </div> -->
        </div>
        <div class="container mt-3 mb-3" style="border: 1px solid gray;border-radius:6px; background-color:rgb(227, 226, 225);">
            <div class="row mt-2">
                <div class="col">
                    Agency Details
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-3 sm-12 md-12">Agency PAN:</div>
                <div class="col-lg-6"><input class="form-control" id="pan" value=""></div>
                <div class="col-lg-3 mt-1"><button style="background-color:  rgb(24, 28, 51);color:white;" id="pansearch">Search & Add</button></div>
            </div>
            <div class="row mt-2">
                <div class="col-12">

                    <table class="table">


                        <thead>
                            <tr>
                                <th scope="col">Agency Name</th>
                                <th scope="col">Agency PAN</th>
                                <!-- <th scope="col">GSTIN</th> -->
                                <th scope="col">Agency PHONE</th>
                            </tr>
                        </thead>
                        <tbody id="pantable">

                        </tbody>


                    </table>


                </div>
            </div>
        </div>
        <div class="container mt-3 mb-3">
                <div class="row justify-content-center">
                    <div class="col-2">
                        <button class=" btn btn-success" id="saveWorkId" >Save</button>
                    </div>
                </div>
            </div>
    </div>


    <script src="js/addWorkId.js"></script>
    <?php
    include_once "footer.php";
    ?>