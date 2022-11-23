let NAV=document.getElementById('navbar');
console.log(NAV.className);
function showLeftNav() {
    let Right=document.getElementById('rightside');
    let nav=document.getElementById('navbar');
    if(NAV.className ==' col-3 sm-12 Left  d-none f'){
        Right.className='col-md-9  xs-12 Right  d-lg-block';
        nav.className='col-3  sm-12  xs-12 Left f';
    }
    else{
        Right.className='col-md-12  Right  d-lg-block';
        nav.className=' col-3 sm-12 Left  d-none f';
    }
    
  }