<?php include_once 'header.php'; ?>

<div class="table-responsive-xl" id="tableContainer">
  <p class="h3 text-center">Employees Salaries Data</p>

  <div class="filters row mb-3">
    <div class="filtersDivs col-12 col-lg-2 my-1">
      <label for="salaryMonth" class="form-label m-0">Salary Month</label>
      <select class="form-select form-select-sm" id="salaryMonth" onchange="getDateOfPayment();"></select>
    </div>
    <div class="filtersDivs col-12 col-lg-2 my-1">
      <label for="paidOnFilter" class="form-label m-0">Date of Payment</label>
      <select class="form-select form-select-sm" id="paidOnFilter"></select>
    </div>
    <div class="filtersDivs col-12 col-lg-2 my-1">
      <label for="employeeName" class="form-label m-0">Employee Name</label>
      <select class="form-select form-select-sm" id="employeeName"></select>
    </div>
    <div class="filtersDivs col-12 col-lg-1 my-1 w-auto">
      <label for="grossSalaryFilter" class="form-label m-0">Gross Salary</label>
      <select class="form-select form-select-sm" id="grossSalaryFilter">
        <option value="1" selected>More Than</option>
        <option value="2">Less Than</option>
        <option value="3">Between</option>
      </select>
    </div>
    <div class="filtersDivs col-12 col-lg-1 my-1">
      <label for="grossSalaryInput" class="form-label m-0">Amount</label>
      <input type="text" class="form-control form-control-sm" id="grossSalaryInput1">
    </div>
    <div class="filtersDivs col-12 col-lg-1 my-1 d-none">
      <label for="grossSalaryInput" class="form-label m-0">Amount</label>
      <input type="text" class="form-control form-control-sm" id="grossSalaryInput2">
    </div>
    <div class="filtersDivs col-12 col-lg-1 w-auto my-1 text-center">
      <button class="btn btn-info btn-sm mt-4" onclick="searchSalaries();">Search</button>
    </div>
    <div class="filtersDivs col-12 col-lg-1 w-auto my-1 text-center">
      <button class="btn btn-secondary btn-sm mt-4" onclick="clearSalaryFilters()">Clear</button>
    </div>
    <div class="filtersDivs col-12 col-lg-1 w-auto my-1 ms-auto text-center">
      <button class="btn btn-primary btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#addNewSalaryModal" onclick="getEmployeesList();">Add New
        Salary</button>
    </div>
    <!-- end of filters -->
  </div>


  <div class="row">
    <table class="table table-sm table-striped table-bordered" id="salariesTable">
      <thead></thead>
      <tbody></tbody>
    </table>
  </div>

  <div class="row" id="getSalariesError">

  </div>

  <!-- end of table container -->
</div>

<!-- Modal for view salary breakup -->
<div class="modal fade" id="viewSalaryBreakupModal" tabindex="-1" aria-labelledby="viewSalaryBreakupModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="viewSalaryBreakupModalLabel">Employee Salary Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body table-responsive-md">
        <div id="employeeDetails"></div>
        <table class="table table-sm table-striped table-bordered" id="viewSalaryBreakupModalTable">
          <thead></thead>
          <tbody></tbody>
        </table>
        <div id="viewSalaryError"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal for add new salary -->
