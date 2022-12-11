if (!('user_token' in localStorage)) {
    window.location.replace('login.php');
}
//view employee  button work

function viewEmployee(employeeId) {
    $('#salaryerror').text("");
    $('#employeedata').empty();
    $('#employeesalary').removeClass('d-none')
    $('#employeename').text('');
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
                swal(data.message, "", 'error');
                // window.location.reload();
                // $('#employeename').text(data.Data[0].concat)
                // $('#employeesalary').addClass('d-none')
                // $('#salaryerror').text(data.message);
            }


        },
        error: function () {

        }
    })
}
//main page employee list
function employee_details() {
    $('#details').removeClass('d-none');
    $.ajax({
        type: "POST",
        url: "api/employee.php",
        datatype: "JSON",

        success: function (data) {
            data = JSON.parse(data);
            if (data.status) {
             
                data.Data.forEach(function (element, index) {
                    $("#mytable").append(`<tr>
                     <td>${index + 1}</td>
                     <td>${element.concat}</td>
                     <td>${element.doj}</td>
                     <td>${element.dob}</td>
                     <td>${element.gender}</td>
                     <td>${element.status_description}</td>
                     <td>${element.description}</td>
                     <td>${element.district}</td>
                     <td>${element.gross}</td>
                     <td><button onclick="viewEmployee(${element.id})" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">View</button></td>
                     <td><button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal2" onclick=editemployee(${element.id})>Edit</button></td>
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


//dynamically loading option in add employee form 
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

                data.Data[0].forEach(function (element) {
                    $('#workingStatus').append(`
             <option value=${element.id}>${element.status_description}</option>
             `)
                })

                $('#designation').append(`<option disabled selected>Select Here</option>`);

                data.Data[1].forEach(function (element) {
                    $('#designation').append(`
            <option value=${element.id}>${element.description}</option>
            `)
                })

                $('#location').append(`<option disabled selected>Select Here</option>`);

                data.Data[2].forEach(function (element) {
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


//new employee add function
$('#addEmployee').click(function () {
    $('#error').text("")
    var formdata = {
        firstname: $('#firstname').val(),
        lastname: $('#lastname').val(),
        surename: $('#surname').val(),
        doj: $('#doj').val(),
        dob: $('#dob').val(),
        gender: $('#gender').val(),
        working_status: $('#workingStatus').val(),
        designation: $('#designation').val(),
        location: $('#location').val(),
        grosssalary: $('#grosssalary').val()

    }
    $.ajax({
        type: "POST",
        url: "api/employeetableAdd.php",
        data: formdata,
        datatype: "JSON",
        success: function (data) {
            data = JSON.parse(data);
            if (data.status) {
                swal(data.message, "", "success");
                window.location.replace("employeedetail.php")
            }
            else {
                $('#error').text(data.message)
            }
        },
        error: function () {

        }
    })
})


//delete employee function
function deleteemployee(emploeeid) {
    $('#deleteError').text("")
    var formdata = {
        employeeid: emploeeid
    }
    $.ajax({
        type: "POST",
        url: "api/deleteemployeeapi.php",
        data: formdata,
        datatype: "JSON",
        success: function (data) {
            data = JSON.parse(data)
            if (data.status) {
                swal(data.message, "", "success");
                window.location.replace("employeedetail.php");
            }
            else {
                swal("Can not delete the employee.", "", "error");
            }
        }
    })
}


//dynamically  option loading in filter list
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

            data.Data[0].forEach(function (element) {
                $('#employeeworking').append(`
         <option value=${element.id}>${element.status_description}</option>
         `)
            })

            $('#employeedesignation').append(`<option  selected value="">All</option>`);

            data.Data[1].forEach(function (element) {
                $('#employeedesignation').append(`
        <option value=${element.id}>${element.description}</option>
        `)
            })

            $('#employeelocation').append(`<option selected value="">All</option>`);

            data.Data[2].forEach(function (element) {
                $('#employeelocation').append(`
        <option value=${element.id}>${element.district}</option>
        `)
            })



        }
    },
    error: function () {

    }
})

//filter employee
$('#filterbutton').click(function () {
    $('#mytable2').empty();
    $('#maintable').addClass('d-none');
    $('#secondtable').removeClass('d-none')
    var formdata = {
        workingstatus: $('#employeeworking').val(),
        location: $('#employeelocation').val(),
        designation: $('#employeedesignation').val()
    }
    console.log(formdata)
    $.ajax({
        type: "POST",
        url: "api/employee.php",
        data: formdata,
        datatype: "JSON",
        success: function (data) {
            data = JSON.parse(data)
            if (data.status) {
                data.Data.forEach(function (element, index) {
                    $("#mytable2").append(`<tr>
                     <td>${index + 1}</td>
                     <td>${element.concat}</td>
                     <td>${element.doj}</td>
                     <td>${element.dob}</td>
                     <td>${element.gender}</td>
                     <td>${element.status_description}</td>
                     <td>${element.description}</td>
                     <td>${element.district}</td>
                     <td>${element.gross}</td>
                     <td><button onclick="viewEmployee(${element.id})" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">View</button></td>
                     <td><button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal2" onclick=editemployee(${element.id})>Edit</button></td>
                        <td><button class="btn btn-danger" onclick=deleteemployee(${element.id})>Delete</button></td>
                        </tr>`);
                    console.log(2659)
                })
            }
            else {
                $('#maintable').removeClass('d-none');
                $('#secondtable').addClass('d-none')
            }

        }, error: function () {

        }
    })
})





//edit employee form open
function editemployee(eid){
    $('#modalFoter').empty("#saveChanges")
var employeeId={eId:eid}
$.ajax({
    type:"POST",
    url:"api/editemployeegetdata.php",
    data:employeeId,
    datatype:"JSON",
    success:function(data){
    data=JSON.parse(data)
    $('#editEmployeeSurename').val(data.Data[0].surename);
    $('#editEmployeeFirstname').val(data.Data[0].firstname);
    $('#editEmployeeLastname').val(data.Data[0].lastname);
    $('#editEmployeeDoj').val(data.Data[0].date_of_joining);
    $('#editEmployeeDob').val(data.Data[0].dob);
    $('#editemployeeGender').append(`<option>${data.Data[0].gender}</option>`)
    $('#editemployeeworkingstatus').append(`<option value='${data.Data[0].working_status_id}'>${data.Data[0].status_description}</option>`)
    $('#editemployeeLocation').append(`<option value='${data.Data[0].location_id}'>${data.Data[0].district}</option>`)
    $('#editemployeeDesignation').append(`<option value='${data.Data[0].designation_id}'>${data.Data[0].description}</option>`)

    // $('#editEmployeeGross').val(data.Data[0].gross);
    $('#modalFoter').append(`<button type="button" class="btn btn-primary" onclick="employeeEdit(${data.Data[0].id})" id="saveChanges">Save Changes</button>`)
    },error:function(){

    }
})
    
}


//edit employee dynamic option gender
$('#editemployeeGender').focus(function(){
    $('#editemployeeGender').empty();
    $('#editemployeeGender').append(`<option value="male">male</option><option value="female">female</option>`)
})
//edit employee dyanamic option working status
$('#editemployeeworkingstatus').focus(function(){
    $('#editemployeeworkingstatus').empty();

    $.ajax({
        type:"POST",
        url:"api/addemployeeapi.php",
        datatype:"JSON",
        success:function(data){
         data=JSON.parse(data);
         if(data.status){
            data.Data[0].forEach(function(element){
                $('#editemployeeworkingstatus').append(`<option value='${element.id}'>${element.status_description}</option>`)
            })
         }
        },error:function(){

        }
    })
})

//edit employee dynamic option for location

$('#editemployeeLocation').focus(function(){
    $('#editemployeeLocation').empty();

    $.ajax({
        type:"POST",
        url:"api/addemployeeapi.php",
        datatype:"JSON",
        success:function(data){
         data=JSON.parse(data);
         if(data.status){
            data.Data[2].forEach(function(element){
               
                $('#editemployeeLocation').append(`<option value='${element.id}'>${element.district}</option>`)
            })
         }
        },error:function(){

        }
    })
})

//edit employee dynamic option for designation
$('#editemployeeDesignation').focus(function(){
    $('#editemployeeDesignation').empty();

    $.ajax({
        type:"POST",
        url:"api/addemployeeapi.php",
        datatype:"JSON",
        success:function(data){
         data=JSON.parse(data);
         if(data.status){
            data.Data[1].forEach(function(element){
               
                $('#editemployeeDesignation').append(`<option value='${element.id}'>${element.description}</option>`)
            })
         }
        },error:function(){

        }
    })
})



//edit employee save button
function employeeEdit(id){
    var formdata={
        employeeId:id,
        sureName:$('#editEmployeeSurename').val(),
        firstName:$('#editEmployeeFirstname').val(),
        lastName:$('#editEmployeeLastname').val(),
        doj:$('#editEmployeeDoj').val(),
        dob:$('#editEmployeeDob').val(),
        gender:$('#editemployeeGender option:selected').val(),
        status:$('#editemployeeworkingstatus option:selected').val(),
        location:$('#editemployeeLocation option:selected').val(),
        designation:$('#editemployeeDesignation option:selected').val(),
    
    }
    $.ajax({
        type:"POST",
        url:"api/saveEditEmpapi.php",
        data:formdata,
        datatype:"JSON",
        success:function(data){
            data=JSON.parse(data)
            if(data.status){
                
                window.location.reload("employeedetail.php");
                swal(data.message, "", "success");
            }

        },error:function(data){

        }
    })
}









