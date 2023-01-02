<?php include'sidebarNavbar.php'?>

<div class="container-fluid" id="main">
        <h3><p>Profile</p></h3>

        <div class="row">
             

        <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> Personal Details</h4>
                        <div class="row">
                                <div class="col-6">
                                <b> Name</b>
                                </div>

                                <div class="col-2"></div>

                                <div class="col-4">
                                <span id="firstname"></span>
                                <span id="lastname"></span>
                                </div>
                         </div>
                            <br>  

                        <div class="row">
                                <div class="col-6">
                                <b> Mobile Number</b>
                                </div>

                                <div class="col-2"></div>

                                <div class="col-4">
                                <span id="mobilenumber"></span>
                                </div>
                        </div>
                            <br>  

                        <div class="row">
                                <div class="col-6">
                                <b> emailid</b>
                                </div>

                                <div class="col-2"></div>

                                <div class="col-4">
                                <span id="emailid"></span>
                                </div>
                         </div>
                            <br>  
                        
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> Balance</h4>
                        <span class="text-danger" id="balance"></span>
                        <p class="card-text">Your Total Balance</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> Saving</h4>
                        <span class="text-danger" id="saving"></span>
                        <p class="card-text">Your Total Saving</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Account Details</h4>
                        <div class="card-text">
                            <div class="row">
                                <div class="col-6">
                                <b> Account Type</b>
                                </div>

                                <div class="col-2"></div>

                                <div class="col-4">
                                <span id="accounttype"></span>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-6">
                                <b>Account Number</b>
                                </div>

                                <div class="col-2"></div>
                                
                                <div class="col-4">
                                <span id="accountnumber"></span>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-6">
                                <b>Aadhar Number</b>
                                </div>

                                <div class="col-2"></div>
                                
                                <div class="col-4">
                                <span id="aadharnumber"></span>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-6">
                                <b>PAN Number</b>
                                </div>

                                <div class="col-2"></div>
                                
                                <div class="col-4">
                                <span id="pannumber"></span>
                                </div>
                            </div>
                            <br>
                            <!-- <div class="row">
                                <div class="col-6">
                                <b>Mobile Number</b>
                                </div>

                                <div class="col-2"></div>
                                
                                <div class="col-4">
                                <span id="mobilenumber"></span>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-6">
                                <b>Email id</b>
                                </div>

                                <div class="col-2"></div>
                                
                                <div class="col-4">
                                <span id="emailid"></span>
                                </div>
                            </div> -->

                         </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Login Detais</h4>
                        <div class="card-text">
                        <div class="row">
                                <div class="col-6">
                                <b>User Name</b>
                                </div>

                                <div class="col-2"></div>
                                
                                <div class="col-4">
                                <span id="username"></span>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-6">
                                <b>Password</b>
                                </div>

                                <div class="col-2"></div>
                                
                                <div class="col-4">
                                <span id="password"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

        </div>
    </div>
<script>
    $(document).ready(function(){
    let data = JSON.parse(localStorage.getItem("user_data"));
    $.ajax({
        type:"POST",
        url:"api/profile.php",
        data: {
            id: data.id
        },
        success:function(result,status,xhr){
             let res = JSON.parse(result);
            if(res.status){
                // window.alert(resp.message);
                // window.location.replace("../login.html");
                console.log(res.data);
                $('#firstname').text(res.data[0].firstname);
                $('#lastname').text(res.data[0].lastname);
                $('#balance').text(res.data[0].balance);
                $('#saving').text(res.data[0].saving);
                $('#accounttype').text(res.data[0].accounttype);
                $('#accountnumber').text(res.data[0].accountnumber);
                $('#aadharnumber').text(res.data[0].aadharnumber);
                $('#pannumber').text(res.data[0].pannumber);
                $('#mobilenumber').text(res.data[0].mobilenumber);
                $('#username').text(res.data[0].username);
                $('#password').text(res.data[0].password);
                $('#emailid').text(res.data[0].emailid);
            }
        }
    })

})
</script>
<?php include'fotterBar.php'?>