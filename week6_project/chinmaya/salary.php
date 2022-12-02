<?php
#including the header file
include_once "header.php";
#including the nav bar
include_once "navbar.php";
?>



<div class="right_container" >
<!--col-9container starts-->
<!--isuue cheque instruction in blue box-->
<div class="row d-none" id="details">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">SL.NO</th>
                <th scope="col">Employee Name</th>
                <th scope="col">month</th>
                <th scope="col">year</th>
                <th scope="col">Paid_on</th>
                <th scope="col">Gross</th>
                <th scope="col">Deduction</th>
                <th scope="col">Net</th>
              </tr>
        </thead>
        <tbody id="salaryRow">

        </tbody>

    </table>


 

<!-- Modal -->
<div class="modal fade modal-lg " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Employee Salary</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-6"><div >Employeee Name:</div><div id="nameEmployee" class="salarybreakupHead"></div></div>
            <div class="col-6"><div>Working Status:</div><div id="WorkingStatus" class="salarybreakupHead"></div> </div>
          </div>
          <div class="row mt-2">
            <div class="col-6"><div>Location:</div><div id="location" class="salarybreakupHead"></div></div>
            <div class="col-6"><div>Working position:</div ><div id="workingposition" class="salarybreakupHead"></div></div>
          </div>
        </div>
        <!--table for earning and deduction-->
<div class="container">
  <div class="row">


    <div class="col-6">
    <h3 class="mt-3">EARNINGS</h3>
        <!--tables-->
        <table class="table table-striped" id="earnings">
        <thead>
    <tr>
      <th scope="col">Type</th>
      <th scope="col">Amount</th>
      
    </tr>
  </thead>
  <tbody id="earningColoumn">
</tbody>

        </table>

    </div>


    <div class="col-6">
    <h3 class="mt-3">DEDUCTION</h3>
<!--tables-->
<table class="table table-striped" id="deduction">
        <thead>
    <tr>
      <th scope="col">Type</th>
      <th scope="col">Amount</th>
      
    </tr>
  </thead>
  <tbody id="deductioncoloumn">
</tbody>

        </table>
    </div>
  </div>
</div>


        <div style="font-size:20px;font-weight:bold; ">Net salary:<span id ="netsalary"></span> </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div><!--modal ends here-->
</div>

</div>
<!-- <script type="text/javascript">
    $("document").ready(function(){
        salary_info();
    });
</script> -->


</div>
</main>
</body>
<script src="js/home.js"></script>
<script src="js/salary.js"></script>
</html>