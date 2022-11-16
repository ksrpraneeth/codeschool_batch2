<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <title>IFMIS</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</head>

<body>


  <div class="container-fluid">
    <div class="row">
      <!--header logo-->
      <div id="sidebar" class="col-lg-3 col -md-12 col-sm-12 d-none d-lg-block p-0"
        style="Background: #092641; height:150%x;">
        <!--<img class="img-fluid" src="navbg.jpeg" alt="nav1">-->
        <img class="img-fluid" style="width:100%" src="\img/logo.png">
        <hr>
        <div class="sidemenu">
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Masters</a></li>
            <li><a href="#">Transaction</a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Return Cheque Generation </a></li>
            <li><a href="#">Forest Transactions</a></li>
            <li><a href="#">E-kuber Returns Received List</a></li>
            <li><a href="#">E-kuber Return Challan Print</a></li>
            <li><a href="#">UTR search</a></li>
            <li><a href="#">Failed transactions</a></li>
            <li><a href="#">Cheque Status Report</a></li>
            <li><a href="#">Rejected Cheques due to FinYear End</a></li>
            <li><a href="#">FinYear New Cheques Report</a></li>
            <li><a href="#">Pd Budget Check</a></li>
            <li><a href="#">Update Receipts Used Amount</a></li>

          </ul>


        </div>


      </div>
      <!--header  main-->


      <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 p-0">
        <div class="bg-image" style="background-image:url('\img/navbg.jpeg')" style="background-color:rgb(17, 53, 90)">
          <div class="container d-flex justify-content-between align-items-center">
            <div class="left d-flex align-items-center ">
              <div class=" d-flex d-md-flex d-lg-none align-items-center">
                <div class="bg-image  d-flex align-items-center justify-content-sm-around"
                  style="background-image: url('\img/logo.png')">
                  <img src="\img/navbg.jpeg" width="40px" height="40px" class="" alt="..." />
                </div>
                <h4 class="p-0 text-white">
                  IFMIS
                </h4>
              </div>

              <div class="text-white py-4 align-items-center " onclick="toggleSidebar()">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list"
                  viewBox="0 0 16 16">
                  <path fill-rule="evenodd"
                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
              </div>

              <div class="align-items-center py-2 px-2 d-flex rounded-3"
                style="background-color:rgba(149, 145, 145, 0.614)">
                <div class="text-white">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-boxes"
                    viewBox="0 0 16 16">
                    <path
                      d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z" />
                  </svg>
                </div>
                <div class="text-white">
                  <h4 class="px-1">
                    Modules
                  </h4>
                </div>
              </div>
            </div>

            <div class="right d-flex align-items-center">
              <div class="row text-white d-none d-lg-block text-white" style="font-size:0.8rem">
                <p class="m-0 text-secondary  text-white"> Last Login</p>
                <p class="m-0 text-secondary text-white" id="currentTime"></p>

              </div>


              <div class="dropdown bg-secondary">
                <button class=" btn btn-secondary dropdown-toggle " type="button" data-bs-toggle="dropdown"
                  id="dropdownMenuLink" aria-expanded="false">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-person" viewBox="0 0 16 16">
                    <path
                      d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                  </svg>
                  <span class="caret"></span>
                  WELCOME
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <div class="dropdown-divider"></div>

                  <li><a href="#" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="25"
                        fill="currentColor" color="#5EA662" class="bi bi-person" viewBox="0 0 16 16">
                        <path
                          d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                      </svg>&nbsp;Profile</a></li>
                  <li><a href="#" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="25"
                        fill="currentColor" color="#5EA662" class="bi bi-key" viewBox="0 0 16 16">
                        <path
                          d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z" />
                        <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                      </svg>&nbsp;Change Password</a></li>
                  <li><a href="#" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="25"
                        fill="currentColor" color="#5EA662" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                          d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                        <path fill-rule="evenodd"
                          d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                      </svg>&nbsp;Logout</a></li>


                </ul>

              </div>



              <div class="d-none d-lg-block">
                <button type="button" onclick="login()"
                  class=" d-flex bg-secondary border-0 bg-opacity-25 text-white align-items-center  rounded-2 m-4">
                  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                      d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                    <path fill-rule="evenodd"
                      d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                  </svg>
                  <h6 class="p-2 " id="out">Logout</h6>
                </button>
              </div>
            </div>
          </div>

          <div class="container p-2" style="background-color:#E2e2e2;">
            <div class="container p-2" style="background-color:#fdfbfb;">
              <div class=" container p-0" style="background-color:#Cadff7;color:#1266b5;">
                <p style="width:100%;padding-top: 5px;">
                  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-credit-card-fill" viewBox="0 0 16 16">
                    <path
                      d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0V4zm0 3v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7H0zm3 2h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1z" />
                  </svg>&nbsp;&nbsp;&nbsp; Issue Cheque (E-Kuber Cheque From 01/03/2019)
                </p>
              </div>

              <div id="" class="container p-0" style="background-color:#Fbf0bb; border-radius:4px; ">
                <ul class="main">
                  <h5>point to remember</h5>
                  <ul>
                    <li>Please note that all cheques which are approved from DDOChecker/Officer/Govt from 01/03/2019
                      shall get paid through E-kuber which is a Core Banking Solution of RBI.</li>
                    <li>There is no need to present the cheques at the Bank for these cheques which got approved after
                      01/03/2019.</li>
                    <li>Please give correct account details as it is when the Account was opened.</li>
                    <li>Make sure there is no 'Your self' or 'Self' in the account names while issuing cheques. Such
                      cheques get auto-rejected by the E-kuber.</li>
                    <li>PLease check the exact length of the Bank Account Number and NO special characters are to be
                      entered, which leads to auto-rejection.</li>
                    <li>Finally, in multiple party cheques please do not enter the same party details in the same
                      chequeno which will be considered as a duplicate transaction and gets auto-rejected.</li>
                    <li>This is just a one-time procedure to get your Party details corrected and once when corrected
                      the same details can be re-used for smooth transactions</li>
                    <li>PD-to-PD cheques shall be adjusted in treasury itself in the regular procedure.</li>

                  </ul>
              </div>

              <!--transaction part-->
              <div class="container pt-1" style="background-color:#E5e5e8; ">
                <label class="inp">Transactions*</label>
                <input type="radio" name="single" /><label class="inp1">&nbsp;Single Party </label>
                <input type="radio" name="multi" /><label class="inp1">&nbsp;Multiple Parties </label>
                <input type="radio" name="single" /><label class="inp1">&nbsp;PD Account to PD Account </label>
                <input type="radio" name="single" /><label class="inp1">&nbsp;PD Account to Other Account </label>
              </div>

              <!--forms-->

              <div class="container p-20">


                <form id="form">
                  <div class="row">

                    <div>
                      <div id="div1" class="col-md-3 col-sm-5 label">
                        <label for="party_Ac">Party Account Number </label>
                      </div>
                      <div class="col-md-1 col-sm-2 label">
                        <label>:</label>
                      </div>
                      <div class="col-md-5 col-sm-5 label">
                        <input class="int2" type="text" id="partyAccount" name="party_ac_num" placeholder="Enter A/C No">
                        <small class="text-danger" id="partyAccountError"></small>
                      </div>
                    </div>

                    <div>
                      <div class="col-md-3 col-sm-5 label">
                        <label for="party_C">Confirm Party Account</label>
                      </div>
                      <div class="col-md-1 col-sm-2 label">
                        <label>:</label>
                      </div>
                      <div class="col-md-5 col-sm-5 label">
                        <input class="int2" type="text" id="confirmAccount" name="Confirm_party_ac_num"
                          placeholder="Confirm A/c No">
                          <small class="text-danger" id="confirmAccountError"></small>
                      </div>
                    </div>


                    <div>
                      <div class="col-md-3 col-sm-5  label">
                        <label for="party_N">Party Name</label>
                      </div>
                      <div class="col-md-1 col-sm-2 label">
                        <label>:</label>
                      </div>
                      <div class="col-md-5 col-sm-5 label">
                        <input class="int2" type="text" id="partyName" name="party_Name" placeholder="Enter Party Name">
                        <small class="text-danger" id="partyNameError"></small>
                      </div>
                    </div>
                    <div style="background-color:#Eeeef1">
                      <div>
                        <div class="col-md-3 col-sm-5 label ">
                          <label for="Bank">Bank IFSC Code</label>
                        </div>
                        <div class="col-md-1 col-sm-2 label">
                          <label>:</label>
                        </div>
                        <div class="col-md-5 col-sm-12 label">
                          <input class="int2" type="text" id="bankIfsc" name="bank_IFSC" placeholder="Enter IFSC Code">
                          <button class="btn btn-primary " type="button"  id="search" onclick="search()">search</button>
                          <small class="text-danger" id="error_Ifsc"></small>
                        </div>
                      </div>


                      <div>
                        <div class="col-md-3 col-sm-5 label">
                          <label for="Bank_Name">Bank name</label>
                        </div>
                        <div class="col-md-1 col-sm-2 label">
                          <label>:</label>
                        </div>
                        <div class="col-md-5 col-sm-5 label">
                          <p class="int2" id="bankName"></p>
                        </div>
                      </div>

                      <div>
                        <div class="col-md-3 col-sm-5 label">
                          <label for="Bank_Branch">Bank Branch </label>
                        </div>
                        <div class="col-md-1 col-sm-2 label">
                          <label>:</label>
                        </div>
                        <div class="col-md-5 col-sm-5 label">
                          <p class="int2" id="Branch"></p>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="col-md-3 col-sm-5 label">
                        <label for="HEAD_AC">Head Of Account</label>
                      </div>
                      <div class="col-md-1 col-sm-2 label">
                        <label>:</label>
                      </div>
                      <div class="col-md-5 col-sm-5 label">
                        <!-- <select input="text" class="int2" id="headAc" onchange="myFunction()"> -->
                        <select input="text" class="int2" id="headAc" >

                          <option value="select">Select</option>
                          <option value="0853001020002000000NVN">0853001020002000000NVN</option>
                          <option value="8342001170004001000NVN">8342001170004001000NVN</option>
                          <option value="2071011170004320000NVN">2071011170004320000NVN</option>
                          <option value="8342001170004002000NVN">8342001170004002000NVN</option>
                          <option value="2204000030006300303NVN">2204000030006300303NVN</option>

                        </select>
                        <div>
                          <small class="text-danger" id="headOfAc_error"></small>
                        </div>
                      </div>
                    </div>

                    <div>
                      <div class="col-md-3 col-sm-5 label">
                        <label for="Balance">Balance(in Rs)</label>
                      </div>
                      <div class="col-md-1 col-sm-2 label">
                        <label>:</label>
                      </div>
                      <div class="col-md-5 col-sm-5 label" id="Balance">
                        <p></p>
                      </div>
                    </div>

                    <div>
                      <div class="col-md-3 col-sm-5 label">
                        <label for="LOC">LOC (in Rs)</label>
                      </div>
                      <div class="col-md-1 col-sm-2 label">
                        <label>:</label>
                      </div>
                      <div class="col-md-5 col-sm-5 label" Id="LOC">
                        <p></p>
                      </div>
                    </div>

                    <div>
                      <div class="col-md-3 col-sm-5 label">
                        <label for="Expenditure_type">Expenditure type</label>
                      </div>
                      <div class="col-md-1 col-sm-2 label">
                        <label>:</label>
                      </div>
                      <div class="col-md-5 col-sm-5 label">
                        <!-- <select input="text" onclick="Expenditure()" id="drp" class="int2"> -->
                        <select input="text"  id="dropdown" class="int2">

                          <option value="Capital_Expenditure">Capital Expenditure</option>
                          <option value="Revenue_Expenditure">Revenue Expenditure</option>
                          <option value="Deferred_Revenue_Expenditure">Deferred Revenue Expenditure</option>
                        </select>
                        <small class="text-danger" id="ExpenditureError"></small>
                      </div>
                    </div>

                    <div>
                      <div class="col-md-3 col-sm-5 label">
                        <label for="Purpose_type">Purpose Type</label>
                      </div>
                      <div class="col-md-1 col-sm-2 label">
                        <label>:</label>
                      </div>
                      <div class="col-md-5 col-sm-5 label">
                        <select input="text" id="Purpose_type" class="int2" id="sub_menu">
                          <option value="" ></option>
                          <option  value="" ></option>
                          <option value=""></option>
                        </select>
                      </div>
                    </div>

                    <div>
                      <div class="col-md-3 col-sm-5 label">
                        <label for="Purpose">Purpose</label>
                      </div>
                      <div class="col-md-1 col-sm-2 label">
                        <label>:</label>
                      </div>
                      <div class="col-md-5 col-sm-5 label">
                        <input class="int3" type="text" id="purpose" name="Purpose" placeholder="enter Purpose here...">
                        <small class="text-danger" id="purposeError"></small>
                      </div>
                    </div>

                    <div>
                      <div class="col-md-3 col-sm-5 label">
                        <label for="pay_Amount">Pay Amont(in Rs)</label>
                      </div>
                      <div class="col-md-1 col-sm-2 label">
                        <label>:</label>
                      </div>
                      <div class="col-md-5 col-sm-5 label">
                        <!-- <input class="int2" type="text" id="pay_Amount" name="pay Amount" onchange="numbers()"
                      --><input class="int2" type="text" id="pay_Amount" name="pay Amount" 
                          placeholder="Enter party amount">
                          <small class="text-danger" id="payAmountError"></small>
                      </div>
                    </div>

                    <div>
                      <div class="col-md-3 col-sm-5 label">
                        <label for="In_words">Party Amount In Words</label>
                      </div>
                      <div class="col-md-1 col-sm-2 label">
                        <label>:</label>
                      </div>
                      <div class="col-md-5 col-sm-5  label" id="In_words">
                        <p></p>
                      </div>
                    </div>

                    <div>
                      <div class="col-md-3 col-sm-5 label">
                        <label for="Upload">Upload Documents</label>
                      </div>
                      <div class="col-md-1 col-sm-2 label">
                        <label>:</label>
                      </div>
                      <div class="col-md-5 col-sm-5 label">

                        <input class="int3" type="file" id="myfile" name="myfile" multiple>
                        <button class="btn btn-primary " type="button ">+ADD</button>

                      </div>
                      <p style="text-align:center">NOTE: Documents of Cheque(Letter/G.O.etc)can be Uploaded here</p>
                    </div>
                    <hr>
                    <div>
                      <!-- <button class="btn btn-primary btn1 " type="button"id="next" onclick="validateform()">Next</button> -->
                      <button class="btn btn-primary btn1 " type="button"id="next" >Next</button>

                    </div>
                  </div>
                </form>
                <p id="outPut"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- <script src="min.js"></script> -->
  <script src="numberTowords.js"></script>
  <script src="ajax.js"></script>
</body>

</html>