if(!('user_token' in localStorage)){
    window.location.replace('login.php');
}

function viewEmployee(employeeId) {
    $('#salaryerror').text("");
    $('#employeedata').empty();
    $('#employeesalary').removeClass('d-none')
    var id = { employeeid: employeeId }
    $.ajax({
        type: "POST",
        url: "api/monthlysalary.php",
        data: id,
        datatype: "JSON",
        success: function (data) {
            data = JSON.parse(data);


            if (data.status) {

                let monthname = ['', 'january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december']


                $('#employeename').text(data.Data.employee_name[0].concat);

                // for(let i=0;i<data.Data.salarydetails.length;i++){
                //     $('#employeedata').append(`<tr>
                //     <td>${monthname[data.Data.salarydetails[i].month]}</td>
                //     <td>${data.Data.salarydetails[i].year}</td>
                //     <td>${data.Data.salarydetails[i].paid_on}</td>
                //     <td>${data.Data.salarydetails[i].gross}</td>
                //     <td>${data.Data.salarydetails[i].deduction}</td>
                //     <td>${data.Data.salarydetails[i].net}</td>
                //         </tr>`);

                // }
                data.Data.salarydetails.forEach(function (element) {
                    $('#employeedata').append(`<tr>
         <td>${monthname[element.month]}</td>
         <td>${element.year}</td>
         <td>${element.paid_on}</td>
         <td>${element.gross}</td>
         <td>${element.deduction}</td>
         <td>${element.net}</td>
             </tr>`);
                })


            }
            else {
                $('#employeename').text(data.Data[0].concat)
                $('#employeesalary').addClass('d-none')
                $('#salaryerror').text(data.message);
            }


        },
        error: function () {

        }
    })
}

function employee_details() {
    $('#details').removeClass('d-none');
    $.ajax({
        type: "POST",
        url: "api/employee.php",
        datatype: "JSON",

        success: function (data) {
            data = JSON.parse(data);
            if (data.status) {
                // for (let i=0;i<data.Data.length;i++){
                //     $("#mytable").append(`<tr>
                //     <td>${i+1}</td>
                //     <td>${data.Data[i].concat}</td>
                //     <td>${data.Data[i].date_of_joining}</td>
                //     <td>${data.Data[i].dob}</td>
                //     <td>${data.Data[i].gender}</td>
                //     <td>${data.Data[i].status_description}</td>
                //     <td>${data.Data[i].description}</td>
                //     <td>${data.Data[i].district}</td>
                //     <td>${data.Data[i].gross}</td>
                //     <td><button onclick="viewEmployee(${data.Data[i].id})" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">View</button></td>
                //     <td><button class="btn btn-primary" >Edit</button></td>
                //     <td><button class="btn btn-danger">Delete</button></td>


                //     </tr>`);
                // }
                
                data.Data.forEach(function (element, index) {
                    $("#mytable").append(`<tr>
                     <td>${index + 1}</td>
                     <td>${element.concat}</td>
                     <td>${element.date_of_joining}</td>
                     <td>${element.dob}</td>
                     <td>${element.gender}</td>
                     <td>${element.status_description}</td>
                     <td>${element.description}</td>
                     <td>${element.district}</td>
                     <td>${element.gross}</td>
                     <td><button onclick="viewEmployee(${element.id})" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">View</button></td>
                       
                        <td><button class="btn btn-danger" onclick=deleteemployee(${element.id})>Delete</button></td>
                        </tr>`);
                })


            }
            else {

            }
        },
        error: function () { }
    })
}
employee_details();





$('#employeeData').click(function () {
    $('#workingStatus').empty();
    $('#designation').empty();
    $('#location').empty();
    $.ajax({
        type: "POST",
        url: "api/addemployeeapi.php",
        datatype: "JSON",
        success: function (data) {
            data = JSON.parse(data);
            if (data.status) {

            $('#workingStatus').append(`<option disabled selected>Select Here</option>`);

          data.Data[0].forEach(function(element){
             $('#workingStatus').append(`
             <option value=${element.id}>${element.status_description}</option>
             `)
          })

        $('#designation').append(`<option disabled selected>Select Here</option>`);

          data.Data[1].forEach(function(element){
            $('#designation').append(`
            <option value=${element.id}>${element.description}</option>
            `)
         })

         $('#location').append(`<option disabled selected>Select Here</option>`);

         data.Data[2].forEach(function(element){
            $('#location').append(`
            <option value=${element.id}>${element.district}</option>
            `)
         })



            }
        },
        error: function () {

        }
    })
})



