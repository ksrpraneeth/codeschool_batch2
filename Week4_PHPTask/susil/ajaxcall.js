var today = new Date();
var day = today.getDay();
var daylist = ["Sunday", "Monday", "Tuesday", "Wednesday ", "Thursday", "Friday", "Saturday"];
var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
var dateTime = date + ' ' + time;

document.getElementById("dt").innerHTML = dateTime + ' <br>';
//ifsc validation

$("#exp_type").change(function () {

  let expenditureType = { expenditureType: $("#exp_type").val() }
  $.ajax({
    type: "POST",
    url: "expenditure_type.php",

    datatype: "JSON",
    data: expenditureType,
    success: function (data) {
      data = JSON.parse(data);
      for (let i = 0; i < data.output.length; i++) {
        $("#purpose_type").append(`
                <option value="">${data.output[i]}"</option>
                `);
      }
    },
    error: function () {
      console.log("error")
    }


  });
});
//head of account...
$("#head_account").change(function () {
  $("#hd").text("");
  var headofAccount = { headAccount: $("#head_account").val() };
  $.ajax({
    type: "POST",
    url: "head_of_account.php",

    datatype: "JSON",
    data: headofAccount,
    success: function (data) {
      data = JSON.parse(data);
      if (data.status == 0) {
        $("#hd").text(data.output['headaccountError']);
        $('#bal').text('');
        $('#loc').text('');
        return;
      }
      $('#bal').text(data.output['Balance']);
      $('#loc').text(data.output['Loc']);
    },
    error: function () { },
  });
});
//ifsc validation
$('#search').click(function () {
  $('#ifsc_valid').text("");
  var ifscvalid = { ifscCode: $("#ifsc_code").val() };
  $.ajax({
    type: "POST",
    url: "ifsc.php",
    datatype: "JSON",
    data: ifscvalid,
    success: function (data) {
      data=JSON.parse(data)
      if (data.status==0) {
        $("#ifsc_valid").text(data.output.ifscError[0]);
        console.log("hdxbsnk")
        $("#bank_name").text("")
        $("#bank_branch").text("")
        
        return;
      }
      console.log("jhff")
$('#bank_name').text(data.output['bankName']);
$('#bank_branch').text(data.output['Branchname'])
    },
    error: function () { },
  });
})
///all validation
$('#Next').click(function(){
  $('#party').text("")
  $('#confirmParty').text("")
  $('#party_name_valid').text("")
  $('#hd').text("")
  $('#ifsc_valid').text("")
  $('#expenditureError').text("")
  $('#pur').text("")
  $('#amt').text(" ")
  var allVallidation={
    partyaccount:$('#partyNo').val(),
    confirmPartyamlount:$('#confirm').val(),
    partyName:$('#party_name').val(),
    ifsccode:$('#ifsc_code').val(),
    headaccount:$('#head_account').val(),
    expenditure:$('#exp_type').val(),
    purpose:$('#purpose').val(),
    partyamount:$('#p_ammount').val()
  }
  console.log(allVallidation)
  $.ajax({
type:"POST",
url:"allvalid.php",
datatype:"JSON",
data:allVallidation,
success:function(data){
  data=JSON.parse(data)
  if("partyaccountError" in data){
    $('#party').text(data.partyaccountError)
  }
  if('confirmpartyerror' in data){
    $('#confirmParty').text(data.confirmpartyerror)
  }
  if('partynamer' in data){
    $('#party_name_valid').text(data.partynamer)
  }
  if('ifscerror'in data){
    $('#ifsc_valid').text(data.ifscerror)
  }
  if('headacounterror' in data){
    $('#hd').text(data.headaccounterror)
  }
  if('expenditurerror' in data){
    $('#exp_type').text(data.expenditurerror)
  }
  if('purposeerror' in data){
    $('#pur').text(data.purposeerror)
  }
  if('partyamounterror' in data){
    $('#amt').text(data.partyamounterror)
  }
},
error:function(){

}
  })


})