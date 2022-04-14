<script>
    document.getElementById('f1').submit();
</script>

<?php
include_once('server.php');
?>

<html>

<head>

    <title>Profile Edit</title>
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
        float: right;
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
    
    .textbox {
        margin: 20px;
        padding: 10px;
        font-size: 12pt;
    }
    
    .dropdown {
        font-size: 14pt;
        width: 100px;
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
	    <p>Edit your Profile</p>
   	</div>
    
    <a href="/Web-Scripting-Assignment-Three/profile.php" class="button">Save changes</a>

<?php

        $query = 'SELECT * FROM `profile` WHERE `UserID` = '.$_COOKIE['UserID'];
        $result = $con->query($query);
        $row = $result->fetch(PDO::FETCH_ASSOC);

        echo '<form action="/Web-Scripting-Assignment-Three/profile_edit_process.php" method="post" id="f1" name="f1">';
        
        echo '<label class="label">Age:</label>';
        echo '<br />';
        echo '<input class="textbox" style="width:100px;" type="number" name="age" id="age" placeholder="Age" form="f1" value="'.$row["age"].'" onchange="document.getElementById('."'f1'".').submit()"/>';
        echo '<br />';
        
        echo '<label class="label">Gender:</label>';
        echo '<br />';
        echo '<input class="textbox" style="width:300px;" type="text" name="gender" id="gender" placeholder="Gender" form="f1" value="'.$row["gender"].'" onchange="document.getElementById('."'f1'".').submit()"/>';
        echo '<br />';
        
        echo '<label class="label">Country or Region:</label>';
        echo '<br />';
        echo '<input class="textbox" style="width:300px;" type="text" name="country" id="country" placeholder="Country or Region" form="f1" value="'.$row["country"].'" onchange="document.getElementById('."'f1'".').submit()"/>';
        echo '<br />';

        echo '<label class="label">What diet do you follow?</label>';
        echo '<select class="dropdown" id="diet" name="diet" form="f1" value="'.$row["diet"].'" onchange="document.getElementById('."'f1'".').submit()"/>';
        echo    '<option value="diet">Diet:</option>';
        echo    '<option value="Vegan">Vegan</option>';
        echo    '<option value="Vegetarian">Vegetarian</option>';
        echo    '<option value="Pescatarian">Pescatarian</option>';
        echo    '<option value="Paleo">Paleo</option>';
        echo    '<option value="Keto">Keto</option>';
        echo    '<option value="Gluten Free">Gluten Free</option>';
        echo    '<option value="No diet followed/other">No diet followed/other</option>';
        echo '</select>';
        echo '<p class="details">'.$row["diet"].'</p>';

        echo '<label class="label">What is your favourite recipe on Recipes for You?</label>';
        echo '<br />';
        echo '<input class="textbox" style="width:300px;" type="text" name="favourite_recipe" id="favourite_recipe" placeholder="Favourite recipe" form="f1" value="'.$row["favourite_recipe"].'" onchange="document.getElementById('."'f1'".').submit()"/>';
        echo '<br />';
        
        echo '</form>;'

?>

</body>
</html>