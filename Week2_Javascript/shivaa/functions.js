
const date = new Date();

function getCurrentDate() {
    const month = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
    return date.getDate()+'-'+month[date.getMonth()]+'-'+date.getFullYear();
}
function getCurrentTime() {
    let hours = date.getHours() > 12 ? date.getHours() - 12 : date.getHours();
    let am_pm = date.getHours() >= 12 ? "PM" : "AM";
    return hours + ":" + date.getMinutes() + " " + am_pm;
}

let currentDate =  getCurrentDate();
let currentTime = getCurrentTime();

document.getElementById("current-date").innerHTML = currentDate;
document.getElementById("current-time").innerHTML = currentTime;

function textChange() {
    var logButton = document.getElementsByClassName("LogButtonText")[0];
    if (logButton.textContent === "LOGOUT") {
        logButton.textContent = "LOGIN";
    } else {
        logButton.textContent = "LOGOUT";
    }

}

function clearErrors() {
    let errors = document.getElementsByClassName('error-msg');
    for(let item of errors)
    {
        item.innerHTML = "";
    }
}
function setError(id, error) {
    let element = document.getElementById(id).nextElementSibling;
    element.innerHTML = error;
}

function validateForm() {
    var returnval = true;
    clearErrors();
    
    var partyAcNo = document.getElementById("party-ac-no").value;

   
    if(partyAcNo.length == 0) {
        console.log('hy');
        setError("party-ac-no", "*mandatory");
        returnval = false;
    }
    else if(isNaN(partyAcNo) == true) {
        setError("party-ac-no", "*Should only contain numbers");
        returnval = false;
    }
    else if (partyAcNo.length < 12 || partyAcNo.length > 22) {
        setError("party-ac-no", "*Should be min 12 and max 22 digits");
        returnval = false;
    }
    else if(partyAcNo.startsWith("-") || partyAcNo.startsWith("+")) {
        setError("party-ac-no", "*Not valid");
        returnval = false;
    }

var confirmPartyAcNo = document.getElementById("confirm-party-ac-no").value;
if(confirmPartyAcNo.length == 0) {

    setError("confirm-party-ac-no", "*mandatory");
    returnval = false;
}
else if(partyAcNo != confirmPartyAcNo) {
    setError("confirm-party-ac-no", "*Account number doesn't match");
    returnval = false;
}
function SpecialChars(str) {
    const specialChars = /[`!&=\[\]{};':"\\|,*()_@#$%^+\-.<>\/?~]/;
    return specialChars.test(str);
}

var partyName = document.getElementById("party-name").value;

console.log(partyName)
if(SpecialChars(partyName)) {
    setError("party-name", "*Should not have special characters");
    returnval = false;
}
else if(partyName.length == 0) {
    setError("party-name", "*mandatory");
    returnval = false;
}


var purpose = document.getElementById("purpose").value;
if(purpose.length > 500) {
    setError("purpose", "*Max 500 characters allowed");
    returnval = false;
}
else if(purpose.length == 0) {
    setError("purpose", "*mandatory");
    returnval = false;
}

var partyAmount = document.getElementById("party-amount").value;
if(partyAmount%1 != 0) {
  

    setError("party-amount", "*Should not be in fractions");

    returnval = false;
}    

return returnval;





}

