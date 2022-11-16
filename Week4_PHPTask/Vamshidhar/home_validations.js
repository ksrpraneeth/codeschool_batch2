

$(document).ready( function(){
    $('#next').click(function(){
        var formdata ={
            partyAccountNumber : $("#partyAccountNumber").val(),
            confirmAccountNumber : $("#confirmAccountNumber").val(),
            partyName : $("#partyName").val(),
            purpose : $("#purpose").val()

        }
        console.log( formdata);
        $.ajax({
            type: "POST",
            url: "validationAPI.php",
            data: formdata,
            success: function (data,status,xmlHTTPReq){
                var d = JSON.parse(data);
                $(partyAccountNumber_error).text(d.partyAccountNoErrors);
                $(confirmaccountNumber_error).text(d.confirmAccountNoErrors);
                $(partyName_error).text(d.partyNameErrors);
                $(purpose_error).text(d.purpose_error);

            }

        })

    })


    $('#search').click(function(){
        var formdata ={
            IFSCcode : $("#IFSCcode").val()
        }
        // console.log( formdata);
        $.ajax({
            type: "POST",
            url: "IFSCvalidation.php",
            data: formdata,
            success: function (data,status,xmlHTTPReq){
                var d = JSON.parse(data);
                console.log(d.bankDetails);
                $(IFSCcode_error).text(d.IFSCcode_error);
                $(bankName).text(d.bankDetails.bankName);
                $(bankBranch).text(d.bankDetails.bankBranch);

                
            }

        })


    })


    $('#headOfAccount').change(function($value){
        var formdata = {
            headOfAccount : $(this).val()
        }
        $.ajax({
            type: "POST",
            url: "hoaValidation.php",
            data: formdata,
            success: function (data){
                var data = JSON.parse(data);
                $(headOfAccount_error).text(data);
                $(balance).text(data.balance);
                $(LOC).text(data.LOC);
            }
        })
    })
})