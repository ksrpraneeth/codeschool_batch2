

$(document).ready( function(){
    $('#next').click(function(){
        var formdata ={
            partyAccountNumber : $("#partyAccountNumber").val(),
            confirmAccountNumber : $("#confirmAccountNumber").val(),
            partyName : $("#partyName").val()
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
            }

        })

    })


    $('#search').click(function(){
        var formdata ={
            IFSCcode : $("#IFSCcode").val()
        }
        console.log( formdata);
        $.ajax({
            type: "POST",
            url: "IFSCvalidation.php",
            data: formdata,
            success: function (data,status,xmlHTTPReq){
                var d = JSON.parse(data);
                $(IFSCcode_error).text(d.IFSCcode_error);
                $(bankName).text(d.bankDetails.bankName);
                $(bankBranch).text(d.bankDetails.bankBranch);
                
            }

        })


    })
})