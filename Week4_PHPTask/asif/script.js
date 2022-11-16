$(document).ready(function(){

    // code for sidebar toggle
    $("#side-nav-button").click(function() {
        let sidebarWidth = $("#sidebar").width();
        if(sidebarWidth == 0) {
            $("#sidebar").width("300px");
            $("main").css("margin-left", "calc(300px + 1em)");
            $("#header").css("margin-left", "300px");
        }
        else {
            $("#sidebar").width("0");
            $("main").css("margin-left", "1em");
            $("#header").css("margin-left", "0");
        }
    });


    // code for displaying current date and time
    const date = new Date();

    function getCurrentDate() {
        const month = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
        return date.getDate()+'-'+month[date.getMonth()]+'-'+date.getFullYear();
    }
    function getCurrentTime() {
        let hours = date.getHours() > 12 ? date.getHours() - 12 : date.getHours();
        let am_pm = date.getHours() >= 12 ? "PM" : "AM";
        return hours + ":" + date.getMinutes() + " " + am_pm;
    }

    $('#current-date').text(getCurrentDate());
    $('#current-time').text(getCurrentTime());


    // code for user login and logout functionality
    $("#user-login").click(function(){
        if(this.innerHTML == "Logout") {
            this.innerHTML = "Login";
        }
        else {
            this.innerHTML = "Logout";
        }
    });
    

    // ajax call for ifsc code
    $("#searchIfsc").click(function(){
        var ifscCode = $("#ifscCode").val();
        $.ajax({
            type: "POST",
            url: "backend/getBankDetails.php",
            data: {"ifsc_code": ifscCode},            
            success: function(result){
                let res = JSON.parse(result);
                $('#ifscError').text("");
                if(res.status) {
                    $('#bankName').val(res.data.bankName);
                    $('#bankBranch').val(res.data.bankBranch);
                } else {
                    $('#bankName').val("XXXXXX");
                    $('#bankBranch').val("XXXXXX");
                    $('#ifscError').text(res.error);
                    console.log('false');
                }
            }
        });
    });


    // ajax call for head of account
    $("#headOfAccount").change(function(){
        var headOfAccount = $("#headOfAccount").val();
        $.ajax({
            type: "POST",
            url: "backend/getHeadOfAccountValues.php",
            data: {"head_of_account": headOfAccount},            
            success: function(result){
                let res = JSON.parse(result);
                $('#headOfAccountError').text("");
                if(res.status) {
                    $('#headOfAccountBalance').val(res.data.headOfAccountBalance);
                    $('#headOfAccountLOC').val(res.data.headOfAccountLOC);
                } else {
                    $('#headOfAccountBalance').val("XXXXXX");
                    $('#headOfAccountLOC').val("XXXXXX");
                    $('#headOfAccountError').text(res.error);
                }
            }
        });
    });


    // ajax call for expenditure type
    $('#expenditureType').change(function(){
        var expenditureType = $('#expenditureType').val();
        $.ajax({
            type: "POST",
            url: "backend/getPurposeTypeValues.php",
            data: {"expenditure_type": expenditureType},
            success: function(result) {
                let res = JSON.parse(result);
                if(res.status) {
                    $('#purposeType').empty().append('<option value="">Select</option>');
                    $('#expenditureTypeError').text("");
                    for(let item of res.data) {
                        $('#purposeType').append("<option value='" +item+ "'>" +item+ "</option>");
                    }
                }
                else {
                    $('#expenditureTypeError').text(res.error);
                    $('#purposeType').empty().append('<option value="">Select</option>');
                }
            }
        });
    });

    // ajax call for form validation
    $('#form-submit-btn').click(function(){
        $.ajax({
            type: "POST",
            url: "backend/formValidation.php",
            data: {
                "partyAccountNumber" : $('#partyAccountNumber').val(),
                "confirmPartyAccountNumber" : $('#confirmPartyAccountNumber').val(),
                "partyName" : $('#partyName').val(),
                "purpose" : $('#purpose').val(),
                "partyAmount" : $('#partyAmount').val(),
                "bankName" : $('#bankName').val()
            },
            success: function(result) {
                let res = JSON.parse(result);
                console.log($('#bankName').val());

                if(res.status) {
                    // submit form
                }

                else {
                    $('#partyAccountNumberError').text(res.errors.partyAccountNumberError);
                    $('#confirmPartyAccountNumberError').text(res.errors.confirmPartyAccountNumberError);
                    $('#partyNameError').text(res.errors.partyNameError);
                    $('#purposeError').text(res.errors.purposeError);
                    $('#partyAmountError').text(res.errors.partyAmountError);
                    $('#ifscCodeError').text(res.errors.ifscCodeError);
                }                
            }
        });


    });

});