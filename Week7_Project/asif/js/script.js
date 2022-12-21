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
function getEmployeesData(workingStatusId, designationId, locationId) {
    $.ajax({
        type: 'POST',
        url: 'api/getEmployeesData.php',
        data: {
            workingStatusId: workingStatusId,
            designationId: designationId,
            locationId: locationId
        },
        success: function(response, status, xhr) {
            let output = JSON.parse(response);
            $('#employeesTable thead, #employeesTable tbody, #getEmployeesError').empty();
            if(output.status) {
                // table head
                $('#employeesTable thead').append('<tr>'+
                '<th scope="col">S.No</th>'+
                '<th scope="col">Name</th>'+
                '<th scope="col">Date of Joining</th>'+
                '<th scope="col">Date of Birth</th>'+
                '<th scope="col">Gender</th>'+
                '<th scope="col">Phone</th>'+
                '<th scope="col">Working Status</th>'+
                '<th scope="col">Designation</th>'+
                '<th scope="col">Location</th>'+
                '<th scope="col">Gross Salary</th>'+
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
                    '<td>'+employeeData.gross_salary+'</td>'+
                    '<td>'+employeeData.created_at+'</td>'+
                    '<td><a href="#" class="btn btn-info btn-sm m-1" data-bs-toggle="modal" data-bs-target="#viewSalaryModal" onclick="viewSalaryDetails('+employeeData.id+')">View Salaries</a>'+
                    '<a href="#" class="btn btn-secondary btn-sm m-1" data-bs-toggle="modal" data-bs-target="" onclick="editEmployeeData('+employeeData.id+')">Edit Employee</a>'+
                    '<a href="#" class="btn btn-danger btn-sm m-1" onclick="deleteEmployeeData('+employeeData.id+')">Delete Employee</a>'+
                    '</td></tr>');
                });

            } else {
                $('#employeesTable thead, #employeesTable tbody').empty();
                $('#getEmployeesError').empty().append('<div class="text-center"><p>'+output.message+'</p></div>');
            }
        },
        error: function(jXHR,exception) {
            $('#employeesTable thead, #employeesTable tbody').empty();
            $('#getEmployeesError').append('<div class="text-center"><img src="assets/images/error_img.webp"><p>'+exception+'</p></div>');
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
                '<p class="col-sm-6"><strong>Date of Joining:</strong> '+employeeData.date_of_joining+'</p></div>'+
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
                $('#viewSalaryError').append('<div class="text-center"><p>'+output.message+'</p></div>');
            }
        },
        error: function(jXHR,exception) {
            $('#viewSalaryError').append('<div class="text-center"><img src="assets/images/error_img.webp"><p>'+exception+'</p></div>');
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
            $('#salariesTable thead, #salariesTable tbody, #getSalariesError').empty();
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
                    '<td><a href="#" class="btn btn-primary btn-sm m-1" data-bs-toggle="modal" data-bs-target="#viewSalaryBreakupModal" onclick="viewSalaryBreakup('+salaryVal.id+','+ salaryVal.employee_id+')">View</a>'+
                    '<a href="#" class="btn btn-danger btn-sm m-1" onclick="deleteSalary('+salaryVal.id+')">Delete Salary</a></td>'+
                    '</tr>');
                });

            } else {
                $('#tableContainer').append('<div class="text-center"><img src="assets/images/error_img.webp"><p>'+output.message+'</p></div>');
            }
        },
        error: function(jXHR,exception) {
            $('#tableContainer').append('<div class="text-center"><img src="assets/images/error_img.webp"><p>'+exception+'</p></div>');
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
                '<p class="col-sm-6"><strong>Date of Joining:</strong> '+employeeData.date_of_joining+'</p></div>'+
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
            $('#viewSalaryBreakupModalTable thead, #viewSalaryBreakupModalTable tbody, #viewSalaryError').empty();
            if(output.status) {
                // salary details
                $('#employeeDetails').append('<div class="row"><p class="col-sm-6"><strong>Salary Month:</strong> '+employeeData.salary_month+'</p>'+
                '<p class="col-sm-6"><strong>Salary Year:</strong> '+employeeData.salary_year+'</p></div>'+
                '<div class="row"><p class="col-sm-6"><strong>Date of Payment:</strong> '+employeeData.paid_on+'</p></p></div>');
                
                // table head
                
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
                $('#viewSalaryError').empty().append('<div class="text-center"><p>'+output.message+'</p></div>');
            }
        },
        error: function(jXHR,exception) {
            $('#viewSalaryError').empty().append('<div class="text-center"><img src="../assets/images/error_img.webp"><p>'+exception+'</p></div>');
        }
    });
}



