$(document).ready(function(){

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



    // miscallenous functions for form validation
    function setError(id, error) {
        $('#'+id).next().text(error);
    }

    function containsSpecialChars(str) {
        const specialChars = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
        return specialChars.test(str);
    }
    function clearErrors() {
        $('.error-msg').text("");
    }



    // for validating ifsc code on click of the search button
    function validateIfsc() {
        let returnval = true;
        clearErrors();        

        let ifscCode = $('#ifsc-code').val();
        
        if(ifscCode.length == 0) {
            setError("ifsc-code", "*required");
            returnval = false;
        }
        else if(ifscCode.length != 11) {
            setError("ifsc-code", "*Should be of 11 characters only");
            returnval = false;
        }
        else {
            for(let i=0; i<4; i++) {
                if((/[A-Z]/).test(ifscCode[i]) == false) {
                    setError("ifsc-code", "*First four characters should be uppercase alphabets only");
                    returnval = false;
                }         
            }
            if(ifscCode[4] != "0") {
                setError("ifsc-code", "*Fifth character should be zero only");
                returnval = false;
            }
            else if(containsSpecialChars(ifscCode.substr(5, 10)) || (/[a-z]/).test(ifscCode.substr(5, 10)) ) {
                setError("ifsc-code", "*Last six characters should be numeric or uppercase alphabets only");
                returnval = false;
            }
        }
        return returnval;
    }



    // code for prefilling bank name and branch if ifsc code is valid
    $("#search-ifsc").click(function(){
        const bankNameslist = [
            {"name": "State Bank Of India", "branch": "Mehdipatnam Branch"},
            {"name": "IDBI Bank", "branch": "Rajendra Nagar Branch"},
            {"name": "HDFC Bank", "branch": "Attapur Branch"},
            {"name": "Union Bank of India", "branch": "Shamsheer Gunj Branch"},
            {"name": "Bank of Baroda", "branch": "Film Nagar Branch"},
            {"name": "Axis Bank", "branch": "Bahadurpura Branch"}
        ];
        if(validateIfsc()) {
            let x = Math.floor((Math.random() * bankNameslist.length));
            $("#bank-name").val(bankNameslist[x].name);
            $("#bank-branch").val(bankNameslist[x].branch);
        }
    });



    // for head of account - balance - loc select options
    $("#head-of-ac").click(function() {
        const headOfAcs = [
            {"hod": "0853001020002000000NVN", "bal": "1000000", "loc": "5000"},
            {"hod": "8342001170004001000NVN", "bal": "1008340", "loc": "4000"},
            {"hod": "2071011170004320000NVN", "bal": "14530000", "loc": "78000"},
            {"hod": "8342001170004002000NVN", "bal": "1056400", "loc": "34000"},
            {"hod": "2204000030006300303NVN", "bal": "123465400", "loc": "5000"}
        ];
        
        let headOfAcSelectedOption = $("#head-of-ac").val();
        
        let getObj = headOfAcs.find(x => x.hod === headOfAcSelectedOption);
        
        $("#bal-in-rs").val(getObj.bal);
        $("#loc-in-rs").val(getObj.loc);
    });



    // for expenditure type and purpose type select options
    function clearOptions() {
        $('#purpose-type').empty().append('<option value = "">Select</option>');
    }

    $("#expenditure-type").click(function() {
        clearOptions();
        const expenditureTypes = [
            ["Capital Expenditure", "Maintain current levels of operation within the organization.", "Expenses to permit future expansion."],
            ["Revenue Expenditure", "Sales costs or All expenses incurred by the firm that are directly tied to the manufacture and selling of its goods or services.", "All expenses incurred by the firm to guarantee the smooth operation."],
            ["Deferred Revenue Expenditure", "Exorbitant Advertising Expenditures.", "Unprecedented Losses.", "Development and Research Cost."]
        ];

        var expTypeSelectedOption = $("#expenditure-type").val();
        for(let item of expenditureTypes) {
            if(expTypeSelectedOption == item[0]){
                let i = 1;
                while(i < item.length) {
                    $('#purpose-type').append('<option value=" '+ item[i] +' ">' + item[i] + '</option>');
                    i++;
                }
            }
        }
    });



    // validating form fields
    $("#form").submit(function() {
        var returnval = true;
        clearErrors();
        
        // validating ifsc on click of form submit button also
        returnval = validateIfsc();

        // for party account number
        var partyAcNo = $("#party-ac-no").val();
        if(partyAcNo.length == 0) {
            setError("party-ac-no", "*required");
            returnval = false;
        }
        else if(isNaN(partyAcNo) == true) {
            setError("party-ac-no", "*Should only contain numbers");
            returnval = false;
        }
        else if (partyAcNo.length < 12 || partyAcNo.length > 22) {
            setError("party-ac-no", "*Should be min 12 and max 22 digits");
            returnval = false;
        }
        else if(partyAcNo.startsWith("-") || partyAcNo.startsWith("+")) {
            setError("party-ac-no", "*Not valid");
            returnval = false;
        }

        // for confirm party account number
        var confirmPartyAcNo = $("#confirm-party-ac-no").val();
        if(confirmPartyAcNo.length == 0) {
            setError("confirm-party-ac-no", "*required");
            returnval = false;
        }
        else if(partyAcNo != confirmPartyAcNo) {
            setError("confirm-party-ac-no", "*Account number doesn't match");
            returnval = false;
        }

        // for party name
        var partyName = $("#party-name").val();
        if(containsSpecialChars(partyName)) {
            setError("party-name", "*Should not have special characters");
            returnval = false;
        }
        else if(partyName.length == 0) {
            setError("party-name", "*required");
            returnval = false;
        }

        // for hod
        var hod = $("#head-of-ac").val();
        if(hod == "") {
            setError("head-of-ac", "*required");
            returnval = false;
        }


        // for expenditure type
        var expType = $("#expenditure-type").val();
        if(expType == "") {
            setError("expenditure-type", "*required");
            returnval = false;
        }


        // for purpose type
        var purposeType = $("#purpose-type").val();
        if(purposeType == "") {
            setError("purpose-type", "*required");
            returnval = false;
        }

        // for purpose
        var purpose = $("#purpose").val();
        if(purpose.length > 500) {
            setError("purpose", "*Max 500 characters allowed");
            returnval = false;
        }
        else if(purpose.length == 0) {
            setError("purpose", "*required");
            returnval = false;
        }

        // for party amount in rs
        var partyAmount = $("#party-amount").val();
        if(partyAmount == 0) {
            setError("party-amount", "*required");
            returnval = false;
        }
        else if(partyAmount%1 != 0) {
            setError("party-amount", "*Should not be in fractions");
            returnval = false;
        }    

        return returnval;
    });


    // code for sidebar toggle
    $("#side-nav-button").click(function() {
        let sidebarWidth = $("#sidebar").width();
        if(sidebarWidth == 0) {
            $("#sidebar").width("300px");
            $("#main-section").css("margin-left", "calc(300px + 1em)");
            $("#header-bg").css("margin-left", "300px");
        }
        else {
            $("#sidebar").width("0");
            $("#main-section").css("margin-left", "1em");
            $("#header-bg").css("margin-left", "0");
        }
    });

});