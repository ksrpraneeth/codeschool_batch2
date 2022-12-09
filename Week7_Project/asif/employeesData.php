<?php include_once 'header.php'; ?>

<div class="table-responsive-xl" id="tableContainer">
  <p class="h3 text-center mb-3">Employees Data</p>
  
  <div class="filters row mb-3">
    <div class="filtersDivs col-12 col-lg-3 my-1">
      <label for="workingStatus" class="form-label m-0">Working Status</label>
      <select class="form-select form-select-sm workingStatus"></select>
    </div>
    <div class="filtersDivs col-12 col-lg-3 my-1">
      <label for="designation" class="form-label m-0">Designation</label>
      <select class="form-select form-select-sm designation"></select>
    </div>
    <div class="filtersDivs col-12 col-lg-3 my-1">
      <label for="location" class="form-label m-0">Location</label>
      <select class="form-select form-select-sm location"></select>
    </div>
    <div class="filtersDivs col-12 col-lg-1 w-auto my-1 text-center">
      <button class="btn btn-info btn-sm mt-4" onclick="searchFilters()">Search</button>
    </div>
    <div class="filtersDivs col-12 col-lg-1 w-auto my-1 text-center">
      <button class="btn btn-secondary btn-sm mt-4" onclick="clearFilters()">Clear</button>
    </div>
    <div class="filtersDivs col-12 col-lg-1 w-auto my-1 ms-auto text-center">
      <button class="btn btn-primary btn-sm mt-4" data-bs-toggle="modal" data-bs-target="#addEmployeeModal" onclick="getWorkingStatus(1); getDesignations(1); getLocations(1); clearErrors();">Add New Employee</button>
    </div>
    <!-- end of filters -->
  </div>

  <div class="row">
    <table class="table table-sm table-striped table-bordered" id="employeesTable">
      <thead></thead>
      <tbody></tbody>
    </table>
  </div>

  <div class="row" id="getEmployeesError">
   
  </div>
  

  <!-- Modal for Add Employee -->
  <div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addEmployeeModalLabel">Add New Employee</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="#" class="container-fluid" id="newEmployeeForm">
            <!-- for name -->
            <div class="row mb-3">
                <div class="col-2">
                  <div class="form-outline">
                    <label class="form-label" for="surname">Surname</label>
                    <select class="form-select" id="surname">
                        <option hidden disabled>Select</option>
                        <option value="Mr.">Mr.</option>
                        <option value="Ms.">Ms.</option>
                        <option value="Mrs.">Mrs.</option>
                    </select>
                  </div>
                </div>
                <div class="col-4">
                    <div class="form-outline">
                        <label class="form-label" for="firstName">First Name</label>
                        <input type="text" id="firstName" class="form-control" />
                        <p class="errorMsgs" id="firstNameError"></p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-outline">
                    <label class="form-label" for="lastName">Last Name</label>
                    <input type="text" id="lastName" class="form-control" />
                    <p class="errorMsgs" id="lastNameError"></p>
                    </div>
                </div>
            </div>

            <!-- for dates -->
            <div class="row mb-3">
                <div class="col-6">
                    <div class="form-outline">
                        <label class="form-label" for="dateOfJoining">Date of Joining</label>
                        <input type="date" id="dateOfJoining" class="form-control" />
                        <p class="errorMsgs" id="dateOfJoiningError"></p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-outline">
                        <label class="form-label" for="dateOfBirth">Date of Birth</label>
                        <input type="date" id="dateOfBirth" class="form-control" />
                        <p class="errorMsgs" id="dateOfBirthError"></p>
                    </div>
                </div>
            </div>

            <!-- for input -->
            <div class="row mb-3">
                <div class="col-6">
                    <div class="form-outline">
                        <label class="form-label" for="phone">Mobile Number</label>
                        <input type="text" id="mobileNumber" class="form-control" />
                        <p class="errorMsgs" id="mobileNumberError"></p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-outline">
                    <label class="form-label" for="grossSalary">Gross Salary</label>
                    <input type="number" id="grossSalary" class="form-control" />
                    <p class="errorMsgs" id="grossSalaryError"></p>
                    </div>
                </div>
            </div>

            <!-- for dropdowns -->
            <div class="row mb-3">
                <div class="col-6">
                  <div class="form-outline">
                    <label class="form-label" for="gender">Gender</label>
                    <select class="form-select" id="gender">
                        <option hidden disabled>Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                  </div>
                </div>
                <div class="col-6">
                    <div class="form-outline">
                      <label class="form-label" for="workingStatus">Working Status</label>
                      <select class="form-select" id="workingStatus">
                      </select>
                    </div>
                </div>
            </div>

            <!-- for dropdowns -->
            <div class="row mb-3">
                <div class="col-6">
                    <div class="form-outline">
                      <label class="form-label" for="designation">Designation</label>
                      <select class="form-select" id="designation">
                      </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-outline">
                      <label class="form-label" for="location">Location</label>
                      <select class="form-select" id="location">
                      </select>
                    </div>
                </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="formValidation()">Submit</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal for View-->
  <div class="modal fade" id="viewSalaryModal" tabindex="-1" aria-labelledby="viewSalaryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="viewSalaryModalLabel">Employee Salary Details</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body table-responsive-md">
          <div id="employeeDetails"></div>
          <table class="table table-sm table-striped table-bordered" id="viewSalaryModalTable">
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

<!-- END OF TABLE CONTAINER -->
</div>

<script type="text/javascript">
  $('document').ready(function() {
    getEmployeesData();
    getWorkingStatus();
    getDesignations();
    getLocations();
  });
</script>

<?php include_once 'footer.php' ?>
