
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
<html">

 <head>
      <title>Welcome </title>
   </head>
   <body>
        <form action="" method="post" style="text-align:center;">
        <h1>Welcome in change password and username<?php echo $login_session; ?></h1>
        <input type = "text" name = "username" class = "box"/><br /><br />
        <input type = "text" name = "password" class = "box" /><br/><br />
        <input type = "submit" value = " change "/><br />
         <h2><a href = "chip.php">change IP</a></h2>
        <h2><a href = "welcome.php">(---back</a></h2>
        <h2><a href = "logout.php">Sign Out</a></h2>
        </form>
    </body>

</html>
