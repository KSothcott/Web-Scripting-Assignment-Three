<script>

function additem($id){
    var $outstring = "add_process.php?id="+$id; 
    window.location.href=$outstring;
}

</script>

<?php
include_once('server.php');
include_once('cookiecheck.php');
?>

<html>

<head>
    <title>Recipe Details</title>
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
    
    .image {
        width: 300px;
        height: 300px;
        float: left;
        margin: 50px;
        padding: 3px;
        border: 3px;
        border-style: solid;
        border-color: #509D8A;
        border-radius: 20px; 
    }
    

    #name {
        float: left;
		font-size: 24px;
		text-align: center;
        font-family: verdana;
        width: 50%;
        text-decoration: underline;
    }
    
    #description {
        float: left;
		font-size: 20px;
		text-align: center;
        font-family: verdana;
        width: 50%;
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
    }

    .button:hover {
    background-color: #AAD8CD;
    transition: all 0.4s ease;
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.10), 0 17px 50px 0 rgba(0,0,0,0.10);
    }
    
    .textbox {
        margin: 20px;
        padding: 10px;
        font-size: 12pt;
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
	    <p>Recipe Details</p>
	</div>

    
    
<?php

$id = $_GET['id']; 
if (isset($_GET['id']))
    {        
        
        $query = 'SELECT * FROM `recipes` WHERE `RecipeID`='.$id; 
        
        $result = $con->query($query);
        
        $row = $result->fetch(PDO::FETCH_ASSOC);
        
        $image_address = '<img src="'.$row['Image'].'" class="image" />';
        
        echo $image_address;
        
        echo "<br /><br /><br /><br /><br />";
        
        $name = $row['RecipeName'];
        
        echo '<p id="name">'.$name.'</p>';
        
        echo "<br />";
        
        $description = $row['Description'];
        
        echo '<p id="description">'.$description.'</p>';
        
        echo "<br />";
        
        $price = '&pound;'.$row['Price']/100;
        
        echo '<p id="description">'.$price.'</p>';
        
    }
    
    $add = '<button class="button" onclick ="additem(';
    $add.= "'".$_GET['id']."')";
    $add.= '">Add to Cart</button>';
    echo $add;
    
?>

</body>

</html>

