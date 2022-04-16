<?php
include_once('server.php');
include_once('cookiecheck.php');
?>

<html>

<head>
    <title>Order Complete</title>
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

    .order {
        float: left;
		font-size: 20px;
        font-family: verdana;
        text-decoration: underline;
        margin-left: 50px;
    }
    
    .description {
		font-size: 17px;
        font-family: verdana;
        margin-left: 50px;
    }

    .button {
        border: 2px solid black;
        background-color: white;
        padding: 10px;
        text-decoration: none;
        color: black;
        margin: 20px;
        cursor: pointer;
        font-family: verdana;
        font-size: 12pt;
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
        
    </div>

    <div class="heading">
	    <p>Thank you for your order</p>
	</div>
    
    <p class="order">Order summary:</p><br /><br /><br />
    
    <img src="Logo.png" style="float: right;width: 300px;height: 300px;margin-right: 50px;"/>
    
    <?php
    
    echo '<a class="button" href="/Web-Scripting-Assignment-Three/clear_order.php">Return to Recipes for You</a>';
    
    $query = 'SELECT * FROM `order_contents` WHERE `UserID` = '.$_COOKIE['UserID']; 
        
    $order = $con->query($query);
    
    $total = 0;
        
    while($row = $order->fetch(PDO::FETCH_ASSOC)) 
        {
            $recipe_id = $row['RecipeID'];              

            $query = " SELECT * FROM `recipes` WHERE `RecipeID` = '$recipe_id' ORDER BY `RecipeID` ASC ";

            $result = $con->query($query);
            
    
            while($row = $result->fetch(PDO::FETCH_ASSOC))
            {

            $recipe_name = $row['RecipeName'];
            $price = '&pound;'.$row['Price']/100;
            
            echo '<div class="description">';
            echo '<br />'.$recipe_name.'<br />'.$price.'<br />';
            echo '</div>';  
            $total += $row['Price'];

            }
  
        }
    
    ?>
    
</body>

</html>
