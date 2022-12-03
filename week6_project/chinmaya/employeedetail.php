<?php
#including the header file
include_once "header.php";
#including the nav bar
include_once "navbar.php";
?>



<div class="right_container" >
<!--col-9container starts-->
<!--isuue cheque instruction in blue box-->
<div class="container " >
  <div class="row">
    <div class="col-2"><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="employeeData">Add Employee</button></div>
    <div class="col-2">
    <select class="form-select" id="employeeworking">
  
</select>
    </div>
    <div class="col-2">
    <select class="form-select" id="employeelocation">
  
  
</select>
    </div>

    <div class="col-2">
  <select class="form-select" id="employeedesignation">
  
</select>
  </div>

  <div class="col-2">
  <button type="button" class="btn btn-primary">Search</button>
  </div>
  </div>
  

<div id="deleteError" class="text-danger"></div>
<!-- Modal -->
<div class="modal fade  modal-xl" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Employee Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body container">


        <div class="row   ">
          <div class="col-4">First name</div>
          <div class="col-7"><input class="form-control" type="text" placeholder="First Name" value="" id="firstname"></div>
        </div>

        <div class="row mt-2">
          <div class="col-4">Last Name</div>
          <div class="col-7"><input class="form-control" type="text" placeholder="Last Name" value="" id="lastname"></div>
        </div>
        
        
        <div class="row mt-2">
         <div class="col-4">Surname</div>
         <div class="col-7">
         <select class="form-select" aria-label="Default select example" id="surname">
             <option disabled>Select</option>
             <option value="Mr">Mr</option>
             <option value="Mrs">Mrs</option>
             <option value="Sri">Sri</option>
             <option value="kumar">kumar</option>
  
          </select>
         </div>
        </div>


        <div class="row mt-2">
          <div class="col-4">Date of joining</div>
          <div class="col-7"><input class="form-control" type="date" placeholder="Date" value="" id="doj"></div>
        </div>


        <div class="row mt-2">
          <div class="col-4">Date of Birth</div>
          <div class="col-7"><input class="form-control" type="date" value="" id="dob"></div>
        </div>

        <div class="row mt-2">
          <div class="col-4">Gender</div>
          <div class="col-7">
          <select class="form-select" aria-label="Default select example" id="gender">
             <option disabled selected>Select Here</option>
             <option value="Male">Male</option>
             <option value="Female">Female</option>
             <option value="Other">Other</option>
              
          </select>
          </div>
        </div>

        <div class="row mt-2">
          <div class="col-4">Working Status</div>
          <div class="col-7">
          <select class="form-select" aria-label="Default select example" id="workingStatus">
                          
          </select>
          </div>
        </div>


        <div class="row mt-2">
          <div class="col-4">Designation</div>
          <div class="col-7">
          <select class="form-select" aria-label="Default select example" id="designation">
                           
          </select>
          </div>
        </div>

        <div class="row mt-2">
          <div class="col-4">Location</div>
          <div class="col-7">
          <select class="form-select" aria-label="Default select example" id="location">
                         
          </select>
          </div>
        </div>

        <div class="row mt-2">
          <div class="col-4">Gross Salary</div>
          <div class="col-7"><input class="form-control" type="number" placeholder="Gross salary" id="grosssalary" value=""></div>
        </div>

      </div>
      <div class="modal-footer">
        <div id="error" class="text-danger"></div>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="addEmployee">Add Employee</button>
      </div>
    </div>
  </div>
</div><!-- Modal ends here -->



<!--employee table-->
            <div class="row d-none "id="details">
                <table class="table table-striped" >
                    <thead>
                        <tr>
                            <th scope="col">SL.No</th>
                          <th scope="col">Name</th>
                          <th scope="col">DOJ</th>
                          <th scope="col">DOB</th>
                          <th scope="col">Gender</th>
                          
                          <th scope="col">Status</th>
                          <th scope="col">Description</th>
                          <th scope="col">Location</th>
                          <th scope="col">Salary</th>
                        </tr>
                      </thead>
                      <tbody id="mytable">

                      </tbody>
                </table>
                
            </div>
         <!-- Button trigger modal -->


<!-- Employee details Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="employeename"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-striped table-hover" id="employeesalary">
        <thead>
    <tr>
      <th scope="col">Month</th>
      <th scope="col">Year</th>
      <th scope="col">Paid on</th>
      <th scope="col">Gross</th>
      <th scope="col">Deduction</th>
      <th scope="col">Net</th>
    </tr>
  </thead>
  <tbody id="employeedata">
</tbody>

        </table>
        <div id="salaryerror" class="text-danger"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
            

</div>




<!--col-md-9 container div end here-->
</div>
<!--row container ends here-->
</div>
</main>
</body>
<script src="js/employee.js"></script>
<script src="js/home.js"></script>
</html>