$(document).ready(function(){

    let menus = '';
     $.ajax({
        url: 'menu.php',
        type: 'GET',  
        success: function (data, status) {
            data = JSON.parse(data);
            if(!data.status) {
    
            }
    
            for(var i = 0; i<data.data.length; i++) {
                menus += "<li><a href='"+data.data[i]['slug']+".html'>"+data.data[i]['menu']+"</a></li>";
            }
            $('#menubar').html(menus);
            console.log(menus);
        }
     })
    })