// function to fetch designations
function getDesignations(forForm, formId) {
    $.ajax({
        type: 'POST',
        url: 'api/getDesignations.php',
        success: function(response, status, xhr) {
            let output = JSON.parse(response);
            if(output.status) {
                if(forForm) {
                    $(formId+' #designation').empty().append('<option hidden disabled>Select</option>');
                    output.data.forEach((designation) => {
                        $(formId+' #designation').append('<option value="'+designation.id+'">'+designation.description+'</option>');
                    });
                }
                else {
                    $('.designation').empty().append('<option value="" selected>All</option>');
                    output.data.forEach((designation) => {
                        $('.designation').append('<option value="'+designation.id+'">'+designation.description+'</option>');
                    });
                }
            }
        }
    });
}


// function to fetch working status
function getWorkingStatus(forForm, formId) {
    $.ajax({
        type: 'POST',
        url: 'api/getWorkingStatus.php',
        success: function(response, status, xhr) {
            let output = JSON.parse(response);
            if(output.status) {
                if(forForm) {
                    $(formId+' #workingStatus').empty().append('<option hidden disabled>Select</option>');
                    output.data.forEach((workingStatus) => {
                        $(formId+' #workingStatus').append('<option value="'+workingStatus.id+'">'+workingStatus.description+'</option>');
                    });
                }
                else {
                    $('.workingStatus').empty().append('<option value="" selected>All</option>');
                    output.data.forEach((workingStatus) => {
                        $('.workingStatus').append('<option value="'+workingStatus.id+'">'+workingStatus.description+'</option>');
                    });
                }
            }
        }
    });
}


// function to fetch locations
function getLocations(forForm, formId) {
    $.ajax({
        type: 'POST',
        url: 'api/getLocations.php',
        success: function(response, status, xhr) {
            let output = JSON.parse(response);
            if(output.status) {
                if(forForm) {
                    $(formId+' #location').empty().append('<option hidden disabled>Select</option>');
                    output.data.forEach((location) => {
                        $(formId+' #location').append('<option value="'+location.id+'">'+location.district+'</option>');
                    });
                }
                else {
                    $('.location').empty().append('<option value="" selected>All</option>');
                    output.data.forEach((location) => {
                        $('.location').append('<option value="'+location.id+'">'+location.district+'</option>');
                    });
                }
            }
        }
    });
}


// function for login form validation and login redirection
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
                $("#form-div").empty().append('<div class="text-center"><img src="../assets/images/success.png"><p>'+output.message+'</p></div>');
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
    var user = JSON.parse(localStorage.getItem("user_data"));
    var token = user.token;
    $.ajax({
        type: 'POST',
        url: 'api/logout.php',
        data: {
            token: token
        },
        success: function(response, status, xhr) {
            let output = JSON.parse(response);
            if(output.status) {
                localStorage.removeItem("user_data");
                window.location.replace("login.php");
            } else {
                swal({
                    title: "Error",
                    text: output.message,
                    icon: "error",
                    button: "Close",
                });
            }
        }
    });
}


// function to fetch employee data with filters on page employeesData.php
function searchFilters() {
    let workingStatusId = $('.workingStatus').val();
    let designationId = $('.designation').val();
    let locationId = $('.location').val();
    getEmployeesData(workingStatusId, designationId, locationId);
}

// function to clear filters
function clearFilters() {
    $('.workingStatus, .designation, .location').val("");
    getEmployeesData();
}


// function to clear errors in form
function clearErrors() {
    $('.errorMsgs').text("");
}

