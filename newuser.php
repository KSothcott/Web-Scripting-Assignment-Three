
<script>
function check_passwords_match()
{
    var  p1 = document.getElementById("password").value;
    var p2 = document.getElementById("password2").value;
    if(!(p1===p2)) 
     { alert("Passwords do not match");
        document.getElementById('password').value = "";
        document.getElementById('password2').value= "";
        document.getElementById('password').focus();
        return;
     }    
}

function create_new_user()
{
    let first = document.getElementById("firstname").value;
    document.getElementById('firstname').value = first;
    
    
    if(first==="")
    {
        alert("First Name Not Entered"); 
        document.getElementById('firstname').focus();
        return;
    }
    
    let last = document.getElementById("lastname").value;
    document.getElementById('lastname').value = last;
    
    
    if(last==="")
    {
        alert("Last name not entered"); 
        document.getElementById('lastname').focus();
        return;
    }
    
    let email = document.getElementById("email").value;
    email = email.toLowerCase();
    document.getElementById('email').value = email;
    
    
    if(email==="")
    {
        alert("Email address not valid"); 
        document.getElementById('email').focus();
        return;
    }
    
    document.getElementById('f1').submit();  
}
    window.onload = function()
    {
    document.getElementById('firstname').focus();
    }
</script>

<html>
<head>
<title>Create an Account</title>

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
        font-size: 15pt;
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
    <p>Create an Account</p>
    </div>
     
     <form action="newuserprocess.php" method="post" id="f1" name="f1">

        <label class="label">First name</label>
        <input style="font-size: 14pt;" type="text" name="firstname" id="firstname" placeholder="First name" form="f1"/> <br/><br/>
       
        <label class="label">Last name</label>
        <input style="font-size: 14pt;" type="text" name="lastname" id="lastname" placeholder="Last name" form="f1"/> <br/><br/>
         
        <label class="label">Email address</label>
        <input style="font-size: 14pt;" type="email" name="email" id="email" placeholder="Enter your email address" form="f1"/> <br/><br/>

        <label class="label">Create a password</label>
        <input style="font-size: 14pt;" type="password" id="password" name="password" placeholder="Enter your password" form="f1"/><br/><br/> 
        
        <label class="label">Re-enter your password</label>
        <input style="font-size: 14pt;" type="password" id="password2" name="password2" placeholder="Re-enter your password" form="f1" onchange="check_passwords_match()"/><br/><br/> 

     </form>
        <button class="button" style="font-size: 12pt; font-family: verdana;" onclick="create_new_user()">Create account</button>
     
     
    <br /><br />
    <a href="/Web-Scripting-Assignment-Three/login.php" class="button">Already have an account? Click here to login</a>      
</body>
</html>