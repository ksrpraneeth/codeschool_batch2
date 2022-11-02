var date = new Date();
const month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
var current_date = date.getDate() + "-" + month[date.getMonth()] + "-" + date.getFullYear();
document.getElementById("date").innerHTML = current_date;

let d = new Date().toLocaleString([], { hour12: true, hour: 'numeric', minute: 'numeric' })
document.getElementById('Time').innerHTML = d;

function textChange() {
    var logButton = document.getElementsByClassName("LogButtonText")[0];
    if (logButton.textContent === "LOGOUT") {
        logButton.textContent = "LOGIN";
    } else {
        logButton.textContent = "LOGOUT";
    }
}

var expenditure = {
    'option-1': [
        'Maintain current levels of operation within the organization',
        'Expenses to permit future expansion.'
    ],
    'option-2': [
        'Sales costs or All expenses incurred by the firm that are directly tied to the manufacture and selling of its goods or services',
        'All expenses incurred by the firm to guarantee the smooth operation.'
    ],
    'option-3': [
        'Exorbitant Advertising Expenditures',
        'Unprecedented Losses',
        'Development and Research Cost'
    ]
};

// console.info('purpose', expenditure['option-1']);

function setPurpose() {
    var exp = document.getElementById("exptype").value;
    var purposeTypeElement = document.getElementById("purposetype");
    if (exp === "option-1") {
        setOptions(purposeTypeElement, expenditure["option-1"]);
    } else if (exp === "option-2") {
        setOptions(purposeTypeElement, expenditure["option-2"]);
    } else if (exp === "option-3") {
        setOptions(purposeTypeElement, expenditure["option-3"]);
    } else {
        //When the option text is 'Select'
        setOptions(purposeTypeElement, []);
    }
    var purpose = expenditure[exp];
    console.info('test', purpose);
}

function setOptions(selectElement, options) {
    selectElement.innerHTML = "";
    var defaultSelectElement = document.createElement('option');
    defaultSelectElement.textContent = "Select";
    selectElement.appendChild(defaultSelectElement);

    for (var i = 0; i < options.length; i++) {
        var current_option = document.createElement('option');
        current_option.textContent = options[i];
        selectElement.appendChild(current_option);
    }
}



// function resetErrorMsgs() {
//    var err = document.getElementsByClassName('errormsg');
//    for()
// }
function Next() {
    resetErrorMsgs();
    var Acc = document.getElementById('Acc').value;
    var Accnomsg = document.querySelector(".accountno .errormsg");
    if (isNaN(Acc) === false) {
        console.log("Should be min 12 and max 22 digit");
        Accnomsg.style.display = "block";
    }
    if ((Acc.length >= 12) && (Acc.length <= 22)) {
        Accnomsg.style.display = "none";
    }

    var Acc = document.getElementById('confirm').value;
    var Accnomsg = document.querySelector(".confirmaccountno .errormsg");
    if (isNaN(Acc) === false) {
        console.log("Should be same as account number");
        Accnomsg.style.display = "block";
    }
    if ((Acc.length >= 12) && (Acc.length <= 22)) {
        Accnomsg.style.display = "none";
    }

    var IFSC = document.getElementById('ifsc').value;
    // var IFSCerrorspan = document.querySelector(".IFSCcode .errormsg");
    if (IFSC.length != 11) {
        document.getElementById('ifsc_err').textContent= 'IFSC code should be 11 characters';
        // IFSCerrorspan.style.display = "block";
    } 
    else if(!IFSC.match('^[A-Z]{4}0[A-Z0-9]{6}$')) {
        // IFSCerrorspan.style.display = "block";
        document.getElementById('ifsc_err').textContent = 'IFSC code is Invalid';
    }
    

    var purpose = document.getElementById('Purpose').value;
    var Purposeerrorspan = document.querySelector(".purpose .errormsg");
    if (purpose.length >= 500) {
        Purposeerrorspan.style.display = "block";
    }
    else {
        Purposeerrorspan.style.display = "none";
    }
    var partyAmount = document.getElementById("Partyamount").value;
    var partyamtspan = document.querySelector(".partyamount .errormsg");
    if (partyAmount % 1 != 0) {
        partyamtspan.style.display = "block";
    }
    // else {
    //     partyamtspan.style.display = "none";
    // }


}