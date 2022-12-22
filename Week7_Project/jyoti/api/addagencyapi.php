<?php 


include "dbconnectionapi.php";



$statement=$pdo->prepare("insert into agency (agencyname,mobilenumber,pannumber) values(?,?,?)");
$isexecuted=$statement->execute([$_POST['agencyname'],$_POST['mobile'],$_POST['pan']]);
if(!$isexecuted){
    $response=["status"=>false,"message"=>"Data addition failed"];
    echo json_encode($response);
    return;
}

$statement2=$pdo->prepare("select agencyid from agency order by agencyid desc limit 1");
$statement2->execute();
$agencyid=$statement2->fetchAll(PDO::FETCH_ASSOC);
// print_r($agencyid);
// die();

for($i=0;$i<count($_POST['gstnumber']);$i++){
    $statement3=$pdo->prepare("insert into gstin (agency_id,gstnumber) values(?,?)");
    $statement3->execute([$agencyid[0]['agencyid'],$_POST['gstnumber'][$i]]);

}

for($i=0;$i<count($_POST['acountnumberr']);$i++){
    $statement4=$pdo->prepare("insert into agencybankdetails (agency_id,ifsc_id,accountnumber) values(?,?,?)");
   $execute= $statement4->execute([$agencyid[0]['agencyid'],$_POST['ifsc'][$i],$_POST['acountnumberr'][$i]]);
}

if(!$execute){
    $response=["status"=>false,"message"=>"Bank addition failed"];
    echo json_encode($response);
    return;
}

$response=["status"=>true,"message"=>"Information saved succesfully"];
echo json_encode($response);