$('#addEmployee').click(function(){
    $('#error').text("")
    var formdata={
     firstname:$('#firstname').val(),
     lastname:$('#lastname').val(),
     surename:$('#surname').val(),
     doj:$('#doj').val(),
     dob:$('#dob').val(),
     gender:$('#gender').val(),
     working_status:$('#workingStatus').val(),
     designation:$('#designation').val(),
     location:$('#location').val(),
     grosssalary:$('#grosssalary').val()

    }
    $.ajax({
        type:"POST",
        url:"api/employeetableAdd.php",
        data:formdata,
        datatype:"JSON",
        success:function(data){
         data=JSON.parse(data);
         if(data.status){
            window.alert(data.message)
            window.location.replace("employeedetail.php")
         }
         else{
           $('#error').text(data.message)
         }
        },
        error: function(){

        }
    })
})



function deleteemployee(emploeeid){
    $('#deleteError').text("")
    var formdata={
     employeeid:emploeeid
    }
    $.ajax({
        type:"POST",
        url:"api/deleteemployeeapi.php",
        data:formdata,
        datatype:"JSON",
        success:function(data){
            data=JSON.parse(data)
            if(data.status){
                window.alert(data.message)
                window.location.replace("employeedetail.php");
            }
            else{
                $('#deleteError').text(data.message)
            }
        }
    })
}





//filter option


$('#employeeworking').empty();
$('#employeedesignation').empty();
$('#employeelocation').empty();
$.ajax({
    type: "POST",
    url: "api/addemployeeapi.php",
    datatype: "JSON",
    success: function (data) {
        data = JSON.parse(data);
        if (data.status) {

        $('#employeeworking').append(`<option  selected value="">All</option>`);

      data.Data[0].forEach(function(element){
         $('#employeeworking').append(`
         <option value=${element.id}>${element.status_description}</option>
         `)
      })

    $('#employeedesignation').append(`<option  selected value="">All</option>`);

      data.Data[1].forEach(function(element){
        $('#employeedesignation').append(`
        <option value=${element.id}>${element.description}</option>
        `)
     })

     $('#employeelocation').append(`<option selected value="">All</option>`);

     data.Data[2].forEach(function(element){
        $('#employeelocation').append(`
        <option value=${element.id}>${element.district}</option>
        `)
     })



        }
    },
    error: function () {

    }
})




$('#filterbutton').click(function(){
    $('#mytable2').empty();
    $('#maintable').addClass('d-none');
    $('#secondtable').removeClass('d-none')
    var formdata={
        workingstatus:$('#employeeworking').val(),
        location:$('#employeelocation').val(),
        designation:$('#employeedesignation').val()
    }
    console.log(formdata)
    $.ajax({
        type:"POST",
        url:"api/employee.php",
        data:formdata,
        datatype:"JSON",
        success:function(data){
            data=JSON.parse(data)
            if(data.status){
                data.Data.forEach(function (element, index) {
                    $("#mytable2").append(`<tr>
                     <td>${index + 1}</td>
                     <td>${element.concat}</td>
                     <td>${element.date_of_joining}</td>
                     <td>${element.dob}</td>
                     <td>${element.gender}</td>
                     <td>${element.status_description}</td>
                     <td>${element.description}</td>
                     <td>${element.district}</td>
                     <td>${element.gross}</td>
                     <td><button onclick="viewEmployee(${element.id})" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">View</button></td>
                       
                        <td><button class="btn btn-danger" onclick=deleteemployee(${element.id})>Delete</button></td>
                        </tr>`);
                        console.log(2659)
                })
            }
            else{
                $('#maintable').removeClass('d-none');
                $('#secondtable').addClass('d-none')
            }

        },error:function(){
            
        }
    })
})




