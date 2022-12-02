$(document).ready(function(){

    // code for sidebar toggle
    $("#side-nav-button").click(function() {
        let sidebarWidth = $("#sidebar").width();
        if(sidebarWidth == 0) {
            $("#sidebar").width("300px");
            $("main").css("margin-left", "calc(300px + 1em)");
            $("#header").css("margin-left", "300px");
        }
        else {
            $("#sidebar").width("0");
            $("main").css("margin-left", "1em");
            $("#header").css("margin-left", "0");
        }
    });

    // code for date, time and username
    if(localStorage.getItem('user_data')){
        let user_data = JSON.parse(localStorage.getItem('user_data'));
        $('#current-date').empty().text(user_data.date);
        $('#current-time').empty().text(user_data.time);
        $('#username').empty().text('Welcome to ' +user_data.name+ ' ');
    }
    
});



// function to fetch all employees data from api/db & display on frontend on page load employeesData.php
function getEmployeesData() {
    $.ajax({
        type: 'POST',
        url: 'api/getEmployeesData.php',
        success: function(response, status, xhr) {
            let output = JSON.parse(response);
            if(output.status) {
                // table head
                $('#employeesTable thead').append('<tr>'+
                '<th scope="col">ID</th>'+
                '<th scope="col">Name</th>'+
                '<th scope="col">Date Joined</th>'+
                '<th scope="col">DOB</th>'+
                '<th scope="col">Gender</th>'+
                '<th scope="col">Phone</th>'+
                '<th scope="col">Work Status</th>'+
                '<th scope="col">Designation</th>'+
                '<th scope="col">Location</th>'+
                '<th scope="col">Date Created</th>'+
                '<th scope="col">Action</th>'+
                '</tr>');
                
                // table body
                output.data.forEach((employeeData, index) => {
                    $('#employeesTable tbody').append('<tr>'+
                    '<td>'+(index+1)+'</td>'+
                    '<td>'+employeeData.name+'</td>'+
                    '<td>'+employeeData.date_of_joining+'</td>'+
                    '<td>'+employeeData.date_of_birth+'</td>'+
                    '<td>'+employeeData.gender+'</td>'+
                    '<td>'+employeeData.phone+'</td>'+
                    '<td>'+employeeData.working_status+'</td>'+
                    '<td>'+employeeData.designation+'</td>'+
                    '<td>'+employeeData.location+'</td>'+
                    '<td>'+employeeData.created_at+'</td>'+
                    '<td><a href="#" class="btn btn-primary btn-sm m-1" data-bs-toggle="modal" data-bs-target="#viewSalaryModal" onClick="viewSalaryDetails('+employeeData.id+')">View</a>'+
                    '<a href="#" class="btn btn-danger btn-sm m-1" onClick="">Delete</a>'+
                    '</td></tr>');
                });

            } else {
                $('#tableContainer').append('<div class="text-center"><img src="/Week6Task/css/images/error_img.webp"><p>'+output.message+'</p></div>');
            }
        },
        error: function(jXHR,exception) {
            $('#tableContainer').append('<div class="text-center"><img src="/Week6Task/css/images/error_img.webp"><p>'+exception+'</p></div>');
        }
    });
}

// function to get data of one employee for modal of page employeesData.php
function getEmployeeForSalary(employeeId) {
    $.ajax({
        type: 'POST',
        url: 'api/getEmployee.php',
        data: {id: employeeId},
        success: function(response, status, xhr) {
            let output = JSON.parse(response);
            let employeeData = output.data[0];
            if(output.status) {
                $('#employeeDetails').empty().append('<div class="row"><p class="col-sm-6"><strong>Name:</strong> '+employeeData.name+'</p>'+
                '<p class="col-sm-6"><strong>DOJ:</strong> '+employeeData.date_of_joining+'</p></div>'+
                '<div class="row"><p class="col-sm-6"><strong>Working Status:</strong> '+employeeData.working_status+'</p>'+
                '<p class="col-sm-6"><strong>Designation:</strong> '+employeeData.designation+'</p></div>'            
                );
            }
        }
    });
}