// function to validate form and add employee in database on the page employeesData.php
function formValidation() {
    clearErrors();
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
            if(output.errors) {
                let errors = output.errors;
                $('#firstNameError').empty().text(errors.firstNameError);
                $('#lastNameError').empty().text(errors.lastNameError);
                $('#dateOfJoiningError').empty().text(errors.dateOfJoiningError);
                $('#dateOfBirthError').empty().text(errors.dateOfBirthError);
                $('#mobileNumberError').empty().text(errors.mobileNumberError);
                $('#grossSalaryError').empty().text(errors.grossSalaryError);
            } else if(output.status) {
                $('#newEmployeeForm')[0].reset();
                $('#addEmployeeModal').modal('hide');
                swal({
                    title: "Success",
                    text: output.message,
                    icon: "success",
                    button: "Close",
                });
                getEmployeesData();
            }
            else {
                swal({
                    title: "Failed",
                    text: output.message,
                    icon: "error",
                    button: "Close",
                });
                getEmployeesData();
            }
        }
    });
    
}


// function to delete employee from the database on page employeesData.php
function deleteEmployeeData(employeeId) {
    swal({
        title: "Are you sure?",
        text: "All data of the employee will be deleted!",
        icon: "warning",
        buttons: ["Cancel", "Delete"],
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: 'POST',
                url: 'api/deleteEmployeeData.php',
                data: {id: employeeId},
                success: function(response, status, xhr) {
                    let output = JSON.parse(response);
                    swal({
                        title: "Success",
                        text: output.message,
                        icon: "success",
                        button: "Close",
                    });
                    getEmployeesData();
                }
            });
        }
        else {
            getEmployeesData();
        }
    });
}


function editEmployeeData(employeeId) {
    swal({
        title: "Are you sure?",
        text: "Do you really want to edit this employee data?",
        icon: "warning",
        buttons: ["Cancel", "Edit"],
        dangerMode: true,
    }).then((willEdit) => {
        if (willEdit) {
            $('#editEmployeeModal').modal('show');
            $('#editEmployeeForm .errorMsgs').text("");
            getWorkingStatus(1, '#editEmployeeForm');
            getDesignations(1, '#editEmployeeForm');
            getLocations(1, '#editEmployeeForm');
            editEmployeeDataAjax(employeeId);
        }
        else {
            getEmployeesData();
        }
    });
}


function editEmployeeDataAjax(employeeId) {
    $.ajax({
        type: 'POST',
        url: 'api/editEmployeeData.php',
        data: {id: employeeId},
        success: function(response, status, xhr) {
            let employee = JSON.parse(response);
            employee = employee.data[0];
            $('#editEmployeeForm #surname').val(employee.surname);
            $('#editEmployeeForm #firstName').val(employee.firstname);
            $('#editEmployeeForm #lastName').val(employee.lastname);
            $('#editEmployeeForm #dateOfBirth').val(employee.date_of_birth);
            $('#editEmployeeForm #dateOfJoining').val(employee.date_of_joining);
            $('#editEmployeeForm #mobileNumber').val(employee.phone);
            $('#editEmployeeForm #grossSalary').val(employee.gross_salary);
            $('#editEmployeeForm #gender').val(employee.gender);
            $('#editEmployeeForm #workingStatus').val(employee.working_status_id);
            $('#editEmployeeForm #designation').val(employee.designation_id);
            $('#editEmployeeForm #location').val(employee.location_id);
            localStorage.setItem('edit_token', JSON.stringify(employee.id));
        }
    });
}


function updateEmployeeData() {
    if(formVal('#editEmployeeForm')) {
        var employeeData = {
            id: JSON.parse(localStorage.getItem('edit_token')),
            surname: $('#editEmployeeForm #surname').val(),
            firstname: $('#editEmployeeForm #firstName').val(),
            lastname: $('#editEmployeeForm #lastName').val(),
            date_of_birth: $('#editEmployeeForm #dateOfBirth').val(),
            date_of_joining: $('#editEmployeeForm #dateOfJoining').val(),
            phone: $('#editEmployeeForm #mobileNumber').val(),
            gross_salary: $('#editEmployeeForm #grossSalary').val(),
            gender: $('#editEmployeeForm #gender').val(),
            working_status_id: $('#editEmployeeForm #workingStatus').val(),
            designation_id: $('#editEmployeeForm #designation').val(),
            location_id: $('#editEmployeeForm #location').val(),    
        } 
        $.ajax({
            type: 'POST',
            url: 'api/updateEmployeeData.php',
            data: employeeData,
            success: function(response, status, xhr) {
                let output = JSON.parse(response);
                if(output.status) {
                    swal({
                        title: "Success!",
                        text: output.message,
                        icon: "success",
                        buttons: "Close",
                    });
                }
                $('#editEmployeeModal').modal('hide');
                getEmployeesData();
            }
        });
    }
}


