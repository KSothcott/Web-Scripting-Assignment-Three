<?php
include_once('server.php');

$query = 'SELECT `UserID`, `FirstName`, `LastName`, `Email`, DECODE(`password`, "'.$keystring.'") AS "PASSWORD"  FROM `products`.`userinfo` WHERE `email`="'.$_POST['email'].'"';

$result = $con->query($query);

$row = $result->fetch(PDO::FETCH_ASSOC);

if(strcmp($_POST['email'],$row['Email'])) $checkemail = 0;
    else$checkemail = 1;

if(strcmp($_POST['password'],$row['PASSWORD']))  $checkpassword = 0;
   else $checkpassword = 1;
   
if($checkemail && $checkpassword) 
{
    $query = "INSERT INTO `products`.`logincookies`(`sessioncookie`,`time`,`UserID`) VALUES (UUID(),'".time()."', '".$row['UserID']."')";
    
    $con->query($query);
    
    $query = "SELECT * FROM `products`.`logincookies` WHERE `UserID` = ".$row['UserID']." AND `time` = (SELECT MAX(`time`) FROM `products`.`logincookies`)";
    
    $result = $con->query($query);
    
    $row = $result->fetch(PDO::FETCH_ASSOC);
    
    $userid = $row['UserID'];
    
    $sessionid = $row['SessionID'];
    
    $cookievalue = $row['sessioncookie'];
    
    setcookie('cookievalue',$cookievalue,$row['time']+3600); 
    
    setcookie('SessionID',$sessionid,$row['time']+3600);
    
    setcookie('UserID',$userid,$row['time']+3600);
    
}
 
$con=NULL;
?>

<html><body onload="window.location.href='http://localhost:8080/Web-Scripting-Assignment-Three/shop.php'"></body></body></html>