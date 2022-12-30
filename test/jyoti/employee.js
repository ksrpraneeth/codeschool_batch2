if(!('token' in localStorage)){
    window.location.replace("login.php");
}

 var userId=localStorage.getItem('userId');





 $('#logout').click(function(){
    console.log(845)
    localStorage.clear();

    window.location.replace("login.php");
    

 })



//  function back(){
    

//     localStorage.clear();
//     window.location.replace('login.php')

// }


//Add Address


let addressaray=[]

$('#add').click(function(){

    var address=$('#address').val();

    if(address!=''){
        addressaray.push(address);
        window.alert("Added Address")
        $('#address').val('')
       

    }

    

    
})




//Save

$('#save').click(function(){

var formdata={

    employeeName: $('#employeeName').val(),
    employeeId:$('#employeeId').val(),
    addressaray:addressaray,
    userId:localStorage.getItem('userId')

}


$.ajax({
    type:"POST",
    url:"employeeapi.php",
    data:formdata,
    datatype:"JSON",
    success:function(data){
        data=JSON.parse(data);
        if(data.status){
         
          window.alert("Employee Added Successfully");
            
            window.location.reload()
        }
        else{
          
          
            window.alert(data.message)
        }
    }
})

})