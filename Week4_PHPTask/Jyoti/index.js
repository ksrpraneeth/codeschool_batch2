const d=new Date();
const day=d.getDate();
const month=d.getMonth();
const year=d.getFullYear();
const m=['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
const date=day+'-'+m[month]+'-'+year;
document.getElementById('date').innerHTML=date;
let hour=d.getHours();
let min=d.getMinutes();
if(hour>12){
    h2=hour-12;
    let time=h2+':'+min+'PM'
    document.getElementById('time').innerHTML=time;
}
else{
    let time=hour+':'+min+'AM';
    document.getElementById('time').innerHTML=time;
}
