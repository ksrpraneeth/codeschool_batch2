if (!('user_token' in localStorage)) {
    window.location.replace('login.php');
}
function viewsalarybreakup(employeeId, month, year,id) {

    
    var formdata = {
        employeeid: employeeId,
        month: month,
        salaryid:id,
        year: year

    }
    console.log(formdata);

    $('#nameEmployee').text('');
    $('#WorkingStatus').text('');
    $('#location').text('');
    $('#workingposition').text('');
    $('#month').text('')
    $('#year').text('')
    $('#deductioncoloumn').empty();
    $('#earningColoumn').empty()
    $('#netsalary').text("");
    $.ajax({

        type: "POST",
        url: "api/salarybreakup.php",
        data: formdata,
        success: function (data) {
            month = ['','january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december']
            data = JSON.parse(data);
            console.log(data)
            if (data.status) {
                $('#nameEmployee').text(data.Data.output[0].concat);
                $('#WorkingStatus').text(data.Data.output[0].status_description)
                $('#location').text(data.Data.output[0].district)
                $('#workingposition').text(data.Data.output[0].description)
                $('#month').text(month[data.Data.output[0].month])
                $('#year').text(data.Data.output[0].year)

                var earningsum = 0;
                // for(let i=0;i<data.Data.earning.length;i++){
                //     $('#earningColoumn').append(`<tr>
                //     <td>${data.Data.earning[i].description}</td>
                //     <td>${data.Data.earning[i].amount}</td>
                //     </tr>`)
                //     earningsum=earningsum+data.Data.earning[i].amount;
                // }
                data.Data.earning.forEach(function (element) {
                    $('#earningColoumn').append(`<tr>
                <td>${element.description}</td>
                <td>${element.amount}</td>
                </tr>`)
                    earningsum = earningsum + element.amount;
                })


                $('#earningColoumn').append(`<tr>
           
            <th>Total Earning</th>
            <th>${earningsum}</th>
            </tr>`);



                var deductionsum = 0;
                // for(let i=0;i<data.Data.deduction.length;i++){
                //     $('#deductioncoloumn').append(`<tr>
                //     <td>${data.Data.deduction[i].description}</td>
                //     <td>${data.Data.deduction[i].amount}</td>
                //     </tr>`)
                //     deductionsum=deductionsum+data.Data.deduction[i].amount;
                // }
                data.Data.deduction.forEach(function (element) {
                    $('#deductioncoloumn').append(`<tr>
                    <td>${element.description}</td>
                    <td>${element.amount}</td>
                    </tr>`)
                    deductionsum = deductionsum + element.amount;
                })



                $('#deductioncoloumn').append(`<tr>
            <th>Total Deduction</th>
            <th>${deductionsum}</th>
            </tr>`);



                $('#netsalary').text(earningsum - deductionsum);
            }



        },
        error: function () {

        }
    })
}


function salary_info() {



    
    $.ajax({
        type: "POST",
        url: "api/salary.php",
        datatype: "JSON",
        success: function (data) {
            data = JSON.parse(data)
            if (data.status) {
                // for(let i=0;i<data.Data.length;i++){

                //     $("#salaryRow").append(`<tr>
                //     <td>${i+1}</td>
                //     <td>${data.Data[i].concat}</td>
                //     <td>${data.Data[i].month}</td>
                //     <td>${data.Data[i].year}</td>
                //     <td>${data.Data[i].paid_on}</td>
                //     <td>${data.Data[i].gross}</td>
                //     <td>${data.Data[i].deduction}</td>
                //     <td>${data.Data[i].net}</td>
                //     <td><button onclick=viewsalarybreakup(${data.Data[i].employee_id
                //     }) class="btn btn-success " data-bs-toggle="modal" data-bs-target="#exampleModal">view</button></td>



                //     </tr>`);

                // }
                
                data.Data.forEach(function (element, index) {
                    $("#salaryRow").append(`<tr>
        <td>${index + 1}</td>
        <td>${element.concat}</td>
        <td>${element.month}</td>
        <td>${element.year}</td>
        <td>${element.paid_on}</td>
        <td>${element.gross}</td>
        <td>${element.deduction}</td>
        <td>${element.net}</td>
        <td><button onclick=viewsalarybreakup(${element.employee_id
                        },${element.month},${element.year},${element.id}) class="btn btn-success " data-bs-toggle="modal" data-bs-target="#exampleModal">view</button></td>

        <td><button  class="btn btn-danger" onclick="deleteSalary(${element.id},${element.month},${element.year},${element.employee_id
        })">Delete</button></td>
    
    
    
        </tr>`);
        

                })
            }
            else {

                $('#error').text(data.message);
            }
        },
        error: function () {

        }
    })
}
salary_info();





