<?php
$number = ($_POST['conversion']);


$numberError = ['number_Error' => ''];
//$word=['wordConversion'=>''];


$dictionary  = array(0 => '', 1 => 'One', 2 => 'Two', 3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six', 7 => 'Seven', 8 => 'Eight', 9 => 'Nine', 10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve', 13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen', 16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen', 19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty', 40 => 'Fourty', 50 => 'Fifty', 60 => 'Sixty', 70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety', 100 => 'hundred', 1000 => 'thousand', 100000 => 'Lakh', 10000000 => 'Crore');

if (!is_numeric($number)) {
    $numberError['number_Error'] = 'Please Enter Number';
    $response=["status"=>0,"output"=>$numberError];
    echo json_encode($response);
    return;
}
if($number<0){
    $numberError['number_Error'] = 'Negative number are not allowed';
    $response=["status"=>0,"output"=>$numberError];
    echo json_encode($response);
    return;
}
if($number>100000){
    $numberError['number_Error'] = 'Please enter small amount less than 100000';
    $response=["status"=>0,"output"=>$numberError];
    echo json_encode($response);
    return;
}

if ($number/ $number != 1) {
    $numberError['number_Error'] = 'Fraction not Allowed';
    $response=["status"=>0,"output"=>$numberError];
    echo json_encode($response);
    return;
} elseif ($number < 21) {
    $response=["status"=>1,"output"=>($dictionary[$number] . ' ' . 'Rupees Only')];
        echo json_encode($response);
        return;
} elseif ($number < 100) {
    $tens = ((int)($number / 10)) * 10;
    $units = $number % 10;
    if ($units == 0) {
        $response=["status"=>1,"output"=>(($dictionary[$tens]) . ' ' . 'Rupees Only')];
        echo json_encode($response);
        return;
    } else {
        $response=["status"=>1,"output"=>(($dictionary[$tens]) . ' ' . ($dictionary[$units]) . ' ' . 'Rupees Only')];
        echo json_encode($response);
        return;
    }
} elseif ($number < 1000) {
    $hundreds = ((int)($number / 100));
    $remainder = $number % 100;
    $tens = ((int)($remainder / 10)) * 10;
    $units = $remainder % 10;

    if ($units == 0) {
        $response=["status"=>1,"output"=>(($dictionary[$hundreds]) . ' ' . 'Hundred' . ' ' . ($dictionary[$tens]) . ' ' . 'Rupees Only')];
        echo json_encode($response);
        return;
    } else {
        if($remainder<21){
            $response=["status"=>1,"output"=>(($dictionary[$hundreds]) . ' ' . 'Hundred' . ' ' . ($dictionary[$remainder]) . ' ' . 'Rupees Only')];
            echo json_encode($response);
            return;
        }
            
        else{

            $response=["status"=>1,"output"=>(($dictionary[$hundreds]) . ' ' . 'Hundred' . ' ' . ($dictionary[$tens]) . ' ' . ($dictionary[$units]) . ' ' . 'Rupees Only')];
            echo json_encode($response);
            return;
        }
        
    }
}
elseif ($number < 10000){
$thousand=((int)($number / 1000));
$remainder=(abs($number%1000));
if($remainder<21){
    $response=["status"=>1,"output"=>(($dictionary[$thousand]) . ' ' . 'Thousands' . ' ' . ($dictionary[$remainder]) . ' ' . 'Rupees Only')];
    echo json_encode($response);
    return;

    
}
elseif($remainder<100){
    $tens = ((int)($remainder / 10)) * 10;
    $units = $remainder  % 10;
    if ($units == 0) {

        $response=["status"=>1,"output"=>(($dictionary[$thousand]) . ' '. 'Thousands' . ' ' .($dictionary[$tens]) . ' ' . 'Rupees Only')];
        echo json_encode($response);
        return;
        
        
    } else {

        $response=["status"=>1,"output"=>(($dictionary[$thousand]) . ' '. 'Thousands' . ' ' .($dictionary[$tens]) . ' ' . ($dictionary[$units]) . '' . 'Rupees Only')];
        echo json_encode($response);
        return;

       
    }
}
elseif($remainder<1000){
    $hundreds = ((int)($remainder / 100));
    $remainder2 = $remainder % 100;
    $tens = ((int)($remainder2 / 10)) * 10;
    $units = $remainder2 % 10;

    if ($units == 0) {

        $response=["status"=>1,"output"=>(($dictionary[$thousand]) . ' '. 'Thousands' . ' ' .($dictionary[$hundreds]) . ' ' . 'Hundred' . ' ' . ($dictionary[$tens]) . ' ' . 'Rupees Only')];
        echo json_encode($response);
        return;

       
    } else {
        if($remainder2<21){
         
            $response=["status"=>1,"output"=>(($dictionary[$thousand]) . ' '. 'Thousands' . ' ' .($dictionary[$hundreds]) . ' ' . 'Hundred' . ' ' . ($dictionary[$remainder2]) . ' ' . 'Rupees Only')];
        echo json_encode($response);
        return;

            
        }
        else{

            $response=["status"=>1,"output"=>(($dictionary[$thousand]) . ' '. 'Thousands' . ' ' .($dictionary[$hundreds]) . ' ' . 'Hundred' . ' ' . ($dictionary[$tens]) . ' ' . ($dictionary[$units]) . ' ' . 'Rupees Only')];
            echo json_encode($response);
            return;
            
        }
        
    }
}
}
elseif ($number < 100000){
    $thousand2=((int)($number / 1000));
    if($thousand2<21){
        $thousand=($dictionary[$thousand2]);
    }
    else{
        $thousand= ($dictionary[(($thousand2%10)*10)]).($dictionary[$thousand2%10]);
    }
    
    
$remainder3=(abs($number % 1000));

if($remainder3<21){

    $response=["status"=>1,"output"=>(($dictionary[$thousand]). ' ' . 'Thousands' . ' ' . ($dictionary[$remainder3]) . ' ' . 'Rupees Only')];
    echo json_encode($response);
    return;


}
elseif($remainder3<100){
    $tens = ((int)($remainder3 / 10)) * 10;
    $units = $remainder3  % 10;
    if ($units == 0) {

        $response=["status"=>1,"output"=>(($dictionary[$thousand]) . ' '. 'Thousands' . ' ' .($dictionary[$tens]) . ' ' . 'Rupees Only')];
        echo json_encode($response);
        return;

        
    } else {

        $response=["status"=>1,"output"=>(($dictionary[$thousand]) . ' '. 'Thousands' . ' ' .($dictionary[$tens]) . ' ' . ($dictionary[$units]) . ' ' . 'Rupees Only')];
        echo json_encode($response);
        return;

      
    }
}
elseif($remainder3<1000){
    $thousand=((int)($number / 1000));
    $hundreds = ((int)($remainder3 / 100));
    $remainder2 = $remainder3 % 100;
    $tens = ((int)($remainder2 / 10)) * 10;
    $units = $remainder2 % 10;

    if ($units == 0) {


        $response=["status"=>1,"output"=>(($dictionary[$thousand]). ' '. 'Thousands' . ' ' .($dictionary[$hundreds]) . ' ' . 'Hundred' . ' ' . ($dictionary[$tens]) . ' ' . 'Rupees Only')];
        echo json_encode($response);
        return;


        
    } else {
        if($remainder2<21){

            $response=["status"=>1,"output"=>(($dictionary[$thousand]) . ' '. 'Thousands' . ' ' .($dictionary[$hundreds]) . ' ' . 'Hundred' . ' ' . ($dictionary[$remainder2]) . ' ' . 'Rupees Only')];
            echo json_encode($response);
            return;

           
        }
        else{

            $response=["status"=>1,"output"=>(($dictionary[$thousand]) . ' '. 'Thousands' . ' ' .($dictionary[$hundreds]) . ' ' . 'Hundred' . ' ' . ($dictionary[$tens]) . ' ' . ($dictionary[$units]) . ' ' . 'Rupees Only')];
            echo json_encode($response);
            return;

           
        }
        
    }

}
elseif($remainder3<10000){
    $sub_Number=substr($number,0,2);
    $thousands=((int)$sub_Number/10)*10;
    $units=(abs($sub_Number%10));
    $thousands=($dictionary[$thousands]).($dictionary[$units]);
    $hundred=substr($number,2,3);
    $hundred=(abs($hundred));

    if($hundred<1000){
        $hundreds = ((int)($hundred / 100));
        $remainder2 = $hundred % 100;
        $tens = ((int)($remainder2 / 10)) * 10;
        $units = $remainder2 % 10;
    
        if ($units == 0) {


            $response=["status"=>1,"output"=>(($dictionary[$thousands]) . ' '. 'Thousands' . ' ' .($dictionary[$hundreds]) . ' ' . 'Hundred' . ' ' . ($dictionary[$tens]) . ' ' . 'Rupees Only')];
            echo json_encode($response);
            return;



     
        } else {
            if($remainder2<21){


                $response=["status"=>1,"output"=>(($dictionary[$thousands]) . ' '. 'Thousands' . ' ' .($dictionary[$hundreds]) . ' ' . 'Hundred' . ' ' . ($dictionary[$remainder2]) . ' ' . 'Rupees Only')];
                echo json_encode($response);
                return;




               
            }
            else{


                $response=["status"=>1,"output"=>(($dictionary[$thousands]) . ' '. 'Thousands' . ' ' .($dictionary[$hundreds]) . ' ' . 'Hundred' . ' ' . ($dictionary[$tens]) . ' ' . ($dictionary[$units]) . ' ' . 'Rupees Only')];
                echo json_encode($response);
                return;


               
            }
            
        }
    }

    if ($hundred < 100) {
        $tens = ((int)($hundred / 10)) * 10;
        $unit1 = $hundred % 10;
        if ($units == 0) {


            $response=["status"=>1,"output"=>(($dictionary[$thousands]).' '.'Thousands'.' '.   ($dictionary[$tens]) . ' ' . 'Rupees Only')];
            echo json_encode($response);
            return;



           
        } else {

            $response=["status"=>1,"output"=>(($dictionary[$tens]) . ' ' . ($dictionary[$unit1]) . ' ' . 'Rupees Only')];
            echo json_encode($response);
            return;


           
        }
    }

}
}