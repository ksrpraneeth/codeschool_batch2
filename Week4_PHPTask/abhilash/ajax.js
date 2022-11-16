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
                var data = JSON.parse(data);
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
            data: formdata,
            success: function (response) {
                response = JSON.parse(response);
                if (response.status) {
                    $("#error_Ifsc").text("");
                    $("#bankName").text(response.data.bankName);
                    $("#Branch").text(response.data.Branch);
                } else
                    $("#error_Ifsc").text(response.message);
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
    $('#dropdown').change(function ($value) {
        $("#ExpenditureError").text("");
        let formdata = {
            expenditure_type: $(this).val()
        }
        $.ajax({
            type: "POST",
            url: "Expendituretype.php",
            data: formdata,
            success: function (response) {
                response = JSON.parse(response);
                if (response.status) {
                    $("#ExpenditureError").text(response.message);
                    console.log("ExpenditureError")
                }
                console.log("Purpose_type1")
                $("#Purpose_type").empty();
                $("#Purpose_type").append(`<option value="">Select</option>`)
                for (let i = 0; i < response.data.length; i++) {
                    console.log("Purpose_type2")
                    $("#Purpose_type").append(`<option>${response.data[i]}</option>`)

                }

            }
        })
    })

});
// /////////////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function () {
    $('#pay_Amount').change(function ($value) {
        let formdata = {
            pay_amount: $(this).val()
        }
        $.ajax({
            type: "POST",
            url: "Payamountapi.php",
            data: formdata,
            success: function (response)
             { console.log("Purpose_type2")
                response = JSON.parse(response);
                if (response.status) {
                    $("#payAmountError").text("");
                    for (let i = 0; i < response.data.length; i++) {
                        console.log("Purpose_type2")
                        $("#in_words").append(`${response.data[i]}`)
                    }
                } else
                    $("#headOfAc_error").text(response.message);
            }
        })
    })
})

