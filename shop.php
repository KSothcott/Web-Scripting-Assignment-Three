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
        margin-right: 50px;
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

</style>
</head>

<body style="background-color: #F5ECEB; font-family: verdana;">

    <div class="icon-bar">
        <a href="http://localhost:8080/Web-Scripting-Assignment-Three/shop.php" style="font-size: 47px; float: left;"><i class="fa fa-home"></i></a>
        <a href="http://localhost:8080/Web-Scripting-Assignment-Three/profile.php" style="font-size: 47px; float: right;"><i class="fa fa-user"></i></a>
        <a href="http://localhost:8080/Web-Scripting-Assignment-Three/cart.php" style="font-size: 47px; float: right;"><i class="fa fa-shopping-cart"></i></a>
    </div>
    
    <br />
    <img src="Logo.png" style="float: right;width: 200px;height: 200px;padding-right: 50px;"/>
       
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
    
    $query = ' SELECT * FROM `recipes` ';

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

