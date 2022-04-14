<?php

            include_once('server.php');
            
            if(is_null($_COOKIE['cookievalue'])) echo '<body onload="window.location.href='."'/Web-Scripting-Assignment-Three/login.php'".'">';
            else{
            $query = 'SELECT * FROM `logincookies` WHERE `sessioncookie` = "'.$_COOKIE['cookievalue'].'"';
            $result = $con->query($query);
            if(!$row = $result->fetch(PDO::FETCH_ASSOC))  echo '<body onload="window.location.href='."'/Web-Scripting-Assignment-Three/login.php'".'">';
            
            if($row['time']+3600 < time()) echo '<body onload="window.location.href='."'Web-Scripting-Assignment-Three/login.php'".'">';
            
            $query = "UPDATE `products`.`logincookies` SET `time` = '".time()."' WHERE `SessionID` = '".$_COOKIE['SessionID']."'";
            
            $con->query($query);
            
            }

?>

