$('#showdetails').click(function () {
   $('#details').removeClass('d-none');
    $.ajax({
        type: "POST",
        url: "api/employeeapi.php",
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



                    </tr>`);
                }
               
            }
            else{
                
            }
        },
        error: function () { }
    })
})