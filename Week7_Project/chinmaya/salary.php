<?php
#including the header file
include_once "header.php";
#including the nav bar
include_once "navbar.php";
?>



<div class="right_container" >
<!--col-9container starts-->

<div class="row">
  <div class="col-2">
    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal2" id="addSalary">Add Salary</button>
  </div>
  <div class="col-2">
 <select class="form-select" aria-label="Default select example">

  <option selected disabled>Months</option>
  <option value="1">Jan</option>
  <option value="2">Feb</option>
  <option value="3">Mar</option>
  <option value="4">Aprl</option>
  <option value="5">may</option>
  <option value="6">june</option>
  <option value="7">july</option>
  <option value="8">Aug</option>
  <option value="9">sept</option>
  <option value="10">oct</option>
  <option value="11">Nov</option>
  <option value="12">Dec</option>

</select>
</div>

<div class="col-2">
<select class="form-select" aria-label="Default select example">
  <option selected>All Employee</option>
  
</select>
</div>
</div>


<!-- -----------------------------modal for add salary--------------------------------------- -->


<!-- Modal -->
<div class="modal fade modal-lg " id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Salary</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body container">

        <div class="row">
         <div class="col-4">Name of Employee<span class="text-danger">*</span></div>
          <div class="col-7">
            <select class="form-select" aria-label="Default select example" id="employeeInSalary">
            
              </select>
              <div id="salaryError" class="text-danger"></div>
          </div>
        </div>

        <div class="row mt-2">
          <div class="col-4">Working Status<span class="text-danger">*</span></div>
          <div class="col-7"><input class="form-control" type="text" value="Working" readonly ></div>
        </div>

        <div class="row mt-2">
          <div class="col-4">Month<span class="text-danger">*</span></div>
          <div class="col-7">
          <select class="form-select" aria-label="Default select example" id="salaryMonth">
<option selected disabled value="">Select Month</option>
  <option value="1">Jan</option>
  <option value="2">Feb</option>
  <option value="3">Mar</option>
  <option value="4">Aprl</option>
  <option value="5">may</option>
  <option value="6">june</option>
  <option value="7">july</option>
  <option value="8">Aug</option>
  <option value="9">sept</option>
  <option value="10">oct</option>
  <option value="11">Nov</option>
  <option value="12">Dec</option>
</select>
<div id="monthError" class="text-danger"></div>
          </div>
        </div>

        <div class="row mt-2">
          <div class="col-4">Year<span class="text-danger">*</span></div>
          <div class="col-7">
          <select class="form-select" id="salaryYear">
  <option selected disabled value="">Year</option>
  <option value="2020">2020</option>
  <option value="2021">2021</option>
  <option value="2022">2022</option>
</select>
<div id="yearError" class="text-danger"></div>
          </div>
        </div>

        <div class="row mt-2">
          <div class="col-4">Paid on<span class="text-danger">*</span></div>
          <div class="col-7">
            <input class="form-control" type="date" value="" id="salarydate">
            <div id="paidError" class="text-danger"></div>
          </div>
        </div>

        <div class="row mt-2">
          <div class="col-4">Gross<span class="text-danger">*</span></div>
          <div class="col-7">
            <input class="form-control" type="Number" placeholder="Gross salary" id="grossSalary" >
            <div id="grossError" class="text-danger"></div>
          </div>
        </div>

         <div class="row mt-2">
          <div class="col-4">Deduction<span class="text-danger">*</span></div>
          <div class="col-7">
            <input class="form-control" type="Number" placeholder="Deduction" id="deductionSalary">
            <div id="deductionError" class="text-danger"></div>
          </div>
        </div>

        <div class="row mt-2">
          <div class="col-4">Net Salary<span class="text-danger">*</span></div>
          <div class="col-7">
            <input class="form-control" type="Number" placeholder="Net Salary" readonly id="netSalary" value="0">
            <div id="netsalaryError" class="text-danger"></div>
          </div>
        </div>

       

        

<div id="mainError" class="text-danger"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveSalary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- -----------------------------modal for add salary ends here--------------------------------------- -->





<div class="row mt-2" id="details">
    <table class="table table-striped table-bordered border-primary">
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
          <div class="row mt-2">
            <div class="col-6"><div>Month:</div><div id="month" class="salarybreakupHead"></div></div>
            <div class="col-6"><div>year:</div ><div id="year" class="salarybreakupHead"></div></div>
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
</div>
</main>
</body>
<script src="js/home.js"></script>
<script src="js/salary.js"></script>
</html>