
<?php
   include('session.php');
    include('config.php');
        if($_SERVER["REQUEST_METHOD"] == "POST") {
                exec("reboot");
        }
?>
<html">

   <head>
      <title>Administration</title>
   </head>
   <style>
.login{
background-color:#000;
width:360px;
margin:50px auto;
font:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
border-radius:10px;
border:2px solid #ccc;
border-color:#0f0;
padding:10px 40px 25px;
margin-top:70px; 
}
button[name=chup]{	
width:100%;
background-color:#00f;
color:#000;
border:2px solid #fff;
padding:10px;
font-size:20px;
cursor:pointer;
border-radius:50px;
margin-bottom:15px;
margin-top:30px; 
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
}
button[name=chbt]{	
width:100%;
background-color:#ff0;
color:#000;
border:2px solid #fff;
padding:10px;
font-size:20px;
cursor:pointer;
border-radius:50px;
margin-bottom:15px; 
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
margin-bottom:15px; 
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
</style>
   <body background="background.jpg">
        <form action="" method="post" style="text-align:center;">
        <h1 style="color:#fff;">Welcome in administration<?php echo $login_session; ?></h1>
        <div class="login">
		<button name="chup" onclick="location.href='chup.php'" type="button">Change Username and password</button>
		<button name="chip" onclick="location.href='chip.php'" type="button">Change IP adress</button>
		<button name="chbt" onclick="location.href='chbt.php'" type="button">Change button name</button>
		<button name="logout" onclick="location.href='logout.php'" type="button">Sign Out</button>
		<form action="" method="post" style="text-align:center;">
		<input type = "text" name = "password" class = "box" /><br/><br />
        <input type = "submit" value = " change "/><br />
        </div>
		</form>

    </body>

</html>
