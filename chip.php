<?php
   include('session.php');
    include('config.php');
        if($_SERVER["REQUEST_METHOD"] == "POST") {
                $myip = mysqli_real_escape_string($db,$_POST['ipadrr']);
                $sql = "UPDATE IP SET IP_adrr = '$myip'  WHERE id=1";
                $result = mysqli_query($db,$sql);
                }
?>
<html">
   <head>
      <title>Welcome </title>
   </head>
   <body>
        <form action="" method="post" style="text-align:center;">
        <h1>Welcome in change IP adress<?php echo $login_session; ?><br />
        <input type = "text" name = "ipadrr" class = "box"/><br /><br />
        <input type = "submit" value = " change "/><br />
         <h2><a href = "chup.php">change LOGIN</a></h2>
        <h2><a href = "welcome.php">(---back</a></h2>
        <h2><a href = "logout.php">Sign Out</a></h2>
        </form>
    </body>

</html>
