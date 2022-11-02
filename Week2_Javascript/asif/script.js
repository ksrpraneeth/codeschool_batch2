// miscallenous functions
function containsSpecialChars(str) {
    const specialChars = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
    return specialChars.test(str);
}



// code for displaying current date and time
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




// code for user login and logout 
let userLoginButton = document.getElementById("user-login");

userLoginButton.addEventListener("click", function() {
    if(userLoginButton.innerHTML == "Logout") {
        userLoginButton.innerHTML = "Login";
    }
    else {
        userLoginButton.innerHTML = "Logout";
    }
});



// code for form validation
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
    
    // for party account number
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

    // for confirm party account number
    var confirmPartyAcNo = document.getElementById("confirm-party-ac-no").value;
    if(confirmPartyAcNo.length == 0) {
        setError("confirm-party-ac-no", "*required");
        returnval = false;
    }
    else if(partyAcNo != confirmPartyAcNo) {
        setError("confirm-party-ac-no", "*Account number doesn't match");
        returnval = false;
    }

    // for party name
    var partyName = document.getElementById("party-name").value;
    if(containsSpecialChars(partyName)) {
        setError("party-name", "*Should not have special characters");
        returnval = false;
    }
    else if(partyName.length == 0) {
        setError("party-name", "*required");
        returnval = false;
    }

    // for bank ifsc code
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
        // else if(containsSpecialChars(ifscCode.substr(5, 10))) {
        //     setError("ifsc-code", "*Last six characters should be numeric or alphabets only");
        //     returnval = false;
        // }

    }



    // for purpose
    var purpose = document.getElementById("purpose").value;
    if(purpose.length > 500) {
        setError("purpose", "*Max 500 characters allowed");
        returnval = false;
    }
    else if(purpose.length == 0) {
        setError("purpose", "*required");
        returnval = false;
    }

    // for party amount in rs
    var partyAmount = document.getElementById("party-amount").value;
    if(partyAmount%1 != 0) {
        setError("party-amount", "*Should not be in fractions");
        returnval = false;
    }    

    return returnval;
}



// for head of account - balance - loc
document.getElementById("head-of-ac").addEventListener("change", function() {
    const headOfAcs = [
        ["0853001020002000000NVN", 1000000, 5000],
        ["8342001170004001000NVN", 1008340, 4000],
        ["2071011170004320000NVN", 14530000, 78000],
        ["8342001170004002000NVN", 1056400, 34000],
        ["2204000030006300303NVN", 123465400, 5000]
    ];
    
    var headOfAcSelectedOption = document.getElementById("head-of-ac").value;
    for(let headOfAcsItems of headOfAcs) {
        for(let items of headOfAcsItems) {
            if(headOfAcSelectedOption == items){
                document.getElementById("bal-in-rs").value = headOfAcsItems[1];
                document.getElementById("loc-in-rs").value = headOfAcsItems[2];
            }
        }
    }
});



// for expenditure type and purpose type
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
            // let option1 = new Option(item[1], item[1]);
            // // let option2 = new Option(item[2], item[2]);
            // const purposeType = document.getElementById('purpose-type'); 
            // purposeType.add(option1, undefined);
            // // purposeType.add(option2, undefined);
        }
    }


});





// code for sidebar toggle
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

