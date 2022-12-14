<?php
include_once "header.php";
include_once "navbar.php";
?>



<div class="right_container container" style=" font-weight:bold; height:800px  ">
<!--col-9container starts-->
<!--isuue cheque instruction in blue box-->

<div class="row">
    <div class="col-6"> 
    <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-12 col-xl-4">

        <div class="card" style="border-radius: 15px;">
          <div class="card-body text-center">
            <div class="mt-3 mb-4">
              <img src="image/profileavtar.jpg"
                class="rounded-circle img-fluid" style="width: 100px;" />
            </div>
            <h4 class="mb-2"><button type="button" class="btn btn-primary" id="employeebutton">Employee Details</button></h4>
            
          </div>
        </div>

      </div>
    </div>
  </div>
</div>



    <div class="col-6">
    <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-12 col-xl-4">

        <div class="card" style="border-radius: 15px;">
          <div class="card-body text-center">
            <div class="mt-3 mb-4">
              <img src="image/salaryavtar.jpg"
                class="rounded-circle img-fluid" style="width: 100px;" />
            </div>
            <h4 class="mb-2"><button type="button" class="btn btn-primary" id="salarybutton">Salary Details</button></h4>
            
          </div>
        </div>

      </div>
    </div>
  </div>
    </div>




</div>

</div>

<script>if(!('user_token' in localStorage)){
    window.location.replace('login.php');
}
$('#employeebutton').click(function(){
    window.location.replace('employeedetail.php')
})
$('#salarybutton').click(function(){
    window.location.replace('salary.php')
})
</script>


<?php
#including the footer here
include_once "footer.php";
?>