<?php

include_once "header.php";
?>

<div class="col-10" id="rigtSide" style="background-color: rgb(255, 255, 255);">

    <div class="container" style="margin-top: 2%;">
        <div class="row-justify-content-left">
            <div class="col-12" style="background-color: rgb(227, 226, 225);font-weight:600;padding:0.75%;">Add Admin Sanctioned G.O</div>
        </div>
        <div class="container" style="margin-top: 3%;">
            <div class="row">

                <div class="col-lg-4 sm-12 md-12">
                    <div class="col-12">Type of Sanction :</div>
                    <div class="col-12">
                        <select id="sanctionType" placeholder="Select an Option">
                        <option selected disabled value="">Select an Option</option>
                            <option value="Govt Order">Govt Order</option>
                            <option value="Proc/Memo">Proc/Memo</option>

                        </select>
                        <p class="text-danger" id="sanctionTypeError"></p>
                    </div>
                </div>
                <div class="col-lg-4 sm-12 md-12">
                    <div class="col-12">Financial Year :</div>
                    <div class="col-12"> <select id="sanctionYear"  >
                    <option selected disabled value="">Select an Option</option>
                            <option value="2022-2023">2022-2023</option>
                            <option value="2021-2022">2021-2022</option>
                            <option value="2020-2021">2020-2021</option>
                            <option value="2019-2020">2019-2020</option>
                            <option value="2018-2019">2018-2019</option>
                            <option value="2017-2018">2017-2018</option>
                            <option value="2016-2017">2016-2017</option>
                            <option value="2015-2016">2015-2016</option>
                            <option value="2014-2015">2014-2015</option>
                            <option value="2013-2014">2013-2014</option>
                            <option value="2012-2013">2012-2013</option>
                            <option value="2011-2012">2011-2012</option>
                            <option value="2010-2011">2010-2011</option>
                            <option value="2009-2010">2009-2010</option>
                            <option value="2007-2008">2007-2008</option>
                            <option value="2006-2007">2006-2007</option>
                            <option value="2005-2006">2005-2006</option>
                            <option value="2003-2004">2003-2004</option>
                            <option value="2002-2003">2002-2003</option>
                            <option value="2001-2002">2001-2002</option>
                            <option value="2000-2001">2000-2001</option>

                        </select>
                    <p class="text-danger" id="selectYearError"></p>
                </div>
                </div>
                <div class="col-lg-4 sm-12 md-12">
                    <div class="col-12">Date :</div>
                    <div class="col-12"><input type=date id="dateMax" max="" value=""></div>
                    <p class="text-danger" id="dateMaxError"></p>
                </div>

            </div>
        </div>
        <hr style="border:1px dashed;">
        <div class="container" style="margin-top: 3%;">
            <div class="row">
                <div class="col-lg-4 sm-12 md-12">
                    <div class="col-12">Admin Sanctioned Number :</div>
                    <div class="col-12"><input type=text placeholder="Enter AS Number" id="asNumber"></div>
                    <p class="text-danger" id="asNumberError"></p>
                </div>
                <div class="col-lg-4 sm-12 md-12">
                    <div class="col-12">Amount (Rs.) :</div>
                    <div class="col-12"><input type="number" placeholder="Enter AS Amount" id="amount"></div>
                    <p class="text-danger" id="amountError"></p>
                </div>
                <div class="col-lg-4 sm-12 md-12">
                    <div class="col-12">Jurisdiction Type :</div>
                    <div class="col-12">Single District</div>
                </div>
            </div>
        </div>
        <hr style="border:1px dashed;">
        <div class="container" style="margin-top: 3%;">
            <div class="row">
                <div class="col-1" style="font-size: 18px;">HOA<span>:</span></div>
                <div class="col-2"></div>
                <div class="col-lg-7 md-12 sm-12"><input class="form-control" type="number" placeholder="Enter Number" id="hoa"></div>
                <div class="col-1"><button style="background-color:  rgb(24, 28, 51);color:white;" id="addHoa">Add</button></div>
                <div class="col-1"><button style="background-color:rgb(235, 187, 33);color:white;" id="clear">Clear</button></div>
                <p class="text-danger" id="hoaError"></p>
            </div>
        </div>
        <hr style="border:1px dashed;">
        <div class="container" style="margin-top: 3%;">
            <div class="row">
                <div class="col-lg-6 sm-12 md-12">
                    <div class="col-12">Department :</div>
                    <div class="col-12" ><select type="text" id="department"></select></div>
                </div>
                <div class="col-lg-6 sm-12 md-12">
                    <div class="col-12">Sanction Authority :</div>
                    <div class="col-12"><select name="" id="sanctionAuthority" >
                    <option selected disabled value="">Select an Option</option>
                        <option value="govt">Govt.</option>
                        <option value="ENC">ENC</option>
                        <option value="CE">CE</option>
                        <option value="OTHERS">Others</option>
                    </select></div>
                    <p class="text-danger" id="sanctionAuthorityError"></p>
                </div>
            </div>
        </div>
        <hr style="border:1px dashed;">
        <div class="container" style="margin-top: 6%;padding-bottom:3%">
            <div class="row-justify-content:end offset-4"><button type="button" class="btn btn-success" id="addAdminSanction"> + Add Admin Sanction</button></div>
        </div>
    </div>

    <script src="js/addAdmin.JS"></script>
    <?php
    include_once "footer.php";
    ?>