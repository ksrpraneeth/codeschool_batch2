function login()
{
    if(document.getElementById("btnn").innerHTML=="Login")
    {
        document.getElementById("btnn").innerHTML="Logout";
    }
    else{
        document.getElementById("btnn").innerHTML="Login";
    }
}
function upd(){
    document.getElementById("myDropdown").classList.toggle("show");
}