<?php
include_once "header.php";


?>
<body style="background-image: linear-gradient(red, yellow);">
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-white-50 mb-5">Please enter your login and password!</p>

                                <div class="form-outline form-white mb-4 container">
                                    <div class="row">
                                        <div class="col-3"><label class="form-label mt-2" for="email">Email</label></div>
                                        <div class="col-8"><input type="email" id="email" class="form-control form-control-lg" /></div>
                                    </div>
                                    
                                    
                                </div>

                                <div class="form-outline form-white mb-4 container">
                                    <div class="row">
                                        <div class="col-3 mt-2"><label class="form-label" for="password">Password</label></div>
                                        <div class="col-8"><input type="password" id="password" class="form-control form-control-lg" /></div>
                                    </div>
                                    
                                    
                                </div>

                               <button class="btn btn-outline-light btn-lg px-5"  id="loginButton">Login</button></div>
                                <

                                



                            </div>


                            <div id="error" class="text-danger"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script>
if(localStorage.getItem('User_status')==1){
    window.location.replace('index.php');
}

    $('#loginButton').click(function(){
        $('#error').text("");
        var formdata={email:$('#email').val(),password:$('#password').val()}
        console.log(formdata)
        $.ajax({
            type:"POST",
            url:"api/loginapi.php",
            data:formdata,
            datatype:"JSON",
            success:function(data){

            data=JSON.parse(data)
            if(data.status){
                localStorage.setItem('user_token',JSON.stringify(data.Data[0].token));
                localStorage.setItem('User_status',JSON.stringify(data.Data[0].status))
                localStorage.setItem('User_name',JSON.stringify(data.Data[0].name))
                alert(data.message);
                window.location.replace("index.php");
               
            }
            else{
                $('#error').text(data.message).removeClass('text-success').addClass('text-danger');
            }
            },
            error:function(err){
                $('#error').text(err).removeClass('text-success').addClass('text-danger');
            }

        })
    })
 
</script>

</html>