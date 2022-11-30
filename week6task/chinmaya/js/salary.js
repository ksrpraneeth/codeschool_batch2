
function viewsalarybreakup(employeeId){
    var formdata={
        employeeid:employeeId,
       
    }
    console.log(formdata);
   
    $('#nameEmployee').text('');
    $('#WorkingStatus').text('');
    $('#location').text('');
    $('#workingposition').text('');
    $('#deductioncoloumn').empty();
    $('#earningColoumn').empty()
    $('#netsalary').text("");
    $.ajax({
        
        type:"POST",
        url:"api/salarybreakup.php",
        datatype:"JSON",
        data:formdata,


        success:function(data){
        data=JSON.parse(data);
        if(data.status){
            $('#nameEmployee').text(data.output[0].concat);
            $('#WorkingStatus').text(data.output[0].status_description)
            $('#location').text(data.output[0].district)
            $('#workingposition').text(data.output[0].description)

            var earningsum=0;
            for(let i=0;i<data.earning.length;i++){
                $('#earningColoumn').append(`<tr>
                <td>${data.earning[i].description}</td>
                <td>${data.earning[i].amount}</td>
                </tr>`)
                earningsum=earningsum+data.earning[i].amount;
            }
            

            $('#earningColoumn').append(`<tr>
           
            <th>Total Earning</th>
            <th>${earningsum}</th>
            </tr>`);



            var deductionsum=0;
            for(let i=0;i<data.deduction.length;i++){
                $('#deductioncoloumn').append(`<tr>
                <td>${data.deduction[i].description}</td>
                <td>${data.deduction[i].amount}</td>
                </tr>`)
                deductionsum=deductionsum+data.deduction[i].amount;
            }



            $('#deductioncoloumn').append(`<tr>
            <th>Total Deduction</th>
            <th>${deductionsum}</th>
            </tr>`);



            $('#netsalary').text(earningsum-deductionsum);
        }
        },
        error:function(){

        }
    })
}


function salary_info(){



    $('#details').removeClass("d-none");
    $.ajax({
        type:"POST",
        url:"api/salary.php",
        datatype:"JSON",
        success:function(data){
            data=JSON.parse(data)
if(data.status){
for(let i=0;i<data.output.length;i++){
  
    $("#salaryRow").append(`<tr>
    <td>${i+1}</td>
    <td>${data.output[i].concat}</td>
    <td>${data.output[i].month}</td>
    <td>${data.output[i].year}</td>
    <td>${data.output[i].paid_on}</td>
    <td>${data.output[i].gross}</td>
    <td>${data.output[i].deduction}</td>
    <td>${data.output[i].net}</td>
    <td><button onclick=viewsalarybreakup(${data.output[i].employee_id
    }) class="btn btn-success " data-bs-toggle="modal" data-bs-target="#exampleModal">view</button></td>



    </tr>`);
    
}
}
else{
    
    $('#error').text(data.message);
}
        },
        error:function(){

        }
    })
}
salary_info();