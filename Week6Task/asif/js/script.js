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

    // code for user login and logout functionality
    
});



// function to fetch all employees data from api/db & display on frontend 
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
                '<th scope="col">Working Status</th>'+
                '<th scope="col">Designation</th>'+
                '<th scope="col">Location</th>'+
                '<th scope="col">Date Created</th>'+
                '<th scope="col">Salary Details</th>'+
                '</tr>');
                
                // table body
                output.data.forEach((employeeData) => {
                    $('#employeesTable tbody').append('<tr>'+
                    '<td>'+employeeData.id+'</td>'+
                    '<td>'+employeeData.name+'</td>'+
                    '<td>'+employeeData.date_of_joining+'</td>'+
                    '<td>'+employeeData.date_of_birth+'</td>'+
                    '<td>'+employeeData.gender+'</td>'+
                    '<td>'+employeeData.phone+'</td>'+
                    '<td>'+employeeData.working_status+'</td>'+
                    '<td>'+employeeData.designation+'</td>'+
                    '<td>'+employeeData.location+'</td>'+
                    '<td>'+employeeData.created_at+'</td>'+
                    '<td><a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewSalaryModal" onClick="viewSalaryDetails('+employeeData.id+')">View</a></td>'+
                    '</tr>');
                });

            } else {
                $('#tableContainer').append('<div class="text-center"><img src="/Week6Task/css/images/error_img.webp"><p>'+output.message+'</p></div>');
            }
        }
    });
}

// function to view salary recieved by each/clicked employee
function viewSalaryDetails(employeeId) {
    $.ajax({
        type: 'POST',
        url: 'api/getEmployeesSalaries.php',
        data: {id: employeeId},
        success: function(response, status, xhr) {
            let output = JSON.parse(response);
            if(output.status) {
                // table head
                $('#viewSalaryModalTable thead, #viewSalaryModalTable tbody').empty();
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
                $('#viewSalaryModalTable').append('<div class="text-center"><img src="/Week6Task/css/images/error_img.webp"><p>'+output.message+'</p></div>');
            }
        }
    });
}



// function to fetch all employees salaries data from api/db & display on frontend 
function getEmployeesSalaries() {
    $.ajax({
        type: 'POST',
        url: 'api/getEmployeesSalaries.php',
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
                    '<td><a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewSalaryBreakupModal" onClick="viewSalaryBreakup('+salaryVal.id+')">View</a></td>'+
                    '</tr>');
                });

            } else {
                $('#tableContainer').append('<div class="text-center"><img src="/Week6Task/css/images/error_img.webp"><p>'+output.message+'</p></div>');
            }
        }
    });
}


// function to display salary breakup of selected salary transaction on salaries table
function viewSalaryBreakup(salaryId) {
    console.log(salaryId);
    $.ajax({
        type: 'POST',
        url: 'api/getSalaryBreakup.php',
        data: {id: salaryId},
        success: function(response, status, xhr) {
            let output = JSON.parse(response);
            if(output.status) {
                // table head
                $('#viewSalaryBreakupModalTable thead, #viewSalaryBreakupModalTable tbody').empty();
                $('#viewSalaryBreakupModalTable thead').append('<tr>'+
                '<th scope="col">S.No</th>'+
                '<th scope="col">Description</th>'+
                '<th scope="col">Type</th>'+
                '<th scope="col">Amount</th>'+
                '</tr>');
            
                // table body
                output.data.forEach((val, index) => {
                    console.log(val);
                    $('#viewSalaryBreakupModalTable tbody').append('<tr>'+
                    '<td>'+(index + 1)+'</td>'+
                    '<td>'+val.description+'</td>'+
                    '<td>'+val.type+'</td>'+
                    '<td>'+val.amount+'</td>'+
                    '</tr>');
                });
            }
            else {
                $('#viewSalaryModalBreakupTable').append('<div class="text-center"><img src="/Week6Task/css/images/error_img.webp"><p>'+output.message+'</p></div>');
            }
        }
    });
}

