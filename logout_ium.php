<?php
      if(!isset($_SESSION)) 
    { 
        session_start();
        
    }
        session_unset(); // alle variabelen vrijgeven
        session_destroy(); // sessie afsluiten
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styles/ium.css"
	media="screen" />
</head>
<body>
<header>     
            In- en Uitstroommonitor :  Uitloggen
</header>
    
    <div class="menu">
        <?php
        // To be used in screens where it makes sence to have a menu.
        ?>
    </div>
        
    
    <div class="content">  	
   
                 <nav>Je bent uitgelogd!
                 </nav>
                 <nav>
                    <a href="login_ium.php">Inloggen</a>
                 </nav> 
     </div>
    
    <div class="right">
        <?php
        // To be used in screens where it makes sence to have a menu right side.
        ?>
</div>
   
<footer>
        powered by <a href='sluisitconsultancy.nl' title ="Homepage" id = "logo"><img src="img/Logo_gerton_FINAL.jpg" align="center" width="200" height="50"></a> 

</footer>

</body>
</html>
