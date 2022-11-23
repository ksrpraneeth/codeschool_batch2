$(document).ready(function(){
    const d = new Date();

    const month = ["January","February","March","April","May","June","July","August","September","October","November","December"];

    $(".date").text(month[d.getMonth()]+" "+d.getDate()+" "+d.getFullYear());
    $(".time").text(d.toLocaleTimeString());



        let amountCount =[
            {"name":"pao","amount":"38.8","count":"6158"},
            {"name":"paroscap","amount":"44.4","count":"5622"},
            {"name":"pd","amount":"48.9","count":"4678"},
            {"name":"dta","amount":"56.6","count":"6541"},
            {"name":"dta-cash","amount":"47.2","count":"1324"},
            {"name":"dwa-works","amount":"34.9","count":"8763"},
            {"name":"dwa-est","amount":"43.5","count":"5422"},
            {"name":"priority","amount":"40.8","count":"2344"},
           
    
        ];
        
        for(var i=0; i < amountCount.length; i++){
    
        let exp = amountCount[i]
        $("#amount").text(exp.amount+'cr');
        $("#count").text('('+exp.count+')');
        }
    
});

let jsonObj = {
    name:"pao",
    amount:"38.8",
    count :"6158"
}
console.log(jsonObj);
