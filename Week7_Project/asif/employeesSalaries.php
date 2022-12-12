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
      <button class="btn btn-secondary btn-sm mt-4" onclick="clearSalaryFilters();">Clear</button>
    </div>
    <div class="filtersDivs col-12 col-lg-1 w-auto my-1 ms-auto text-center">
      <button class="btn btn-primary btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#addNewSalaryModal">Add New Salary</button>
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

<!-- Modal -->
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

<script type="text/javascript">
  $('document').ready(function () {
    getEmployeesSalaries();
    getSalaryMonth();
    getDateOfPayment();
    getEmployeeForSalariesFilter();
  });
</script>

<?php include_once 'footer.php' ?>