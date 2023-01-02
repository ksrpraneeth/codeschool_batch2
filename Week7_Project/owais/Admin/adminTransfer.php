<?php include'adminSidebarNavbar.php'?>


<div class="container-fluid">
    <div class="row">
         <div class="col-sm-2"></div>

         <div class="col-sm-8 justify-content-center">
            <div class="card">
                <div class="card-body">
                       <h4 class="card-title text-center">Transfer Money</h4>
                        <p class="card-text">
                        <form  class="form-horizontal"   action="" method="post" name="transfer money">
                                <div class="form-group row justify-content-center">
                                    <div class="form-group col-xs-4 col-sm-8 ">
                                        <input type="text" class="form-control" id="account-number" name="Account Number" placeholder="Enter Account Number">
                                        <b><span id="accountNumber" class="text-danger"></span></b>
                                    </div>
                                </div>    

                                <br><br>

                                <div class="form-group row justify-content-center"> 
                                    <div class="form-group col-xs-4 col-sm-8">
                                        <input type="text" class="form-control" id="amount" name="Amount" placeholder="Enter Amount">
                                        <b><span id="amount" class="text-danger"></span></b>
                                    </div>                                   
                                </div>  

                                <br><br>

                                <div class="form-group row justify-content-center">
                                    <button type="button" id="payButton" class="col-xs-2 col-sm-4 btn btn-success">Pay Money</button>
                                 </div>
                        </form>    
                        </p>
                </div>
            </div>
         </div>

         <div class="col-sm-2"></div>
    </div>
</div>

<?php include'adminfotterBar.php'?>