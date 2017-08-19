
<?php
   include('session.php');
    include('config.php');
?>
<html">

   <head>
      <title>Welcome </title>
   </head>
   <body>
        <form action="" method="post" style="text-align:center;">
        <h1>Welcome in administration<?php echo $login_session; ?></h1>
        <h2><a href = "chup.php">Change Username and password</a></h2>
        <h2><a href = "chip.php">Change IP adress</a></h2>
        <h2><a href = "logout.php">Sign Out</a></h2>
        </form>

    </body>

</html>
