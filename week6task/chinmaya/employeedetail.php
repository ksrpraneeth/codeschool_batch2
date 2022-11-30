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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="employeename"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-striped table-dark" id="employeesalary">
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