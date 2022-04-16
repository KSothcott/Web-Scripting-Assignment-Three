<?php

include_once('server.php');
include_once('cookiecheck.php');

?>

<html>

<head>
    <title>Cart</title>
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

    .button {
        border: 2px solid black;
        background-color: white;
        padding: 10px;
        color: black;
        cursor: pointer;
        float: right;
        margin-right: 100px;
        height: 20px;
        width: 250px;
        text-align: center;
    }
    
    .button2 {
        border: 2px solid black;
        background-color: white;
        padding: 10px;
        color: black;
        cursor: pointer;
        float: right;
        margin-right: 100px;
        margin-left: 100px;
        text-align: center;
        text-decoration: none;
    }

    .button:hover {
    background-color: #AAD8CD;
    transition: all 0.4s ease;
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.10), 0 17px 50px 0 rgba(0,0,0,0.10);
    }
    
    .button2:hover {
    background-color: #AAD8CD;
    transition: all 0.4s ease;
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.10), 0 17px 50px 0 rgba(0,0,0,0.10);
    }
    
    .products {
        margin-left: 50px;
        margin-bottom: 20px;      
    }
    
    .total{
        margin-left: 50px;
        font-size: 15pt;
        border: 3px;
        text-align: center;
        border-color: #509D8A;
        border-style: solid;
        border-radius: 5px;
        width: 200px;
        padding: 5px;
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
	    <p>Shopping Cart</p>
   	</div>

    <img src="Logo.png" style="float: right;width: 300px;height: 300px;margin-right: 50px;"/>

<?php

    echo '<a class="button2" href="/Web-Scripting-Assignment-Three/clear_order.php">Empty cart</a>';

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
                
            $image_address = '<img src="'.$row['Image'].'" width="100" height="100"/>';
            $recipe_name = $row['RecipeName'];
            $price = '&pound;'.$row['Price']/100;
            
            echo '<div class="products">';
            echo '<image>'.$image_address.' '.$recipe_name.' '.$price.'<br />';
            echo '</div>';  
            $total += $row['Price'];
            }
  
        }
    
    echo '<a class="button" onclick="window.location.href='."' cart_process.php?price=".$total."'".'">Checkout</a>';    
        
    echo '<p class="total">Total price: <br /><br />';
    echo '&pound;'.$total/100;
    echo '</p>';
    
?>

</body>

</html>