function deleteSalary(salaryid, month, year,employeeid) {
    var formdata = {
        employeeid:employeeid,
        salartID: salaryid,
        month:month, 
        year: year
    }
    console.log(formdata)

    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "POST",
                url: "api/salarydelete.php",
                data: formdata,
                datatype: "JSON",
                success: function (data) {
                    data = JSON.parse(data)
                    if (data.status) {
                        swal(data.message, "", "success");
                        window.location.reload("salary.php")
                    }
                    else {
                        swal(data.message, "", "error");
                    }
                }, error: function (data) {
        
                }
            });
        } else {
          swal("Your Salary data is not delete!");
        }
      });
    
}


//----------add salary button------------------------------

$('#addSalary').click(function () {
    $('#employeeInSalary').empty();
    $.ajax({
        type: "POST",
        url: "api/addsalaryEmployeeapi.php",
        datatype: "JSON",
        success: function (data) {
            data = JSON.parse(data)
            if (data.status) {
                $('#employeeInSalary').append(`<option disabled selected value="">Select Employee name</option>`);
                data.Data.forEach(function (element) {
                    $('#employeeInSalary').append(`<option value="${element.id}">${element.concat}</option>`)

                })
            }
        }, error: function () {

        }
    })
})
//------------------------net salary update---------------------------
$('#BasicSalary').mouseleave(function(){if($('#BasicSalary').val()=='' || $('#BasicSalary').val()<0){$('#BasicSalary').val('0')}})
$('#da').mouseleave(function(){if($('#da').val()=='' || $('#da').val()<0){$('#da').val('0')}})
$('#hra').mouseleave(function(){if($('#hra').val()=='' || $('#hra').val()<0){$('#hra').val('0')}})
$('#ca').mouseleave(function(){if($('#ca').val()=='' || $('#ca').val()<0){$('#ca').val('0')}})
$('#ma').mouseleave(function(){if($('#ma').val()=='' || $('#ma').val()<0){$('#ma').val('0')}})
$('#bonus').mouseleave(function(){if($('#bonus').val()=='' || $('#bonus').val()<0){$('#bonus').val('0')}})
$('#tds').mouseleave(function(){if($('#tds').val()=='' || $('#tds').val()<0){$('#tds').val('0')}})
$('#pf').mouseleave(function(){if($('#pf').val()=='' ||$('#pf').val()<0){$('#pf').val('0')}})



//------------------------save salary button-----------------------------------------

