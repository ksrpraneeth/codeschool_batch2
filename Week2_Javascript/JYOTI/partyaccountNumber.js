function check() {
  // account number

  let acNo = document.getElementById("AC").value;

  console.log(acNo);
  if (acNo == "") {
    document.getElementById("ACE").innerHTML =
      "Account number should not be blank";
  } else if (acNo.length < 12 || acNo.length > 22 || isNaN(acNo)) {
    document.getElementById("ACE").innerHTML =
      "Please enter valid account number";
  } else {
    document.getElementById("ACE").innerHTML = "";
  }

  //Confirm party account number

  let cacNo = document.getElementById("CAN").value;
  console.log(cacNo);
  if (cacNo == "") {
    document.getElementById("CACE").innerHTML =
      "Please confirm account number ";
  } else if (cacNo != acNo) {
    document.getElementById("CACE").innerHTML =
      "Please enter correct account number ";
  }
  //PARTRY NAME

  let partyName = document.getElementById("PN").value;
  console.log(partyName);
  var regEx = /^[0-9a-zA-Z]+$/;
  if (partyName == "") {
    document.getElementById("PNE").innerHTML = "Party Name should not blank";
  } else if (!partyName.match(regEx)) {
    document.getElementById("PNE").innerHTML =
      "Party Name should not contain any Special character";
  }
  else{
    document.getElementById("PNE").innerHTML = "";
  }

  //IFSC Code

  let bankIfsc_Code = document.getElementById("BIC").value;
  console.log(bankIfsc_Code);
  var regEx2 = /^[A-Z]+$/;
  var code = bankIfsc_Code.slice(0, 4);
  var code5 = bankIfsc_Code.slice(4, 5);
  var code6 = bankIfsc_Code.slice(5, 10);

  console.log(code5, "sdfds");

  if (bankIfsc_Code == "") {
    document.getElementById("EBIC").innerHTML = "Please Enter IFSC Code";
  } else if (bankIfsc_Code > 11) {
    document.getElementById("EBIC").innerHTML = "IFSC Code is too Large";
  } else if (bankIfsc_Code < 11) {
    document.getElementById("EBIC").innerHTML = "IFSC Code is too Small";
  }
  if (!code.match(regEx2)) {
    document.getElementById("EBIC").innerHTML =
      "First 4 Should be letter and to be in Uppercase";
  }
  if (code5 != 0) {
    document.getElementById("EBIC").innerHTML = "5th element Should zero(0)";
  }
  if (!code6.match(regEx)) {
    document.getElementById("EBIC").innerHTML =
      "Please Enter correct IFSC Code";
  }
}

//...............................

function check2() {
  var IFSC = document.getElementById("BIC").value;
  var code4 = IFSC.slice(0,4);
  var temp_bank_details = [
    {
      ifsc_key: "SBIN",
      name: "SBI",
      branch: "AMEERPET",
    },
    {
      ifsc_key: "ICIC",
      name: "ICICI",
      branch: "HITECH CITY",
    },
    {
      ifsc_key: "HDFC",
      name: "HDFC",
      branch: "LB NAGAR",
    },
  ];

  var default_bank_details = {
    name: "TEMP",
    branch: "mehsiptanma",
  };
  //BANK NAME

  if (IFSC == "") {
    document.getElementById("BANKNAME").innerHTML = "Please Enter IFSC Code";
  } else{
    console.log('sdf',code4);
    const bank = temp_bank_details.find(x => x.ifsc_key == code4);
    console.log('bank',bank);
    
    document.getElementById("BANKNAME").innerHTML=bank.name;
    document.getElementById("BRANCH NAME").innerHTML=bank.branch;
    }

  
}



//head of account

function headofAccount()
{
 var headofAccount=document.getElementById("HOA").value;
 if(headofAccount == ""){
    document.getElementById("HOAE").innerHTML=
    "Please select a Head of Account";
 }
 else if(headofAccount == "0853001020002000000NVN"){
    document.getElementById("Balance").innerHTML="1000000";
    document.getElementById("Loc").innerHTML="5000";
 }    
 else if(headofAccount == "08342001170004001000NVN"){
    document.getElementById("Balance").innerHTML="1008340";
    document.getElementById("Loc").innerHTML="4000";
}
else if(headofAccount == "2071011170004320000NVN"){
    document.getElementById("Balance").innerHTML="14530000";
    document.getElementById("Loc").innerHTML="78000";
}
else if(headofAccount == "8342001170004002000NVN"){
    document.getElementById("Balance").innerHTML="1056400";
    document.getElementById("Loc").innerHTML="34000";
}
else if(headofAccount == "082204000030006300303NVN"){
    document.getElementById("Balance").innerHTML="123465400";
    document.getElementById("Loc").innerHTML="5000";
}
}


//function showLeftNav(){
    /*var element = document.getElementById("navbar");
      element.classList.remove("d-none");*/

     // col-3 sm-12 xs-12   d-none f" id="navbar
    
        //document.getElementById("navbar").style.display = "none";
      
    
//}

let NAV=document.getElementById('navbar');
console.log(NAV.className);
function showLeftNav() {
    let Right=document.getElementById('rightside');
    let nav=document.getElementById('navbar');
    if(NAV.className ==' col-3 sm-12 Left  d-none f'){
        Right.className='col-md-9  xs-12 Right  d-lg-block';
        nav.className='col-3  sm-12  xs-12 Left f';
    }
    else{
        Right.className='col-md-12  Right  d-lg-block';
        nav.className=' col-3 sm-12 Left  d-none f';
    }
    
  }


    //Purpose    Max 500 Characters
   var purpose = document.getElementById("PURPOSE").value;
   console.log(purpose);
     
   
     if (!purpose.length <500){
        document.getElementById("PURPOSEER").innerHTML="Maximum 500 characters are allowed";
     }
     else {
      document.getElementById("PURPOSEER").innerHTML="";
     }


     //Expenditure


let Expenditure= document.getElementById("expenditure").value;


function Expence()
{
  let a1="Maintain current levels of operation within the organization"
let a2="Expenses to permit future expansion."
let b1="Sales costs or All expenses incurred by the firm that are directly tied to the manufacture and selling of its goods or services."
let b2="All expenses incurred by the firm to guarantee the smooth operation."
let c1="Exorbitant Advertising Expenditures"
let c2="Unprecedented Losses"
let c3="Development and Research Cost"
if(Expenditure==""){
    document.getElementById("expenditure_error")="Please select an Expenditure Type";
}
else if(Expenditure=="Capital Expenditure")
{
 document.getElementById("A1").innerHTML=a1;
 document.getElementById("A2").innerHTML=a2;
}
else if(Expenditure=="Revenue Expenditure"){
  document.getElementById("A1").innerHTML=b1;
 document.getElementById("A2").innerHTML=b2;
 
 
}
 else if (Expenditure=="Deferred Revenue Expenditure"){
  document.getElementById("A1").innerHTML=c1;
  document.getElementById("A2").innerHTML=c2;
  document.getElementById("A3").innerHTML=c3;
}
else{
  document.getElementById("expenditure_error")="";
}
}
