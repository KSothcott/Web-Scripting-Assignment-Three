<html>
<head>

    <title>Login</title>
    
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
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
    
    .button {
        border: 2px solid black;
        background-color: white;
        padding: 10px;
        text-decoration: none;
        color: black;
        font-family: sans-serif;
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
        font-family: sans-serif;
        font-size: 15pt;
    }
    
</style>
</head>
<script>
window.onload = function()
{
    document.getElementById('email').focus();
}

</script>

<body style="background-color: #F5ECEB; font-family: verdana;">

    <div class="icon-bar">
        <a href="http://localhost:8080/Web-Scripting-Assignment-Three/shop.php" style="font-size: 47px; float: left;"><i class="fa fa-home"></i></a>
        <a href="http://localhost:8080/Web-Scripting-Assignment-Three/profile.php" style="font-size: 47px; float: right;"><i class="fa fa-user"></i></a>
        <a href="http://localhost:8080/Web-Scripting-Assignment-Three/cart.php" style="font-size: 47px; float: right;"><i class="fa fa-shopping-cart"></i></a> 
    </div>

    <div class="heading">
    <p>Login</p>
    </div>

     <form action="login_process.php" method="post" id="f1" name="f1">


        <label class="label">Email address</label>

        <input type="email" name="email" id="email" placeholder="Enter your email" form="f1"/> <br/><br/>
        
        <label class="label">Password</label>

        <input type="password" name="password" id="password" placeholder="Enter your password" form="f1"/><br/><br/> 

        <button class="button" style="font-size: 12pt;" onclick="document.getElementById('f1').submit()">Login</button>

     </form>
     
    <br />
    <a href="http://localhost:8080/Web-Scripting-Assignment-Three/newuser.php" class="button">New user? Click here to create an account</a>
    
</body>
</html>