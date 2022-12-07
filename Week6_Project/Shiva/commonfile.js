$(document).ready(function(){

    let menus = '';
     $.ajax({
        url: 'menu.php',
        type: 'GET',  
        success: function (data, status) {
            var response = JSON.parse(data);
            if(!response.status) {
    
            }
    
            for(var i = 0; i<response.data.length; i++) {
                menus += "<li><a href='"+response.data[i]['slug']+".html'>"+response.data[i]['menu']+"</a></li>";
            }
            $('#menubar').html(menus);
            console.log(menus);
        }
     })
    })
