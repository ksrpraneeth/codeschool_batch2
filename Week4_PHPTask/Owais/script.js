//for current date

$(document).ready(function(){
    const d = new Date();

    const month = ["January","February","March","April","May","June","July","August","September","October","November","December"];

    $(".date").text(d.getDate()+"-"+month[d.getMonth()]+"-"+d.getFullYear());
    $(".time").text(d.toLocaleTimeString());
});

//for side bar to show/hide

function openNav(){
         
    let sidenavwidth= document.getElementById("mySidenav").offsetWidth;
    if(sidenavwidth==0){
        document.getElementById("mySidenav").style.width="260px";
        document.getElementById("main").style.marginLeft="260px";
        document.getElementById("header").style.marginLeft="260px";
       
    }
    else{
        document.getElementById("mySidenav").style.width="0";
        document.getElementById("main").style.marginLeft="0";
        document.getElementById("header").style.marginLeft="0";

    }
}

// Ajax call for IFSC code

$("#searchButton").click(function(){
    var ifsc = $("#ifscCode").val();
     
    $.ajax({
        type: "POST",
        url: "ifscDetails.php",
        data: {"ifscCode":ifsc},
        success: function(result){

        }


    });
});


// Ajax call for head of account

$("#headOfAccount").change(function(){
    var headOfAcc = $("#headOfAccount").val();
    $.ajax({
        type:"POST",
        url:"headOfAccount.php",
        data: {"headOfAccount":headOfAcc},
        success:function(result){
            let res = JSON.parse(result);
            $("#headOfAccountError").text("");
            if(res.status){
                $("#balance").val(res.data.balance);
                $("#loc").val(res.data.loc);
            }
            else{
                $("#balance").val("XXXXXX");
                $("#loc").val("XXXXXX");
                $("headOfAccountError").text(res.error);
            }
        }
    });
});

// Ajax call for expenditure type

$("#expenditureType").change(function(){
    var expenditure = $("#expenditureType").val();
    $.ajax({
        type:"POST",
        url:"expenditure.php",
        data: {"expenditureType":expenditure},
        success:function(result){
            let res = JSON.parse(result);
            console.log(res);
            if(res.status){
                $("#purposeType").empty().append('<option value=""> Select </option>');
                $("#expenditureError").text("");
                for(let item of res.data){
                    $("#purposeType").append("<option value='"+item+"'>" +item+ "</option>");
                }

            }
            else{
                $("expenditureError").text(res.error);
                $("#purposeType").empty().append('<option value=""> Select </option>');
            }
        }
    });
});