// function to view salary recieved by each/clicked employee for modal on page employeesData.php
function viewSalaryDetails(employeeId) {
    getEmployeeForSalary(employeeId);
    $.ajax({
        type: 'POST',
        url: 'api/getEmployeesSalaries.php',
        data: {id: employeeId},
        success: function(response, status, xhr) {
            let output = JSON.parse(response);
            if(output.status) {
                // table head
                $('#viewSalaryModalTable thead, #viewSalaryModalTable tbody, #viewSalaryError').empty();
                $('#viewSalaryModalTable thead').append('<tr>'+
                '<th scope="col">S.No</th>'+
                '<th scope="col">Salary Month</th>'+
                '<th scope="col">Salary Year</th>'+
                '<th scope="col">Date of Payment</th>'+
                '<th scope="col">Net Salary</th>'+
                '</tr>');
            
                // table body
                output.data.forEach((salaryData, index) => {
                    $('#viewSalaryModalTable tbody').append('<tr>'+
                    '<td>'+(index + 1)+'</td>'+
                    '<td>'+salaryData.salary_month+'</td>'+
                    '<td>'+salaryData.salary_year+'</td>'+
                    '<td>'+salaryData.paid_on+'</td>'+
                    '<td>'+salaryData.net_salary+'</td>'+
                    '</tr>');
                });
            }
            else {
                $('#viewSalaryModalTable thead, #viewSalaryModalTable tbody, #viewSalaryError').empty();
                $('#viewSalaryError').append('<div class="text-center"><img src="/Week6Task/css/images/error_img.webp"><p>'+output.message+'</p></div>');
            }
        },
        error: function(jXHR,exception) {
            $('#viewSalaryError').append('<div class="text-center"><img src="/Week6Task/css/images/error_img.webp"><p>'+exception+'</p></div>');
        }
    });
}




// function to fetch all employees salaries data from api/db & display on frontend on page employeesSalaries.php
function getEmployeesSalaries() {
    $.ajax({
        type: 'POST',
        url: 'api/getEmployeesSalaries.php',
        data: {id: '*'},
        success: function(response, status, xhr) {
            let output = JSON.parse(response);
            if(output.status) {
                // table head
                $('#salariesTable thead').append('<tr>'+
                '<th scope="col">S.No</th>'+
                '<th scope="col">Employee Name</th>'+
                '<th scope="col">Salary Month</th>'+
                '<th scope="col">Salary Year</th>'+
                '<th scope="col">Date of Payment</th>'+
                '<th scope="col">Gross Salary</th>'+
                '<th scope="col">Deductions</th>'+
                '<th scope="col">Net Salary</th>'+
                '<th scope="col">Date Created</th>'+
                '<th scope="col">Salary Breakup</th>'+
                '</tr>');

                // table body
                output.data.forEach((salaryVal, index) => {
                    $('#salariesTable tbody').append('<tr>'+
                    '<td>'+(index + 1)+'</td>'+
                    '<td>'+salaryVal.employee_name+'</td>'+
                    '<td>'+salaryVal.salary_month+'</td>'+
                    '<td>'+salaryVal.salary_year+'</td>'+
                    '<td>'+salaryVal.paid_on+'</td>'+
                    '<td>'+salaryVal.gross_salary+'</td>'+
                    '<td>'+salaryVal.deductions+'</td>'+
                    '<td>'+salaryVal.net_salary+'</td>'+
                    '<td>'+salaryVal.created_at+'</td>'+
                    '<td><a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewSalaryBreakupModal" onClick="viewSalaryBreakup('+salaryVal.id+','+ salaryVal.employee_id+')">View</a></td>'+
                    '</tr>');
                });

            } else {
                $('#tableContainer').append('<div class="text-center"><img src="/Week6Task/css/images/error_img.webp"><p>'+output.message+'</p></div>');
            }
        },
        error: function(jXHR,exception) {
            $('#tableContainer').append('<div class="text-center"><img src="/Week6Task/css/images/error_img.webp"><p>'+exception+'</p></div>');
        }
        
    });
}


