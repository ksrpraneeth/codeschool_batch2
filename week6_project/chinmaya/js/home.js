

$('#hamburger').click(function(){
    $('#navbar').toggleClass("d-none");
    $('#mainContain').toggleClass("col-md-12");
    $('#mainContain').toggleClass("col-md-9");
    
})
let date=new Date();
const monthName=['Jan','Feb','Mar','Apr','May','June','July','Aug','Sept','Oct','Nov','Dec']
$('#date').text(date.getDate()+'-'+monthName[date.getMonth()]+'-'+date.getFullYear())
$('#time').text(date.toLocaleTimeString());


if(localStorage.getItem('User_status')==1){
    $('#logout').removeClass('d-none')
    $('#userDetail').removeClass('d-none')
    $('#hamburger').removeClass('d-none')
    $('#timing').removeClass('d-none')
    $('#username').text(localStorage.getItem('User_name'));
}
else{
    $('#logout').addClass('d-none')
    $('#userDetail').addClass('d-none')
    $('#hamburger').addClass('d-none')
    $('#timing').addClass('d-none')
}
$('#logoutbutton').click(function(){
    localStorage.clear();
    window.location.replace("login.php");
})