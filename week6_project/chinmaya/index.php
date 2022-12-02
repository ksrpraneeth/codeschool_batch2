<?php
include_once "header.php";
include_once "navbar.php";
?>



<div class="right_container" style=" color:crimson; font-size:30px; font-weight:bold; height:500px; ">
<!--col-9container starts-->
<!--isuue cheque instruction in blue box-->
WELCOME TO EMPLOYEEE DATABASE


</div>

<script>if(localStorage.getItem('User_status')!=1){
    window.location.replace('login.php');
}
</script>


<?php
#including the footer here
include_once "footer.php";
?>