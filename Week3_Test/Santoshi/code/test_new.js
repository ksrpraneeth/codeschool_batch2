function validation() {
//   confirm();
  var Confirm = document.getElementById("confirm").value;
  if (Confirm.length < 8) {
    document.getElementById("confm").textContent = "Use 8 or more characters with a mix of letters, numbers & symbols";
  }else{
    document.getElementById("confm").textContent = "";
  }
}

function usernameValidation() {
  var regex = /^[A-Za-z0-9 ]+$/;
  var isValid = regex.test(document.getElementById("username").value);
  if (!isValid) {
    document.getElementById("usernameValidationSpan").textContent = "You can enter letters,numbers & periods";
  }else{
    document.getElementById("usernameValidationSpan").textContent = "";
  }
}
