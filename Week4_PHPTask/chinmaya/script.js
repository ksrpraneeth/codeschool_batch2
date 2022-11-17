//hidding and showing the menu bar
$('#hamburger').click(function () {
    $('#mainContent').toggleClass("col-md-12");
    $('#mainContent').toggleClass("col-md-9");
    $('#navabr').toggleClass("d-none");
});
//logout and login button
$('#login').click(function () {
    let val = $('#logtext').html();
    console.log(val == "LOGOUT");
    if (val == 'LOGOUT') {
        $('#logtext').html('LOGIN');
    }
    else {
        $('#logtext').html('LOGOUT');
    }
});
//date and time function
let date = new Date();
const month = ['jan', 'feb', 'mar', 'aprl', 'may', 'jun', 'july', 'aug', 'sep', 'oct', 'nov', 'dec'];
$('#date').text(date.getDate() + '-' + month[date.getMonth()] + '-' + date.getFullYear());


//Bank ifsc code button function
$('#ifscSearch').click(function () {
    $('#bankName').text("");
    $('#bankLocation').text("");
    $('#ifscCodeError').empty();
    var formdata = {
        ifsc_Code: $('#ifscCode').val()
    }

    $.ajax({
        type: "POST",
        url: 'ifsccode.php',
        datatype: 'JSON',
        data: formdata,
        success: function (data) {
            data = JSON.parse(data);
            if (!data.status) {
                $('#ifscCodeError').text(data.output.iffsccodeError)
                return;
            }
            $('#bankName').text(data.output['bankName']);
            $('#bankLocation').text(data.output['bankLocation']);

        },
        error: function () {
            console.log('erroe')
        }
    });
});
//party amount ajax call
$('#partyAmount').blur(function () {
    $('#partyAmountError').text("")
    $('#partyAmountInWord').text("");
    var partyAmount = { party_Amount: $('#partyAmount').val() }
    $.ajax({
        type: "POST",
        url: "partyamount.php",
        datatype: "JSON",
        data: partyAmount,
        success: function (data) {
            data = JSON.parse(data);
            if (!data.status) {
                $('#partyAmountError').text(data.output.partyamountError);
                return;
            }
            $('#partyAmountInWord').text(data.output.Partyamountinword)
        },
        error: function () {
        }
    })
});
//Head of account detail validation
$('#headOfAccount').change(function(){
    $('#balance').text("");
                $('#loc').text("");
                $('#headOfAccountError').text("")
       
        var headOfAccount={head_Of_Account:$('#headOfAccount option:selected').val()}
        $.ajax({
            type:"POST",
            url:"headofaccount.php",
            datatype:"JSON",
            data:headOfAccount,
            success:function(data){
                data=JSON.parse(data);
                if(!data.status){
                    $('#headOfAccountError').text(data.output.headaccountError)
                    return;
                }
                $('#balance').text(data.output.Balance);
                $('#loc').text(data.output.LOC);
            },
            error:function(){}
        });
});
//expenditure type validation  
$('#expenditureType').change(function(){
    $('#expenditureTypeError').text("")
    console.log("working")
var expendituretype={expenditureType:$('#expenditureType option:selected').val()}

$.ajax({
type:"POST",
url:"expendituretype.php",
datatype:"JSON",
data:expendituretype,
success:function(data){
data=JSON.parse(data);
if(!data.status){
    $('#expenditureTypeError').text(data.output.expenditureeroor);
    $('#purposeType').empty()
    $('#purposeType').append(`<option value="option">option</option>`)
    return;
}
$('#purposeType').empty();
for(let i=0;i<data.output.length;i++){
    $('#purposeType').append(`
    <option>${data.output[i]}</option>
    `)
}
},
error:function(){

}
});
});
//next button click validation
$('#next').click(function(){
    $('#partyAccountError').text("");
    $('#confirmPartyAccountError').text('');
    $('#partyNameError').text("");
    $('#ifscCodeError').text("")
    $('#headOfAccountError').text("")
    $('#expenditureTypeError').text("")
    $('#partyAmountError').text("")
var wholePageData={party_Account_Number:$('#acountNumber').val(),
confirm_Party_Account_Number:$('#Confirmacountnumber').val(),
party_Name:$('#partyName').val(),
ifsc_Code:$('#ifscCode').val(),
head_Of_Account:$('#headOfAccount').val(),
expenditure_Type:$('#expenditureType').val(),
text_Area:$('#textArea').val(),
party_Amount:$('#partyAmount').val(),
}
console.log(wholePageData);
$.ajax({
type:"POST",
url:"code.php",
datatype:"JSON",
data:wholePageData,
success:function(data){
    data=JSON.parse(data)
    if(!data.status){
        if(data.output.accountNumbererror.length!=0){
            $('#partyAccountError').text(data.output.accountNumbererror);
        }
        if(data.output.confirmaccountNumbererror.length!=0){
            $('#confirmPartyAccountError').text(data.output.confirmaccountNumbererror);
        }
        if(data.output.partyNameerror.length!=0){
            $('#partyNameError').text(data.output.partyNameerror);
        }
        if("ifscCodeerror" in data.output){
            $('#ifscCodeError').text(data.output.ifscCodeerror)
        }
        if("headofAccounterror" in data.output){
            $('#headOfAccountError').text(data.output.headofAccounterror)
        }
        if("expenditureTypeerror" in data.output){
            $('#expenditureTypeError').text(data.output.expenditureTypeerror)
        }
        if("partyAmounterror" in data.output){
            $('#partyAmountError').text(data.output.partyAmounterror)
        }
        
    }

},
error:function(){
    console.log("error")
}
});
});