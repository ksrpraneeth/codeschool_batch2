if(!('user_token' in localStorage)){
    window.location.replace('login.php');
}
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
            $('#nameEmployee').text(data.Data.output[0].concat);
            $('#WorkingStatus').text(data.Data.output[0].status_description)
            $('#location').text(data.Data.output[0].district)
            $('#workingposition').text(data.Data.output[0].description)

            var earningsum=0;
            // for(let i=0;i<data.Data.earning.length;i++){
            //     $('#earningColoumn').append(`<tr>
            //     <td>${data.Data.earning[i].description}</td>
            //     <td>${data.Data.earning[i].amount}</td>
            //     </tr>`)
            //     earningsum=earningsum+data.Data.earning[i].amount;
            // }
            data.Data.earning.forEach(function(element){
                $('#earningColoumn').append(`<tr>
                <td>${element.description}</td>
                <td>${element.amount}</td>
                </tr>`)
                earningsum=earningsum+element.amount;
            })
            

            $('#earningColoumn').append(`<tr>
           
            <th>Total Earning</th>
            <th>${earningsum}</th>
            </tr>`);



            var deductionsum=0;
            // for(let i=0;i<data.Data.deduction.length;i++){
            //     $('#deductioncoloumn').append(`<tr>
            //     <td>${data.Data.deduction[i].description}</td>
            //     <td>${data.Data.deduction[i].amount}</td>
            //     </tr>`)
            //     deductionsum=deductionsum+data.Data.deduction[i].amount;
            // }
            data.Data.deduction.forEach(function(element){
                $('#deductioncoloumn').append(`<tr>
                    <td>${element.description}</td>
                    <td>${element.amount}</td>
                    </tr>`)
                    deductionsum=deductionsum+element.amount;
            })



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

data.Data.forEach(function(element,index){
    $("#salaryRow").append(`<tr>
        <td>${index+1}</td>
        <td>${element.concat}</td>
        <td>${element.month}</td>
        <td>${element.year}</td>
        <td>${element.paid_on}</td>
        <td>${element.gross}</td>
        <td>${element.deduction}</td>
        <td>${element.net}</td>
        <td><button onclick=viewsalarybreakup(${element.employee_id
        }) class="btn btn-success " data-bs-toggle="modal" data-bs-target="#exampleModal">view</button></td>

        <td><button  class="btn btn-danger" onclick="deleteSalary(${element.employee_id
        },${element.id})">Delete</button></td>
    
    
    
        </tr>`);
       
})
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





function deleteSalary(salaryid){
    var formdata={salartID:salaryid}
    $.ajax({
        type:"POST",
        url:"api/salarydelete.php",
        data:formdata,
        datatype:"JSON",
        success:function(data){
         data=JSON.parse(data)
         if(data.status){
            swal(data.message, "", "success");
            window.location.reload("salary.php")
         }
         else{
            swal(data.message, "", "error");
         }
        },error:function(data){

        }
    })
}