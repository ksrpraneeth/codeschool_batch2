$("#expenditure").change(function () {
  $("#expenditure_error").text("");
  $("#purposeType").empty();
  var expenditureType = { expenditure_type: $("#expenditure").val() };

  $.ajax({
    type: "POST",
    url: "expenditure.php",
    datatype: "JSON",
    data: expenditureType,
    success: function (data) {
      data = JSON.parse(data);
      if (data.status == 0) {
        $("#expenditure_error".text(data.output));
        $("#purposeType").empty();
        $("#purposeType").append(`<option value="options">options</option>`);
        return;
      }
      for (let i = 0; i < data.output.length; i++) {
        $("#purposeType").append(`<option value="">${data.output[i]}</option>`);
      }
    },
    error: function () {
      console.log("error");
    },
  });
});

//Head of Account validation
$("#headOfAccount").change(function () {
  $("#headOfAccountError").text("");
  var headOfTheAccount = { head_Of_Account: $("#headOfAccount").val() };

  $.ajax({
    type: "POST",
    url: "head-of-account.php",
    datatype: "JSON",
    data: headOfTheAccount,
    success: function (data) {
      data = JSON.parse(data);
      if (data.status==0){
        $('#headOfAccountError').text(data.output['headOf_AccountError']);
        $('#Balance').text("");
        $('#Loc').text("");
        return;
      }
      $('#Balance').text(data.output['Balance']);
        $('#Loc').text(data.output['LOC']);
    },

    error:function(){},
  });
});
//ifsc code validation
$("#search").click(function(){
    $('#EBIC').text("");
    var iffscCode={IFSC_Code:$("#BIC").val()}
    $.ajax({
type:"POST",
url:"IFSC.php",
datatype:"JSON",
data:iffscCode,
success:function(data){
    data=JSON.parse(data)
if(data.status==0){
    $('#EBIC').text(data.output.ifscCodeError);
    $('#BANKNAME').text("")
    $('#BRANCHNAME').text("")
    return;
}
$('#BANKNAME').text(data.output['Bankname'])
    $('#BRANCHNAME').text(data.output['BranchName'])
},
error:function(){

}
    });
})


//Number to word
//party name

$('#next').click(function(){
  $('#amountError').text("")
  $('#PURPOSEER').text("")
  $('#expenditure_error').text("")
  $('#headOfAccountError').text("")
  $('#PNE').text("")
  $('#EBIC').text("")
  $('#CACE').text("")
  $('#ACE').text(" ")
  var dataWraper={
    partyaccount:$('#AC').val(),
    confirmPartyAmount:$('#CAN').val(),
    partyName:$('#PN').val(),
    ifsccode:$('#BIC').val(),
    headaccount:$('#headOfAccount').val(),
    expenditure:$('#expenditure').val(),
    purpose:$('#PURPOSE').val(),
    partyamount:$('#amount').val()
  }
  console.log(dataWraper)
  $.ajax({
type:"POST",
url:"formvalidation.php",
datatype:"JSON",
data:dataWraper,
success:function(data){
  data=JSON.parse(data)
  if("partyaccountError" in data){
    $('#ACE').text(data.partyaccountError)
  }
  if('confirmpartyerror' in data){
    $('#CACE').text(data.confirmpartyerror)
  }
  if('partynamer' in data){
    $('#PNE').text(data.partynamer)
  }
  if('ifscerror'in data){
    $('#EBIC').text(data.ifscerror)
  }
  if('headacountError' in data){
    $('#headOfAccountError').text(data.headacountError)
  }
  if('expenditurerror' in data){
    $('#expenditure_error').text(data.expenditurerror)
  }
  if('purposeerror' in data){
    $('#PURPOSEER').text(data.purposeerror)
  }
  if('partyamounterror' in data){
    $('#amountError').text(data.partyamounterror)
  }
},
error:function(){

}
  })


})