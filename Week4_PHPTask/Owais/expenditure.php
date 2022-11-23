<?php


// For expenditure type

$result = [
    "status"=>false,
    "error"=>'',
    "data"=>[]
];

if(!array_key_exists("expenditureType",$_POST) || $_POST["expenditureType"] == "") {
    $result["status"] = false;
    $result["error"] = "Please select Expenditure Type";
    echo json_encode($result);
    return;
}
$expenditureType =$_POST["expenditureType"];

  
$expenditureArray =[

    "Capital Expenditure"=>[ 
    "Maintain current levels of operation within the organization",
    "Expenses to permit future expansion." 
    ],

   "Revenue Expenditure"=>[
    "Sales costs or All expenses incurred by the firm that are directly tied to the manufacture and selling of its goods or services.",
    "All expenses incurred by the firm to guarantee the smooth operation."

   ],

   "Deferred Revenue Expenditure"=>[
    "Exorbitant Advertising Expenditures",
    "Unprecedented Losses",
    "Development and Research Cost"
   ]      
];
$result["status"] =true;
$result["error"] ='';
$result["data"] = $expenditureArray[$expenditureType];
echo json_encode($result);
return;


?>