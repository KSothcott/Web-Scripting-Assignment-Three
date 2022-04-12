
<?php
    include_once('server.php');
    
    //$query = 'SELECT * FROM `userinfo` WHERE `email`= "'.$_POST['email'].'"';
    
    //$result = $con->query($query);
    //$is_exist_email=sizeof($row = $result->fetch(PDO::FETCH_ASSOC))-1;
    
    //if($is_exist_email) echo 'email exists';
        
    $query = 'INSERT INTO `products`.`userinfo` (`FirstName`, `LastName`, `Email`, `password`) VALUES ("'.$_POST['firstname'].'", "'.$_POST['lastname'].'", "'.$_POST['email'].'", ENCODE("'.$_POST['password'].'", "'.$keystring.'"))';
    $result=$con->query($query);
    
    $query = 'SELECT MAX(`UserID`) AS "UserID" FROM `products`.`userinfo`'; 
    $result=$con->query($query);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    
    setcookie('cookievalue',$cookievalue,(time()+3600));
?>  


<html><body onload="window.location.href='http://localhost:8080/Web-Scripting-Assignment-Three/shop.php'"></body></html>