function formVal(formId) {
    
    $(formId+ ' .errorMsgs').text("");
    
    let toSubmit = true;
    
    let firstName = $(formId+' #firstName').val();
    let lastName = $(formId+' #lastName').val();
    let dateOfBirth = $(formId+' #dateOfBirth').val();
    let dateOfJoining = $(formId+' #dateOfJoining').val();
    let mobileNumber = $(formId+' #mobileNumber').val();
    let grossSalary = $(formId+' #grossSalary').val();


    // for first name
    if(firstName == "") {
        $(formId+' #firstNameError').text("Please enter first name");
        toSubmit = false;
    } else if(!(/^[A-Z]+$/i).test(firstName)) {
        $(formId+' #firstNameError').text("Please enter valid first name");
        toSubmit = false;
    }


    // for last name
    if(lastName == "") {
        $(formId+' #lastNameError').text("Please enter last name");
        toSubmit = false;
    } else if(!(/^[A-Z]+$/i).test(lastName)) {
        $(formId+' #lastNameError').text("Please enter valid last name");
        toSubmit = false;
    } 


    // for date of birth
    if(dateOfBirth == "") {
        $(formId+' #dateOfBirthError').text("Please enter date of birth");
        toSubmit = false;
    } else if(dateOfBirth > dateOfJoining) {
        $(formId+' #dateOfBirthError').text("Date of birth should be less than date of joining");
        toSubmit = false;
    }
    

    // for date of joining
    if(dateOfJoining == "") {
        $(formId+' #dateOfJoiningError').text("Please enter date of joining");
        toSubmit = false;
    } else if(dateOfJoining < dateOfBirth) {
        $(formId+' #dateOfJoiningError').text("Date of joining should not be less than date of birth");
        toSubmit = false;
    }
    

    // for mobile number
    if(mobileNumber == "") {
        $(formId+' #mobileNumberError').text("Please enter mobile number");
        toSubmit = false;
    } else if(mobileNumber.length != 10) {
        $(formId+' #mobileNumberError').text("Mobile number should be of 10 digits only");
        toSubmit = false;
    } else if(!(/^[0-9]+$/).test(mobileNumber)) {
        $(formId+' #mobileNumberError').text("Mobile number should contain only numbers");
        toSubmit = false;
    }


    // for gross salary
    if(grossSalary == "") {
        $(formId+' #grossSalaryError').text("Please enter gross salary")
        toSubmit = false;
    } else if(grossSalary < 1000 || grossSalary > 1000000) {
        $(formId+' #grossSalaryError').text("Please enter valid salary amount")
        toSubmit = false;
    } 

    return toSubmit;
}


// function to delete employee salary details 
function deleteSalary(salaryId) {
    swal({
        title: "Are you sure?",
        text: "Do you want to delete this employee salary data?",
        icon: "warning",
        buttons: ["Cancel", "Delete"],
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: 'POST',
                url: 'api/deleteSalary.php',
                data: {id: salaryId},
                success: function(response, status, xhr) {
                    let output = JSON.parse(response);
                    if(output.status) {
                        swal({
                            title: "Success",
                            text: output.message,
                            icon: "success",
                            button: "Close",
                        });
                    }
                    else {
                        swal({
                            title: "Error",
                            text: output.message,
                            icon: "error",
                            button: "Close",
                        });
                    }
                }
            });
        }
        getEmployeesSalaries();
    });
}



// function to get salary month for filter in employeesSalaries.php
function getSalaryMonth() {
    $.ajax({
        type: 'POST',
        url: 'api/getSalaryMonth.php',
        success: function(response, status, xhr) {
            let output = JSON.parse(response);
            if(output.status) {
                $('#salaryMonth').empty().append('<option value="" selected>All</option>');
                output.data.forEach((salaryMonth) => {
                    $('#salaryMonth').append('<option value="'+salaryMonth.for_month+'">'+salaryMonth.salary_month+'</option>');
                });
            }
        }
    });
}



// function to get date of payments for filter in employeesSalaries.php
function getDateOfPayment() {
    $.ajax({
        type: 'POST',
        url: 'api/getDateOfPayment.php',
        data: {salaryMonth: $('#salaryMonth').val()},
        success: function(response, status, xhr) {
            let output = JSON.parse(response);
            if(output.status) {
                $('#paidOnFilter').empty().append('<option value="" selected>All</option>');
                output.data.forEach((date) => {
                    $('#paidOnFilter').append('<option value="'+date.paid_on+'">'+date.date_of_payment+'</option>');
                });
            }
        }
    });
}



