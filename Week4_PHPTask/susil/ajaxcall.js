var today = new Date();
var day = today.getDay();
var daylist = ["Sunday", "Monday", "Tuesday", "Wednesday ", "Thursday", "Friday", "Saturday"];
var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
var dateTime = date + ' ' + time;

document.getElementById("dt").innerHTML = dateTime + ' <br>';
//ifsc validation

    $("#exp_type").change(function(){
      
        let expenditureType={expenditureType:$("#exp_type").val()}
        $.ajax({
          type: "POST",
            url:"expenditure_type.php",
          
            datatype: "JSON",
            data: expenditureType,
            success:function(data){
              data=JSON.parse(data);
              for(let i=0;i<data.output.length;i++){
                $("#purpose_type").append(`
                <option value="">${data.output[i]}"</option>
                `);
              }
            },
            error:function(){
              console.log("error")
            }
              
          
        });
    });
    //head of account...
  $("#head_account").change(function(){
    $("#hd").text("");
    var headofAccount={headAccount:$("#head_account").val()};
    $.ajax({
      type: "POST",
      url:"head_of_account.php",
    
      datatype: "JSON",
      data:headofAccount,
      success:function(data){
        data=JSON.parse(data);
        if(data.status==0){
          $("#hd").text(data.output['headaccountError']);
          $('#bal').text('');
          $('#loc').text('');
          return;
        }
        $('#bal').text(data.output['Balance']);
          $('#loc').text(data.output['Loc']);
      },
      error:function(){},
    });
  });
  //ifsc validation
  $('#search').click(function(){
    $('')
  })