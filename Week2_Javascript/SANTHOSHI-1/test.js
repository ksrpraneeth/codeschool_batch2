var date = new Date();
const month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
var current_date = date.getDate() + "-" + month[date.getMonth()] + "-" + date.getFullYear();
document.getElementById("date").innerHTML = current_date;

var AM_PM = "";
var date_var = new Date();
var Curr_hour = addZero(date_var.getHours());

var expenditure = {
    'option-1' : [
        'Maintain current levels of operation within the organization',
        'Expenses to permit future expansion.'
    ],
};

// console.info('purpose', expenditure['option-1']);


function setPurpose() {
    var exp = document.getElementById("head-of-ac").value;
    var purpose = expenditure[exp];
    console.info('test', purpose);
}

function addZero(i){
    if (i<10){i = "0"+i}
    return i;
}

if (Curr_hour < 12) {
    AM_PM = "AM";
}
else {
    AM_PM = "PM";
}
if (Curr_hour == 0) {
    Curr_hour = 12;
}
if (Curr_hour > 12) {
    Curr_hour = Curr_hour - 12;
}
var curr_min = addZero(date_var.getMinutes());
var Time =(Curr_hour + ":" + curr_min + " " + AM_PM);
document.getElementById("Time").innerHTML = Time;

function textChange() {
    var logButton = document.getElementsByClassName("LogButtonText")[0];
    if (logButton.textContent === "LOGOUT") {
        logButton.textContent = "LOGIN";
    } else {
        logButton.textContent = "LOGOUT";
    }

}

function Next() {
    var Acc = document.getElementById('Acc').value;
    var Accnomsg = document.querySelector(".accountno .errormsg");
    if (isNaN(Acc) === false) {
        console.log("Account number is invalid");
        Accnomsg.style.display = "block";
    }
    if ((Acc.length >= 12) && (Acc.length <= 22)) {
        Accnomsg.style.display = "none";
    }

    var Acc = document.getElementById('confirm').value;
    var Accnomsg = document.querySelector(".confirmaccountno .errormsg");
    if (isNaN(Acc) === false) {
        console.log("Account number is invalid");
        Accnomsg.style.display = "block";
    }
    if ((Acc.length >= 12) && (Acc.length <= 22)) {
        Accnomsg.style.display = "none";
    }

    var IFSC = document.getElementById('ifsc').value;
    var IFSCerrorspan = document.querySelector(".IFSCcode .errormsg");
    if (IFSC.length == 11) {
        IFSCerrorspan.style.display = "none";
    } else {
        IFSCerrorspan.style.display = "block";
    }
    // $.validator.addMethod("ifsc", function(value, element) {
    //     var reg = /^[A-Z]{5}[0-9]{6,7}$/;
    //     if (this.optional(element)) {
    //       console.log(value);
    //       console.log(element);
    //       return true;                                                
    //     }
    //     if (value.match(reg)) {
    //       return true;
    //     } else {
    //       return false;
    //     }

    var purpose = document.getElementById('Purpose').value;
    var Purposeerrorspan = document.querySelector(".purpose .errormsg");
    if (purpose.length >= 500) {
        Purposeerrorspan.style.display = "block";
    }
    //  else{
    //     Purposeerrorspan.style.display = "block";
    // }
    // function Multiplefiles() {
    //     let files = document.getElementById("uploadfiles").files;
    //     for (let i=0; i<files.length; i++){
    //         document.getElementById("uploaddocs").innerhtml += "<li class='list-group-item'>" + files[i].name+ "</li>"
    //     }
    // }




}