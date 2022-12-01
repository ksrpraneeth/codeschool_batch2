<?php include_once 'header.php'; ?>

<div class="table-responsive-xl" id="tableContainer">
  <p class="h3 text-center">Employees Salaries Data</p>
  <table class="table table-sm table-striped table-bordered" id="salariesTable">
    <thead></thead>
    <tbody></tbody>
  </table>
</div>

<!-- Modal -->
<div class="modal fade" id="viewSalaryBreakupModal" tabindex="-1" aria-labelledby="viewSalaryBreakupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
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
  $('document').ready(function() {
    getEmployeesSalaries();
  });
</script>

<?php include_once 'footer.php' ?>