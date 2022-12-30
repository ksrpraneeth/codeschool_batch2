
var validation=true;


//Name
$("#userName").change(function(){
    let userName = $("#userName").val();
    $("#nameError").text("");
    
    if (userName.length == 0) {
      $("#nameError").text("Please Enter User Name");
      validation = false;
    };
  
  if (userName.match(/[^A-Z-0-9-a-z]/)) {
    $("#nameError").text("Special Characters are Not Allowed");
    validation = false;
  }
});

//Password

$("#password").change(function () {
    let password = $("#password").val();
    $("#passwordError").text("");
if(!password){
validation=false;
    $("#passwordError").text("Please Enter Password");
}
if(password.length<7){
validation=false;
    $("#passwordError").text("Password Should be more than 6 characters");
}

   })

   //Email

$("#mail").change(function () {
    let mail = $("#mail").val();
    $("#mailError").text("");
if(!mail){
validation=false;
    $("#mailError").text("Please Email-Id");
}
// if(mailError.match(/[^'gmail.com']/)){
// validation=false;
//     $("#mailError").text("Enter Valid Email");
// }

   })



// Select DOB

$("#dob").change(function () {
    let date = $("#dob").val();
    $("#dobError").text("");
  
    if (!date) {
      $("#dobError").text("Please Select a Date");
      validation = false;
    } else {
      validation = true;
    }
  });


  //Sign Up

  $('#signup').click(function(){



    var formdata = {
        userName: $("#userName").val(),
        password: $("#password").val(),
        dob: $("#dob").val(),
        mail: $("#mail").val(),
      };

      $.ajax({
        type: "POST",
        url: "registerapi.php",
        data: formdata,
        datatype: "JSON",
        success: function (data) {
          data = JSON.parse(data);
          if (data.status) {
    
            alert(data.output)
            // swal("", data.output, "success");
            window.location.replace("login.php");
            
          }
          else{
            swal("", data.message, "warning");
          }
        },
        error: function () {
            
        },
      });

  
})