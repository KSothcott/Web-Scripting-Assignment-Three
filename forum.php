<?php

include_once('server.php');
include_once('cookiecheck.php');

?>


<html>

<head>
    <title>Forum</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

    .heading {
		font-size: 34px;
		text-align: center;
        font-family: verdana;
    }
      
	.icon-bar {
        width: 100%;
        background-color: #509D8A;
        overflow: auto;
    }

    .icon-bar a {
        text-align: center;
        padding: 12px;
        margin-left: 50px;
        margin-right: 50px;
        transition: all 0.3s ease;
        color: white;
        font-size: 36px;
    }   
    
    .icon-bar a:hover {
    background-color: #747875;
    }    
    
    .name {
        float: right;
        margin-left: 50px;
        margin-right: 50px;
        cursor: text;
        font-size: 15pt;
        text-align: right; 
    }
    
    .subject {
        float: left;
        margin-left: 50px;
        margin-right: 50px;
        cursor: text;
        font-size: 15pt;
        text-decoration: underline;
        text-align: left; 
    }
    
    .message {
        float: left;
        margin-left: 50px;
        margin-right: 50px;
        cursor: text;
        font-size: 14pt;
        text-align: left;       
    }
    
    .date {
        float: left;
        margin-left: 50px;
        margin-right: 50px;
        cursor: text;
        font-size: 12pt;        
    }
    
    .border {
        border: 3px;
        border-color: #509D8A;
        border-style: solid;
        border-radius: 5px;
        margin: 50px;
        float: left;
        width: 700px;
        inline-size: 700px;
    }

    .button {
        border: 2px solid black;
        background-color: white;
        padding: 10px;
        text-decoration: none;
        color: black;
        cursor: pointer;
        float: right;
        margin: 20px;
    }

    .button:hover {
    background-color: #AAD8CD;
    transition: all 0.4s ease;
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.10), 0 17px 50px 0 rgba(0,0,0,0.10);
    }
    
    .textbox {
        padding: 10px;
        font-family: verdana;
    }
    
</style>
</head>

<body style="background-color: #F5ECEB; font-family: verdana;">

    <div class="icon-bar">
        <a href="/Web-Scripting-Assignment-Three/shop.php" style="font-size: 47px; float: left;"><i class="fa fa-home"></i></a>
        <a href="/Web-Scripting-Assignment-Three/profile.php" style="font-size: 47px; float: right;"><i class="fa fa-user"></i></a>
        <a href="/Web-Scripting-Assignment-Three/cart.php" style="font-size: 47px; float: right;"><i class="fa fa-shopping-cart"></i></a>
        <a href="/Web-Scripting-Assignment-Three/forum.php" style="font-size: 47px; float: right;"><i class="fa fa-comments"></i></a>
    </div>
    
    <div class="heading">
	    <p>Forum</p>
   	</div>

<?php

    $query = ' SELECT * FROM `forum` ORDER BY `post_date` DESC ';

    $result = $con->query($query);
    
        while($row = $result->fetch(PDO::FETCH_ASSOC)) 
        {
            $name = $row['name'];
            $subject = $row['subject'];
            $message = $row['message'];
            $date = $row['post_date'];             

        echo '<div class="border">';
        echo '<p class="name">'.$name.'</p><br />';
        echo '<p class="subject">'.$subject.'</p><br /><br /><br /><br />';
        echo '<p class="message">'.$message.'</p><br /><br /><br /><br /><p class="date">Posted: '.$date.'</p><br />';
        echo '</div>';
        }
    
    echo '<br /><br /><br />';
    echo '<p style="font-size: 15pt;">Add new message:</p>';

    echo '<form action="/Web-Scripting-Assignment-Three/forum_process.php" method="post" id="f1" name="f1">';
    echo '<label class="label">Subject:</label>';
        echo '<br />';
        echo '<input class="textbox" style="width:600px;" type="text" name="subject" id="subject" form="f1" value="'.$row["subject"].'"/>';
        echo '<br /><br />';
        
    echo '<label class="label">Message:</label>';
        echo '<br />';
        echo '<textarea class="textbox" style="width:600px;" type="text" name="message" id="message" form="f1" value="'.$row["message"].'"/></textarea>';
        echo '<br /><br />';
        
    echo '<label class="label">Name:</label>';
        echo '<br />';
        echo '<input class="textbox" style="width:600px;" type="text" name="name" id="name" form="f1" value="'.$row["name"].'"/>';
        echo '<br /><br />';
    
    echo '<button class="button" style="font-size: 12pt; font-family: verdana;" onclick="document.getElementById("f1").submit()">Add message</button>';

?>

</body>

</html>