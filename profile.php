<?php
include_once('server.php');
include_once('cookiecheck.php');
?>

<html>

<head>

    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

    .heading {
		font-size: 34px;
		margin: 20px;
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
    
    .table {
        width: 83%;
        padding-left: 50px;
        padding-right: 50px;
        padding-bottom: 20px;
        padding-top: 20px;
        cursor: pointer; 
    }
    
    .border {
        border: 3px;
        border-color: #509D8A;
        border-style: solid;
        border-radius: 20px;
        width: 33%;
        text-align: center;
        padding: 5px; 
    }
    
    .button {
        border: 2px solid black;
        background-color: white;
        padding: 10px;
        text-decoration: none;
        color: black;
        margin: 20px;
        cursor: pointer;
    }

    .button:hover {
    background-color: #AAD8CD;
    transition: all 0.4s ease;
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.10), 0 17px 50px 0 rgba(0,0,0,0.10);
    }
    
    .label {
        margin: 20px;
        font-size: 17pt;
    }
    
    .details {
        margin: 20px;
        font-size: 14pt;
    }

</style>
</head>

<body style="background-color: #F5ECEB; font-family: verdana;">

    <div class="icon-bar">
        <a href="http://localhost:8080/Web-Scripting-Assignment-Three/shop.php" style="font-size: 47px; float: left;"><i class="fa fa-home"></i></a>
        <a href="http://localhost:8080/Web-Scripting-Assignment-Three/profile.php" style="font-size: 47px; float: right;"><i class="fa fa-user"></i></a>
        <a href="http://localhost:8080/Web-Scripting-Assignment-Three/cart.php" style="font-size: 47px; float: right;"><i class="fa fa-shopping-cart"></i></a>
        <a href="http://localhost:8080/Web-Scripting-Assignment-Three/forum.php" style="font-size: 47px; float: right;"><i class="fa fa-comments"></i></a>
    </div>
       
    <div class="heading">
	    <p>Profile</p>
   	</div>

    <a href="http://localhost:8080/Web-Scripting-Assignment-Three/logout.php" style="float:right;" class="button">Log out</a>
    <a href="http://localhost:8080/Web-Scripting-Assignment-Three/profile_edit.php" style="float:right;" class="button">Edit your profile</a>
    
    <?php
    
    $query = 'SELECT * FROM `userinfo` WHERE `UserID` = '.$_COOKIE['UserID'];
    $result = $con->query($query);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    echo '<p class="label">'.$row['FirstName'].' '.$row['LastName'].'</p>';
    
    $query = 'SELECT * FROM `profile` WHERE `UserID` = '.$_COOKIE['UserID'];
    $result = $con->query($query);
    $row = $result->fetch(PDO::FETCH_ASSOC);

    echo '<label class="label">Age:</label>';
    echo '<p class="details">'.$row["age"].'</p>';

    echo '<label class="label">Gender:</label>';
    echo '<p class="details">'.$row["gender"].'</p>';

    echo '<label class="label">Country:</label>';
    echo '<p class="details">'.$row["country"].'</p>';

    echo '<label class="label">Diet:</label>';
    echo '<p class="details">'.$row["diet"].'</p>';

    echo '<label class="label">Favourite recipe:</label>';
    echo '<p class="details">'.$row["favourite_recipe"].'</p>';

    ?>
    
</body>
</html>