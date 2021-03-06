<?php
   include("config.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);
      $sql = "SELECT id FROM users WHERE usernme = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      $count = mysqli_num_rows($result);
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
.box{
background-color:#000;
margin:1px auto;
color:#fff;
font-size:calc(178%);
font:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
border-radius:10px;
border:2px solid #ccc;
border-color:#0f0;
padding:1px 1px 1px;
}
.login{
margin: calc(0%);
margin-right: calc(0.5%);
margin-left: calc(0.5%);
font:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
border-radius:10px;
border:5px solid #ccc;
border-color:#0f0;
font-size:20px;
padding:10px 30px 25px;
margin-right: calc(0.5%);
margin-left: calc(0.5%);
display:inline-block;
position: relative;
float:left;
width: calc(25% - 10px);
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
h1
{
margin-bottom:1px;
margin-top:1px;
color:#0f0;
}
h5
{
font-size:calc(400%);
margin-bottom:1px;
margin-top:1px;
color:#0f0;
}
h2
{
margin-bottom:1px;
margin-top:1px;
color:#0f0;
}
</style>
</head>
<h5 align="center">Ethernet 16 Relay Control</h5>
<body background="background.jpg">
<?php
	//$page = $_SERVER['PHP_SELF'];
	//$sec = "5";
	//header("Refresh: $sec; url=$page");
	mysql_connect("localhost", "root", "orangepi") or
        die("Could not connect: " . mysql_error());
	mysql_select_db("login");
        $button_array = array();
        $index = 0;
	$result = mysql_query("SELECT name FROM button");
	while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
        $button_array[$index] = $row["name"];
        $index++;
	}
	$val_array = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
	$pin_array = array(14,11,10,6,5,4,1,15,8,9,7,0,2,3,12,13);
	//this php script generate the first page in function of the file
	
	for ( $i= 0; $i<16; $i++) {
		//set the pin's mode to output and read them
		system("gpio mode ".$pin_array[$i]." out");
		exec ("gpio read ".$pin_array[$i], $val_array[$i], $return );
	}
	
	for ($i = 0; $i < 16; $i++) {
	if ($i == 0){
	echo("<div class='login'>");
	}
	if ($i == 8){
	echo("</div>");
	echo("<div class='login'>");
	}
		if ($val_array[$i][0] == 0 ) {
			echo("<div class='box'>");
			echo ("<img id='button_".$i."' src='data/img/red/red_".$i.".jpg' align='left' height='40' width='40' onclick='change_pin (".$i.");'/>");
			echo($button_array[$i]);
			echo("<br />");
			echo("</div>");	
		}
		if ($val_array[$i][0] == 1 ) {
			echo("<div class='box'>");
			echo ("<img id='button_".$i."' src='data/img/green/green_".$i.".jpg' align='left' height='40' width='40' onclick='change_pin (".$i.");'/>");
			echo($button_array[$i]);
			echo("<br />");
			echo("</div>");
		}	 
	}
	if ($i == 15){
	echo("</div>");	
	}
?> 
<script src="script.js"></script>
</div>
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
