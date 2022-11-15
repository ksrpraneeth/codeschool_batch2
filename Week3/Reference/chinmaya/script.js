let date=new Date();
const monthName=['Jan','Feb','Mar','Apr','May','June','July','Aug','Sept','Oct','Nov','Dec']
$('#date').text(date.getDate()+'-'+monthName[date.getMonth()]+'-'+date.getFullYear())
$('#time').text(date.toLocaleTimeString())
$('#menubutton').click(function(){
    $('#maincontainer').toggleClass('col-md-12')
    $('#maincontainer').toggleClass('col-md-10')
    $('#navbar').toggleClass('d-none')
});
var count=0;
//major head valuation
$('#majorhead').blur(function(){
    let valuemajorhead=$('#majorhead').val()
    $('#majorheadError').text('')
    $('#majorheadvalueError').text('')
        if(!valuemajorhead){
        $('#majorheadError').text('Major Head can not be empty')
        $('#majorheadValue').val('')
        
    }
    else if(valuemajorhead.length!=4)
    {
        $('#majorheadError').text('Major Head Should 4 number')
        $('#majorheadValue').val('')
        
    }
    else if(isNaN(valuemajorhead)){
        $('#majorheadError').text('Major Head Should be number')
        $('#majorheadValue').val('') 
       
    }
    else{
        $('#majorheadvalueError').text('')
        const majorheadvalue={1234:"CAPITAL MAJOR HEAD",5678:"MAJOR HEAD ACCOUNT",9876:"SPECIAL MAJOR HEAD"}
        for (var i in majorheadvalue){
            if(i==valuemajorhead){
                $('#majorheadValue').val(majorheadvalue[i])
                break;
            }
            else{
                $('#majorheadValue').val('') 
            }
        }
        if(!($('#majorheadValue').val())){
            $('#majorheadvalueError').text('Value not found')
        }
    }
    
})
//submajor head validation
$('#submajorHead').blur(function(){
    let valueSubmajor=$('#submajorHead').val()
    $('#submajorError').text('')
    $('#submajorvalueError').text('')
        if(!valueSubmajor){
        $('#submajorError').text('Sub-Major Head can not be empty')
        $('#submajorvalue').val('')
       
    } 
    else if(valueSubmajor.length!=2)
    {
        $('#submajorError').text('Sub-Major Head Should 2 number')
        $('#submajorvalue').val('')
        
    }
    else if(isNaN(valueSubmajor)){
        $('#submajorError').text('Sub-Major Head Should be number')
        $('#submajorvalue').val('') 
       s
    }
    else{
        const submajorvalue={12:"FIRST SUB MAJOR",67:"SECOND SUB MAJOR",98:"THIRD SUB MAJOR"}
        for (i in submajorvalue){
            if(valueSubmajor==i){
                $('#submajorvalue').val(submajorvalue[i])
                break;
            }
            else{
                $('#submajorvalue').val('') 
            }
        }
        if(!($('#submajorvalue').val())){
            $('#submajorvalueError').text('VALUE NOT FOUND')
        }

    }
})
//minor head value validation
$('#minorhead').blur(function(){
    let minorhead=$('#minorhead').val()
$('#minorheadError').text("")
$('#minorheadvalueError').text('')
if(!minorhead){
$('#minorheadError').text("Minor Head can not be blank")
$('#minorheadvalue').val('')

}
else if(minorhead.length!=3){
    $('#minorheadError').text("Maximum 3 number allowed")
$('#minorheadvalue').val('')

}
else if(isNaN(minorhead)){
    $('#minorheadError').text("Only number are allowed")
    $('#minorheadvalue').val('')
  
}
else{
    $('#minorheadvalueError').text('')
const minorheadvalue={123:"First Minor Head",345:"Second Minor Head",567:"Third Minor Head"}
for (i in minorheadvalue){
    if (i==minorhead){
        $('#minorheadvalue').val(minorheadvalue[i])
        break;
    }
    else{
        $('#minorheadvalue').val('')
    }
}
if(!($('#minorheadvalue').val())){
    $('#minorheadvalueError').text('Value not found')
}
}
})
//Group Sub head validation
$('#groupsubhead').blur(function(){
    let groupsubhead=$('#groupsubhead').val()
    $('#groupsubheadError').text("")
    $('#groupsubheadvalueError').text('')
if(!groupsubhead){
$('#groupsubheadError').text("Group Sub Head can not be blank")
$('#groupsubheadValue').val('')

}
else if(groupsubhead.length!=2){
    $('#groupsubheadError').text("Maximum 2 number are allowed")
$('#groupsubheadValue').val('')

}
else if(isNaN(groupsubhead)){
    $('#groupsubheadError').text("Only number are allowed")
    $('#groupsubheadValue').val('')
    
}
else{
    $('#groupsubheadvalueError').text('')
const groupsubheadvalue={12:"First GROUP SUB Head",34:"Second GROUP SUB Head",56:"Third GROUP SUB Head"}
for (i in groupsubheadvalue){
    if (i==groupsubhead){
        $('#groupsubheadValue').val(groupsubheadvalue[i])
        break;
        
    }
    else{
        $('#groupsubheadValue').val('')
    }
}
if(!($('#groupsubheadValue').val())){
    $('#groupsubheadvalueError').text('Value not found')
}
}
})
//validating sub head values
$('#subhead').blur(function(){
    let subhead=$('#subhead').val()
$('#subheadError').text('')
$('#subheadvalueError').text('')
if(!subhead){
$('#subheadError').text('Sub Head can not be blank')
$('#subheadValue').val('')

}
else if(subhead.length!=2){
    $('#subheadError').text('Sub Head should be 2 numbers')
$('#subheadValue').val('')

}
else if(isNaN(subhead)){
    $('#subheadError').text('Only Numbers are allowed')
$('#subheadValue').val('')

}
else{
    const subheadvalue={12:"FIRST SUB HEAD",67:"SECOND SUB HEAD",98:"THIRD SUB HEAD"}
for (i in subheadvalue){
    if(subhead==i){
        $('#subheadValue').val(subheadvalue[i])
        break;
    }
    else{
        $('#subheadValue').val('')
    }
}
if(!($('#subheadValue').val())){
    $('#subheadvalueError').text('VALUE NOT FOUND')
}
}
})
//detailed head valuation
$('#detailHead').blur(function(){
    let detailHead=$('#detailHead').val()
$('#detailheadError').text('')
$('#detailheadvalueError').text('')
if(!detailHead){
    $('#detailheadError').text('Detailed Head can not be blank')
$('#detailheadValue').val('')

}
else if(detailHead.length!=3){
    $('#detailheadError').text('Detailed Head should be 3 number')
    $('#detailheadValue').val('')
  
}
else if(isNaN(detailHead)){
    $('#detailheadError').text('Detailed Head should be number only')
    $('#detailheadValue').val('')
   
}
else{
    const detailheadValuea={123:"FIRST DETAIL HEAD",678:"SECOND DETAILED HEAD",981:"THIRD DETAILED HEAD"}
    for (i in detailheadValuea){
        if(detailHead==i){
            $('#detailheadValue').val(detailheadValuea[i])
            break;
        }
        else{
            $('#detailheadValue').val('')
        }
    }
    if(!($('#detailheadValue').val())){
        $('#detailheadvalueError').text('VALUE NOT FOUND')
    } 
}
})
//sub detailhead validation
$('#subdetail').blur(function(){
    let subdetailhead=$('#subdetail').val()
    $('#subdetailError').text('')
$('#subdetailvalueError').text('')
if(!subdetailhead){
    $('#subdetailError').text(' Sub Detailed Head can not be blank')
    $('#subdetailValue').val('')
    
}
else if(subdetailhead.length!=3){
    $('#subdetailError').text(' Sub Detailed Head Should be 3 number')
    $('#subdetailValue').val('')
    
}
else if(isNaN(subdetailhead)){
    $('#subdetailError').text(' Sub Detailed Head Should be number')
    $('#subdetailValue').val('')
    
}
else{
    const subdetailarray={123:"FIRST SUBDETAIL HEAD",678:"SECOND SUBDETAILED HEAD",981:"THIRD SUBDETAILED HEAD"}
    for (i in subdetailarray){
        if(subdetailhead==i){
            $('#subdetailValue').val(subdetailarray[i])
            break;
        }
        else{
            $('#subdetailValue').val('')
        }
    }
    if(!($('#subdetailValue').val())){
        $('#subdetailvalueError').text('VALUE NOT FOUND')
    } 
} 

})
//submit button cheack
$('#submitButton').click(function(){
    let hodName=$('#hodName').find(":selected").text()
    $('#nameError').text('')
    
    if(hodName=='Select Here'){
        $('#nameError').text('Please select Name Of HOD')
        count=count+1;
    }
   
    if($('#budgetYear').find(":selected").text()=='Select Here')
    {
        $('#budgetyearError').text('Please select Budget Year')
        count=count+1;
    }
    else{
        $('#budgetyearError').text('')
    }
    if($('#establishment').find(":selected").text()=='Select Here')
    {
        $('#establishmentError').text('Please select option here')
        count=count+1;
    }
    else{
        $('#establishmentError').text('')
    }
    if($('#majorhead').val()==''){
        $('#majorheadError').text('Major Head can not be empty') 
        count=count+1;
    }
    else{
        $('#majorheadError').text('')
    }
    if($('#submajorHead').val()==''){
        $('#submajorError').text('Sub-Major Head can not be empty')
        count=count+1;
    }
    else{
        $('#submajorError').text('')
    }
    if($('#minorhead').val()==''){
        $('#minorheadError').text("Minor Head can not be blank")
        count=count+1;
    }
    else{
        $('#minorheadError').text("")
    }
    if(!($('#groupsubhead').val())){
        $('#groupsubheadError').text("Group Sub Head can not be blank")
        count=count+1;
    }
    else{
        $('#groupsubheadError').text("")
    }
    if($('#subhead').val()==''){
        $('#subheadError').text('Sub Head can not be blank')
        count=count+1;
    }
    else{
        $('#subheadError').text('')
    }
    if($('#detailHead').val()==''){
        $('#detailheadError').text('Detailed Head can not be blank')
        count=count+1;
    }
    else{
        $('#detailheadError').text('')
    }
    if($('#subdetail').val()==''){
        $('#subdetailError').text(' Sub Detailed Head can not be blank')
        count=count+1;
    }
    else{
        $('#subdetailError').text('')
    }
    if($('#charged').find(":selected").text()=='Select Here'){
        $('#chargeError').text(' Sub Detailed Head can not be blank')
        count=count+1;
    }
    else{
        $('#chargeError').text('')
    }
    console.log(count)
    if(count==0){
        $('#submitButton').attr('data-bs-toggle',"modal")
        $('#submitButton').attr('data-bs-target',"#exampleModal")
        document.getElementById('submitButton').innerHTML='priview'
        $('#hodnameOutput').text($('#hodName').find(":selected").text())
        $('#budgetyearOutput').text($('#budgetYear').find(":selected").text())
        $('#establishmentOutput').text($('#establishment').find(":selected").text())
        $('#majorheadOutput').text($('#majorhead').val()+' -  '+ $('#majorheadValue').val() )
        $('#submajorheadOutput').text($('#submajorHead').val()+' -  '+ $('#submajorvalue').val())
        $('#minorheadOutput').text($('#minorhead').val()+' -  '+ $('#minorheadvalue').val())
        $('#groupsubheadOutput').text($('#groupsubhead').val()+' -  '+ $('#groupsubheadValue').val())
        $('#subheadOutput').text($('#subhead').val()+' -  '+ $('#subheadValue').val())
        $('#detailheadOutput').text($('#detailHead').val()+' -  '+ $('#detailheadValue').val())
        $('#subdetailheadOutput').text($('#subdetail').val()+' -  '+ $('#subdetailValue').val())
        $('#chargeOutput').text($('#charged').find(":selected").text())
    }

})
//clear data function

$('#cleardata').click(function(){
    $('.text-danger').text('')
$('#form').trigger('reset')
$('#submitButton').text('Submit HOA')

})


