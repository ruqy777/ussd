<?php
//Reads the variable sent via POST from AT gateway 
$sessionId = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text = $_POST["text"];

if ($text == ""){

    //This is the first requests> Note how we start 
    // the response with CON
    $seponse = "CON What  would you want to check \n";
    $response = "1. My Account No \n";
    $response = "2. My Phone Number ";

}
else if ($text == "1"){
    //Business logic for the first level response
    $response = "CON Choose account information you want to view \n";
    $response = " 1. Account Number \n";
    $response = "2. Account Balance ";

}
else if ($text == "2"){
    //Business logic for the first level response
    // This is a terminal request. Note how w start with END

}else if($text == "1*1"){
   //This is a second level response where the user selected  1 in the first instance
   $accountNumber = "ACC1001";

   //This is terminal request. Note how we start wth END
   $response = "END Your account Number is". $accountNumber;

}else if ($text){
    //This is second level response. nOT
    $balance = "KES 10,000";

    $response = "END Your balance is".$balance;
}
header('Content-type; text/plain');
echo $response;
?>
