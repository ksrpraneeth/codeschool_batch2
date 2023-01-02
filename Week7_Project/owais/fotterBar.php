<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>
<script>
function openNav(){
         
         let sidenavwidth= document.getElementById("mySidenav").offsetWidth;
         if(sidenavwidth==0){
             document.getElementById("mySidenav").style.width="260px";
             document.getElementById("main").style.marginLeft="260px";
             document.getElementById("header").style.marginLeft="260px";
            
         }
         else{
             document.getElementById("mySidenav").style.width="0";
             document.getElementById("main").style.marginLeft="0";
             document.getElementById("header").style.marginLeft="0";
     
         }
        }      
 
    
$("#logout").click(function () {
localStorage.removeItem('user_data');
window.location.replace("index.html");

})        

</script>
</html>