if(!('user_token' in localStorage)){
    window.location.replace('login.php');
}

$('#allsalaryinfo').click(function(){
    $('#allinfoTable').removeClass('d-none')
    $.ajax({
        type:"POST",
        url:"api/allsalary.php",
        datatype:"JSON",
        success:function(data){
console.log("sucesss")
data=JSON.parse(data)
if(data.status){
    for(let i=0;i<data.output.length;i++){
        $("#allsalaryinforow").append(`<tr>
        <td>${i+1}</td>
        <td>${data.output[i].name}</td>
        <td>${data.output[i].description}</td>
        <td>${data.output[i].amount}</td>
       
   
   
   
        </tr>`);
   }
}
else{
    console.log(5)
}
        },
        error:function(){

        }

    })
})