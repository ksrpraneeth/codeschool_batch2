<?php include_once 'header.php'; ?>

<div class="table-responsive-xl" id="tableContainer">
  <p class="h3 text-center">Employees Data</p>
  <table class="table table-sm table-striped table-bordered" id="employeesTable">
    <thead></thead>
    <tbody></tbody>
  </table>

  <!-- Modal -->
  <div class="modal fade" id="viewSalaryModal" tabindex="-1" aria-labelledby="viewSalaryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="viewSalaryModalLabel">Employee Salary Details</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body table-responsive-md">
          <table class="table table-sm table-striped table-bordered" id="viewSalaryModalTable">
            <thead></thead>
            <tbody></tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<!-- END OF TABLE CONTAINER -->
</div>

<script type="text/javascript">
  $('document').ready(function() {
    getEmployeesData();
  });
</script>

<?php include_once 'footer.php' ?>