$('#saveSalary').click(function () {
    let gross=Number($('#BasicSalary').val())+Number($('#da').val())+Number($('#hra').val())+Number($('#ca').val())+Number($('#ma').val())+Number($('#bonus').val());
let deduction=Number($('#tds').val())+Number($('#pf').val());

$('#grossSalary').val(gross)
$('#deductionSalary').val(deduction)
$('#netSalary').val(gross-deduction);

    $('#salaryError').text("");
    $('#monthError').text("");
    $('#yearError').text("")
    $('#paidError').text("")
    $('#grossError').text("")
    $('#deductionError').text("")
    $('#netsalaryError').text("")
   

    var formdata = {
        employeeid: $('#employeeInSalary option:selected').val(),
        month: $('#salaryMonth option:selected').val(),
        year1: $('#salaryYear2 option:selected').val(),
        paid_on: $('#salarydate').val(),
        gross: $('#grossSalary').val(),
        deduction: $('#deductionSalary').val(),
        netsalary: $('#netSalary').val(),
        baisc:$('#BasicSalary').val(),
        da:$('#da').val(),
        hra:$('#hra').val(),
        ca:$('#ca').val(),
        ma:$('#ma').val(),
        bonus:$('#bonus').val(),
        tds:$('#tds').val(),
        pf:$('#pf').val()
       
    }

    console.log(formdata)
    let year = new Date(formdata.paid_on).getFullYear()
    let month = new Date(formdata.paid_on).getMonth()
    let status = true;

    if (!formdata.employeeid) {
        $('#salaryError').text("Please fill the required fields")
        status = false;
    }

    if (!formdata.month) {
        $('#monthError').text("Please fill the required fields")
        status = false;
    }

    if (!formdata.year1) {
        $('#yearError').text("Please fill the required fields")
        status = false;
    }

    if (!formdata.paid_on) {
        $('#paidError').text("Please fill the required fields")
        status = false;
    }

   

    if ((!formdata.gross) || formdata.gross < 0) {
        $('#grossError').text("Fill the section properly")
        status = false;
    }

    if ((!formdata.deduction) || formdata.deduction < 0) {
        $('#deductionError').text("Fill the section properly")
        status = false;
    }

    if (formdata.netsalary < 0 || formdata.netsalary == 0) {
        $('#netsalaryError').text("Fill the section properly")
        status = false;
    }




    if (!status) {
        swal("Can not submit the form", "", "error");
    }
    else {
        $.ajax({
            type: "POST",
            url: "api/salaryupdate.php",
            data: formdata,
            datatype: "JSON",
            success: function (data) {
                data=JSON.parse(data)
if(data.status){
    swal("Salary added succesfully", "", "success");
    window.location.reload("salary.php")
}
else{
    swal(data.message, "", "error");
}
            }, error: function () {

            }
        })
    }


})

$('#employeelistSalary').empty()
$('#employeelistSalary').append(`<option value="" selected>All Employees</option>`)
$.ajax({
    type:"POST",
    url:"api/employeelistapi.php",
    datatype:"JSON",
    success:function(data){
        data=JSON.parse(data);
if(data.status){
    data.Data.forEach(function(element){
        
        $('#employeelistSalary').append(`<option value='${element.id}'>${element.concat}</option>`)
    })
}
    },error:function(data){

    }
})



//--------------------------- salary filter------------------------------------------------------

$('#filtersalary').click(function(){
    let formdata={
        employeeId:$('#employeelistSalary option:selected').val(),
        month:$('#filterSalaryMonth option:selected').val(),
        salaryyear:$('#salaryYear option:selected').val(),
        limitoption:$('#salaryfilterLimit option:selected').val(),
        box1:$('#boxvalue1').val(),
        box2:$('#boxvalue2').val()
         
    }

    console.log(formdata);
    $('#salaryRow').empty();

    $.ajax({
        type:"POST",
        url:"api/filtersalaryapi.php",
        data:formdata,
        datatype:"JSON",
        success:function(data){
            data=JSON.parse(data)
if(data.status){


    data.Data.forEach(function (element, index) {
        $("#salaryRow").append(`<tr>
<td>${index + 1}</td>
<td>${element.concat}</td>
<td>${element.month}</td>
<td>${element.year}</td>
<td>${element.paid_on}</td>
<td>${element.gross}</td>
<td>${element.deduction}</td>
<td>${element.net}</td>
<td><button onclick=viewsalarybreakup(${element.employee_id
            },${element.month},${element.year},${element.id}) class="btn btn-success " data-bs-toggle="modal" data-bs-target="#exampleModal">view</button></td>

<td><button  class="btn btn-danger" onclick="deleteSalary(${element.id},${element.month},${element.year},${element.employee_id
})">Delete</button></td>



</tr>`);


    })
}

else{
    swal("No such data found", "", "error");
}
        },
        error:function(){

        }
    })
})




//---------------------------------------salary filter limit drop down-----------------------
$('#salaryfilterLimit').mouseleave(function(){
let limitval=$('#salaryfilterLimit option:selected').val()

if(Number(limitval)==3){
    $('#box1').removeClass('d-none')
    $('#box2').removeClass('d-none')
}

else if(Number(limitval)==1 ||Number(limitval)==2){
    $('#box1').removeClass('d-none')
}

else{
    $('#box1').addClass('d-none')
    $('#box2').addClass('d-none')
}

})

//-----------------------------gross salary fetch ---------------------------------------------------
