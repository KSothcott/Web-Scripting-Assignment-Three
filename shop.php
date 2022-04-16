<?php
include_once('server.php');
include_once('cookiecheck.php');
?>

<html>

<head>
    <title>Recipes for You</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

    .heading {
		font-size: 34px;
		margin-left: 250px;
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
    
    .products {
        float: left;
        text-align: center;
        margin-left: 50px;
        margin-right: 15px;
        margin-bottom: 20px;
        cursor: pointer;        
    }
    
    .border {
        border: 3px;
        border-color: #509D8A;
        border-style: solid;
        border-radius: 20px;
        text-align: center;
        padding: 3px;
    }
    
    .dropdown {
        font-size: 14pt;
        width: 200px;
        font-family: verdana;
        height: 40px;
        border: 2px solid black;
        margin-right: 20px;
        float: right;        
    }
    
    .button {
        border: 2px solid black;
        background-color: white;
        padding: 10px;
        text-decoration: none;
        color: black;
        cursor: pointer;
        margin: 10px;
        font-size: 12pt;
        height: 40px;
        width:  70px;
        float: right; 
    }

    .button:hover {
    background-color: #AAD8CD;
    transition: all 0.4s ease;
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.10), 0 17px 50px 0 rgba(0,0,0,0.10);
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
    
    <br />
    <img src="Logo.png" style="float: right;width: 200px;height: 200px;margin-right: 50px;"/>
       
    <div class="heading">
	    <p>Recipes for You</p>
   	</div>
    
    <p style="padding-left: 50px;">Welcome <?php
    $query = 'SELECT * FROM `userinfo` WHERE `UserID` = '.$_COOKIE['UserID'];
    $result = $con->query($query);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    echo $row['FirstName'];
    ?>. <br /> <br /> Please choose from our selection of recipes below for more details.</p>
    <br /><br /><br />

<?php

    echo '<form>';
    echo '<input type="submit" class="button" value="Go"/>';
    echo '<select class="dropdown" name="category" id="category">';
        echo '<option value="all">View all</option>';
        echo '<option value="vegan">Vegan</option>';
        echo '<option value="vegetarian">Vegetarian</option>';
        echo '<option value="glutenfree">Gluten Free</option>';
        echo '<option value="fish">Fish</option>';
        echo '<option value="desserts">Desserts</option>';
    echo '</select>';
    echo '</form>';

    echo '<br /><br /><br /><br />';

    echo '<form>';
    echo '<input type="submit" class="button" value="Go"/>';
    echo '<select class="dropdown" name="category" id="category">';
        echo '<option value="alphabetical">Alphabetical</option>';
        echo '<option value="lowhigh">Low to high price</option>';
        echo '<option value="highlow">High to low price</option>';
    echo '</select>';
    echo '</form>';

    $query = ' SELECT * FROM `recipes` ';           
    $category = $_GET['category'];
    
    if ($category == "vegan") {
       $query = ' SELECT * FROM `recipes` WHERE Vegan IS NOT NULL ';
       }
    elseif ($category == "vegetarian") {
       $query = ' SELECT * FROM `recipes` WHERE Vegetarian IS NOT NULL ';
       }
    elseif ($category == "glutenfree") {
       $query = ' SELECT * FROM `recipes` WHERE GlutenFree IS NOT NULL ';
       }
    elseif ($category == "fish") {
       $query = ' SELECT * FROM `recipes` WHERE Fish IS NOT NULL ';
       } 
    elseif ($category == "desserts") {
       $query = ' SELECT * FROM `recipes` WHERE Desserts IS NOT NULL ';
       }
    elseif ($category == "lowhigh") {
       $query = ' SELECT * FROM `recipes` ORDER BY `Price` ASC ';
       }
    elseif ($category == "highlow") {
       $query = ' SELECT * FROM `recipes` ORDER BY `Price` DESC ';
       }

    $result = $con->query($query);
    
        while($row = $result->fetch(PDO::FETCH_ASSOC)) 
        {
            $image_address = '<img class="border" src="'.$row['Image'].'" width="300" height="300" onclick="window.location.href='."' detail.php?id=".$row['RecipeID']."'".'" />';
            $recipe_name = $row['RecipeName'];
            $price = '&pound;'.$row['Price']/100;
            $recipe_id = $row['RecipeID'];              

        echo '<div class="products">';
        echo '<image>'.$image_address.'<br />'.$recipe_name.'<br />'.$price.'<br />';
        echo '</div>';
        }

?>

</body>

</html>

