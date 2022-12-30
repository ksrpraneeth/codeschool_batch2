var validation = true;

$("#hoaSearch").click(function () {
  var formdata = { hoa: $("#hoa").val() };
  $("#asNumber").empty();
  $("#asDate").empty();
  $("#asAmount").empty();
  $("#tsDate").empty();
  $("#tsAmount").empty();
  $("#tsNumber").text("");

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


        var hoaId = localStorage.getItem('hoaId')

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



//Tender Percentage

$('#tenderPercentage').change(function(){
  var percentage =$('#tenderPercentage').val()
  if(percentage<0 || percentage>100){
    window.alert("Please Enter value Between 0 to 100.")
    validation= false;
  }
})



//Work Month

$('#workMonth').change(function(){
  var workMonth =$('#workMonth').val()
  if(workMonth<0){
    window.alert("Please Enter value Greater than 0.")
    validation= false;
  }
})

//Work Day

$('#workDay').change(function(){
  var workDay =$('#workDay').val()
  if(workDay<0 || workDay>30){
    window.alert("Please Enter value Between 0 to 30.")
    validation= false;
  }
})


$("#asNumber").change(function () {
  var formdata2 = {
    asId: $("#asNumber Option:selected").val(),
  };
  $("#asDate").empty();
  $("#asAmount").empty();
  $("#tsNumber").text("");

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
        localStorage.setItem("asId", data.output[0].id);
      }
    },
  });
});

$("#asNumber").change(function () {
  $("#tsAmount").text("");
  $("#tsDate").text("");

  var formdata3 = {
    asId: $("#asNumber option:selected").val(),
  };
  console.log(formdata3);

  $.ajax({
    type: "POST",
    url: "api/tsSearchapi.php",
    data: formdata3,
    datatype: "JSON",
    success: function (data) {
      data = JSON.parse(data);
      if (data.status) {
        $("#tsNumber").append(
          `<option selected disabled>Select an Option</option>`
        );
        for (i = 0; i <= data.output.length; i++) {
          $("#tsNumber").append(
            `<option value="${data.output[i].id}">${data.output[i].tsnumber}</option>`
          );
          localStorage.setItem('tsId',data.output[i].id)
        }
      }
    },
  });
});

$("#tsNumber").change(function () {
  var formdata = { tsid: $("#tsNumber option:selected").val() };

  console.log(formdata);

  $.ajax({
    type: "POST",
    url: "api/tsSearchapi.php",
    data: formdata,
    datatype: "JSON",
    success: function (data) {
      data = JSON.parse(data);
      if (data.status) {
        $("#tsAmount").text(data.output[0].tsamount);
        $("#tsDate").text(data.output[0].tsdate);
      }
    },
  });
});

//pan number search add and search

var panIdarray = [];

$("#pansearch").click(function () {
  var pannumber = { pan: $("#pan").val() };

 
  $.ajax({
    type: "POST",
    url: "api/pannumbersearchApi.php",
    data: pannumber,
    datatype: "JSON",
    success: function (data) {
      data = JSON.parse(data);
      if (data.status) {

        

      
        if(panIdarray.includes(data.output[0].agencyid)){
            swal("", "Pan number already exist", "error");
        }
        else{
            var panlength=panIdarray.length;
            $("#pantable").append(`<tr>
                <td>${data.output[0].agencyname}</td>
                <td>${data.output[0].pannumber}</td>
                
                <td>${data.output[0].mobilenumber}</td>
                
                <td><button type="button" class="btn btn-danger"id="cleared" onclick="clearpan(${panlength})">Clear</button></td>
                </tr>`);

                panIdarray.push(data.output[0].agencyid);
                console.log(panIdarray)
        }
   




        // $("#pantable").append(`<tr>
        //         <td>${data.output[0].agencyname}</td>
        //         <td>${data.output[0].pannumber}</td>
                
        //         <td>${data.output[0].mobilenumber}</td>
                
        //         <td><button type="button" class="btn btn-success" onclick="savepan(${data.output[0].agencyid},${data.output[0].gstinid})">Save</button></td>
        //         </tr>`);

       



      }
      
      else {
        swal("", data.message, "warning");
      }
    },
    error: function () {},
  });
});

function clearpan(arrayindex) {

$('#cleared').css("background-color", "yellow")
  console.log(arrayindex);

  panIdarray.splice(arrayindex,1,'_');
 console.log(panIdarray);

}

//SAVE Work Id

$('#saveWorkId').click(function(){

 

for(let i=0;i<panIdarray.length;i++){
  if(panIdarray[i]=='_'){
    panIdarray.splice(i,1);
  }
}

if(panIdarray.length==0){
  alert("Please add the pan details");

}

else{
  var formdataSave={

hoaID:localStorage.getItem('hoaId'),
asId:localStorage.getItem('asId'),
tsId:localStorage.getItem('tsId'),
agreementNumber:$("#agrrementNumber").val(),
workName:$('#workName').val(),
sanctionAuthority:$('#sanctionAuthority').val(),
estimateValue:$('#estimateValue').val(),
agreementValue:$('#agreementValue').val(),
expenditureTillDate:$('#expenditure').val(),
pendingBillAmount:$('#pendingBill').val(),
tenderPercentage:$('#tenderPercentage').val(),
ssrYear:$('#ssrYear').val(),
startDate:$('#startDate').val(),
workPeriodMonth:$('#workMonth').val(),
workPeriodDate:$('#workDay').val(),
expectedDateCompletion:$("#expectedDate").val(),
panId:panIdarray

  }

$.ajax({

type:"POST",
url:"api/addWorkidapi.php",
data:formdataSave,
datatype:"JSON",
success:function(data){
  data=JSON.parse(data);

  if(data.status){
    window.alert("Work Id Added Successfully.")
    window.location.reload();
  }

  else{
    window.alert(data.message)
    // swal('',"data.message",'warning');
  }
}

})

}


})
