window.onload = function () {

  var today = new Date();
  var month = today.toLocaleString('default', { month: 'short' });
  var date = today.getDate() + '-' + (month) + '-' + today.getFullYear();
  var hours = today.getHours();
  var minutes = today.getMinutes();
  var ampm = hours >= 12 ? 'pm' : 'am';
  hours = hours % 12;
  hours = hours ? hours : 12;
  minutes = minutes < 10 ? '0' + minutes : minutes;
  var strTime = hours + ':' + minutes + ' ' + ampm


  document.getElementById('currentTime').innerHTML = date + '<br>' + strTime

}



const partyName = document.getElementById('party_Name');

const bankIfsc = document.getElementById('Bank');

const purposeType = document.getElementById('Purpose_type');

const payAmount = document.getElementById('pay_Amount');

//login

function login() {
  if (document.getElementById("out").innerHTML == "Logout") {

    document.getElementById("out").innerHTML = "Login"

  }
  else {

    document.getElementById("out").innerHTML = "Logout"


  }
}


//toggle

function toggleSidebar(){
  console.log('ref')
  document.getElementById("sidebar").classList.toggle('active');
  console.log('sidebar '+document.getElementById("sidebar"))
  console.log('classList.toggle '+document.getElementById("sidebar").classList.toggle('active'))
}





// let hamberger = document.getElementById('click_hambergur');
// hamberger.onclick= function(){
//  var x=document.getElementById('side_Nav');
// if (x.classList.contains('open_sidebar'))
//  {
//    x.classList.remove('open_sidebar');
//    x.classList.add('close_sidebar');
//  } else 
//  {
//    x.classList.add('open_sidebar');
//   x.classList.remove('close_sidebar');
//  }
// }



// Validation part
let partyAccount = document.getElementById('party_Ac').value;
let confirmAcount = document.getElementById("party_C");
var errorArray = [];
function validateform() {

  errorArray = []
  validatepartyAccount()
  validateconfirmAcount()
  validatepartyName()
  validatePurpose()
  Expenditure()

  errorArray.map(each => {
    error += each
  })
  document.getElementById("outPut").innerHTML = errorArray;
  console.log(error)
  console.log(errorArray)
}


document.getElementById("form").addEventListener('submit', function (e) {
  console.log('here');
  // e.preventDefault();
  validateform()
  // onClickSearch()

});



var error = ""



function validatepartyAccount() {

  let partyAccount = document.getElementById('party_Ac').value;

  if (!partyAccount) {

    errorArray.push("**Enter Account No");
  }
  if ((partyAccount.length <= 12) || (partyAccount.length >= 22)) {

    errorArray.push("**A/C no  be between 12 and 22 digits");
  }
  if (isNaN(partyAccount)) {
    errorArray.push("**A/c number should be numbers only");

  }



}

function validateconfirmAcount() {

  let confirmAcount = document.getElementById("party_C").value;


  if (!confirmAcount) {

    errorArray.push("**Enter Confirm Account No");
  }
  if (confirmAcount != partyAccount) {
    errorArray.push("**Confirm Account Num is should match with party");

  }


}


function validatepartyName() {

  let partyName = document.getElementById("party_N").value;


  if (!partyName) {

    errorArray.push("**Enter Party name");

  }


  let pattern = /^[a-zA-Z0-9]{2,30}$/;
  if (pattern.test(partyName) == false)
    errorArray.push("Party Name should not be Special Charaters")

}


function search() {

  let ifscCode = document.getElementById("Bank").value;

  let ptr = /^[A-Z]{4}0[A-Z0-9]{6}$/;


  document.getElementById('error_Ifsc').innerHTML = "";

  if (ifscCode.length != 11) {
    document.getElementById('error_Ifsc').innerHTML="it should be 11 characters only";
  }
  else if (ptr.test(ifscCode) == false) {
    document.getElementById('error_Ifsc').innerHTML = "Please Enter Following Format  **Enter correct ifsc code in valid format **ABCD0aB2458";
  }



  if (ptr.test(ifscCode)) {
    console.log('ptr.test(ifscCode)')
    document.getElementById('bankName').innerHTML = "Kotak bank"
    document.getElementById('Branch').innerHTML = "Banjara hills"

  }
}

function myFunction() {
  var headOfAccount = document.getElementById("headAc").value;

  if (headOfAccount == "select") {
    document.getElementById('headOfAc_error').innerHTML = 'Select an option';
    document.getElementById("Balance").innerHTML = "";
    document.getElementById("LOC").innerHTML = "";
  }
  else if (headOfAccount == "0853001020002000000NVN") {
    document.getElementById("Balance").innerHTML = "1000000";
    document.getElementById("LOC").innerHTML = "5000";
    document.getElementById('headOfAc_error').innerHTML = ' ';

  }
  else if (headOfAccount == "8342001170004001000NVN") {
    document.getElementById("Balance").innerHTML = "1008340";
    document.getElementById("LOC").innerHTML = "4000";
    document.getElementById('headOfAc_error').innerHTML = ' ';
  }
  else if (headOfAccount == "2071011170004320000NVN") {
    document.getElementById("Balance").innerHTML = "14530000";
    document.getElementById("LOC").innerHTML = "78000";
    document.getElementById('headOfAc_error').innerHTML = ' ';
  }
  else if (headOfAccount == "8342001170004002000NVN") {
    document.getElementById("Balance").innerHTML = "1056400";
    document.getElementById("LOC").innerHTML = "34000";
    document.getElementById('headOfAc_error').innerHTML = ' ';
  }
  else if (headOfAccount == "2204000030006300303NVN") {
    document.getElementById("Balance").innerHTML = "123465400";
    document.getElementById("LOC").innerHTML = "5000";
    document.getElementById('headOfAc_error').innerHTML = ' ';
  }
}


function Expenditure()
{
  var  Expenditures  = document.getElementById("drp").value;
  if (!Expenditures){
    errorArray.push("Please enter Purpose");
  }

  if (Expenditures=='Capital_Expenditure'){
    document.getElementById('capE').innerHTML="Maintain current levels of operation within the organization";
    document.getElementById('capE2').innerHTML="Expenses to permit future expansion";
  }
  if (Expenditures=='Revenue_Expenditure'){
    document.getElementById('capE').innerHTML="Sales costs or All expenses incurred by the firm that are directly tied to the manufacture and selling of its goods or services";
    document.getElementById('capE2').innerHTML=" All expenses incurred by the firm to guarantee the smooth operation.";
  }
  if (Expenditures=='Deferred_Revenue_Expenditure'){
    document.getElementById('capE').innerHTML="Exorbitant Advertising Expenditures";
    document.getElementById('capE2').innerHTML="Unprecedented Losses";
    document.getElementById('capE3').innerHTML="Development and Research Cost";
  }

}




function validatePurpose() {

  let purpose = document.getElementById('Purpose').value;


  if (!purpose) {
    errorArray.push("Please enter Purpose");
  }
  if (purpose.length > 500) {
    errorArray.push("Maximum Characters shuld be in 500");
  }
}


function numbers() {

let input = document.getElementById('pay_Amount')
let outPut=  document.getElementById('In_words')
outPut.innerText = numberToWords.toWords(input.value)

}