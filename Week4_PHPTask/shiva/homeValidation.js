//Ajaxcall for forms


$("document").ready(function(){
  console.info('calling');
  $("#next").click(function(e){
    let partyAccountno = $("#partyAccountno").val()
    let confirmPartyaccountno = $("#confirmPartyaccountno").val()
    let partyName = $("#partyName").val()
  e.preventDefault();
$.ajax({
      url: 'http://localhost/codeschool/validations.php',
      datatype: JSON,
      type: 'POST',
      data:  {
        partyAccountno,
        confirmPartyaccountno,
        partyName
      },
      success: (data) => {
        data = JSON.parse(data);
        console.log(data.errors.partyAccountnoerr)

        $(partyAccountnoErr).text(data.errors.partyAccountnoerr);

        $(confirmPartyAcNoErr).text(data.errors.confirmPartyaccountnoerr);

        $(partyNameErr).text(data.errors.partyNameerr);
      }
    })
  })
})

//Ajaxcall for IFSC CODE

$("document").ready(function () {
  $("#search").click(function () {
    let ifscCode = $("#ifscCode").val()
    $.ajax({
      url: "http://localhost/codeschool/ifscvalidations.php",
      method: "POST",
      datatype: JSON,
      data: {
        ifscCode
      },
      success: (data) => {
        console.log(data)
        data = JSON.parse(data);

        if (data.status == false) {
          console.log(data)

          $(ifscCodeerr).text(data.message.ifscCode);
          console.log(ifscCodeerr);
          console.log(typeof ifscCodeerr);


        }
        else {
          $("#bankName").val(data.data.bank);
          $("#bankBranch").val(data.data.branch)
        }
      }
    })
  })
})




 // $.ajax({
       // url: 'http://localhost/codeschool/validations.php',
        //datatype: 'json',
        //type: 'POST',
        //data:  'FormData',
        //var accountnumber = $("#acc").val()
        //success: function (data,status,xmlHTTPReq){
        //var  data = JSON.parse(data);
          //  console.log(data)
       // }
//})

  //  })
//})

//Ajaxcall for HoA

$("document").ready(function () {
  $("#hoa").change( function () {
    let hoa = $("#hoa").val()
    $.ajax({
      url: "http://localhost/codeschool/headofaccount.php",
      method: "POST",
      datatype: JSON,
      data: {
        hoa

      },
      success: (data) => {
        console.log(data)
        data = JSON.parse(data);

        if (data.status == false) {
          $("#hoa").val(data.errors["hoaerr"]);
        }
        else {

          console.log(data.data.Loc);
          $("#Balance").val(data.data.Balance);
          $("#Loc").val(data.data.Loc)
        }
      }
    })
  })
})

//Ajaxcall for Expenditure
function expenditureSelect() {
  $("#expenditureType").change(function() {
  expenditureType = $("#expenditureType").val();
  $("#purposeTypeerr").html('');
  $('#purposeType').find('option').remove();
  $.ajax({
      method: "POST",
      data: {'expenditureType': expenditureType},
      url: 'http://localhost/codeschool/expenditure.php',
      success: function (result) {
          result = JSON.parse(result);
          console.log('see',result);
          if(result.status==false){
              $("#purposeTypeerr").html(result.error);
          }else{
              console.log(result.data);
              $('#purposeType').append(`<option value="0">Select</option>`);
              for (let i=0;i<result.data.length;i++){
                  let optionText = result.data[i];
                  let optionValue = result.data[i];
                  $('#purposeType').append(`<option value="${optionValue}">${optionText}</option>`);
              }
          }
      }
  });
})
}



