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


//const hamberger = document.getElementById('click_hambergur');
//hamberger.onclick = function(){
// var x=document.getElementById('side_Nav');
//if (x.classList.contains('open_sidebar'))
// {
//   x.classList.remove('open_sidebar');
//   x.classList.add('close_sidebar');
// } else 
// {
//   x.classList.add('open_sidebar');
//  x.classList.remove('close_sidebar');
// }
//}



// Validation part
let partyAccount = document.getElementById('party_Ac').value;
let confirmAcount = document.getElementById("party_C");
var errorArray = [];
function validateform() {

  errorArray = []
  validatepartyAccount()
  validateconfirmAcount()
  validatepartyName()


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
    document.getElementById('error_Ifsc').innerHTML = " it should be 11 characters only"


  }
  else if (ptr.test(ifscCode) == false) {
    document.getElementById('error_Ifsc').innerHTML = "Please Enter Following Format  **Enter correct ifsc code in valid format **ABCD0aB2458"
  }



if (ptr.test(ifscCode)) {
  console.log('ptr.test(ifscCode)')
  document.getElementById('Bank_Name').innerHTML = "Kotak bank"
  document.getElementById('Bank_Branch').innerHTML = "Banjara hills"

}
}