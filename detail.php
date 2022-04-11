<html>

<head>
    <title>Recipe Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

    .heading {
        float: center;
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
        float: left;
        text-align: center;
        padding: 12px;
        margin-left: 50px;
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
        padding: 10px;
        border: 5px;
        border-style: solid;
        border-color: #509D8A; 
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
    
</style>
</head>

<body style="background-color: #F5ECEB; font-family: verdana;">

    <div class="icon-bar">
        <a href="http://localhost:8080/Web-Scripting-Website/" style="font-size: 47px;"><i class="fa fa-home"></i></a> 
    </div>

    <div class="heading">
	    <p>Recipe Details</p>
	</div>

    
    
<?php
$id = $_GET['id']; 
if (isset($_GET['id']))
    {        
        $dbc = mysqli_connect( 'localhost' , 'root' , 'root' , 'products' );
        
        $query = ' SELECT * FROM `recipes` WHERE `RecipeID`='.$id; 
        
        $result = mysqli_query($dbc,$query);
        
        $row= mysqli_fetch_array($result,MYSQLI_ASSOC);
        
        $image_address = '<img src="'.$row['Image'].'" class="image" />';
        
        echo $image_address;
        
        echo "<br />";
        echo "<br />";
        echo "<br />";
        echo "<br />";
        echo "<br />";
        
        $name = $row['RecipeName'];
        
        echo '<p id="name">'.$name.'</p>';
        
        echo "<br />";
        
        $description = $row['Description'];
        
        echo '<p id="description">'.$description.'</p>';
        
        echo "<br />";
        
        $price = '&pound;'.$row['Price']/100;
        
        echo '<p id="description">'.$price.'</p>';
        
    }
?>

</body>

</html>

