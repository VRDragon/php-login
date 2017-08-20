<?php
   include("config.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);

      $sql = "SELECT id FROM users WHERE usernme = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
         //session_register("myusername");
        $_SESSION['login_user'] = $myusername;
        header("location: welcome.php");
      }else {
        $error = "Your Login Name or Password is invalid";
      }
   }
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Ethernet 16 Relay Control</title>
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
input[type=text], input[type=password]{
width:99%;
padding:10px;
margin-top:8px;
border:1px solid #ccc;
padding-left:5px;
border-radius:8px;
font-size:16px;
font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif; 
}
input[type=submit]{
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
h2
{
margin-bottom:1px;
margin-top:1px;
color:#0f0;
}
</style>
</head>
<body style="background-color:#000;">
<div class="login">
<h1 align="center" style="color:#0f0;">Login</h1>
<form action="" method="post" style="text-align:center;">
<h2 align="left" >username</h2>
<input type = "text" name = "username" class = "box"/><br /><br />
<h2 align="left" >password</h2>
<input type = "password" name = "password" class = "box" /><br/><br />
<input type = "submit" value = " Login "/><br />
</form>
<!-- Error Message -->
<span><?php echo $error; ?></span>
</body>
</html>