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

    // form field ids
    var displayRequiredIds = [];
    $("form").find(".disp-required").each(function(){ displayRequiredIds.push(this.id); });
    console.log(displayRequiredIds);


    // form validation
    function setError(id, error) {
        $('#'+id).next().text(error);
    }

    function clearErrors() {
        $('.error-msg').text("");
    }

    $("form").submit(function() {
        var returnval = true;
        clearErrors();
    
        displayRequiredIds.forEach( function(item) {

            if($('#'+item).val().length == 0) {
                returnval = false;
                setError(item, "*required");
            }

        });

        


    


        return returnval;
    });


    

   

    

    // form clear functionality
    var formfieldIds = [];
    $("form").find("select, input").each(function(){ formfieldIds.push(this.id); });
    $("#form-clear-btn").click(function() {
        clearErrors();
        formfieldIds.forEach( function(item) {
            $('#'+item).val("");
        });
    });


    


    // $('#form-preview-btn').click(function(){
    //     $('.modal-body').innerHTML(
    //         "ahdsf"
    //     );
    // });

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
        // clearErrors();
        for(var i of majorHeadValues) {
            if(i[0] == $(this).val()) {
                
                $("#major-head-description").val(i[1]);
            }
            // else{
            //     setError("major-head", "enter correct value");
            //     returnval = false;   
            // }
            // clearErrors();
        }
    });
});