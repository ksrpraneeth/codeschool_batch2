var validation=true


//Agency Name

$("#agencyName").change(function () {
var agencyName=$('#agencyName').val()
$(".nameError").text("");
if(agencyName.length==''){
    $(".nameError").text("Please Enter Name.");
    validation = false;
}
if(agencyName.match(/[^A-z]/)){
    $(".nameError").text("Only Characters are Allowed.");
    validation = false;
}
else{
    validation = true; 
}
})

//Mobile Number

$("#phoneNumber").change(function () {
    var phoneNumber = $("#phoneNumber").val();
    $(".phoneNumberError").text("");
    if(Number.isNaN(phoneNumber)){
        $(".nameErrphoneNumberErroror").text("Only Numbers are Allowed.");
        validation = false;
    }
    if (phoneNumber.length != 10) {
      $(".phoneNumberError").text(" Length of Phone Number should be 10.");
      validation = false;
      return;
    }
    else{
      validation=true;
    }
  
  });



  //PAN Number

  $("#panNumber").change(function () {
    let panNumber = $("#panNumber").val();
    $(".panError").text("");
  
    if (panNumber.match(/[^A-Z-0-9]/)) {
      $(".panError").text("Only Upercase Characters and Numbers are Allowed.");
      validation = false;
      return;
    }
    else if (panNumber.length != 10) {
      $(".panError").text(" Length of PAN Number should be 10.");
      validation = false;
    }
    else  {
      validation=true;
    }

   
  
  });

  //GSTIN Validation

  $("#gstinNumber").change(function () {
    var gstinNumber = $("#gstinNumber").val();
  
    $("#gstError").text("");
  
    if (gstinNumber.match(/[^A-Z-0-9]/)) {
      $("#gstError").text("Only Upercase Characters and Numbers are Allowed.");
      validation = false;
    } else if (gstinNumber.length != 15) {
      $("#gstError").text(" Length of GST Number should be 15.");
      validation = false;
      return;
    } else {
      validation = true;
    }
  });


//GSTIN List Add
let gstList=[]
$('#addGstin').click(function(){
    let agencyname=$('#agencyName').val()
    let phone=$('#phoneNumber').val()
    let pan=$('#panNumber').val()

    if($('#gstinNumber').val()!=''){
        gstList.push($('#gstinNumber').val())

        $('#gstList').append(`<div>${$('#gstinNumber').val()}</div>`)
        $('#gstinNumber').val('')
    }

    
    console.log(gstList)


})



//iFSC Code Search

$('#ifscSearch').click(function(){
    var formdata={ifscCode:$('#ifscCode').val()}

    $.ajax({
        type:"POST",
        url:"api/searchifscapi.php",
        data:formdata,
        datatype:"JSON",
        success:function(data){
data=JSON.parse(data);

if(data.status){
    localStorage.setItem('ifscId',data.output[0].ifscid)
    $('#bankName').text(data.output[0].bankname)
    $('#stateName').text(data.output[0].statename)
    $('#branchName').text(data.output[0].branchname)
    localStorage.setItem('bankName',data.output[0].bankname)
}
        },
        error:function(){

        }
    })



})

//Account Number

$("#accountNumber").change(function () {
    let accountNumber = $("#accountNumber").val();
    $(".accountNumberError").text("");
    if (accountNumber.length < 10) {
      $(".accountNumberError").text("Length of Account Number Minimum 10.");
      validation=false
      return;
    }
    else{
      validation=true;
    }
  });

//Confirm Account Number

$("#confirmAccountNumber").change(function () {
    let confirmAccountNumber = $("#confirmAccountNumber").val();
    var accountNumber = $("#accountNumber").val();
    $(".confirmAccountNumberError").text("");
  
 
  
    if (accountNumber != confirmAccountNumber) {
      $(".confirmAccountNumberError").text("Account Number not Matched");
      validation = false;
      return;
  
  
  
    }
    
    else {
      validation = true;

    }
  });
  
  


//Bank and IFSC Code Add

let ifscid=[]
 let accountnumberaray=[]
$('#addBankDetails').click(function(){


    let accountnumber=$('#accountNumber').val()
    let confirmAccountnumber=$('#confirmAccountNumber').val()
    // let bankname=$('#bankName').val()
    console.log(accountnumber)

    if(accountnumber!='' || accountnumber!= confirmAccountnumber ){
        

      let bank= localStorage.getItem('bankName')

        if('ifscId' in localStorage){

            accountnumberaray.push(accountnumber);
            ifscid.push(localStorage.getItem('ifscId'))


          

            
            localStorage.clear()
            $('#accountNumber').val()
        }


        $('#addedbanks').append(`<div> Account No. : ${accountnumber}   <span>Bank Name: ${bank}</span></div>`)
        $('#accountNumber').val('')
        $('#confirmAccountNumber').val('')

    }


    console.log(ifscid,accountnumberaray)
  
   
})



//detail verification

$('#sendForApproval').click(function(){

    if(ifscid.length==0 || accountnumberaray.length==0 || gstList.length==0){
        window.alert ("Please Fill all Fields.")
    }
    else{
        var formdata={
            agencyname:$('#agencyName').val(),
            mobile:$('#phoneNumber').val(),
            pan:$('#panNumber').val(),
            gstnumber:gstList,
            ifsc:ifscid,
            acountnumberr:accountnumberaray    
    }
    $.ajax({
        type:"POST",
        url:"api/addagencyapi.php",
        data:formdata,
        datatype:"JSON",
        success:function(data){
            data=JSON.parse(data);
            if(data.status){
              // swal( "","Agency Added Successfully", "success");
              window.alert("Agency Added Successfully");
                localStorage.clear()
                window.location.reload()
            }
            else{
              
              
                window.alert(data.message)
            }
        }
    })
    }
})