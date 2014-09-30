<header>     
            In- en Uitstroommonitor : Log in </div>
            
</header>
    
<div class="menu">
        <?php
        // To be used in screens where it makes sence to have a menu.
        
        ?>
       
</div>
        
    
<div class="content">  	        
            
        
        <form name="form1" method="post" action="login2_ium.php">
            <br>
            <nav>
            Nieuwe gebruiker? <a href="register_ium.php">Meld je hier aan!</a>
            </nav>
            <nav>
            Wachtwoord vergeten? <a href="email_password_ium.php">Stuur password naar me !</a>
            </nav>
            <nav>
            <b>Bestaande gebruiker?</b>
            <nav>
                Gebruikersnaam: <input name="email" id="email" type="text" required="required" size ="30" maxlength="40" class="large"  placeholder="vul je emailadres in" >
            </nav>
            <nav>
                Wachtwoord: <input name="password" id="password" type="password" required="required" size ="12" maxlength="12" class="large" placeholder="vul wachtwoord">
            </nav>
            <nav>
                <input type="submit" name="Submit" value="Inloggen">
                <input type="reset" name="Reset" value="Clear">
            </nav>
            
        </form>
           
            
            
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
