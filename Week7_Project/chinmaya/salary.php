<?php
#including the header file
include_once "header.php";
#including the nav bar
include_once "navbar.php";
?>



<div class="right_container" >
<!--col-9container starts-->

<div class="row">
  <div class="col-1">
    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal2" id="addSalary">Add Salary</button>
  </div>
  <div class="col-2">
 <select class="form-select" aria-label="Default select example" id="filterSalaryMonth">

  <option selected value=''>All Months</option>
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
<select class="form-select" aria-label="Default select example" id="salaryYear">
  <option value=''>All years</option>
  <option value='2018'>2018</option>
  <option value='2019'>2019</option>
  <option value='2020'>2020</option>
  <option value='2021'>2021</option>
  <option value='2022'>2022</option>
 
  
</select>
</div>

<div class="col-2">
<select class="form-select" aria-label="Default select example" id="employeelistSalary">
 
  
</select>
</div>

<div class="col-2">
<select class="form-select" aria-label="Default select example" id="salaryfilterLimit">
  <option selected value="" >All Salaries</option>
  <option value='1'>Less than</option>
  <option value='2'>More than</option>
  <option value='3'>Between</option>
  <!-- <option value="-1|95000"> < 95000</option>
  <option value="-1|90000"> < 90000</option>
  <option value="-1|75000"> < 75000</option>
  <option value="-1|15000"> < 15000</option>

  
  <option value="10000|20000">  10,000-20,000</option>
  <option value="20000|30000">20,000 - 30,000 </option>
  <option value="40000|50000"> 40,000- 50,000</option>
  <option value="60000|70000">60,000-70,000</option>

  <option value="1|10000"> > 10000</option>
  <option value="1|20000"> > 20000</option>
  <option value="1|75000"> > 50000</option>
  <option value="1|15000"> > 60000</option> -->
  
</select>
</div>


<div class="col-1 d-none" id="box1">
<input class="form-control" type="number" value='' id="boxvalue1">
</div>

<div class="col-1 d-none"id='box2'>
<input class="form-control" type="number" value='' id="boxvalue2">
</div>

<div class="col-1 " >
<button type="button" class="btn btn-primary" id="filtersalary">Search</button>
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
          <select class="form-select" id="salaryYear2">
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
<!-- Earnings -->

        <div class="row mt-2">
          <div class="col-4">Basic Salary<span class="text-danger">*</span></div>
          <div class="col-7">
            <input class="form-control" type="Number" placeholder="Basic salary" id="BasicSalary" value='0'>
            <div id="basicError" class="text-danger"></div>
          </div>
        </div>


        <div class="row mt-2">
          <div class="col-4">DA<span class="text-danger">*</span></div>
          <div class="col-7">
            <input class="form-control" type="Number" placeholder="DA" id="da" value="0">
            <div id="daError" class="text-danger"></div>
          </div>
        </div>

        <div class="row mt-2">
          <div class="col-4">HRA<span class="text-danger">*</span></div>
          <div class="col-7">
            <input class="form-control" type="Number" placeholder="HRA" id="hra" value='0'>
            <div id="hraError" class="text-danger"></div>
          </div>
        </div>

        <div class="row mt-2">
          <div class="col-4">CA<span class="text-danger">*</span></div>
          <div class="col-7">
            <input class="form-control" type="Number" placeholder="CA" id="ca" value='0'>
            <div id="caError" class="text-danger"></div>
          </div>
        </div>

        <div class="row mt-2">
          <div class="col-4">Medical Allowances<span class="text-danger">*</span></div>
          <div class="col-7">
            <input class="form-control" type="Number" placeholder="Medical Allowances" id="ma" value='0'>
            <div id="maError" class="text-danger"></div>
          </div>
        </div>

        <div class="row mt-2">
          <div class="col-4">Bonus<span class="text-danger">*</span></div>
          <div class="col-7">
            <input class="form-control" type="Number" placeholder="Bonus" id="bonus" value='0'>
            <div id="bonusError" class="text-danger"></div>
          </div>
        </div>

        <!-- deduction -->


        <div class="row mt-2">
          <div class="col-4">TDS<span class="text-danger">*</span></div>
          <div class="col-7">
            <input class="form-control" type="Number" placeholder="TDS" id="tds" value='0'>
            <div id="tdsError" class="text-danger"></div>
          </div>
        </div>


        <div class="row mt-2">
          <div class="col-4">PF<span class="text-danger">*</span></div>
          <div class="col-7">
            <input class="form-control" type="Number" placeholder="PF" id="pf" value='0'>
            <div id="pfError" class="text-danger"></div>
          </div>
        </div>
        


<!-- gross -->


        <div class="row mt-2">
          <div class="col-4">Gross<span class="text-danger">*</span></div>
          <div class="col-7">
            <input class="form-control" type="Number"  id="grossSalary" readonly value="0">
            <div id="grossError" class="text-danger"></div>
          </div>
        </div>

         <div class="row mt-2">
          <div class="col-4">Deduction<span class="text-danger">*</span></div>
          <div class="col-7">
            <input class="form-control" type="Number"  id="deductionSalary" readonly value="0" >
            <div id="deductionError" class="text-danger"></div>
          </div>
        </div>

        <div class="row mt-2">
          <div class="col-4">Net Salary<span class="text-danger">*</span></div>
          <div class="col-7">
            <input class="form-control" type="Number" readonly id="netSalary" value="0">
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