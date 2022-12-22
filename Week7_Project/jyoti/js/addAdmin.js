var validation = true;

//  Select Type of Sanction

$("#sanctionType").click(function () {
  let sanctionType = $("#sanctionType").val();
  $("#sanctionTypeError").text("");

  if (!sanctionType) {
    $("#sanctionTypeError").text("Please Select Type of Sanction");
    validation = false;
  }
});

//  Select Finance Year

$("#sanctionYear").change(function () {
  let sanctionYear = $("#sanctionYear").val();
  $("#selectYearError").text("");

  if (!sanctionYear) {
    $("#selectYearError").text("Please Select Year");
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
});

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

// $('#date').datePicker(function(){
//     max = new Date(cuurentYear,currentMonth,currentDate)
// });

//Admin Sanction Number

$("#asNumber").change(function () {
  let asNumber = $("#asNumber").val();
  $("#asNumberError").text("");
  if (asNumber.length !== 10) {
    $("#asNumberError").text("AS Number Should be 10 Characters Long.");
    validation = false;
  }

  if (asNumber.match(/[^A-Z-0-9]/)) {
    $("#asNumberError").text("AS Number Should be Uppercase or Number.");
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

  $.ajax({
    type: "POST",
    url: "api/searchHoaapi.php",
    data: formdata,
    datatype: "JSON",
    success: function (data) {
      data = JSON.parse(data);

      if (data.status) {
        // $('#hoa').val(data.output[0].hoa)
        swal("", "HOA Added Successfully", "success");
        localStorage.setItem("hoaId", data.output[0].id);
      } else {
        swal("", data.output, "error");
        // $('#hoa').val('');
      }
    },
    error: function () {},
  });
});

//Clear HOA

$("#clear").click(function () {
  $("#hoaError").text("");
  $("#hoa").val("");
});

//Select Department

// $('#department').mouseenter(function(){
$("#department").empty();
$.ajax({
  type: "POST",
  url: "api/selectDepartmentapi.php",
  datatype: "JSON",
  success: function (data) {
    data = JSON.parse(data);
    if (data.status) {
      $("#department").append(
        `<option selected disabled>Select an Option</option>`
      );
      for (i = 0; i <= data.output.length; i++) {
        $("#department").append(
          `<option value="${data.output[i].id}">${data.output[i].departmentname}</option>`
        );
      }
    }
  },
});
// })



//  Select Type of Sanction

$("#sanctionAuthority").click(function () {
    let sanctionAuthority = $("#sanctionAuthority").val();
    $("#sanctionAuthorityError").text("");
  
    if (!sanctionAuthority) {
      $("#sanctionAuthorityError").text("Please Select  Sanction Authority");
      validation = false;
    }
  });



$("#addAdminSanction").click(function () {
  var formdata = {
    typeofSan: $("#sanctionType option:selected").val(),
    finacialyear: $("#sanctionYear option:selected").val(),
    date: $("#dateMax").val(),
    adminsanctionnumber: $("#asNumber").val(),
    amount: $("#amount").val(),
    hoa: localStorage.getItem("hoaId"),
    department: $("#department option:selected").val(),
    sanctionauthority: $("#sanctionAuthority option:selected").val(),
  };

  localStorage.clear()

  $.ajax({
    type: "POST",
    url: "api/addadminsanctionapi.php",
    data: formdata,
    datatype: "JSON",
    success: function (data) {
      data = JSON.parse(data);
      if (data.status) {

        alert(data.output)
        // swal("", data.output, "success");
        setTimeout(window.location.reload(),5000000)
        
      }
      else{
        swal("", data.message, "warning");
      }
    },
    error: function () {
        
    },
  });
});