// function to get employee name for filter in employeesSalaries.php
function getEmployeeForSalariesFilter() {
    $.ajax({
        type: 'POST',
        url: 'api/getEmployeesData.php',
        data: {forSalariesFilter: true},
        success: function(response, status, xhr) {
            let output = JSON.parse(response);
            if(output.status) {
                $('#employeeName').empty().append('<option value="" selected>All</option>');
                output.data.forEach((employee) => {
                    $('#employeeName').append('<option value="'+employee.id+'">'+employee.name+'</option>');
                });
            }
        }
    });
}


function clearSalaryFilters() {
    $('#salaryMonth, #paidOnFilter, #employeeName').val("");
    getDateOfPayment();
    getEmployeesSalaries();
}



function searchSalaries() {
    $.ajax({
        type: 'POST',
        url: 'api/getEmployeesSalaries.php',
        data: {
            id: '*',
            salaryMonth: $('#salaryMonth').val(),
            dateOfPayment: $('#paidOnFilter').val(),
            employeeId: $('#employeeName').val()
        },
        success: function(response, status, xhr) {
            let output = JSON.parse(response);
            $('#salariesTable thead, #salariesTable tbody, #getSalariesError').empty();
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
                    '<td><a href="#" class="btn btn-primary btn-sm m-1" data-bs-toggle="modal" data-bs-target="#viewSalaryBreakupModal" onclick="viewSalaryBreakup('+salaryVal.id+','+ salaryVal.employee_id+')">View</a>'+
                    '<a href="#" class="btn btn-danger btn-sm m-1" onclick="deleteSalary('+salaryVal.id+')">Delete Salary</a></td>'+
                    '</tr>');
                });
            }
            
            else {
                $('#getSalariesError').empty().append('<div class="text-center"><p>'+output.message+'</p></div>');
            }
        },
        error: function(jXHR,exception) {
            $('#getSalariesError').empty().append('<div class="text-center"><img src="assets/images/error_img.webp"><p>'+exception+'</p></div>');
        }
    });
}



// function to fetch all working employees list on page employeesSalaries.php in addNewSalaryModal
function getEmployeesList() {
    $.ajax({
        type: 'POST',
        url: 'api/getEmployeesList.php',
        success: function(response, status, xhr) {
            let output = JSON.parse(response);
            if(output.status) {
                // appending employee list in select menu
                $('#employeeNameSelect').empty().append('<option selected hidden value="">Select</option>');
                output.data.forEach((employee) => {
                    $('#employeeNameSelect').append('<option value="'+employee.id+'">'+employee.name+'</option>');
                });

                // empty any error on employee select
                $('#employeeNameSelectError').text("");

                // empty and appending employee details side headings
                $('#employeeDetailsForNewSalary').empty().append('<div class="row mb-1 mx-auto"><p class="col-6"><strong>Date of Birth:</strong></p>'+
                '<p class="col-6"><strong>Date of Joining:</strong></p></div>'+
                '<div class="row mb-1 mx-auto"><p class="col-6"><strong>Working Status:</strong></p>'+
                '<p class="col-6"><strong>Designation:</strong></p></div>'+
                '<div class="row mb-1 mx-auto"><p class="col-6"><strong>Gender:</strong></p>'+
                '<p class="col-6"><strong>Location:</strong></p></div>'+
                '<div class="row mb-1 mx-auto"><p class="col-6"><strong>Phone:</strong></p>'+
                '<p class="col-6"><strong>Gross Salary:</strong></p></div>');

                // empty the gross salary field
                $('#gross-salary').val("");

                // empty salary components
                $('#net-salary, #deductions').val("0");
                $('.salary-component').val("");
            }
        }
    });
}


