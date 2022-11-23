function containsSpecialChars(str) {
    const specialChars = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
    return specialChars.test(str);
}

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

let userLoginButton = document.getElementById("user-login");

userLoginButton.addEventListener("click", function() {
    if(userLoginButton.innerHTML == "Logout") {
        userLoginButton.innerHTML = "Login";
    }
    else {
        userLoginButton.innerHTML = "Logout";
    }
});

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

function validateIfsc() {
    let returnval = true;
    clearErrors();

    var ifscCode = document.getElementById("ifsc-code").value;
    if(ifscCode.length == 0) {
        setError("ifsc-code", "*required");
        returnval = false;
    }
    else if(ifscCode.length != 11) {
        setError("ifsc-code", "*Should be of 11 characters only");
        returnval = false;
    }
    else {
        for(let i=0; i<4; i++) {
            if((/[A-Z]/).test(ifscCode[i]) == false) {
                setError("ifsc-code", "*First four characters should be uppercase alphabets only");
                returnval = false;
            }         
        }
        if(ifscCode[4] != "0") {
            setError("ifsc-code", "*Fifth character should be zero only");
            returnval = false;
        }
        else if(containsSpecialChars(ifscCode.substr(5, 10)) || (/[a-z]/).test(ifscCode.substr(5, 10)) ) {
            setError("ifsc-code", "*Last six characters should be numeric or uppercase alphabets only");
            returnval = false;
        }
    }
    return returnval;
}

document.getElementById("search-ifsc").addEventListener("click", function() {
    const bankNameslist = [
        {"name": "HDFC Bank", "branch": "Hasthinapuram Branch"},
        {"name": "State Bank Of India", "branch": "LB Nagar Branch"},
        {"name": "ICICI Bank", "branch": "Attapur Branch"},
        {"name": "Union Bank of India", "branch": "Uppal Branch"},
        {"name": "Bank of Baroda", "branch": "Film Nagar Branch"},
        {"name": "Axis Bank", "branch": "Nagole Branch"},
    ];
    let isIfscValid = validateIfsc();
    if(isIfscValid) {
        let x = Math.floor((Math.random() * bankNameslist.length));
        document.getElementById("bank-name").value = bankNameslist[x].name;
        document.getElementById("bank-branch").value = bankNameslist[x].branch;
    }
});


function validateForm() {
    var returnval = true;
    clearErrors();
    
    returnval = validateIfsc();

    var partyAcNo = document.getElementById("party-ac-no").value;
    if(partyAcNo.length == 0) {
        setError("party-ac-no", "*required");
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
        setError("confirm-party-ac-no", "*required");
        returnval = false;
    }
    else if(partyAcNo != confirmPartyAcNo) {
        setError("confirm-party-ac-no", "*Account number doesn't match");
        returnval = false;
    }
    var partyName = document.getElementById("party-name").value;
    if(containsSpecialChars(partyName)) {
        setError("party-name", "*Should not have special characters");
        returnval = false;
    }
    else if(partyName.length == 0) {
        setError("party-name", "*required");
        returnval = false;
    }

    var hod = document.getElementById("head-of-ac").value;
    if(hod == "") {
        setError("head-of-ac", "*required");
        returnval = false;
    }

    var expType = document.getElementById("expenditure-type").value;
    if(expType == "") {
        setError("expenditure-type", "*required");
        returnval = false;
    }

    var purposeType = document.getElementById("purpose-type").value;
    if(purposeType == "") {
        setError("purpose-type", "*required");
        returnval = false;
    }

    var purpose = document.getElementById("purpose").value;
    if(purpose.length > 500) {
        setError("purpose", "*Max 500 characters allowed");
        returnval = false;
    }
    else if(purpose.length == 0) {
        setError("purpose", "*required");
        returnval = false;
    }

    var partyAmount = document.getElementById("party-amount").value;
    if(partyAmount == 0) {
        setError("party-amount", "*required");
        returnval = false;
    }
    else if(partyAmount%1 != 0) {
        setError("party-amount", "*Should not be in fractions");
        returnval = false;
    }    

    return returnval;
}


document.getElementById("head-of-ac").addEventListener("change", function() {
    const headOfAcs = [
        {"hod": "0853001020002000000NVN", "bal": "1000000", "loc": "5000"},
        {"hod": "8342001170004001000NVN", "bal": "1008340", "loc": "4000"},
        {"hod": "2071011170004320000NVN", "bal": "14530000", "loc": "78000"},
        {"hod": "8342001170004002000NVN", "bal": "1056400", "loc": "34000"},
        {"hod": "2204000030006300303NVN", "bal": "123465400", "loc": "5000"}
    ];
    
    let headOfAcSelectedOption = document.getElementById("head-of-ac").value;
    
    let getObj = headOfAcs.find(x => x.hod === headOfAcSelectedOption);
    
    document.getElementById("bal-in-rs").value = getObj.bal;
    document.getElementById("loc-in-rs").value = getObj.loc;
});


function clearOptions() {
    const purposeType = document.getElementById('purpose-type');
    while (purposeType.options.length > 1) {
        purposeType.remove(1);
    }
}

document.getElementById("expenditure-type").addEventListener("change", function() {
    clearOptions();
    const expenditureTypes = [
        ["Capital Expenditure", "Maintain current levels of operation within the organization.", "Expenses to permit future expansion."],
        ["Revenue Expenditure", "Sales costs or All expenses incurred by the firm that are directly tied to the manufacture and selling of its goods or services.", "All expenses incurred by the firm to guarantee the smooth operation."],
        ["Deferred Revenue Expenditure", "Exorbitant Advertising Expenditures.", "Unprecedented Losses.", "Development and Research Cost."]
    ];

    var expTypeSelectedOption = document.getElementById("expenditure-type").value;
    for(let item of expenditureTypes) {
        if(expTypeSelectedOption == item[0]){
            let i = 1;
            while(i < item.length) {
                let newOption = new Option(item[i], item[i]);
                const purposeType = document.getElementById('purpose-type'); 
                purposeType.add(newOption, undefined);
                i++;
            }
        }
    }
});


const toggleButton = document.getElementById("side-nav-button");

toggleButton.addEventListener("click", function() {
    let sidebarWidth = document.getElementById("sidebar").offsetWidth;
    if(sidebarWidth == 0) {
        document.getElementById("sidebar").style.width = "300px";
        document.getElementById("main-section").style.marginLeft = "calc(300px + 1em)";
        document.getElementById("header-bg").style.marginLeft = "300px";
    }
    else {
        document.getElementById("sidebar").style.width = "0";
        document.getElementById("main-section").style.marginLeft = "1em";
        document.getElementById("header-bg").style.marginLeft = "0";
    }
});