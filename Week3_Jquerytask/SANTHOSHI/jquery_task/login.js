const user = localStorage.getItem('user');

if(user){
    window.location.href = 'index.html';
}
// $(document).ready(function () {
//     $('#login').click(function () {
//         var UName= $('#username').val();
//         var Password= $('#password').val();
//         console.log(UName)
//     })
// })
// // localStorage.setItem('username','password');
// // window.location.assign("Home.html");

// var UName= $('#username').val();
// console.log(UName)
$(document).ready(function(){
    $('#login').click(function(){
        var Uname = $('#username').val();
        var Password = $('#password').val();
    $.ajax({
        url: 'http://restapi.adequateshop.com/api/authaccount/login',
        dataType: 'Json',
        type: 'POST',
        contentType: 'application/json',
        data : JSON.stringify({ email: Uname, password : Password}),
        success: function(input){
            console.log(input)
            if(input.data){
                localStorage.setItem('user',JSON.stringify(input.data));
                window.location.href = 'index.html';
                }else{
                    alert(input.message);
            }
        }
    })
})
})






