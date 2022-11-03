const d = new Date();
let day = d.getDate();
day = String(day);

const m = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];


let month = m[d.getMonth()];


let year = d.getFullYear();
year = String(year);


let result = day.concat("-", month, "-", year)
document.getElementById("result").innerHTML = result;


function addZero(i) {
    if (i < 10) { i = "0" + i }
    return i;
}

let hour = addZero(d.getHours())
let minutes = addZero(d.getMinutes())
let ampm = hour >= 12 ? 'PM' : 'AM';


let time = hour + ":" + minutes + " " + ampm;
document.getElementById("time").innerHTML = time;

function change() {
    if (document.getElementById("log").innerHTML == "Logout") {
        document.getElementById("log").innerHTML = "Login";
    }
    else {
        document.getElementById("log").innerHTML = "Logout";
    }
}



function openNav() {
    document.getElementById("mySidenav").style.width = "300px";
    document.getElementById("main").style.marginLeft = "300px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}

function validatefields() {

    //validating Party Account Number

    let partyAccountNumber = document.getElementById("accountNumber").value;
    document.getElementById('partyAccountNumber_error').innerHTML = '';

    if (!partyAccountNumber) {
        document.getElementById('partyAccountNumber_error').innerHTML = 'Please enter Account number';
    }
    else if (partyAccountNumber.length < 12 || partyAccountNumber.length > 22) {
        document.getElementById('partyAccountNumber_error').innerHTML = 'Account number should be between 12 and 22 Characters';
    }
    else if (isNaN(partyAccountNumber)) {
        document.getElementById('partyAccountNumber_error').innerHTML = ' Account number should be numeric value';
        return;
    }

    //Confirming the account number 
    let confirmaccountNumber = document.getElementById("confirmaccountNumber").value;
    document.getElementById('confirmaccountNumber_error').innerHTML = '';

    if (partyAccountNumber != confirmaccountNumber || confirmaccountNumber.length == 0) {
        document.getElementById('confirmaccountNumber_error').innerHTML = 'Account number does not match';

    }


    let partyName = document.getElementById("partyName").value;
    document.getElementById('partyName_error').innerHTML = '';

    if (partyName.length == 0) {
        document.getElementById('partyName_error').innerHTML = 'Enter Party Name';

    }



    let expenditureType = document.getElementById("expenditureType").value;
    let purposeType = document.getElementById("purposeType").value;
    let partyAmount = document.getElementById("partyAmount").value;
    let uploadfiles = document.getElementById("uploadfiles").value;

}

function search() {

    let IFSCcode = document.getElementById("IFSCcode").value;
    let pattern = /^[A-Z]{4}0[A-Z0-9]{6}$/;

    document.getElementById('IFSCcode_error').innerHTML = '';

    if (IFSCcode.length != 11) {
        document.getElementById('IFSCcode_error').innerHTML = 'IFSC code should be 11 characters';
    }
    else if ((pattern.test(IFSCcode)) == false) {

        document.getElementById('IFSCcode_error').innerHTML = 'Enter correct IFSC code';

    }
    if ((pattern.test(IFSCcode)) ) {
        document.getElementById('bankName').innerHTML = "CANARA BANK";
        document.getElementById('bankBranch').innerHTML = "Film Nagar";

    }
}


    let headOfAccount = document.getElementById("headOfAccount").value;
    document.getElementById('headOfAccount_error').innerHTML = '';


function myFunction() {
    var headOfAccount = document.getElementById("headOfAccount").value;

    if(headOfAccount== "select"){
        document.getElementById('headOfAccount_error').innerHTML = 'Select an option';
        document.getElementById("balance").innerHTML = "";
        document.getElementById("LOC").innerHTML = "";
    }
    else if(headOfAccount=="0853001020002000000NVN"){
    document.getElementById("balance").innerHTML = "1000000";
    document.getElementById("LOC").innerHTML = "5000";
    document.getElementById('headOfAccount_error').innerHTML = ' ';

    }
    else if(headOfAccount=="8342001170004001000NVN"){
        document.getElementById("balance").innerHTML = "1008340";
        document.getElementById("LOC").innerHTML = "4000";
        document.getElementById('headOfAccount_error').innerHTML = ' ';
    }
    else if(headOfAccount=="2071011170004320000NVN"){
        document.getElementById("balance").innerHTML = "14530000";
        document.getElementById("LOC").innerHTML = "78000";
        document.getElementById('headOfAccount_error').innerHTML = ' ';
    }
    else if(headOfAccount=="8342001170004002000NVN"){
        document.getElementById("balance").innerHTML = "1056400";
        document.getElementById("LOC").innerHTML = "34000";
        document.getElementById('headOfAccount_error').innerHTML = ' ';
    }
    else if(headOfAccount=="2204000030006300303NVN"){
        document.getElementById("balance").innerHTML = "123465400";
        document.getElementById("LOC").innerHTML = "5000";
        document.getElementById('headOfAccount_error').innerHTML = ' ';
    }
  }

var expenditureType={
    Capital_Expenditure:['Maintain current levels of operation within the organization','Expenses to permit future expansion'],
    Revenue_Expenditure:['Sales costs or All expenses incurred by the firm that are directly tied to the manufacture and selling of its goods or services','All expenses incurred by the firm to guarantee the smooth operation'],
    Deferred_Revenue_Expenditure:['Exorbitant Advertising Expenditures','Unprecedented Losses','Development and Research Cost'],
}

//getting the main menu and sub menu
 var main= document.getElementById('main_menu');
 var sub= document.getElementById('sub_menu');

//Trigger the event when main menu change occurs

main.addEventListener('change',function(){

    //getting a selected option
    var selected_option=expenditureType[this.value];

    //removing the sub menu options using while loop

    while(sub.options.length>0){
        sub.options.remove(0);
    }

    //convert the selected object into array & create options for each array elements
    //using option constructor it will create HTML element with given value and innerText

    Array.from(selected_option).forEach(function(el){
        let option= new Option(el,el);

        // append the child option in sub_menu
        sub.appendChild(option)
    });

});





