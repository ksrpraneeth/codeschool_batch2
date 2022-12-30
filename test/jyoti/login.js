var validation=true;

if(('token' in localStorage) ){
  window.location.replace('employee.php')
}


$('#login').click(function(){

var formdata={
    userName: $("#userName").val(),
        password: $("#password").val(),
};

$.ajax({
    type: "POST",
    url: "loginapi.php",
    data: formdata,
    datatype: "JSON",
    success: function (data) {
      data = JSON.parse(data);
      if (data.status) {
localStorage.setItem("token",data.output[0].token);
localStorage.setItem("userId",data.output[0].id);
        alert("Welcome"+" "+data.output[0].username)
        // swal("", data.output, "success");
        window.location.replace("employee.php");
        
      }
      else{
        swal("", data.message, "warning");
      }
    },
    error: function () {
        
    },
  });



})