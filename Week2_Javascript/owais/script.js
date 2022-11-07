function openNav(){
         
    let sidenavwidth= document.getElementById("mySidenav").offsetWidth;
    if(sidenavwidth==0){
        document.getElementById("mySidenav").style.width="260px";
        document.getElementById("main").style.marginLeft="260px";
        document.getElementById("header").style.marginLeft="260px";
       
    }
    else{
        document.getElementById("mySidenav").style.width="0";
        document.getElementById("main").style.marginLeft="0";
        document.getElementById("header").style.marginLeft="0";

    }
}
const d = new Date();

document.getElementById("demo").innerHTML = d;

// let userLoginButton=document.getElementById("loginlogout");

// userLoginButton.addEventListener("click",function(){


function login(){
    if(document.getElementById('login').innerHTML=="Logout"){
        document.getElementById('login').innerHTML="Login"
    }
    else{
        document.getElementById('login').innerHTML="Logout";
    }
}



function setError(id,error){

   let element = document.getElementById(id).nextElementSibling;
    element.innerHTML = error;

}
function ClearErrors(){
    error = document.getElementsByClassName("form_error");
    for(let item of error){
        item.innerHTML = "";
    }
}
function containsSpecialChars(str) {
    const specialChars = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
    return specialChars.test(str);
  }

  function firstFourCharactersWithUpperCase( string ) {
    return string.length === 4  &&  beginsWithUpperCase( string );
}


function validateform(){
    var returnval = true;
    ClearErrors();

    //for party account number
    var partyaccno=document.getElementById('partyaccno').value;

        if(partyaccno.length == 0){
            setError("partyaccno","*Required");
            returnval = false; 
        }
    
        else if(isNaN(partyaccno)==true){
            setError("partyaccno","*Should only contain numbers");
            returnval = false;
        }
        else if(partyaccno.length<12 || partyaccno.length>22){
            setError("partyaccno","*Should min 12 and max 22 digits");
            returnval = false;
        }
        else if(partyaccno.startsWith('-') || partyaccno.startsWith('+')){
            setError("partyaccno","*Enter a valid A/c no");
            returnval = false;
        }
    // for confirm party acc no
    var confirmaccno=document.getElementById('confirm-party-acc-no').value;
    
        if(confirmaccno.length == 0){
            setError("confirm-party-acc-no","*Required");
            returnval = false;
        } 
       else if(partyaccno != confirmaccno){
            setError("confirm-party-acc-no","*Should be same as party A/c no");
            returnval = false;
        }
    
    var partyname=document.getElementById('party-name').value;
    
        if(partyname.length == 0){
            setError("party-name","*Required");
            returnval = false;
        } 
       
          
       else if(containsSpecialChars(partyname)){
            setError("party-name","*Should not have special characters");
            returnval = false;
        }
        
    var ifscCode=document.getElementById('ifsc').value;

        if(ifscCode.length == 0){
            setError("ifsc","*Required");
            returnval = false;
        } 

        else if(ifscCode.length != 11){
            setError("ifsc","*IFSC code should be 11 characters long.");
            returnval = false;
        }
        
        else if(ifscCode.length == 11){
         if(firstFourCharactersWithUpperCase(ifscCode.substr(0,3)) == false){
            setError("ifsc","*The first four characters should be upper case alphabets.");
            returnval = false;
        } 
        }


    return returnval;
}


// function search(){
//     var returnval = true;
//     ClearErrors();


  
//   if (containsSpecialChars('hello!')) {
//     console.log('✅ string contains special characters');
//   } else {
//     console.log('⛔️ string does NOT contain special characters');
//   }
  

// /function Next(){
//     var acno = document.getElementById('acno').value;
//     document.getElementById('acno_error').innerHTML="";
//     if(!acno){
//         document.getElementById('acno_error').innerHTML = 'please enetr A/c no';
//     }
//     else if(acno.length!=12){
//         document.getElementById('acno_error').innerHTML = 'Enter a valid A/c no';
//     }
// }




 