// function to get data of one employee for modal on page employeesSalaries.php
function getEmployeeforSalaryBreakup(employeeId) {
    $.ajax({
        type: 'POST',
        url: 'api/getEmployee.php',
        data: {id: employeeId},
        success: function(response, status, xhr) {
            let output = JSON.parse(response);
            let employeeData = output.data[0];
            if(output.status) {
                $('#employeeDetails').empty().append('<div class="row"><p class="col-sm-6"><strong>Name:</strong> '+employeeData.name+'</p>'+
                '<p class="col-sm-6"><strong>DOJ:</strong> '+employeeData.date_of_joining+'</p></div>'+
                '<div class="row"><p class="col-sm-6"><strong>Working Status:</strong> '+employeeData.working_status+'</p>'+
                '<p class="col-sm-6"><strong>Designation:</strong> '+employeeData.designation+'</p></div>');
            }
        }
    });
}




// function to display salary breakup of selected salary transaction for modal on page employeesSalaries.php
function viewSalaryBreakup(salaryId, employeeId) {
    getEmployeeforSalaryBreakup(employeeId);
    $.ajax({
        type: 'POST',
        url: 'api/getSalaryBreakup.php',
        data: {id: salaryId},
        success: function(response, status, xhr) {
            let output = JSON.parse(response);
            let employeeData = output.data[0];
            if(output.status) {
                // salary details
                $('#employeeDetails').append('<div class="row"><p class="col-sm-6"><strong>Salary Month:</strong> '+employeeData.salary_month+'</p>'+
                '<p class="col-sm-6"><strong>Salary Year:</strong> '+employeeData.salary_year+'</p></div>'+
                '<div class="row"><p class="col-sm-6"><strong>Date of Payment:</strong> '+employeeData.paid_on+'</p></p></div>');
                
                // table head
                $('#viewSalaryBreakupModalTable thead, #viewSalaryBreakupModalTable tbody, #viewSalaryError').empty();
                $('#viewSalaryBreakupModalTable thead').append('<tr>'+
                '<th scope="col">S.No</th>'+
                '<th scope="col">Description</th>'+
                '<th scope="col">Type</th>'+
                '<th scope="col">Amount</th>'+
                '</tr>');
            
                // table body
                output.data.forEach((val, index) => {
                    $('#viewSalaryBreakupModalTable tbody').append('<tr>'+
                    '<td>'+(index + 1)+'</td>'+
                    '<td>'+val.description+'</td>'+
                    '<td>'+val.type+'</td>'+
                    '<td>'+val.amount+'</td>'+
                    '</tr>');
                });

                $('#viewSalaryError').prepend('<div class="row"><p class="col-sm-4"><strong>Gross Salary:</strong> Rs. '+employeeData.gross_salary+'</p>'+
                '<p class="col-sm-4"><strong>Deductions:</strong> Rs. '+employeeData.deductions+'</p>'+
                '<p class="col-sm-4"><strong>Net Salary:</strong> Rs. '+employeeData.net_salary+'</p></p></div>');
            }
            else {
                $('#viewSalaryError').empty().append('<div class="text-center"><img src="/Week6Task/css/images/error_img.webp"><p>'+output.message+'</p></div>');
            }
        },
        error: function(jXHR,exception) {
            $('#viewSalaryError').empty().append('<div class="text-center"><img src="/Week6Task/css/images/error_img.webp"><p>'+exception+'</p></div>');
        }
    });
}



// function to fetch designations
function getDesignations(forForm) {
    $.ajax({
        type: 'POST',
        url: 'api/getDesignations.php',
        success: function(response, status, xhr) {
            let output = JSON.parse(response);
            if(output.status) {
                if(forForm) {
                    $('#designation').empty().append('<option hidden disabled>Select</option>');
                    output.data.forEach((designation) => {
                        $('#designation').append('<option value="'+designation.id+'">'+designation.description+'</option>');
                    });
                }
                else {
                    $('.designation').empty().append('<option value="all" selected>All</option>');
                    output.data.forEach((designation) => {
                        $('.designation').append('<option value="'+designation.id+'">'+designation.description+'</option>');
                    });
                }
            }
        }
    });
}


