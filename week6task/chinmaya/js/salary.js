$('#salaryinfo').click(function(){
  $('#details').removeClass("d-none");
    $.ajax({
        type:"POST",
        url:"api/salaryapi.php",
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
})