<div class="modal fade" id="addNewSalaryModal" tabindex="-1" aria-labelledby="addNewSalaryModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="addNewSalaryModalLabel">Add New Salary Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="employeeDetails"></div>
        <form action="#" class="container-fluid" id="newSalaryForm">
          
          <!-- for employee name -->
          <div class="row mb-4">
            <div class="col-12">
              <div class="form-outline">
                <label class="form-label" for="employeeNameSelect">Employee</label>
                <select class="form-select" id="employeeNameSelect" onchange="getEmployeeForNewSalary()"></select>
                <p class="errorMsgs" id="employeeNameSelectError"></p>
              </div>
            </div>
          </div>
        

          <!-- for employee Details -->
          <div id="employeeDetailsForNewSalary" class="row mb-3"></div>


          <!-- for salary payment dates -->
          <div class="row mb-3">
            <div class="col-4">
              <div class="form-outline">
                <label class="form-label" for="salary-month">Salary Month</label>
                <select class="form-select" id="salary-month">
                  <option value="0">January</option>
                  <option value="1">February</option>
                  <option value="2">March</option>
                  <option value="3">April</option>
                  <option value="4">May</option>
                  <option value="5">June</option>
                  <option value="6">July</option>
                  <option value="7">August</option>
                  <option value="8">September</option>
                  <option value="9">October</option>
                  <option value="10">November</option>
                  <option value="11">December</option>
                </select>
              </div>
            </div>

            <div class="col-4">
              <div class="form-outline">
                <label class="form-label" for="salary-year">Salary Year</label>
                <select class="form-select" id="salary-year">
                  <option value="<?php if(date('m') == '01') { echo date('Y') - 1; } else { echo date('Y'); }?>"><?php if(date('m') == '01') { echo date('Y') - 1; } else { echo date('Y'); }?></option>
                </select>
              </div>
            </div>

            <div class="col-4">
              <div class="form-outline">
                <label class="form-label" for="date-of-payment">Date of Payment</label>
                <input class="form-control" id="date-of-payment" type="text" value="<?php echo date('d/m/Y') ?>" readonly>
              </div>
            </div>

          </div>



          <!-- for salary amount details -->
          <div class="row mb-3">
            <div class="col-4">
              <div class="form-outline">
                <label class="form-label" for="gross-salary">Gross Salary</label>
                <input class="form-control" id="gross-salary" type="text" value="">
              </div>
            </div>

            <div class="col-4">
              <div class="form-outline">
                <label class="form-label" for="deductions">Deductions</label>
                <input class="form-control" id="deductions" type="text" value="0" readonly>
              </div>
            </div>

            <div class="col-4">
              <div class="form-outline">
              <label class="form-label" for="net-salary">Net Salary</label>
                <input class="form-control" id="net-salary" type="text" value="0" readonly>
              </div>
            </div>

          </div>


          <!-- for salary components -->
          <div class="row mb-3">
            <div class="col-6">
              <div class="form-outline">
                <label class="form-label" for="basic-pay">Basic Pay</label>
                <input type="text" id="basic-pay" class="form-control salary-component" onchange="updateSalaryAmount()"/>
              </div>
            </div>

            <div class="col-6">
            <div class="form-outline">
                <label class="form-label" for="da">DA</label>
                <input type="text" id="da" class="form-control salary-component" onchange="updateSalaryAmount()"/>
              </div>
            </div>
          </div>
          
          <div class="row mb-3">
            <div class="col-6">
              <div class="form-outline">
                <label class="form-label" for="hra">HRA</label>
                <input type="text" id="hra" class="form-control salary-component" onchange="updateSalaryAmount()"/>
              </div>
            </div>

            <div class="col-6">
            <div class="form-outline">
                <label class="form-label" for="ca">CA</label>
                <input type="text" id="ca" class="form-control salary-component" onchange="updateSalaryAmount()"/>
              </div>
            </div>
          </div>


          <div class="row mb-3">
            <div class="col-6">
              <div class="form-outline">
                <label class="form-label" for="medical-allowance">Medical Allowance</label>
                <input type="text" id="medical-allowance" class="form-control salary-component" onchange="updateSalaryAmount()"/>
              </div>
            </div>

            <div class="col-6">
            <div class="form-outline">
                <label class="form-label" for="bonus">Bonus</label>
                <input type="text" id="bonus" class="form-control salary-component" onchange="updateSalaryAmount()"/>
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-6">
              <div class="form-outline">
                <label class="form-label" for="tds">TDS</label>
                <input type="text" id="tds" class="form-control salary-component" onchange="updateSalaryAmount()"/>
              </div>
            </div>

            <div class="col-6">
            <div class="form-outline">
                <label class="form-label" for="pf">PF</label>
                <input type="text" id="pf" class="form-control salary-component" onchange="updateSalaryAmount()"/>
              </div>
            </div>
          </div>

        </form>
        <div id="viewSalaryError"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="addNewSalary()">Submit Salary</button>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript">
  $('document').ready(function () {
    getEmployeesSalaries();
    getSalaryMonth();
    getDateOfPayment();
    getEmployeeForSalariesFilter();
  });
</script>

<?php include_once 'footer.php' ?>