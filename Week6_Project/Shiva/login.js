$(document).ready(function(){

     var token= localStorage.getItem("user_data");

    if(!token) {
        location.href="login.html";
    } 

var formData = {
    token: localStorage.getItem("user_data"),
}
     $.ajax({ 
        url: 'auth.php',
        type: 'POST',  
        data : formData,
        success: function (response, status,xhr) {
            response = JSON.parse(response);
            if(!response.status) {
                localStorage.removeItem("user_data");
                location.href="login.html";
            }
        }
     })
    })