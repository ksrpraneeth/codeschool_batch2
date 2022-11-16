$(document).ready(function () {
    $('#next').click(function () {
        var formdata = {

            partyAccount: $("#partyAccount").val(),
            confirmAccount: $("#confirmAccount").val(),
            partyName: $("#partyName").val(),
            purpose: $("#purpose").val()
        }
        $.ajax({
            type: "POST",
            url: "postApi.php",

            data: formdata,

            success: function (data) {
                console.log('data')
                var data = JSON.parse(data);
                console.log('data')

                $("#partyAccountError").text(data.message["partyAccountError"]);
                $("#confirmAccountError").text(data.message["confirmAccountError"]);
                $("#partyNameError").text(data.message["partyNameError"]);
                $("#purposeError").text(data.message["purposeError"]);



            }

        })

    })
});


// //////////////////////////////////////////////////////////////////////////////////////////////////////////

$(document).ready(function () {
    $('#search').click(function () {
        let formdata = {
            bankIFSC: $("#bankIfsc").val()
        }
        $.ajax({
            type: "POST",
            url: "postApiIfsc.php",
            data: formdata,
            success: function (response) {
                response = JSON.parse(response);
                if (response.status)
                    $("#error_Ifsc").text(res["bankIfscError"]);
                    console.log('data2')
                    $("#bankName").text(res.bankDetails.bankName);
                    console.log('data3')
                    $("#Branch").text(res.bankDetails.Branch);
                    console.log('data4')
            }
        })
    })
});

// ////////////////////////////////////////////////////////////////////////////////////////////////////////

$(document).ready(function () {
    $('#headAc').change(function ($value) {
        let formdata = {
            headOfAccount: $(this).val()
        }
        $.ajax({
            type: "POST",
            url: "PostHeadApi.php",
            data: formdata,
            success: function (response) {
                response = JSON.parse(response);
                if (response.status) {
                    $("#headOfAc_error").text("");
                    $("#Balance").text(response.data.Balance);
                    $("#LOC").text(response.data.LOC);
                } else
                    $("#headOfAc_error").text(response.message);
            }
        })
    })
});


// /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$(document).ready(function () {
    $('#search').click(function () {
        let formdata = {
            bankIFSC: $("#bankIfsc").val()
        }
        $.ajax({
            type: "POST",
            url: "PostHeadApi.php",
            data: formdata,
            success: function (response) {
                response = JSON.parse(response);
                if (response.status) {
                    $("#headOfAc_error").text("");
                    $("#Balance").text(response.data.Balance);
                    $("#LOC").text(response.data.LOC);
                } else
                    $("#headOfAc_error").text(response.message);
            }
        })
    })
});
