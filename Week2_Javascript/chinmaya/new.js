//javascript for date
const d = new Date();
const day = d.getDate();

const month = d.getMonth();
const month_name = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];
const year = d.getFullYear();
console.log(day + '-' + month_name[month] + '-' + year);
const date = day + '-' + month_name[month] + '-' + year;
document.getElementById('date').innerHTML = date;
//javascript for time
document.getElementById('time').innerHTML = d.toLocaleTimeString();
//function for drop profilr drop down list
function drop() {
    document.getElementById("userDrop").classList.toggle("show");
  
  }

//function for change the logout
console.log(document.getElementById('but').innerHTML);

function update() {
  if (document.getElementById('but').innerHTML == "LOGIN") {
    document.getElementById('but').innerHTML = "LOGOUT"
  }
  else {
    document.getElementById('but').innerHTML = "LOGIN"
  }
}

    //cheacking the bank iffsc details

function Search() {
    let iffscCode = document.getElementById('iffsc').value;
    console.log(iffscCode)
    let firstFour = iffscCode.slice(0, 5);
    let fifthCharacter = iffscCode[4];
    let firstFour1 = iffscCode.slice(0, 4);
    if (!iffscCode) {
        document.getElementById('iffscCodeError').innerHTML = 'IFFSC code can not be blank';
      }
      else if (iffscCode.length != 11) {
        document.getElementById('iffscCodeError').innerHTML = 'IFFSC code should 11 character';
      }
      else if (firstFour != firstFour.toUpperCase()) {
        document.getElementById('iffscCodeError').innerHTML = 'First five character should be upper';
      }
      else if (/[0-9]/.test(firstFour1)) {
        document.getElementById('iffscCodeError').innerHTML = 'IFFSC code first five can not be number';
      }
      else if (fifthCharacter != 0) {
        document.getElementById('iffscCodeError').innerHTML = 'cheack the 5th character';
      }
      else {
        document.getElementById('iffscCodeError').innerHTML = '';
      }
    if (iffscCode == '') {
      document.getElementById('bankName').innerHTML = 'ENTER IFFSC CODE';
      document.getElementById('bankBranch').innerHTML = 'ENTER IFFSC CODE';
    }
    else if (!iffscCode == false && (fifthCharacter != 0) == false && (/[0-9]/.test(firstFour1)) == false && (iffscCode.length != 11) == false && (firstFour != firstFour.toUpperCase()) == false) {
      document.getElementById('bankName').innerHTML = 'CANARA BANK';
      document.getElementById('bankBranch').innerHTML = 'jUBLIE HILLS,HYDERABD';
    }
  
    else {
      document.getElementById('bankName').innerHTML = 'WRONG IFFSC CODE';
      document.getElementById('bankBranch').innerHTML = 'WRONG IFFSC CODE';
    }
  
  }

  //function for head of account
  function purpose(){
    document.getElementById('headOfaccounterror').innerHTML='';
    //head of account details
    let headOfaccount = document.getElementById('headAccount').value;
    console.log(headOfaccount);
    if (headOfaccount.slice(0, 4) == 0853) {
      document.getElementById('headBalance').innerHTML = '1000000';
      document.getElementById('headLoc').innerHTML = '5000';
    }
  
    else if (headOfaccount.slice(0, 4) == 8342) {
      document.getElementById('headBalance').innerHTML = '1008340';
      document.getElementById('headLoc').innerHTML = '4000';
    }
    else if (headOfaccount.slice(0, 4) == 2071) {
      document.getElementById('headBalance').innerHTML = '14530000';
      document.getElementById('headLoc').innerHTML = '78000';
    }
    else if (headOfaccount == 8342001170004002) {
      document.getElementById('headBalance').innerHTML = '1056400';
      document.getElementById('headLoc').innerHTML = '34000';
    }
    else if (headOfaccount.slice(0, 4) == 2204) {
      document.getElementById('headBalance').innerHTML = '123465400';
      document.getElementById('headLoc').innerHTML = '5000';
  
    }
    else {
  
      document.getElementById('headBalance').innerHTML = 'Select the head account';
      document.getElementById('headLoc').innerHTML = 'select the head account';
    }
  }

  //function for expenditure type
  function expenditure(){
    document.getElementById('Exerror').innerHTML='';
    let expenditure = document.getElementById('expenditureType').value;
    console.log(expenditure);
    if ((expenditure.slice(0, 3)) == 'Cap') {
      document.getElementById('purposetype1').innerHTML = 'Maintain current levels of operation within the organization';
      document.getElementById('purposetype2').innerHTML = 'Expenses to permit future expansion.';
    }
    else if ((expenditure.slice(0, 3)) == 'Rev') {
      document.getElementById('purposetype1').innerHTML = 'Sales costs or All expenses incurred by the firm that are directly tied to the manufacture and selling of its goods or services.';
      document.getElementById('purposetype2').innerHTML = ' All expenses incurred by the firm to guarantee the smooth operation.';
    }
    else {
      document.getElementById('purposetype1').innerHTML = 'Exorbitant Advertising Expenditures';
      document.getElementById('purposetype2').innerHTML = 'Unprecedented Losses';
      document.getElementById('purposetype3').innerHTML = 'Development and Research Cost'
    }
  }
  //function to convert into word
  function amountword(){
    document.getElementById('partyAmount').innerHTML='';
    let nToword = document.getElementById('partyAmountrs').value;
  

  if (nToword != (Math.round(nToword))) {
    document.getElementById('partyAmount').innerHTML = 'amount should not in fraction';
    document.getElementById('amountInword').innerHTML = '';
  }
  else {
    document.getElementById('partyAmount').innerHTML = '';
  }
   

    let n1 = String(nToword);

  console.log(nToword);
  if (n1.length < 9) {
    const ones = ['', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'elven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'ninteen'];
    const tenth = ['', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];

    n = ('000000000' + nToword).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
    if (!n) return; var str = '';
    str += (n[1] != 0) ? (ones[Number(n[1])] || tenth[n[1][0]] + ' ' + ones[n[1][1]]) + 'crore ' : '';
    str += (n[2] != 0) ? (ones[Number(n[2])] || tenth[n[2][0]] + ' ' + ones[n[2][1]]) + 'lakh ' : '';
    str += (n[3] != 0) ? (ones[Number(n[3])] || tenth[n[3][0]] + ' ' + ones[n[3][1]]) + 'thousand ' : '';
    str += (n[4] != 0) ? (ones[Number(n[4])] || tenth[n[4][0]] + ' ' + ones[n[4][1]]) + 'hundred ' : '';
    str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (ones[Number(n[5])] || tenth[n[5][0]] + ' ' + ones[n[5][1]]) + 'only ' : '';
    console.log(str);
    document.getElementById('amountInword').innerHTML = str.toUpperCase();

  }
  else {
    document.getElementById('amountInword').innerHTML = 'AMOUNT OVERFLOW';
  }
  }



  //validate the fields
  function set(){
    //account number validation
    var acno = document.getElementById('acno').value;
    document.getElementById('acno_error').innerHTML = '';
  
  
    if (!acno) {
      document.getElementById('acno_error').innerHTML = 'Please enter  account number!';
    }
    else if (acno.length < 12 || acno.length > 22) {
      document.getElementById('acno_error').innerHTML = 'Please enter correct account number!';
    }
    else if (isNaN(acno)) {
      document.getElementById('acno_error').innerHTML = 'acount number should be number only';
      console.log(isNaN(acno));
    }
    else {
      document.getElementById('acno_error').innerHTML = '';
    }

    //cheacking for the confirmation of account number
  document.getElementById('acno_confirm_error').innerHTML = '';
  let confirm_party_no = document.getElementById("confirmac").value;
  if (!confirm_party_no) {
    document.getElementById('acno_confirm_error').innerHTML = 'confirm account number can not be blank';
  }
  else if (acno != confirm_party_no) {
    document.getElementById('acno_confirm_error').innerHTML = 'Please enter correct confirm account number';
  }
  else {
    document.getElementById('acno_confirm_error').innerHTML = '';
  }

//iffsc code validation
let iffscCode = document.getElementById('iffsc').value;
console.log(iffscCode)


if (!iffscCode) {
  document.getElementById('iffscCodeError').innerHTML = 'IFFSC code can not be blank';
}
  //cheacking the party name 
  document.getElementById('party_name_error').innerHTML = '';
  var partyName = document.getElementById('part_name').value;
  const specialCharacter = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
  if (!partyName) {
    document.getElementById('party_name_error').innerHTML = 'Please enter party name!';
  }
  else if (specialCharacter.test(partyName)) {
    document.getElementById('party_name_error').innerHTML = 'Party name should not contain the special character';
  }
  else {
    document.getElementById('party_name_error').innerHTML = '';
  }
  console.log(partyName);

  
  //text area length validation
  let len = document.getElementById('textField').value;
  console.log(len);
  console.log(typeof len)
  console.log(len.length)
  if (len.length > 500) {
    document.getElementById('purposeEror').innerHTML = 'MAX 500 CHARACTERS';
  }
  else {
    document.getElementById('purposeEror').innerHTML = '';
  }
  //Head of account blank cheack
  let headAc = document.getElementById('headAccount').value;
  console.log(headAc)
  if(!headAc){
    document.getElementById('headOfaccounterror').innerHTML='Please select the head account';
  }
  else{
    document.getElementById('headOfaccounterror').innerHTML='';
  }
  //cheacking expenditure type
  let Exptype=document.getElementById('expenditureType').value;
  if(!Exptype){
    document.getElementById('Exerror').innerHTML='Select the purpose type';
  }
  else{
    document.getElementById('Exerror').innerHTML='';
  }
  //cheacking the party ammount
  let Ptamnt=document.getElementById('partyAmountrs').value;
  if(!Ptamnt){
    document.getElementById('partyAmount').innerHTML='Enter party ammount';
  }
  else{
    document.getElementById('partyAmount').innerHTML='';
  }

  let element=document.getElementById('navabr');
  console.log(element.className);
  //cheacking files
  let g=document.getElementById('formFileSm').value;
  if(!g){
    document.getElementById('fileeroor').innerHTML='please upload the file here';
  }
  else{
    document.getElementById('fileeroor').innerHTML='';
  }
  }
  //large nav bar
  
  let count=0;
  console.log(count)
  function changeNavbar(){
    let element=document.getElementById('navabr');
        let right=document.getElementById('mainContainer');
    count=count+1;
    
    if(count%2!=0){
      element.className='col-md-3 second';
      right.className='col-md-9 col-sm-12 col-xs-12 last_div';
    }
    else{
      element.className='col-md-3 second d-none';
      right.className='col-md-12 col-sm-12 col-xs-12 last_div';


    }
  
 
  
  }
    //small nav bar function
  let count1=0;
  console.log(count1);
  function nav2(){
    let element1=document.getElementById('navabr');
    count1=count1+1;
    if(count1%2!=0){
      element1.className='col-12 second';
    }
    else{
      element1.className='col-md-3 second d-none';
    }
  }
  //multiple file add
  function file(){
let f=document.getElementById('formFileSm').value;
    let files = document.getElementById("formFileSm").files;
    console.log(f)
    if(!f){
      document.getElementById('fileeroor').innerHTML='please upload the file here'
    }
  else{
    for (let i = 0; i < files.length; i++) {
      document.getElementById('fileeroor').innerHTML='';
      document.getElementById("filename1").innerHTML += files[i].name+'<br>';
    }
  }
  }
 
  

  



  