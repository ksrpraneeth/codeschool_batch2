
var today = new Date();
var day = today.getDay();
var daylist = ["Sunday", "Monday", "Tuesday", "Wednesday ", "Thursday", "Friday", "Saturday"];
var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
var dateTime = date + ' ' + time;

document.getElementById("dt").innerHTML = dateTime + ' <br>';

//logout
function change() {
    if (document.getElementById('logout').innerHTML == "LOGOUT") {
        document.getElementById('logout').innerHTML = "LOGIN";

    }
    else {
        document.getElementById('logout').innerHTML = "LOGOUT";

    }

}
//party number
function validation() {
    var partyNO = document.getElementById('partyNo').value;
    if (!partyNO) {
        document.getElementById('party').innerHTML = "please enter party number";
    }
    else if (partyNO.length < 12 || partyNO.length > 22) {
        document.getElementById('party').innerHTML = " in valid party number";

    }
    else if (isNaN(partyNO)) {
        document.getElementById('party').innerHTML = " party number should be number.";

    }
    else {
        document.getElementById('party').innerHTML = " ";

    }


    // console.log("partyNO: " + partyNO);
    //confirm party number
    var confirm = document.getElementById('confirm').value;
    if (!confirm) {
        document.getElementById('con').innerHTML = " confirm accout no cann't blank.";
    }
    else if (partyNO != confirm) {
        document.getElementById('con').innerHTML = " confirm should same as party number";

    }
    else {
        document.getElementById('con').innerHTML = " ";
    }
    // party name
    var party_name = document.getElementById('party_name').value;
    let spChars = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
    if (!party_name) {
        document.getElementById('party_name_valid').innerHTML = " enter the party name";

    }
    else if (spChars.test(party_name)) {
        document.getElementById('party_name_valid').innerHTML = " party no.shouldn't contain any special character";

    }
    else {
        document.getElementById('party_name_valid').innerHTML = " ";
    }
    //ifsc validation
    let ifscCode = document.getElementById('ifsc_code').value;
    let first_four = ifscCode.substr(0, 4);
    let fifth_char = ifscCode[4];

    if (!ifscCode) {
        document.getElementById('ifsc_valid').innerHTML = " enter the ifsc_code";
    }

    else if (ifscCode.length < 11) {
        document.getElementById('ifsc_valid').innerHTML = "it should be 11 character long";
    }
    else if (first_four != first_four.toUpperCase()) {
        document.getElementById('ifsc_valid').innerHTML = "it first four should be upper case";
    }
    else if (fifth_char != 0) {
        document.getElementById('ifsc_valid').innerHTML = "the fifth character should be zero";

    }
    else {
        document.getElementById('ifsc_valid').innerHTML = " ";
    }
    //head account validation
    let headAccount = document.getElementById('head_account').value;
    if (!headAccount) {
        document.getElementById('hd').innerHTML = "plz enter head account";
    }
    else {
        document.getElementById('hd').innerHTML = "";
    }
    //purpose validatoon
    var purpose = document.getElementById('purpose').value;
    console.log('purpose')
    if (!purpose) {
        document.getElementById('pur').innerHTML = "plz enter purpose";
    }
    else if (purpose.length > 500) {
        document.getElementById('pur').innerHTML = "max 500 character allow";
    }
    else {
        document.getElementById('pur').innerHTML = "";
    }
    // party ammount vallidation
    let p_ammount = document.getElementById('p_ammount').value;
    console.log('p_ammount')
    if (!p_ammount) {
        document.getElementById('amt').innerHTML = "plz enter party ammount";
    }

    else if (isNaN(p_ammount)) {
        document.getElementById('amt').innerHTML = " party number should be number.";
    }
    else {
        document.getElementById('amt').innerHTML = "";
    }


}

function Scheck() {
    let ifscCode = document.getElementById('ifsc_code').value;
    let first_four = ifscCode.substr(0, 4);
    let fifth_char = ifscCode[4];
    console.log('ifscCode')
    if (ifscCode == 'SBIN0444555') {
        document.getElementById('bank_name').innerHTML = "SBIBANK";
        document.getElementById('bank_branch').innerHTML = "Bhubaneswar";
    }

    else if (!ifscCode) {
        document.getElementById('ifsc_valid').innerHTML = " enter the ifsc_code";
    }
    else if (first_four != first_four.toUpperCase()) {
        document.getElementById('ifsc_valid').innerHTML = "it first four should be upper case";
    }

    else if (fifth_char != 0) {
        document.getElementById('ifsc_valid').innerHTML = "the fifth character should be zero";

    }
    else if (ifscCode.length < 11) {
        document.getElementById('ifsc_valid').innerHTML = "it should be 11 character long";
    }
    else if (/[0-9]/.test(first_four)) {
        document.getElementById('ifsc_valid').innerHTML = "the fIrst four digit should be alphabet";
    }
    else {
        document.getElementById('ifsc_valid').innerHTML = " ";
    }


}
function autofill() {
    let headAccount = document.getElementById('head_account').value;
    console.log(' headAccount')
    if (headAccount == '0853001020002000000NVN') {
        document.getElementById('bal').innerHTML = "1000000";
        document.getElementById('loc').innerHTML = "5000";
    }
    else if (headAccount == '8342001170004001000NVN') {
        document.getElementById('bal').innerHTML = "1008340";
        document.getElementById('loc').innerHTML = "4000";
    }
    else if (headAccount == '2071011170004320000NVN') {
        document.getElementById('bal').innerHTML = "14530000";
        document.getElementById('loc').innerHTML = "780000";
    }
    else if (headAccount == '8342001170004002000NVN') {
        document.getElementById('bal').innerHTML = "1056400 ";
        document.getElementById('loc').innerHTML = " 34000";
    }
    else if (headAccount == '2204000030006300303NVN') {
        document.getElementById('bal').innerHTML = " 123465400";
        document.getElementById('loc').innerHTML = "50000";
    }
    else {

        document.getElementById('hd').innerHTML = ""; s
    }
}
//expt type...
function fill() {
    let exp = document.getElementById('exp_type').value;
    console.log('exp')
    if (exp == 'Capital Expenditure') {
        document.getElementById('cap1').innerHTML = " Maintain current levels of operation within the organization"
        document.getElementById('cap2').innerHTML = " Expenses to permit future expansion"
    }
    if (exp == 'Capital Expenditure') {
        document.getElementById('cap1').innerHTML = " Maintain current levels of operation within the organization"
        document.getElementById('cap2').innerHTML = " Expenses to permit future expansion"
    }
    if (exp == 'Revenue Expenditure') {
        document.getElementById('cap1').innerHTML = " Sales costs or All expenses incurred by the firm"
        document.getElementById('cap2').innerHTML = "All expenses incurred by the firm to guarantee the smooth operation. "
    }
    if (exp == 'Deferred Revenue Expenditure') {
        document.getElementById('cap1').innerHTML = "Exorbitant Advertising Expenditures"
        document.getElementById('cap2').innerHTML = "Unprecedented Losses"
    }
}

let cD = document.getElementById('NavBar');
let D = cD.className;
console.log(cD);
function changes() {
    cE = document.getElementById('NavBar');
    cF = document.getElementById('rightOne');
    if (D == cE.className) {
        cE.className = 'col-md-3 col-xs-3 d1';
        cF.className = 'col-md-9 col-xs-9 d2';
    }
    else {
        cE.className = 'col-md-3 col-xs-3 d-none d1';
        cF.className = 'col-md-12 col-xs-9 d2';
    }
}
//part amount into words