
<?php
   include('session.php');
    include('config.php');
        if($_SERVER["REQUEST_METHOD"] == "POST") {
                $myusername = mysqli_real_escape_string($db,$_POST['username']);
                $mypassword = mysqli_real_escape_string($db,$_POST['password']);
                $sql = "UPDATE users SET usernme = '$myusername'  WHERE id=1";
                $result = mysqli_query($db,$sql);
                $sql = "UPDATE users SET password = '$mypassword' WHERE id=1";
                $result = mysqli_query($db,$sql);
        }
?>
<html>
<head>
<meta charset="UTF-8">
<title>Ethernet 16 Relay Control</title>
<style>
.login{
background-color:#000;
width:360px;
margin:40px auto;
font:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
border-radius:10px;
border:2px solid #ccc;
border-color:#0f0;
padding:10px 40px 25px; 
}
input[type=text], input[type=password]{
width:99%;
padding:10px;
margin-top:1px;
margin-bottom:1px;
border:1px solid #ccc;
padding-left:5px;
border-radius:8px;
font-size:16px;
font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif; 
}
input[type=submit]{
width:100%;
background-color:#ff0;
color:#000;
border:2px solid #fff;
padding:10px;
font-size:20px;
cursor:pointer;
border-radius:50px;
margin-bottom:5px; 
}
button[name=back]{	
width:100%;
background-color:#00f;
color:#000;
border:2px solid #fff;
padding:10px;
font-size:20px;
cursor:pointer;
border-radius:50px;
margin-bottom:15px;
}
button[name=chip]{	
width:100%;
background-color:#0f0;
color:#000;
border:2px solid #fff;
padding:10px;
font-size:20px;
cursor:pointer;
border-radius:50px;
margin-bottom:15px; 
margin-top:20px; 
}
button[name=logout]{	
width:100%;
background-color:#f00;
color:#000;
border:2px solid #fff;
padding:10px;
font-size:20px;
cursor:pointer;
border-radius:50px;
margin-bottom:5px; 
}
h4
{
margin-bottom:1px;
margin-top:1px;
color:#0f0;
}
</style>
</head>
   <body background="background.jpg">
        <form action="" method="post" style="text-align:center;">
        <h1 style="color:#0f0;">Welcome in change password and username<?php echo $login_session; ?><br />
		<div class="login">
		<form action="" method="post" style="text-align:center;">
		<h4 align="left" >username</h4>
        <input type = "text" name = "username" class = "box"/><br />
        <h4 align="left" >password</h4>
		<input type = "text" name = "password" class = "box" /><br/><br />
        <input type = "submit" value = " change "/><br />
		</div>
		<div class="login">
		<button name="chip" onclick="location.href='chip.php'" type="button">Change IP adress</button>
		<button name="back" onclick="location.href='welcome.php'" type="button">Back</button>
		<button name="logout" onclick="location.href='logout.php'" type="button">Sign Out</button>
		</div>
        </form>
    </body>

</html>