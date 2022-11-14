const user = localStorage.getItem('user');

if(user){
    window.location.href = 'home.html';
}

$(document).ready(function () {
    $('#signIn').click(function () {

        var uName= $('#username').val();
        var pd= $('#password').val();


        // $.post('http://restapi.adequateshop.com/api/authaccount/login', ),
        //     function (returnedData) {
        //         console.log(returnedData);
        //         // if(returnedData.data){
        //         //     localStorage.setItem('user',returnedData.data);

        //         // }else{

        //         // }
                
        //     });

        $.ajax({
            url:'http://restapi.adequateshop.com/api/authaccount/login',
            dataType: 'json',
            data: JSON.stringify({ email: uName,password:pd}),
            type: 'POST',
            contentType: "application/json;charset=utf-8",
            success: function(data){
                console.log('data',data)
                // empty,null,0
                if(data.data){
                    localStorage.setItem('user',JSON.stringify(data.data));
                    window.location.href = 'home.html';
                }else{
                    alert(data.message);
                }
            }

        });
    });
});