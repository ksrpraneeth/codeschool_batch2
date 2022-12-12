<?php include_once 'header.php'; ?>

<div class="table-responsive-xl" id="tableContainer">
  <p class="h3 text-center">Employees Salaries Data</p>

  <div class="filters row mb-3">
    <div class="filtersDivs col-12 col-lg-3 my-1">
      <label for="" class="form-label m-0">Salary Month</label>
      <select class="form-select form-select-sm" id="salaryMonth" onchange="getDateOfPayment();"></select>
    </div>
    <div class="filtersDivs col-12 col-lg-3 my-1">
      <label for="" class="form-label m-0">Date of Payment</label>
      <select class="form-select form-select-sm" id="paidOnFilter"></select>
    </div>
    <div class="filtersDivs col-12 col-lg-3 my-1">
      <label for="" class="form-label m-0">Employee Name</label>
      <select class="form-select form-select-sm" id="employeeName"></select>
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
                  <option value="01">January</option>
                  <option value="02">February</option>
                  <option value="03">March</option>
                  <option value="04">April</option>
                  <option value="05">May</option>
                  <option value="06">June</option>
                  <option value="07">July</option>
                  <option value="08">August</option>
                  <option value="09">September</option>
                  <option value="10">October</option>
                  <option value="11">November</option>
                  <option value="12">December</option>
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
                <input class="form-control" id="gross-salary" type="text" value="" readonly>
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



          <div class="row mb-3">
            <div class="col-4">
              <div class="form-outline">
                <label class="form-label" for="add-earnings">Add Salary Components</label>
                <select class="form-select" id="add-earnings">
                  <option value="1">Basic Pay</option>
                  <option value="2">DA</option>
                  <option value="3">HRA</option>
                  <option value="4">CA</option>
                  <option value="5">Medical Allowance</option>
                  <option value="6">Bonus</option>
                  <option value="7">TDS</option>
                  <option value="8">PF</option>
                </select>
              </div>
            </div>

            <div class="col-6">
              <div class="form-outline">
                <label class="form-label" for="amount">Amount</label>
                <input type="number" id="amount" class="form-control" />
              </div>
            </div>

            <div class="col-2">
              <div class="form-outline">
                <label class="form-label">Action</label>
                <button class="btn btn-primary"> + ADD</button>
              </div>
            </div>

          </div>



          


          

        </form>
        <div id="viewSalaryError"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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