function getEmployeeForNewSalary() {
    $.ajax({
        type: 'POST',
        url: 'api/getEmployee.php',
        data: {id: $('#employeeNameSelect').val()},
        success: function(response, status, xhr) {
            let output = JSON.parse(response);
            let employeeData = output.data[0];
            if(output.status) {

                // getting employee details
                $('#employeeDetailsForNewSalary').empty().append('<div class="row mb-1 mx-auto"><p class="col-6"><strong>Date of Birth:</strong> '+employeeData.date_of_birth+'</p>'+
                '<p class="col-6"><strong>Date of Joining:</strong> '+employeeData.date_of_joining+'</p></div>'+
                '<div class="row mb-1 mx-auto"><p class="col-6"><strong>Working Status:</strong> '+employeeData.working_status+'</p>'+
                '<p class="col-6"><strong>Designation:</strong> '+employeeData.designation+'</p></div>'+
                '<div class="row mb-1 mx-auto"><p class="col-6"><strong>Gender:</strong> '+employeeData.gender+'</p>'+
                '<p class="col-6"><strong>Location:</strong> '+employeeData.location+'</p></div>'+
                '<div class="row mb-1 mx-auto"><p class="col-6"><strong>Phone:</strong> '+employeeData.phone+'</p>'+
                '<p class="col-6"><strong>Gross Salary:</strong> '+employeeData.gross_salary+'</p></div>');

                // adding gross salary from employee table data
                $('#gross-salary').val(employeeData.gross_salary);

                // selecting last month for salary by default
                const d = new Date();
                $('#salary-month').val(d.getMonth()-1);
            }
        }
    });
}

// function to update net salary and deductions
function updateSalaryAmount() {   
    let tds = ($('#tds').val() != "") ? $('#tds').val() : 0;
    let pf = ($('#pf').val() != "") ? $('#pf').val() : 0;

    let deductions = parseInt(tds) + parseInt(pf);
    $('#deductions').val(deductions);
    
    let basicPay = ($('#basic-pay').val() != "") ? $('#basic-pay').val() : 0;
    let da = ($('#da').val() != "") ? $('#da').val() : 0;
    let hra = ($('#hra').val() != "") ? $('#hra').val() : 0;
    let ca = ($('#ca').val() != "") ? $('#ca').val() : 0;
    let medicalAllowance = ($('#medical-allowance').val() != "") ? $('#medical-allowance').val() : 0;
    let bonus = ($('#bonus').val() != "") ? $('#bonus').val() : 0;

    let netSalary = parseInt(basicPay) + parseInt(da) + parseInt(hra) + parseInt(ca) + parseInt(medicalAllowance) + parseInt(bonus);
    $('#net-salary').val(netSalary);
}



function addNewSalaryValidations() {
    let toSubmit = true;
    // for employee select menu
    $('#employeeNameSelectError').text("");
    if($('#employeeNameSelect').val() == "") {
        $('#employeeNameSelectError').text("Please select employee first");
        toSubmit = false;
    }
    return toSubmit;
}


function addNewSalary() {
    if(addNewSalaryValidations()) {
        $.ajax({
            type: 'POST',
            url: 'api/addNewSalary.php',
            data: {
                employeeId: $('#employeeNameSelect').val(),
                forMonth: $('#salary-year').val() + '-' + (parseInt($('#salary-month').val())+1) + '-' + '01', 
                paidOn: $('#date-of-payment').val(),
                grossSalary: $('#gross-salary').val(),
                deductions: $('#deductions').val(),
                netSalary: $('#net-salary').val(),
                basicPay: ($('#basic-pay').val() == "") ? 0 : $('#basic-pay').val(),
                da: ($('#da').val() == "") ? 0 : $('#da').val(),
                hra: ($('#hra').val() == "") ? 0 : $('#hra').val(),
                ca: ($('#ca').val() == "") ? 0 : $('#ca').val(),
                medicalAllowance: ($('#medical-allowance').val() == "") ? 0 : $('#medical-allowance').val(),
                bonus: ($('#bonus').val() == "") ? 0 : $('#bonus').val(), 
                tds: ($('#tds').val() == "") ? 0 : $('#tds').val(),
                pf: ($('#pf').val() == "") ? 0 : $('#pf').val()
            },
            success: function(response, status, xhr) {
                let output = JSON.parse(response);
                if(output.status) {
                    swal({
                        title: "Success!",
                        text: output.message,
                        icon: "success",
                        buttons: "Close",
                    });
                }
                else {
                    swal({
                        title: "Error!",
                        text: output.message,
                        icon: "error",
                        buttons: "Close",
                    });
                }
                $('#addNewSalaryModal').modal('hide');
            }
        });
        getEmployeesSalaries();
    }
}