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



    // form validation
    function setError(id, error) {
        $('#'+id).next().text(error);
    }

    function clearErrorsAll() {
        $('.error-msg').text("");
    }

    $("form").submit(function() {
        var returnval = true;
        clearErrorsAll();
        
        var formFieldIds = [];
        $("#hod-form").find("input, select").each(function(){ formFieldIds.push(this.id); });

        formFieldIds.forEach( function(item) {

            if($('#'+item).val().length == 0) {
                returnval = false;
                setError(item, "*required");
            }

        });


        if(!returnval) {
            $('#form-preview-body').append('<span class="error-msg">enter all required fields</span>');
        }
        return returnval;
    });

   
    // form clear functionality
    $("#form-clear-btn").click(function(){
        clearErrorsAll();
        $("#hod-form").trigger("reset");
    });










    function clearErrors(id) {
        $('#'+id).next().text("");
    }

    // for major head
    var majorHeadValues = [
        ["", ""],
        ["1234", "onetwothreefour"],
        ["2345", "twothreefourfive"],
        ["3456", "threefourfivesix"],
        ["4567", "fourfivesixseven"],
        ["5678", "fivesixseveneight"],
        ["6789", "sixseveneightnine"]
    ];
    $("#major-head").blur(function() {        
        var flag = false;
        for(var i of majorHeadValues) {
            if(i[0] == $(this).val()) {               
                $("#major-head-description").val(i[1]);
                flag = true;
                clearErrors(this.id);
                clearErrors(this.id+'-description');
            }
        }
        if(!flag){
            $("#major-head-description").val("");
            setError(this.id, "enter correct value");
            setError(this.id+"-description", "provide correct value");
        }
    });

    // for sub major head
    var subMajorHeadValues = [
        ["", ""],
        ["12", "onetwo"],
        ["23", "twothree"],
        ["34", "threefour"],
        ["45", "fourfive"],
        ["56", "fivesix"],
        ["67", "sixseven"]
    ];
    $("#sub-major-head").blur(function() {        
        var flag = false;
        for(var i of subMajorHeadValues) {
            if(i[0] == $(this).val()) {               
                $("#sub-major-head-description").val(i[1]);
                flag = true;
                clearErrors(this.id);
                clearErrors(this.id+'-description');
            }
        }
        if(!flag){
            $("#sub-major-head-description").val("");
            setError(this.id, "enter correct value");
            setError(this.id+"-description", "provide correct value");
        }
    });


    // for minor head
    var minorHeadValues = [
        ["", ""],
        ["123", "onetwothree"],
        ["234", "twothreefour"],
        ["345", "threefourfive"],
        ["456", "fourfivesix"],
        ["567", "fivesixseven"],
        ["678", "sixseveneight"]
    ];
    $("#minor-head").blur(function() {        
        var flag = false;
        for(var i of minorHeadValues) {
            if(i[0] == $(this).val()) {               
                $("#minor-head-description").val(i[1]);
                flag = true;
                clearErrors(this.id);
                clearErrors(this.id+'-description');
            }
        }
        if(!flag){
            $("#minor-head-description").val("");
            setError(this.id, "enter correct value");
            setError(this.id+"-description", "provide correct value");
        }
    });


    // for group sub head
    var groupSubHeadValues = [
        ["", ""],
        ["12", "onetwo"],
        ["23", "twothree"],
        ["34", "threefour"],
        ["45", "fourfive"],
        ["56", "fivesix"],
        ["67", "sixseven"]
    ];
    $("#group-sub-head").blur(function() {        
        var flag = false;
        for(var i of groupSubHeadValues) {
            if(i[0] == $(this).val()) {               
                $("#group-sub-head-description").val(i[1]);
                flag = true;
                clearErrors(this.id);
                clearErrors(this.id+'-description');
            }
        }
        if(!flag){
            $("#group-sub-head-description").val("");
            setError(this.id, "enter correct value");
            setError(this.id+"-description", "provide correct value");
        }
    });


    // for sub head
    var subHeadValues = [
        ["", ""],
        ["12", "onetwo"],
        ["23", "twothree"],
        ["34", "threefour"],
        ["45", "fourfive"],
        ["56", "fivesix"],
        ["67", "sixseven"]
    ];
    $("#sub-head").blur(function() {        
        var flag = false;
        for(var i of subHeadValues) {
            if(i[0] == $(this).val()) {               
                $("#sub-head-description").val(i[1]);
                flag = true;
                clearErrors(this.id);
                clearErrors(this.id+'-description');
            }
        }
        if(!flag){
            $("#sub-head-description").val("");
            setError(this.id, "enter correct value");
            setError(this.id+"-description", "provide correct value");
        }
    });


    // for detailed head
    var detailedHeadValues = [
        ["", ""],
        ["123", "onetwothree"],
        ["234", "twothreefour"],
        ["345", "threefourfive"],
        ["456", "fourfivesix"],
        ["567", "fivesixseven"],
        ["678", "sixseveneight"]
    ];
    $("#detailed-head").blur(function() {        
        var flag = false;
        for(var i of detailedHeadValues) {
            if(i[0] == $(this).val()) {               
                $("#detailed-head-description").val(i[1]);
                flag = true;
                clearErrors(this.id);
                clearErrors(this.id+'-description');
            }
        }
        if(!flag){
            $("#detailed-head-description").val("");
            setError(this.id, "enter correct value");
            setError(this.id+"-description", "provide correct value");
        }
    });



    // for sub detailed head
    var subDetailedHeadValues = [
        ["", ""],
        ["123", "onetwothree"],
        ["234", "twothreefour"],
        ["345", "threefourfive"],
        ["456", "fourfivesix"],
        ["567", "fivesixseven"],
        ["678", "sixseveneight"]
    ];
    $("#sub-detailed-head").blur(function() {        
        var flag = false;
        for(var i of subDetailedHeadValues) {
            if(i[0] == $(this).val()) {               
                $("#sub-detailed-head-description").val(i[1]);
                flag = true;
                clearErrors(this.id);
                clearErrors(this.id+'-description');
            }
        }
        if(!flag){
            $("#sub-detailed-head-description").val("");
            setError(this.id, "enter correct value");
            setError(this.id+"-description", "provide correct value");
        }
    });

    
    // for form preview
    $('#form-preview-btn').on('click', function(){
        $('#form-preview-body').find('p').remove();
        var formFieldIds = [];
        $("#hod-form").find("input, select").each(function(){ formFieldIds.push(this.id); });
        formFieldIds.forEach( function(item) {
            
            var val = $('#'+item).val();
            
            $('#form-preview-body').append('<p>'+item+" : "+val+'</p>');

        });

    });

    







});