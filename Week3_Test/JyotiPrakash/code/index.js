//First name

var fst_Name= document.getElementById("FIRST_NAME").value;
var first_Name=fst_Name.toString();
function firstName() {
  if (first_Name=="") {
    document.getElementById("fst_name_error").innerHTML =
      "First Name should not be kept blank";
  } else {
    document.getElementById("fst_name_error").innerHTML ="";
  }
console.log(firstName)
//Last name
var last_Name = document.getElementById("LAST_NAME").value;
if (last_Name == "") {
  document.getElementById("lst_name_error").innerHTML =
    "Last Name should not be kept blank";
} else {
  document.getElementById("lst_name_error").innerHTML = "";
}
//E mail Account
var user_Name = document.getElementById("email").value;
var USERNAME=user_Name.toString();
if ( (USERNAME=="@gmail.com")||USERNAME=="" ) {
  document.getElementById("User_Error").innerHTML =
    "User Name should not be kept blank";
} else {
  document.getElementById("User_Error").innerHTML = "";
}
//Password
var pswd = document.getElementById("PASSWORD").value;
var PassWord=pswd.toString();
if ( PassWord=="") {
  document.getElementById("PASSWORD_ERROR").innerHTML =
  "Password should not be kept blank";
}
else if(PassWord.length<8) {
    document.getElementById("PASSWORD_ERROR").innerHTML = "Password must be 8 charcters or greater than 8 characters.";
  } else {
  document.getElementById("PASSWORD_ERROR").innerHTML = "";

}
var confirm_pswd = document.getElementById("CONFIRM_PASSWORD").value;
var CONFIRM_PassWord=confirm_pswd.toString();
if ( CONFIRM_PassWord=="") {
  document.getElementById("CONFIRM_PASSWORD_ERROR").innerHTML =
    "Please re-enter Password";
    
}

else if(CONFIRM_PassWord!=PassWord) {
  document.getElementById("CONFIRM_PASSWORD_ERROR").innerHTML = "Password Not Macthed";
}
else{
    document.getElementById("CONFIRM_PASSWORD_ERROR").innerHTML = "";
}
}