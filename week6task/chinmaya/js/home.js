$('#hamburger').click(function(){
    $('#navbar').toggleClass("d-none");
    $('#mainContain').toggleClass("col-md-12");
    $('#mainContain').toggleClass("col-md-9");
    
})
let date=new Date();
const monthName=['Jan','Feb','Mar','Apr','May','June','July','Aug','Sept','Oct','Nov','Dec']
$('#date').text(date.getDate()+'-'+monthName[date.getMonth()]+'-'+date.getFullYear())
$('#time').text(date.toLocaleTimeString())