// function to fetch working status
function getWorkingStatus(forForm) {
    $.ajax({
        type: 'POST',
        url: 'api/getWorkingStatus.php',
        success: function(response, status, xhr) {
            let output = JSON.parse(response);
            if(output.status) {
                if(forForm) {
                    $('#workingStatus').empty().append('<option hidden disabled>Select</option>');
                    output.data.forEach((workingStatus) => {
                        $('#workingStatus').append('<option value="'+workingStatus.id+'">'+workingStatus.description+'</option>');
                    });
                }
                else {
                    $('.workingStatus').empty().append('<option value="all" selected>All</option>');
                    output.data.forEach((workingStatus) => {
                        $('.workingStatus').append('<option value="'+workingStatus.id+'">'+workingStatus.description+'</option>');
                    });
                }
            }
        }
    });
}


// function to fetch locations
function getLocations(forForm) {
    $.ajax({
        type: 'POST',
        url: 'api/getLocations.php',
        success: function(response, status, xhr) {
            let output = JSON.parse(response);
            if(output.status) {
                if(forForm) {
                    $('#location').empty().append('<option hidden disabled>Select</option>');
                    output.data.forEach((location) => {
                        $('#location').append('<option value="'+location.id+'">'+location.district+'</option>');
                    });
                }
                else {
                    $('.location').empty().append('<option value="all" selected>All</option>');
                    output.data.forEach((location) => {
                        $('.location').append('<option value="'+location.id+'">'+location.district+'</option>');
                    });
                }
            }
        }
    });
}


// function for login form validation
function login() {
    $.ajax({
        type: 'POST',
        url: 'api/login.php',
        data: {
            email: $("#email").val(),
            password: $("#password").val()
        },
        success: function(response, status, xhr) {
            let output = JSON.parse(response);
            if(output.status) {
                $("#form-div").empty().append('<div class="text-center"><img src="/Week6Task/css/images/success.png"><p>'+output.message+'</p></div>');
                localStorage.setItem("user_data",JSON.stringify(output.data[0]));
                window.location.replace("index.php");
                
            } else {
                $("#emailError").text("").text(output.data.emailError);
                $("#passwordError").text("").text(output.data.passwordError);
                $("#error").text("").text(output.message);
            }
        }
    });
}

// function for logout
function logout() {
    $.ajax({
        type: 'POST',
        url: 'api/logout.php',
        data: {
            token: JSON.parse(localStorage.getItem("user_data.token"))
        },
        success: function(response, status, xhr) {
            let output = JSON.parse(response);
            if(output.status) {
                localStorage.removeItem("user_data");
                window.location.replace("login.html");
            } else {
                window.alert("Please Try Again Later!");
            }
        }
    });
}

function searchFilters() {

}

function clearFilters() {

}

function checkSession() {

}

function formValidation() {
    $.ajax({
        type: 'POST',
        url: 'api/formValidation.php',
        data: {
            surname: $('#surname').val(),
            firstName: $('#firstName').val(),
            lastName: $('#lastName').val(),
            dateOfJoining: $('#dateOfJoining').val(),
            dateOfBirth: $('#dateOfBirth').val(),
            mobileNumber: $('#mobileNumber').val(),
            grossSalary: $('#grossSalary').val(),
            gender: $('#gender').val(),
            workingStatus: $('#workingStatus').val(),
            designation: $('#designation').val(),
            location: $('#location').val()
        },
        success: function(response, status, xhr) {
            let output = JSON.parse(response);
            if(output.status.errors) {
                let errors = output.errors;
                $('#firstNameError').empty().text(errors.firstNameError);
                $('#lastNameError').empty().text(errors.lastNameError);
                $('#dateOfJoiningError').empty().text(errors.dateOfJoiningError);
                $('#dateOfBirthError').empty().text(errors.dateOfBirthError);
                $('#mobileNumberError').empty().text(errors.mobileNumberError);
                $('#grossSalaryError').empty().text(errors.grossSalaryError);
            } else {
                window.alert(output.message);
                getEmployeesData();
            }
        }
    });
}