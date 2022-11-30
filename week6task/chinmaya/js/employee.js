function viewEmployee(employeeId){
    $('#salaryerror').text("");
    $('#employeedata').empty();
    $('#employeesalary').removeClass('d-none')
    var id={employeeid:employeeId}
    $.ajax({
        type:"POST",
        url:"api/monthlysalary.php",
        data:id,
        datatype:"JSON",
        success:function(data){
            data=JSON.parse(data);


if(data.status){

    let monthname=['','january','february','march','april','may','june','july','august','september','october','november','december']


$('#employeename').text(data.employee_name[0].concat);

for(let i=0;i<data.salarydetails.length;i++){
    $('#employeedata').append(`<tr>
    <td>${monthname[data.salarydetails[i].month]}</td>
    <td>${data.salarydetails[i].year}</td>
    <td>${data.salarydetails[i].paid_on}</td>
    <td>${data.salarydetails[i].gross}</td>
    <td>${data.salarydetails[i].deduction}</td>
    <td>${data.salarydetails[i].net}</td>
        </tr>`);
    
}


    }
    else{
        $('#employeename').text(data.name[0].concat)
        $('#employeesalary').addClass('d-none')
        $('#salaryerror').text(data.message);
    }


        },
        error:function(){

        }
    })
}

function employee_details(){
    $('#details').removeClass('d-none');
    $.ajax({
        type: "POST",
        url: "api/employee.php",
        datatype: "JSON",
       
        success: function (data) {
            data = JSON.parse(data);
            if(data.status){
                for (let i=0;i<data.output.length;i++){
                    $("#mytable").append(`<tr>
                    <td>${i+1}</td>
                    <td>${data.output[i].concat}</td>
                    <td>${data.output[i].date_of_joining}</td>
                    <td>${data.output[i].dob}</td>
                    <td>${data.output[i].gender}</td>
                    <td>${data.output[i].status_description}</td>
                    <td>${data.output[i].description}</td>
                    <td>${data.output[i].district}</td>
                    <td>${data.output[i].gross}</td>
                    <td><button onclick="viewEmployee(${data.output[i].id})" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">View</button></td>


                    </tr>`);
                }
               
            }
            else{
                
            }
        },
        error: function () { }
    })
}
employee_details();