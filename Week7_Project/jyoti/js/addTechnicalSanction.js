var validation = true;

//Date

var todayDate = new Date();
var cuurentYear = todayDate.getFullYear();
var currentMonth = todayDate.getMonth();
var currentDate = todayDate.getDate();

if (currentMonth < 10) {
  currentMonth = "0" + currentMonth;
}

if (currentDate < 10) {
  currentDate = "0" + currentDate;
}
var maxDate = cuurentYear + "-" + currentMonth + "-" + currentDate;

$("#dateMax").attr("max", maxDate);

console.log(maxDate);

// HOA

$("#hoa").change(function () {
  let hoa = $("#hoa").val();
  $("#hoaError").text("");

  if (hoa.length != 19) {
    $("#hoaError").text("HOA Should be 19 Characters");
    validation = false;
  } else {
    // swal( "","HOA Added Successfully", "success");
    validation = true;
  }
});

//Add HOA

$("#addHoa").click(function () {
  var formdata = { hoa: $("#hoa").val() };
  $("#asNumber").empty();
  $("#asDate").empty();
  $.ajax({
    type: "POST",
    url: "api/searchHoa_technicalSanctionapi.php",
    data: formdata,
    datatype: "JSON",
    success: function (data) {
      data = JSON.parse(data);

      if (data.status) {
        // $('#hoa').val(data.output[0].hoa)
        swal("", "HOA Added Successfully", "success");
        localStorage.setItem("hoaId", data.output[0].id);

        $("#asNumber").append(
          `<option selected disabled>Select an Option</option>`
        );
        for (i = 0; i <= data.output.length; i++) {
          $("#asNumber").append(
            `<option value="${data.output[i].id}">${data.output[i].asnumber}</option>`
          );
        }

  
      } else {
        swal("", data.output, "error");
        // $('#hoa').val('');
      }
    },
    error: function () {},
  });
});


$("#asNumber").change(function () {
  var formdata2 = {
    asId: $("#asNumber Option:selected").val(),
  };
  $("#asDate").empty()
  $("#asAmount").empty()
  $.ajax({
    type: "POST",
    url: "api/asIdapi.php",
    data: formdata2,
    datatype: "JSON",
    success: function (data) {
      data = JSON.parse(data);
      if (data.status) {
        $("#asDate").append(`${data.output[0].asdate}`);
        $("#asAmount").append(`${data.output[0].asamount}`);
        localStorage.setItem('asId',data.output[0].id)
      }
    },
  });
});


//Clear HOA

$("#clear").click(function () {
  $("#hoaError").text("");
  $("#hoa").val("");
});


//Technical Sanction Number

$("#tsNumber").change(function () {
  let asNumber = $("#tsNumber").val();
  $("#tsNumberError").text("");
  if (asNumber.length !== 10) {
    $("#tsNumberError").text("AS Number Should be 10 Characters Long.");
    validation = false;
  }

  if (asNumber.match(/[^A-Z-0-9]/)) {
    $("#tsNumberError").text("AS Number Should be Uppercase or Number.");
    validation = false;
  } else {
    validation = true;
  }
});


// AS Amount Validation

$("#amount").change(function () {
  let amount = $("#amount").val();
  $("#amountError").text("");

  if (amount.match(/[^0-9]/)) {
    $("#amountError").text("Only Numbers are Allowed");
    validation = false;
  }
  if (amount.length == 0) {
    $("#amountError").text(" AS Amount Should not be Kept Blank.");
    validation = false;
  }

  if (amount == 0) {
    $("#amountError").text(" AS Amount Should not be 0.");
    validation = false;
  } else {
    validation = true;
  }
});


// Select Date

$("#dateMax").change(function () {
  let date = $("#dateMax").val();
  $("#dateMaxError").text("");

  if (!date) {
    $("#dateMaxError").text("Please Select a Date");
    validation = false;
  } else {
    validation = true;
  }
  // console.log(date)
});

//  Select Type of Sanction

$("#sanctionAuthority").click(function () {
  let sanctionAuthority = $("#sanctionAuthority").val();
  $("#sanctionAuthorityError").text("");

  if (!sanctionAuthority) {
    $("#sanctionAuthorityError").text("Please Select  Sanction Authority");
    validation = false;
  }
});

//Add Technical Sanction

$('#addAdminSanction').click(function(){
  var formdata3 = {
    tsNumber:$("#tsNumber").val(),
    asId:localStorage.getItem('asId'),
    tsAmount:$('#amount').val(),
    tsDate:$('#dateMax').val(),
    sanctionAuthority:$('#sanctionAuthority').val()
  }

  localStorage.clear()
  $.ajax({
    type:"POST",
    url:"api/addTechnicalSanctionapi.php",
    data:formdata3,
    datatype:"JSON",
    success:function(data){
      data = JSON.parse(data);
      if (data.status){
        alert(data.output);
        window.location.reload();
        
      }
      else{
        swal("", data.message, "warning");
      }
    },
    error:function(){

    }
  })
});

